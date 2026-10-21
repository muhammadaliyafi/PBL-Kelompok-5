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
use App\Http\Controllers\GugusTA\BankTopikController;
use App\Http\Controllers\GugusTA\ArsipJudulController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// ==========================================
// ROUTES MAHASISWA
// ==========================================
Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');

    Route::get('/pengajuan-topik', [PengajuanTopikController::class, 'index'])->name('topik.index');
    Route::post('/pengajuan-topik', [PengajuanTopikController::class, 'store'])->name('topik.store');

    Route::get('/pengajuan-judul', [PengajuanJudulController::class, 'index'])->name('judul.index');
    Route::post('/pengajuan-judul', [PengajuanJudulController::class, 'store'])->name('judul.store');
});

// Direct Route Tampilan Mahasiswa Kamu
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/pengajuan-topik', function () {
    return view('pengajuan_topik');
});
Route::get('/pengajuan-judul', function () {
    return view('pengajuan_judul');
});
Route::get('/status-validasi', function () {
    return view('status_validasi');
});
Route::get('/data-arsip', function () {
    return view('data_arsip');
});

// ==========================================
// ROUTES GUGUS TA
// ==========================================
Route::prefix('gugus-ta')->group(function () {
    // Dashboard
    Route::get('/dashboard', [GugusTADashboardController::class, 'index'])->name('gugusta.dashboard');

    // Kelola Bank Topik
    Route::get('/bank-topik', [BankTopikController::class, 'index'])->name('topik.index');
    Route::post('/bank-topik', [BankTopikController::class, 'store'])->name('topik.store');
    Route::put('/bank-topik/{id}', [BankTopikController::class, 'update'])->name('topik.update');
    Route::delete('/bank-topik/{id}', [BankTopikController::class, 'destroy'])->name('topik.destroy');

    // Verifikasi Proposal
    Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('gugusta.verifikasi');
    Route::get('/verifikasi/{id}/review', [VerifikasiController::class, 'review'])->name('gugusta.verifikasi.review');
    Route::post('/verifikasi/{id}', [VerifikasiController::class, 'updateReview'])->name('gugusta.verifikasi.update');

    // Kelola Data Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
    Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
    Route::post('/mahasiswa/import', [MahasiswaController::class, 'import']);
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
    Route::delete('/mahasiswa-delete-all', [MahasiswaController::class, 'deleteAll']);
    Route::post('/mahasiswa/bulk-delete', [MahasiswaController::class, 'bulkDelete']);

    // Kelola Data Dosen
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::put('/dosen/{id}', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('/dosen/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

    // Ploting Dospem
    Route::get('/ploting', [PlotingController::class, 'index'])->name('gugusta.ploting');
    Route::post('/ploting', [PlotingController::class, 'store']);
    Route::put('/ploting/{id}', [PlotingController::class, 'update']);
    Route::delete('/ploting/{id}', [PlotingController::class, 'destroy']);

    // Arsip Judul
    Route::get('/arsip-judul', [ArsipJudulController::class, 'index'])->name('arsip.index');
    Route::delete('/arsip-judul/delete-all', [ArsipJudulController::class, 'deleteAll'])->name('arsip.delete-all');
    Route::delete('/arsip-judul/{id}', [ArsipJudulController::class, 'destroy'])->name('arsip.destroy');
    Route::post('/arsip-judul/import', [ArsipJudulController::class, 'import'])->name('arsip.import');
});

// ==========================================
// ROUTES KOORPRODI
// ==========================================
Route::prefix('koorprodi')->group(function () {
    Route::get('/dashboard', function () {
        return view('koorprodi.dashboard');
    })->name('koorprodi.dashboard');
});

// ==========================================
// ROUTES AUTHENTICATION
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/pilih-role', [AuthController::class, 'showSelectRole'])->name('select.role');
Route::post('/pilih-role', [AuthController::class, 'setRole'])->name('set.role');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');