<?php

namespace App\Http\Controllers;

use App\Models\keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('keuangan.index');
    }

    public function create() {
        return view('keuangan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'tanggal'=> 'required',
            'username'=> 'required',
            'jenis'=> 'required',
            'nominal'=> 'required',
        ]);
        $transaksi = keuangan::create($request->all());
        return response()->json($transaksi,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = keuangan::findOrFail($id);
        return response()->json($transaksi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transaksi = keuangan::findOrFail($id);

        $request([
            'keterangan' => 'required',
            'tanggal'=> 'required',
            'username'=> 'required',
            'jenis'=> 'required',
            'nominal'=> 'required',
        ]);

        $transaksi->update($request->all());
        return response()->json($transaksi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Keuangan::findOrFail($id);
        $transaksi-> delete();
        return response()->json(null,204);
    }
}
