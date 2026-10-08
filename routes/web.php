<?php

use Illuminate\Support\Facades\Route;

// Import Controller Mahasiswa
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\PengajuanTopikController;
use App\Http\Controllers\Mahasiswa\PengajuanJudulController;

// Import Controller Gugus TA & Auth
use App\Http\Controllers\GugusTA\DashboardController as GugusTADashboardController;
use App\Http\Controllers\GugusTA\MahasiswaController;
use App\Http\Controllers\GugusTA\VerifikasiController;
use App\Http\Controllers\GugusTA\DosenController;
use App\Http\Controllers\GugusTA\PlotingController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama / Landing Page
Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// ROUTES MAHASISWA
// ==========================================
Route::prefix('mahasiswa')->group(function () {
    // 1. Dashboard
    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');

    // 2. Pengajuan Topik
    Route::get('/pengajuan-topik', [PengajuanTopikController::class, 'index'])->name('mahasiswa.topik.index');
    Route::post('/pengajuan-topik', [PengajuanTopikController::class, 'store'])->name('mahasiswa.topik.store');

    // 3. Pengajuan Judul
    Route::get('/pengajuan-judul', [PengajuanJudulController::class, 'index'])->name('mahasiswa.judul.index');
    Route::post('/pengajuan-judul', [PengajuanJudulController::class, 'store'])->name('mahasiswa.judul.store');
});

// ==========================================
// ROUTES GUGUS TA
// ==========================================

// Dashboard Gugus TA
Route::get('/gugus-ta/dashboard', [GugusTADashboardController::class, 'index'])->name('gugusta.dashboard');

// Kelola Data Mahasiswa
Route::get('/gugus-ta/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/gugus-ta/mahasiswa', [MahasiswaController::class, 'store']);
Route::post('/gugus-ta/mahasiswa/import', [MahasiswaController::class, 'import']);
Route::delete('/gugus-ta/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
Route::get('/gugus-ta/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::put('/gugus-ta/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/gugus-ta/mahasiswa-delete-all', [MahasiswaController::class, 'deleteAll']);
Route::post('/gugus-ta/mahasiswa/bulk-delete', [MahasiswaController::class, 'bulkDelete']);

// Route Verifikasi Proposal Gugus TA
Route::get('/gugus-ta/verifikasi', [VerifikasiController::class, 'index'])->name('gugusta.verifikasi');
Route::get('/gugus-ta/verifikasi/{id}/review', [VerifikasiController::class, 'review'])->name('gugusta.verifikasi.review');
Route::post('/gugus-ta/verifikasi/{id}', [VerifikasiController::class, 'updateReview'])->name('gugusta.verifikasi.update');

// Ploting Dospem
Route::get('/gugus-ta/ploting', [PlotingController::class, 'index'])->name('gugusta.ploting');

// Route Kelola Data Dosen
Route::get('/gugus-ta/dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::post('/gugus-ta/dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::put('/gugus-ta/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('/gugus-ta/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

// ==========================================
// ROUTES AUTHENTICATION
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/pilih-role', [AuthController::class, 'showSelectRole'])->name('select.role');
Route::post('/pilih-role', [AuthController::class, 'setRole'])->name('set.role');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
