<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
Route::get('/keuangan/create', [KeuanganController::class, 'create'])->name('keuangan.create');
Route::post('/keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');
