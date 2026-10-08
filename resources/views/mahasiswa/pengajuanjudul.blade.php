@extends('layouts.app')

@section('content')
<!-- Import Font Plus Jakarta Sans & FontAwesome -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .font-sans-custom {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
</style>

<div class="font-sans-custom max-w-6xl mx-auto p-4 md:p-6 text-slate-800 antialiased">

    @if(session('judul_submitted') || (isset($isSubmitted) && $isSubmitted))

        @php
            $judul = session('data_judul') ?? $dataJudul;
        @endphp

        <!-- ========================================== -->
        <!-- HALAMAN KARTU STATUS PENGAJUAN (SETELAH SUBMIT) -->
        <!-- ========================================== -->
        <div class="space-y-5">
            
            <!-- HEADER HALAMAN -->
            <div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Kartu Status Pengajuan</h1>
                <p class="text-xs font-medium text-slate-500 mt-1">Kartu Ringkasan Form & Status Single</p>
            </div>

            <!-- KARTU 1: STATUS PENGAJUAN PROPOSAL ANDA -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden">
                <!-- HEADER KARTU (BIRU MUDA KONSISTEN) -->
                <div class="bg-gradient-to-r from-blue-50/80 to-indigo-50/50 px-6 py-4 border-b border-blue-100/80">
                    <h2 class="text-sm md:text-base font-bold text-slate-800">Status Pengajuan Proposal Anda</h2>
                </div>

                <!-- ISI DETAILS -->
                <div class="p-6 space-y-4">
                    <!-- JUDUL PROPOSAL -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0 text-sm shadow-xs">
                            <i class="fa-regular fa-lightbulb"></i>
                        </div>
                        <div class="w-36 font-semibold text-xs text-slate-600">Judul Proposal</div>
                        <div class="text-xs font-bold text-slate-900 flex-1">
                            : {{ $judul->judul ?? 'Aplikasi SIPETA Berbasis Web di Politala' }}
                        </div>
                    </div>

                    <!-- TOPIK UTAMA -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0 text-sm shadow-xs">
                            <i class="fa-regular fa-calendar-check"></i>
                        </div>
                        <div class="w-36 font-semibold text-xs text-slate-600">Topik Utama</div>
                        <div class="text-xs font-bold text-slate-900 flex-1">
                            : {{ $judul->topik ?? 'Sistem Informasi' }}
                        </div>
                    </div>

                    <!-- TANGGAL PENGAJUAN -->
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0 text-sm shadow-xs">
                            <i class="fa-regular fa-file-lines"></i>
                        </div>
                        <div class="w-36 font-semibold text-xs text-slate-600">Tanggal Pengajuan</div>
                        <div class="text-xs font-bold text-slate-900 flex-1">
                            : {{ $judul->tanggal_pengajuan ?? '17 September 2026' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- KARTU 2: STATUS VALIDASI SAAT INI -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden">
                <!-- HEADER KARTU -->
                <div class="bg-gradient-to-r from-blue-50/80 to-indigo-50/50 px-6 py-4 border-b border-blue-100/80">
                    <h2 class="text-sm md:text-base font-bold text-slate-800">Status Validasi Saat Ini</h2>
                </div>

                <!-- TIMELINE STATUS -->
                <div class="p-6">
                    <div class="relative pl-6 space-y-6">
                        <!-- Garis Hubung Vertikal -->
                        <div class="absolute left-[7px] top-2 bottom-3 w-[2px] bg-slate-200"></div>

                        <!-- Step 1: Pengajuan Judul (Aktif/Selesai) -->
                        <div class="relative flex items-center gap-3">
                            <div class="absolute -left-[23px] w-4 h-4 rounded-full bg-blue-600 ring-4 ring-blue-100 flex items-center justify-center">
                                <div class="w-1.5 h-1.5 bg-white rounded-full"></div>
                            </div>
                            <span class="text-xs font-bold text-slate-900">Pengajuan Judul</span>
                        </div>

                        <!-- Step 2: Validasi Dosen Pembimbing (Proses) -->
                        <div class="relative flex items-center gap-3">
                            <div class="absolute -left-[23px] w-4 h-4 rounded-full bg-white border-2 border-slate-300"></div>
                            <span class="text-xs font-medium text-slate-600">Validasi Dosen Pembimbing</span>
                        </div>

                        <!-- Step 3: Validasi Koor Prodi (Pending) -->
                        <div class="relative flex items-center gap-3">
                            <div class="absolute -left-[23px] w-4 h-4 rounded-full bg-white border-2 border-slate-300"></div>
                            <span class="text-xs font-medium text-slate-600">Validasi Koor Prodi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TOMBOL AKSI EDIT & HAPUS (KANAN BAWAH) -->
            <div class="flex justify-end items-center gap-3 pt-2">
                <!-- Tombol Edit -->
                <a href="{{ route('mahasiswa.judul.index') }}" title="Edit Pengajuan" class="w-11 h-11 bg-white border border-slate-200/80 rounded-xl shadow-xs hover:bg-slate-50 hover:border-slate-300 transition-all duration-150 flex items-center justify-center text-slate-700 hover:text-blue-600">
                    <i class="fa-solid fa-pen text-sm"></i>
                </a>

                <!-- Tombol Hapus -->
                <form action="#" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')">
                    @csrf
                    <button type="submit" title="Hapus Pengajuan" class="w-11 h-11 bg-white border border-slate-200/80 rounded-xl shadow-xs hover:bg-red-50 hover:border-red-200 transition-all duration-150 flex items-center justify-center text-red-500 hover:text-red-600">
                        <i class="fa-solid fa-trash-can text-sm"></i>
                    </button>
                </form>
            </div>

        </div>

    @else

        <!-- ========================================== -->
        <!-- FORM PENGAJUAN JUDUL PROPOSAL              -->
        <!-- ========================================== -->
        <div class="space-y-5">
            
            <!-- JUDUL UTAMA -->
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Form Pengajuan Judul Proposal</h1>

            <form action="{{ route('mahasiswa.judul.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- MAIN CARD FORM -->
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                    
                    <!-- HEADER CARD -->
                    <div class="bg-gradient-to-r from-blue-50/80 to-indigo-50/50 px-6 py-4 border-b border-blue-100/80">
                        <h2 class="text-sm md:text-base font-bold text-slate-800">Input Judul Proposal</h2>
                    </div>

                    <!-- ISI FORM & SPK -->
                    <div class="p-6">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
                            
                            <!-- INPUT FIELDS (SPAN 8) -->
                            <div class="lg:col-span-8 space-y-4">
                                
                              <!-- PILIH TOPIK UTAMA (5 TOPIK) -->
<div>
    <label class="block text-xs font-bold text-slate-800 mb-1.5">Pilih Topik Utama</label>
    <div class="relative">
        <select name="topik" required class="w-full bg-white border border-slate-300/80 rounded-xl px-4 py-3 text-xs text-slate-700 font-medium appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-all">
            <option value="" disabled selected>Pilih Topik...</option>
            <option value="Sistem Informasi">Sistem Informasi</option>
            <option value="Internet of Things (IoT)">Internet of Things (IoT)</option>
            <option value="Data Science">Data Science</option>
            <option value="Game Development">Game Development</option>
            <option value="Jaringan & Keamanan Siber">Jaringan & Keamanan Siber</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
            <i class="fa-solid fa-chevron-down text-xs"></i>
        </div>
    </div>
</div>
                                <!-- JUDUL PROPOSAL -->
                                <div>
                                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Judul Proposal</label>
                                    <input type="text" name="judul_usulan" required placeholder="Masukkan Judul Proposal" class="w-full bg-white border border-slate-300/80 rounded-xl px-4 py-3 text-xs text-slate-800 placeholder-slate-400 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-all">
                                </div>

                                <!-- DESKRIPSI SINGKAT -->
                                <div>
                                    <label class="block text-xs font-bold text-slate-800 mb-1.5">Deskripsi Singkat</label>
                                    <div class="relative">
                                        <textarea id="deskripsiInput" name="deskripsi" rows="4" maxlength="500" required placeholder="Jelaskan secara singkat tentang proposal anda..." class="w-full bg-white border border-slate-300/80 rounded-xl p-4 text-xs text-slate-800 placeholder-slate-400 font-medium focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 transition-all resize-none" oninput="document.getElementById('charCount').innerText = this.value.length"></textarea>
                                        <div class="absolute bottom-3 right-4 text-[11px] text-slate-400 font-medium">
                                            <span id="charCount">0</span>/500
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- REKOMENDASI SPK (SPAN 4) -->
                            <div class="lg:col-span-4">
                                <div class="bg-gradient-to-br from-blue-50/70 to-indigo-50/60 border border-blue-100 rounded-2xl p-5 space-y-4 shadow-2xs">
                                    <div class="flex items-center gap-2.5 text-blue-900 font-bold text-xs">
                                        <div class="w-6 h-6 rounded-full bg-blue-600 text-white flex items-center justify-center text-[10px] shadow-xs">
                                            <i class="fa-solid fa-info"></i>
                                        </div>
                                        <span>Rekomendasi SPK</span>
                                    </div>

                                    <div class="flex items-start gap-3 pt-1">
                                        <div class="w-8 h-8 rounded-lg bg-white/80 border border-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0 text-sm shadow-2xs">
                                            <i class="fa-regular fa-lightbulb"></i>
                                        </div>
                                        <div class="text-[11px] leading-snug">
                                            <span class="text-slate-500 font-medium block">Topik Rekomendasi:</span>
                                            <strong class="text-slate-900 font-bold">Sistem Informasi (88%)</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- TOMBOL SUBMIT DI KANAN BAWAH -->
                <div class="flex justify-end pt-2">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 active:scale-[0.98] text-white font-bold text-xs px-6 py-3 rounded-xl shadow-sm hover:shadow-md transition-all duration-150 flex items-center gap-2.5">
                        <span>Input Pengajuan Proposal</span>
                        <i class="fa-solid fa-paper-plane text-xs"></i>
                    </button>
                </div>

            </form>

        </div>

    @endif

</div>
@endsection