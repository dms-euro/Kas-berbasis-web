<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kas;
use Illuminate\Http\Request;

class KasController extends Controller
{
    /**
     * Ambil data kas + filter + pagination
     */
    public function index(Request $request)
    {
        $query = Kas::query();

        // FILTER BULAN (format: YYYY-MM)
        if ($request->filled('month')) {
            $query->whereYear('tanggal', substr($request->month, 0, 4))
                  ->whereMonth('tanggal', substr($request->month, 5, 2));
        }

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status_bayar', $request->status);
        }

        // SEARCH NAMA
        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $kas = $query->orderBy('tanggal', 'desc')->paginate(10);

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Data kas berhasil diambil'
            ],
            'data' => $kas
        ], 200);
    }

    /**
     * Simpan data kas
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'tanggal'      => 'required|date',
            'status_bayar' => 'required|in:Lunas,Belum bayar',
            'petugas'      => 'required|string|max:255',
        ]);

        $kas = Kas::create($validated);

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Kas berhasil ditambahkan'
            ],
            'data' => $kas
        ], 201);
    }

    /**
     * Detail kas
     */
    public function show($id)
    {
        $kas = Kas::find($id);

        if (!$kas) {
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
                'message' => 'Detail kas'
            ],
            'data' => $kas
        ], 200);
    }

    /**
     * Update kas
     */
    public function update(Request $request, $id)
    {
        $kas = Kas::find($id);

        if (!$kas) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'message' => 'Data tidak ditemukan'
                ]
            ], 404);
        }

        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'tanggal'      => 'required|date',
            'status_bayar' => 'required|in:Lunas,Belum bayar',
            'petugas'      => 'required|string|max:255',
        ]);

        $kas->update($validated);

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Kas berhasil diupdate'
            ],
            'data' => $kas
        ], 200);
    }

    /**
     * Hapus kas
     */
    public function destroy($id)
    {
        $kas = Kas::find($id);

        if (!$kas) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'message' => 'Data tidak ditemukan'
                ]
            ], 404);
        }

        $kas->delete();

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Kas berhasil dihapus'
            ]
        ], 200);
    }
}
