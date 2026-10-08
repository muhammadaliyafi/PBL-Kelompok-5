@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <!-- 1. BANNER WELCOME -->
    <div class="bg-gradient-to-r from-blue-100 to-indigo-50 border border-blue-200 rounded-2xl p-6 flex justify-between items-center relative overflow-hidden shadow-sm">
        <div class="z-10 max-w-xl">
            <h2 class="text-2xl font-extrabold text-blue-950 mb-1">Selamat Datang, Shelvi 👋</h2>
            <p class="text-sm text-slate-600 font-medium">Pantau status pengajuan topik, judul proposal hingga status validasi kamu di sini secara real-time.</p>
        </div>
        <div class="z-10 text-6xl text-blue-500 opacity-90 hidden sm:block">
            <i class="fa-solid fa-graduation-cap"></i>
        </div>
    </div>

    <!-- 2. PROGRESS TUGAS AKHIR (KOSONG / BELUM JALAN) -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <h3 class="text-base font-extrabold text-blue-950 mb-6">Progress Tugas Akhir</h3>
        
        <div class="relative flex items-center justify-between px-4 sm:px-10">
            <!-- Line background netral -->
            <div class="absolute top-4 left-10 right-10 h-1 bg-slate-200 -z-0"></div>

            <!-- Step 1 (Inaktif) -->
            <div class="flex flex-col items-center gap-2 z-10 bg-white px-2">
                <div class="w-9 h-9 rounded-full bg-slate-300 text-white flex items-center justify-center font-bold text-sm">1</div>
                <span class="text-xs font-bold text-slate-500">Pilih Topik</span>
            </div>

            <!-- Step 2 (Inaktif) -->
            <div class="flex flex-col items-center gap-2 z-10 bg-white px-2">
                <div class="w-9 h-9 rounded-full bg-slate-300 text-white flex items-center justify-center font-bold text-sm">2</div>
                <span class="text-xs font-bold text-slate-500">Ajukan Judul</span>
            </div>

            <!-- Step 3 (Inaktif) -->
            <div class="flex flex-col items-center gap-2 z-10 bg-white px-2">
                <div class="w-9 h-9 rounded-full bg-slate-300 text-white flex items-center justify-center font-bold text-sm">3</div>
                <span class="text-xs font-bold text-slate-500">Validasi</span>
            </div>

            <!-- Step 4 (Inaktif) -->
            <div class="flex flex-col items-center gap-2 z-10 bg-white px-2">
                <div class="w-9 h-9 rounded-full bg-slate-300 text-white flex items-center justify-center font-bold text-sm">4</div>
                <span class="text-xs font-bold text-slate-500">Arsip</span>
            </div>
        </div>
    </div>

    <!-- 3. CARDS STATUS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        
        <!-- CARD 1: TOPIK -->
        <div class="bg-blue-50/70 border border-blue-200 rounded-2xl p-5 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <div class="flex items-start gap-4">
                <div class="w-11 h-11 rounded-xl bg-blue-600 text-white flex items-center justify-center text-lg shrink-0 shadow-sm">
                    <i class="fa-solid fa-file-pen"></i>
                </div>
                <div>
                    <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Status Topik</span>
                    <h4 class="text-base font-extrabold text-blue-950 mt-0.5">Belum Dipilih</h4>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ url('/mahasiswa/pengajuan-topik') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2 rounded-full transition">
                    Pilih Topik &rarr;
                </a>
            </div>
        </div>

        <!-- CARD 2: PROPOSAL -->
        <div class="bg-amber-50/70 border border-amber-200 rounded-2xl p-5 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <div class="flex items-start gap-4">
                <div class="w-11 h-11 rounded-xl bg-amber-500 text-white flex items-center justify-center text-lg shrink-0 shadow-sm">
                    <i class="fa-regular fa-file-lines"></i>
                </div>
                <div>
                    <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Status Proposal</span>
                    <h4 class="text-base font-extrabold text-amber-950 mt-0.5">Belum Diajukan</h4>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ url('/mahasiswa/pengajuan-judul') }}" class="inline-flex items-center gap-2 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs px-4 py-2 rounded-full transition">
                    Ajukan Judul &rarr;
                </a>
            </div>
        </div>

        <!-- CARD 3: VALIDASI -->
        <div class="bg-cyan-50/70 border border-cyan-200 rounded-2xl p-5 flex flex-col justify-between min-h-[140px] hover:shadow-md transition">
            <div class="flex items-start gap-4">
                <div class="w-11 h-11 rounded-xl bg-cyan-500 text-white flex items-center justify-center text-lg shrink-0 shadow-sm">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                    <span class="text-xs text-slate-500 font-semibold uppercase tracking-wider">Status Validasi</span>
                    <h4 class="text-base font-extrabold text-cyan-950 mt-0.5">Belum Divalidasi</h4>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ url('/mahasiswa/status-validasi') }}" class="inline-flex items-center gap-2 bg-cyan-500 hover:bg-cyan-600 text-white font-bold text-xs px-4 py-2 rounded-full transition">
                    Lihat Status &rarr;
                </a>
            </div>
        </div>

    </div>

    <!-- 4. ALUR PENGAJUAN -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <h3 class="text-base font-extrabold text-blue-950 mb-4">Alur Pengajuan Tugas Akhir</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            
            <div class="bg-blue-50/50 border border-blue-200 rounded-xl p-4 text-center">
                <div class="w-7 h-7 rounded-full bg-blue-600 text-white font-extrabold text-xs flex items-center justify-center mx-auto mb-2">1</div>
                <h5 class="text-sm font-bold text-blue-950 mb-1">Pilih Topik</h5>
                <p class="text-xs text-slate-500 leading-relaxed">Tentukan bidang peminatan TA kamu.</p>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 text-center">
                <div class="w-7 h-7 rounded-full bg-slate-400 text-white font-extrabold text-xs flex items-center justify-center mx-auto mb-2">2</div>
                <h5 class="text-sm font-bold text-slate-800 mb-1">Ajukan Judul</h5>
                <p class="text-xs text-slate-500 leading-relaxed">Isi form pengajuan proposal.</p>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 text-center">
                <div class="w-7 h-7 rounded-full bg-slate-400 text-white font-extrabold text-xs flex items-center justify-center mx-auto mb-2">3</div>
                <h5 class="text-sm font-bold text-slate-800 mb-1">Pantau Validasi</h5>
                <p class="text-xs text-slate-500 leading-relaxed">Pantau status revisi dan persetujuan.</p>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 text-center">
                <div class="w-7 h-7 rounded-full bg-slate-400 text-white font-extrabold text-xs flex items-center justify-center mx-auto mb-2">4</div>
                <h5 class="text-sm font-bold text-slate-800 mb-1">Cek Arsip Judul</h5>
                <p class="text-xs text-slate-500 leading-relaxed">Pastikan judul tidak sama dengan judul TA sebelumnya.</p>
            </div>

        </div>
    </div>

</div>
@endsection