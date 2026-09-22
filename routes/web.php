<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProductController;


Route::get('/', fn() => redirect()->route('product.index'));
Route::resource('buku', BukuController::class);

use App\Http\Controllers\AnggotaController;

Route::resource('anggota', AnggotaController::class);

Route::resource('pengajuan', PengajuanController::class);

Route::resource('product', ProductController::class);
