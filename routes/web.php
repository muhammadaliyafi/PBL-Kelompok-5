<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mahasiswa\DashboardController;
use App\Http\Controllers\Mahasiswa\PengajuanTopikController;
use App\Http\Controllers\Mahasiswa\PengajuanJudulController;

/*
|--------------------------------------------------------------------------
| Web Routes - Mahasiswa
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/mahasiswa/dashboard');
});

Route::prefix('mahasiswa')->group(function () {
    // 1. Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('mahasiswa.dashboard');

    // 2. Pengajuan Topik
    Route::get('/pengajuan-topik', [PengajuanTopikController::class, 'index'])->name('mahasiswa.topik.index');
    Route::post('/pengajuan-topik', [PengajuanTopikController::class, 'store'])->name('mahasiswa.topik.store');

    // 3. Pengajuan Judul
    Route::get('/pengajuan-judul', [PengajuanJudulController::class, 'index'])->name('mahasiswa.judul.index');
    Route::post('/pengajuan-judul', [PengajuanJudulController::class, 'store'])->name('mahasiswa.judul.store');
});