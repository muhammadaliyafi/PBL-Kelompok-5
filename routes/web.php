<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\AuthController;



// Import Controller Gugus TA & Auth
use App\Http\Controllers\GugusTA\DashboardController as GugusTADashboardController;
use App\Http\Controllers\GugusTA\MahasiswaController;
use App\Http\Controllers\GugusTA\VerifikasiController;
use App\Http\Controllers\GugusTA\DosenController;
use App\Http\Controllers\GugusTA\PlotingController;
use App\Http\Controllers\GugusTA\BankTopikController;
use App\Http\Controllers\GugusTA\ArsipJudulController;

// Import Controller Koorprodi
use App\Http\Controllers\Koorprodi\DashboardController as KoorprodiDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return redirect()->route('login');
});



// ==========================================
// ROUTES DOSEN PEMBIMBING
// ==========================================
Route::prefix('dosen')->name('dosen.')->group(function () {
    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');




    Route::view('/mahasiswa', 'pages.mahasiswa')->name('mahasiswa');
    Route::view('/topik', 'pages.topik')->name('topik');
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');
});

// ==========================================
// ROUTES GUGUS TA
// ==========================================
Route::prefix('gugus-ta')->group(function () {
    Route::get('/dashboard', [GugusTADashboardController::class, 'index'])->name('gugusta.dashboard');
    Route::get('/bank-topik', [BankTopikController::class, 'index'])->name('topik.index');
    Route::post('/bank-topik', [BankTopikController::class, 'store'])->name('topik.store');
    Route::put('/bank-topik/{id}', [BankTopikController::class, 'update'])->name('topik.update');
    Route::delete('/bank-topik/{id}', [BankTopikController::class, 'destroy'])->name('topik.destroy');
    Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('gugusta.verifikasi');
    Route::get('/verifikasi/{id}/review', [VerifikasiController::class, 'review'])->name('gugusta.verifikasi.review');
    Route::post('/verifikasi/{id}', [VerifikasiController::class, 'updateReview'])->name('gugusta.verifikasi.update');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
    Route::post('/mahasiswa/import', [MahasiswaController::class, 'import']);
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
    Route::delete('/mahasiswa-delete-all', [MahasiswaController::class, 'deleteAll']);
    Route::post('/mahasiswa/bulk-delete', [MahasiswaController::class, 'bulkDelete']);
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
    Route::get('/ploting', [PlotingController::class, 'index'])->name('gugusta.ploting');
    Route::post('/ploting', [PlotingController::class, 'store']);
    Route::put('/ploting/{id}', [PlotingController::class, 'update']);
    Route::delete('/ploting/{id}', [PlotingController::class, 'destroy']);
    Route::get('/arsip-judul', [ArsipJudulController::class, 'index'])->name('arsip.index');
    Route::delete('/arsip-judul/delete-all', [ArsipJudulController::class, 'deleteAll'])->name('arsip.delete-all');
    Route::delete('/arsip-judul/{id}', [ArsipJudulController::class, 'destroy'])->name('arsip.destroy');
    Route::post('/arsip-judul/import', [ArsipJudulController::class, 'import'])->name('arsip.import');
});

// ==========================================
// ROUTES KOORPRODI
// ==========================================
Route::prefix('koorprodi')->name('koorprodi.')->group(function () {
    Route::get('/dashboard', [KoorprodiDashboardController::class, 'index'])->name('dashboard');
    Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip');
});

// ==========================================
// ROUTES AUTHENTICATION
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/pilih-role', [AuthController::class, 'showSelectRole'])->name('select.role');
Route::post('/pilih-role', [AuthController::class, 'setRole'])->name('set.role');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// RUTE DARURAT / ALIAS (TANPA DUPLIKAT)
// ==========================================
Route::get('/dashboard', function () {
    return redirect()->route('mahasiswa.dashboard');
});
