@extends('layout.mahasiswa') <!-- Sesuaikan layout sidebar mahasiswa kamu -->

@section('title', 'Data Arsip Judul TA - Mahasiswa SIPETA')

@section('content')
    <!-- HEADER HALAMAN -->
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Data Arsip Judul TA</h1>
            <p class="text-xs text-slate-500 mt-0.5">Bank pencarian referensi judul dan topik proposal Tugas Akhir mahasiswa.
            </p>
        </div>
        <div
            class="bg-white px-4 py-2 rounded-xl border border-slate-200 shadow-sm text-xs font-semibold text-slate-600 self-start md:self-auto">
            424 judul ditampilkan
        </div>
    </div>

    <!-- CARD PENCARIAN & FILTER -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm p-6 mb-6">
        <form method="GET" action="" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
            <div class="md:col-span-3">
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Pencarian Arsip</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </span>
                    <input type="text" name="search" placeholder="Cari judul, nama, atau topik..."
                        value="{{ request('search') }}"
                        class="w-full pl-10 pr-4 py-2.5 text-xs bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-blue-500 text-slate-800 placeholder-slate-400">
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5">Tahun</label>
                <select name="year"
                    class="w-full px-3.5 py-2.5 text-xs bg-white border border-slate-200 rounded-xl focus:outline-none focus:border-blue-500 text-slate-800">
                    <option value="">Semua Tahun</option>
                    <option value="2025">2025</option>
                    <option value="2024">2024</option>
                </select>
            </div>
            <div class="md:col-span-4 flex justify-end">
                <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs rounded-xl shadow-sm transition-colors cursor-pointer">
                    Cari Data
                </button>
            </div>
        </form>
    </div>

    <!-- TABEL DAFTAR ARSIP -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
        <div class="p-5 border-b border-slate-100">
            <h2 class="text-sm font-bold text-slate-800">Daftar Arsip Judul TA Mahasiswa</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-500 font-bold bg-slate-50/50">
                        <th class="py-3 px-5 w-16">NO</th>
                        <th class="py-3 px-5 w-24">TAHUN</th>
                        <th class="py-3 px-5 w-32">NIM</th>
                        <th class="py-3 px-5 w-48">NAMA MAHASISWA</th>
                        <th class="py-3 px-5">JUDUL PROPOSAL</th>
                        <th class="py-3 px-5 w-40">TOPIK</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-4 px-5 font-medium text-slate-500">1</td>
                        <td class="py-4 px-5 font-semibold text-slate-800">2025</td>
                        <td class="py-4 px-5 font-mono text-slate-500">2301301126</td>
                        <td class="py-4 px-5 font-bold text-slate-900 uppercase">ERLIA FITRIANI</td>
                        <td class="py-4 px-5 text-slate-600 leading-relaxed">Sistem Informasi Presisi Honorer Dinas Pekerja
                            Umum...</td>
                        <td class="py-4 px-5">
                            <span
                                class="inline-block px-2.5 py-1 bg-blue-50 text-blue-600 font-semibold text-[10px] rounded-lg border border-blue-100">
                                Sistem Informasi
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
2. Daftarkan di routes/web.php
Masukkan rute khusus mahasiswa ini ke dalam grup prefix mahasiswa supaya strukturnya aman:

PHP
Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');
Route::get('/pengajuan-topik', [PengajuanTopikController::class, 'index'])->name('topik.index');
Route::post('/pengajuan-topik', [PengajuanTopikController::class, 'store'])->name('topik.store');
Route::get('/pengajuan-judul', [PengajuanJudulController::class, 'index'])->name('judul.index');
Route::post('/pengajuan-judul', [PengajuanJudulController::class, 'store'])->name('judul.store');

// Tambahkan baris ini khusus arsip mahasiswa
Route::get('/data-arsip', function () {
return view('mahasiswa.arsip');
})->name('arsip');
});
