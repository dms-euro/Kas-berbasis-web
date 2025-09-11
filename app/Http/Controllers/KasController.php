<?php

namespace App\Http\Controllers;

use App\Models\kas;
use App\Models\User;
use Illuminate\Http\Request;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = kas::query();

        // --- Filter ---
        if ($request->filled('month')) {
            $query->whereYear('tanggal', substr($request->month, 0, 4))
                ->whereMonth('tanggal', substr($request->month, 5, 2));
        }

        if ($request->filled('status')) {
            $query->where('status_bayar', $request->status);
        }

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $kas = $query->orderBy('tanggal', 'desc')->paginate(10);

        // --- Ambil daftar bulan unik dari data pembayaran ---
        $bulanList = kas::selectRaw('DATE_FORMAT(tanggal, "%Y-%m") as bulan')
            ->groupBy('bulan')
            ->orderBy('bulan', 'desc')
            ->pluck('bulan')
            ->map(function ($item) {
                return [
                    'value' => $item,
                    'label' => \Carbon\Carbon::createFromFormat('Y-m', $item)->translatedFormat('F Y'),
                ];
            });

        // Ambil daftar user
        $users = User::all();

        return view('keuangan.index', compact('kas', 'users', 'bulanList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'status_bayar' => 'required',
            'petugas' => 'required',
        ]);

        kas::create([
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'status_bayar' => $request->status_bayar,
            'petugas' => $request->petugas,
        ]);

        return redirect()->back()->with('success', 'Kas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(kas $kas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kas $kas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'tanggal' => 'required|date',
            'status_bayar' => 'required|in:Lunas,Belum bayar',
            'petugas' => 'required|string',
        ]);

        $kas = Kas::findOrFail($id);
        $kas->update($validated);

        return redirect()->back()->with('success', 'Data pembayaran berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $pembayaran = kas::findOrFail($id);
        $pembayaran->delete();
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus!');
    }
}
