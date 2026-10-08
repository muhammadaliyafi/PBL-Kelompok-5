<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GugusTA\DashboardController;
use App\Http\Controllers\GugusTA\MahasiswaController;
use App\Http\Controllers\GugusTA\VerifikasiController;



// Route Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// ROUTES GUGUS TA
// ==========================================

// Dashboard
Route::get('/gugus-ta/dashboard', [DashboardController::class, 'index'])->name('gugusta.dashboard');

// Kelola Data Mahasiswa
Route::get('/gugus-ta/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/gugus-ta/mahasiswa', [MahasiswaController::class, 'store']); // Tambah manual
Route::post('/gugus-ta/mahasiswa/import', [MahasiswaController::class, 'import']); // Import
Route::delete('/gugus-ta/mahasiswa/{id}', [MahasiswaController::class, 'destroy']); // Hapus
Route::get('/gugus-ta/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::put('/gugus-ta/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/gugus-ta/mahasiswa-delete-all', [MahasiswaController::class, 'deleteAll']);
Route::post('/gugus-ta/mahasiswa/bulk-delete', [MahasiswaController::class, 'bulkDelete']);

// Route Verifikasi Proposal Gugus TA
Route::get('/gugus-ta/verifikasi', [VerifikasiController::class, 'index'])->name('gugusta.verifikasi');
Route::get('/gugus-ta/verifikasi/{id}/review', [VerifikasiController::class, 'review'])->name('gugusta.verifikasi.review');
Route::post('/gugus-ta/verifikasi/{id}', [App\Http\Controllers\GugusTA\VerifikasiController::class, 'updateReview'])->name('gugusta.verifikasi.update');

// ploting dospem
Route::get('/gugus-ta/ploting', [App\Http\Controllers\GugusTA\PlotingController::class, 'index'])->name('gugusta.ploting');
