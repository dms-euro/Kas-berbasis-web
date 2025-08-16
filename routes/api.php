<?php

use App\Http\Controllers\KeuanganController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return 'hai ini api';
});
Route::apiResource('transaksi',KeuanganController::class);
