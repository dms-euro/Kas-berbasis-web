<?php

namespace App\Http\Controllers;

use App\Models\keuangan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keuangan = keuangan::paginate(10);
        return view('keuangan.transaksi', compact('keuangan'));
    }

    public function exportPdf()
    {
        $keuangan = Keuangan::all();

        $pdf = Pdf::loadView('keuangan.export-pdf', compact('keuangan'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-transaksi-kas.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'tanggal' => 'required',
            'username' => 'required',
            'jenis' => 'required',
            'nominal' => 'required',
        ]);
        keuangan::create($request->all());
        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Keuangan::findOrFail($id);
        $transaksi->delete();
        return redirect()->back()->with('success', 'Transaksi berhasil dihapus!');
    }
}
