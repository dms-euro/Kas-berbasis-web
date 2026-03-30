<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login user dan generate token
     */
    public function login(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // cek login
        if (!Auth::attempt($validated)) {
            return response()->json([
                'meta' => [
                    'success' => false,
                    'message' => 'Username atau password salah'
                ]
            ], 401);
        }

        $user = Auth::user();

        // hapus token lama (opsional, biar 1 user 1 login)
        $user->tokens()->delete();

        // buat token baru
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Login berhasil'
            ],
            'data' => [
                'token' => $token,
                'user' => [
                    'id'       => $user->id,
                    'username' => $user->username,
                    'nama'     => $user->nama,
                    'level'    => $user->level,
                ]
            ]
        ], 200);
    }

    /**
     * Ambil data user login
     */
    public function me(Request $request)
    {
        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Data user'
            ],
            'data' => $request->user()
        ], 200);
    }

    /**
     * Logout user (hapus token)
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'meta' => [
                'success' => true,
                'message' => 'Logout berhasil'
            ]
        ], 200);
    }
}
