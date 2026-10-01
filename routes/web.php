<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanController;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\GugusTA\MahasiswaController;

Route::get('/gugus-ta/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/gugus-ta/mahasiswa', [MahasiswaController::class, 'store']); // Tambah manual
Route::post('/gugus-ta/mahasiswa/import', [MahasiswaController::class, 'import']); // Import
Route::delete('/gugus-ta/mahasiswa/{id}', [MahasiswaController::class, 'destroy']); // Hapus
Route::get('/gugus-ta/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::put('/gugus-ta/mahasiswa/{id}', [MahasiswaController::class, 'update']);
