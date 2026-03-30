<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KasController;
use App\Http\Controllers\Api\KeuanganController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // AUTH
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // KAS
    Route::get('/kas', [KasController::class, 'index']);
    Route::post('/kas', [KasController::class, 'store']);
    Route::get('/kas/{id}', [KasController::class, 'show']);
    Route::put('/kas/{id}', [KasController::class, 'update']);
    Route::delete('/kas/{id}', [KasController::class, 'destroy']);

    // KEUANGAN
    Route::get('/keuangan', [KeuanganController::class, 'index']);
    Route::post('/keuangan', [KeuanganController::class, 'store']);
    Route::get('/keuangan/{id}', [KeuanganController::class, 'show']);
    Route::delete('/keuangan/{id}', [KeuanganController::class, 'destroy']);
    Route::get('/keuangan-export-pdf', [KeuanganController::class, 'exportPdf']);
});
