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
    public function index()
    {
        $users = User::all();
        $kas = kas::paginate(10);
        return view('keuangan.index', compact('kas','users'));
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
    public function update(Request $request, kas $kas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kas $kas)
    {
        //
    }
}
