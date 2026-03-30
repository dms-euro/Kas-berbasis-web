<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function create()
    {
        $users = User::all();
        return view('auth.anggota', compact('users'));
    }

    public function logout()
    {
        Auth::logout();
        return view('auth.login')->with('success', 'Logout Berhasil!');
    }

    public function tambahuser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'nama'     => 'required',
            'level'    => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nama'     => $request->nama,
            'level'    => $request->level,
        ]);

        return redirect()->back()->with('success', 'User berhasil ditambahkan!');
    }

    public function store(Request $request)
    {
        $cek = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($cek)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', 'Login Berhasil!');
        }
        return redirect()->back()->withErrors(['username' => 'Login Gagal!'])->onlyInput('username');
    }

    public function show(string $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus!');
    }
}
