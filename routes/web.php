<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
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
=======
use App\Http\Controllers\GugusTA\DashboardController;
use App\Http\Controllers\GugusTA\MahasiswaController;
use App\Http\Controllers\GugusTA\VerifikasiController;
use App\Http\Controllers\GugusTA\DosenController;
use App\Http\Controllers\AuthController;



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

// Route Kelola Data Dosen
Route::get('/gugus-ta/dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::post('/gugus-ta/dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::put('/gugus-ta/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('/gugus-ta/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

// Route Authentication Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/pilih-role', [AuthController::class, 'showSelectRole'])->name('select.role');
Route::post('/pilih-role', [AuthController::class, 'setRole'])->name('set.role');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
>>>>>>> 364f54b8eb18d10304832d19c2b42859dd6fd30e
