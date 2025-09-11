<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::post('/users', [LoginController::class, 'tambahuser'])->name('users.store');
Route::delete('/users/{id}', [LoginController::class, 'destroy'])->name('user.destroy');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::post('/keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');
    Route::delete('/keuangan/{id}', [KeuanganController::class, 'destroy'])->name('keuangan.destroy');

    Route::get('/kas', [KasController::class, 'index'])->name('kas.index');
    Route::post('/kas', [KasController::class, 'store'])->name('kas.store');
    Route::put('/kas/{id}', [KasController::class, 'update'])->name('kas.update');
    Route::delete('/kas/{id}', [KasController::class, 'destroy'])->name('kas.destroy');
});
