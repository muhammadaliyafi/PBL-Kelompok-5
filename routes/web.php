<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;

Route::get('/', function () {
    return redirect()->route('dosen.dashboard');
});

Route::prefix('dosen')->group(function () {

    Route::view('/dashboard', 'pages.dashboard')
        ->name('dosen.dashboard');

    Route::view('/validasi', 'pages.validasi')
        ->name('dosen.validasi');

    Route::view('/mahasiswa', 'pages.mahasiswa')
        ->name('dosen.mahasiswa');

    Route::view('/topik', 'pages.topik')
        ->name('dosen.topik');

   Route::get('/arsip', [ArsipController::class, 'index'])
    ->name('dosen.arsip');

Route::post('/arsip/import', [ArsipController::class, 'import'])
    ->name('dosen.arsip.import');
    
});