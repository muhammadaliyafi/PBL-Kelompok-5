<?php

use Illuminate\Support\Facades\Route;

// Redirect halaman utama ke dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Route Tampilan Mahasiswa
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