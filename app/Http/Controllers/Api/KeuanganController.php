<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KeuanganController extends Controller
{
    /**
     * Ambil semua transaksi (pagination)
     */
    public function index(Request $request)
    {
        $query = Keuangan::query();

        // FILTER JENIS (masuk / keluar)
        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        // SEARCH
        if ($request->filled('search')) {
            $query->where('keterangan', 'like', '%' . $request->search . '%');
        }

        $data = $query->orderBy('tanggal', 'desc')->paginate(10);

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Data transaksi berhasil diambil'
            ],
            'data' => $data
        ], 200);
    }

    /**
     * Simpan transaksi
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'keterangan' => 'required|string|max:255',
            'tanggal'    => 'required|date',
            'username'   => 'required|string|max:100',
            'jenis'      => 'required|in:masuk,keluar',
            'nominal'    => 'required|numeric|min:0',
        ]);

        $data = Keuangan::create($validated);

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Transaksi berhasil ditambahkan'
            ],
            'data' => $data
        ], 201);
    }

    /**
     * Detail transaksi
     */
    public function show($id)
    {
        $data = Keuangan::find($id);

        if (!$data) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'message' => 'Data tidak ditemukan'
                ]
            ], 404);
        }

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Detail transaksi'
            ],
            'data' => $data
        ], 200);
    }

    /**
     * Hapus transaksi
     */
    public function destroy($id)
    {
        $data = Keuangan::find($id);

        if (!$data) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'message' => 'Data tidak ditemukan'
                ]
            ], 404);
        }

        $data->delete();

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Transaksi berhasil dihapus'
            ]
        ], 200);
    }

    /**
     * Export PDF (API version)
     */
    public function exportPdf()
    {
        $data = Keuangan::all();

        $pdf = Pdf::loadView('keuangan.export-pdf', compact('data'))
            ->setPaper('a4', 'portrait');

        // return stream (bisa dibuka di mobile / browser)
        return $pdf->stream('laporan-transaksi-kas.pdf');
    }
}
