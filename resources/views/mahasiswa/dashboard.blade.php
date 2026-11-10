@extends('layouts.app')

@section('title', 'Dashboard Mahasiswa')

@section('content')
<div class="space-y-6 max-w-6xl mx-auto">

    <!-- 1. BANNER HEADER ATAS -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h3 class="text-base font-bold text-slate-800 tracking-tight">Sistem Pengajuan Tugas Akhir</h3>
            <p class="text-xs font-normal text-slate-400 mt-0.5">Politeknik Negeri Tanah Laut</p>
        </div>

        <!-- Profil User Ringkas & Tombol Logout -->
        <div class="flex items-center space-x-3">
            <div class="flex items-center space-x-3 bg-slate-50 border border-slate-200/80 rounded-xl px-4 py-2 shadow-xs">
                <div class="w-8 h-8 bg-blue-600 text-white rounded-lg flex items-center justify-center font-semibold text-xs shadow-xs shrink-0">
                    {{ strtoupper(substr(Auth::user()->nama ?? Auth::user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="text-left leading-tight">
                    <p class="text-xs font-semibold text-slate-800">{{ Auth::user()->nama ?? Auth::user()->name ?? 'Pengguna' }}</p>
                    <p class="text-[10px] font-medium text-blue-600 mt-0.5">NIM: {{ Auth::user()->nim ?? '-' }}</p>
                </div>
            </div>

            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" 
                        title="Keluar / Logout"
                        class="p-2.5 bg-red-50 hover:bg-red-100 text-red-600 border border-red-200/60 rounded-xl transition shadow-xs flex items-center justify-center cursor-pointer">
                    <svg width="18" height="18" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <!-- 2. PROGRESS TUGAS AKHIR (FULL DINAMIS AUTOMATIC STEPPER) -->
    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs space-y-6">
        <h4 class="text-sm font-bold text-slate-800">Progress Tugas Akhir</h4>

        <!-- Stepper Container -->
        <div class="flex items-center justify-between w-full max-w-3xl mx-auto px-4 py-2">
            
            <!-- STEP 1: Ajukan Topik -->
            <div class="flex flex-col items-center space-y-2 shrink-0">
                <div class="w-10 h-10 rounded-full flex items-center justify-center font-semibold text-xs transition shadow-xs {{ $topikDipilih ? 'bg-blue-600 text-white ring-4 ring-blue-100' : 'bg-slate-100 text-slate-400 border border-slate-200' }}">
                    @if($topikDipilih)
                        <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    @else
                        1
                    @endif
                </div>
                <span class="text-xs font-medium {{ $topikDipilih ? 'text-slate-800 font-semibold' : 'text-slate-400' }}">Ajukan Topik</span>
            </div>

            <!-- CONNECTOR 1 -> 2 (Aktif jika Topik sudah dipilih) -->
            <div class="flex-1 h-0.5 mx-4 bg-slate-200 rounded-full overflow-hidden self-center mb-6">
                <div class="h-full bg-blue-600 transition-all duration-500 {{ $topikDipilih ? 'w-full' : 'w-0' }}"></div>
            </div>

            <!-- STEP 2: Ajukan Judul -->
            <div class="flex flex-col items-center space-y-2 shrink-0">
                <div class="w-10 h-10 rounded-full flex items-center justify-center font-semibold text-xs transition shadow-xs {{ ($topikDipilih || $pengajuanJudul) ? 'bg-blue-600 text-white ring-4 ring-blue-100' : 'bg-slate-100 text-slate-400 border border-slate-200' }}">
                    @if($pengajuanJudul)
                        <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    @else
                        2
                    @endif
                </div>
                <span class="text-xs font-medium {{ ($topikDipilih || $pengajuanJudul) ? 'text-slate-800 font-semibold' : 'text-slate-400' }}">Ajukan Judul</span>
            </div>

            <!-- CONNECTOR 2 -> 3 (Aktif jika Judul sudah diajukan) -->
            <div class="flex-1 h-0.5 mx-4 bg-slate-200 rounded-full overflow-hidden self-center mb-6">
                <div class="h-full bg-blue-600 transition-all duration-500 {{ $pengajuanJudul ? 'w-full' : 'w-0' }}"></div>
            </div>

            <!-- STEP 3: Status Validasi -->
            <div class="flex flex-col items-center space-y-2 shrink-0">
                <div class="w-10 h-10 rounded-full flex items-center justify-center font-semibold text-xs transition shadow-xs {{ $pengajuanJudul ? 'bg-blue-600 text-white ring-4 ring-blue-100' : 'bg-slate-100 text-slate-400 border border-slate-200' }}">
                    @if($pengajuanJudul && in_array(strtolower($pengajuanJudul->status ?? ''), ['disetujui', 'divalidasi', 'acc']))
                        <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                    @else
                        3
                    @endif
                </div>
                <span class="text-xs font-medium {{ $pengajuanJudul ? 'text-slate-800 font-semibold' : 'text-slate-400' }}">Status Validasi</span>
            </div>

        </div>
    </div>

    <!-- 3. TIGA CARD STATUS DINAMIS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CARD 1: STATUS TOPIK -->
        <div class="bg-blue-50/40 border border-blue-200/70 rounded-2xl p-5 shadow-xs space-y-4 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-xs">
                    <svg width="20" height="20" style="width:20px; height:20px;" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                <div>
                    <span class="text-[10px] font-semibold text-blue-600 uppercase tracking-wider block">STATUS TOPIK</span>
                    <h5 class="text-sm font-bold text-slate-800 mt-0.5">
                        {{ $topikDipilih ? 'Sudah Dipilih' : 'Belum Dipilih' }}
                    </h5>
                    @if($topikDipilih)
                        <p class="text-xs font-medium text-blue-700 mt-1 line-clamp-1">{{ $topikDipilih->nama_topik }}</p>
                    @endif
                </div>
            </div>

            <a href="{{ route('mahasiswa.pengajuan-topik') }}" 
               class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium text-xs rounded-xl shadow-xs transition text-center flex items-center justify-center space-x-1.5">
                <span>{{ $topikDipilih ? 'Lihat Topik' : 'Pilih Topik' }}</span>
                <svg width="14" height="14" style="width:14px; height:14px;" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
        </div>

        <!-- CARD 2: STATUS JUDUL -->
        <div class="bg-amber-50/40 border border-amber-200/70 rounded-2xl p-5 shadow-xs space-y-4 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center shadow-xs">
                    <svg width="20" height="20" style="width:20px; height:20px;" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <span class="text-[10px] font-semibold text-amber-600 uppercase tracking-wider block">STATUS JUDUL</span>
                    <h5 class="text-sm font-bold text-slate-800 mt-0.5">
                        {{ $pengajuanJudul ? ($pengajuanJudul->status ?? 'Sudah Diajukan') : 'Belum Diajukan' }}
                    </h5>
                    @if($pengajuanJudul)
                        <p class="text-xs font-medium text-amber-700 mt-1 line-clamp-1">"{{ $pengajuanJudul->judul_ta }}"</p>
                    @endif
                </div>
            </div>

            @if($pengajuanJudul)
                <a href="{{ route('mahasiswa.pengajuan-judul') }}" 
                   class="w-full py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-medium text-xs rounded-xl shadow-xs transition text-center flex items-center justify-center space-x-1.5">
                    <span>Lihat Detail Judul</span>
                    <svg width="14" height="14" style="width:14px; height:14px;" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            @elseif($topikDipilih)
                <a href="{{ route('mahasiswa.pengajuan-judul') }}" 
                   class="w-full py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-medium text-xs rounded-xl shadow-xs transition text-center flex items-center justify-center space-x-1.5">
                    <span>Ajukan Judul</span>
                    <svg width="14" height="14" style="width:14px; height:14px;" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            @else
                <button type="button" disabled 
                   class="w-full py-2.5 bg-amber-300 text-white font-medium text-xs rounded-xl shadow-xs transition text-center flex items-center justify-center space-x-1.5 cursor-not-allowed opacity-90">
                    <span>Pilih Topik Dulu</span>
                </button>
            @endif
        </div>

        <!-- CARD 3: STATUS VALIDASI (SUDAH DIPERBAIKI LOGIKA KUNCINYA) -->
        <div class="bg-cyan-50/40 border border-cyan-200/70 rounded-2xl p-5 shadow-xs space-y-4 flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-10 h-10 rounded-xl bg-cyan-500 text-white flex items-center justify-center shadow-xs">
                    <svg width="20" height="20" style="width:20px; height:20px;" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <span class="text-[10px] font-semibold text-cyan-600 uppercase tracking-wider block">STATUS VALIDASI</span>
                    <h5 class="text-sm font-bold text-slate-800 mt-0.5">
                        @if($pengajuanJudul && in_array(strtolower($pengajuanJudul->status ?? ''), ['disetujui', 'divalidasi', 'acc']))
                            Divalidasi
                        @elseif($pengajuanJudul)
                            Menunggu Verifikasi
                        @else
                            Belum Divalidasi
                        @endif
                    </h5>
                </div>
            </div>

            @if($pengajuanJudul)
                <a href="{{ route('mahasiswa.status-validasi') }}" 
                   class="w-full py-2.5 bg-cyan-500 hover:bg-cyan-600 text-white font-medium text-xs rounded-xl shadow-xs transition text-center flex items-center justify-center space-x-1.5">
                    <span>Lihat Status</span>
                    <svg width="14" height="14" style="width:14px; height:14px;" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            @else
                <button type="button" disabled 
                   class="w-full py-2.5 bg-cyan-300 text-white font-medium text-xs rounded-xl shadow-xs transition text-center flex items-center justify-center space-x-1.5 cursor-not-allowed opacity-90">
                    <span>Ajukan Judul Dulu</span>
                </button>
            @endif
        </div>

    </div>

    <!-- 4. ALUR PENGAJUAN TUGAS AKHIR -->
    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs space-y-6">
        <h4 class="text-sm font-bold text-slate-800">Alur Pengajuan Tugas Akhir</h4>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            
            <div class="bg-slate-50 border border-slate-200/70 p-4 rounded-2xl space-y-2.5 text-center flex flex-col items-center">
                <div class="w-8 h-8 rounded-full bg-slate-300 text-slate-700 font-semibold text-xs flex items-center justify-center shrink-0">1</div>
                <div class="space-y-1">
                    <h5 class="text-xs font-semibold text-slate-800">Isi Kuesioner</h5>
                    <p class="text-[10px] text-slate-500 leading-relaxed">Mengisi kriteria minat & nilai matkul untuk analisis SPK</p>
                </div>
            </div>

            <div class="bg-slate-50 border border-slate-200/70 p-4 rounded-2xl space-y-2.5 text-center flex flex-col items-center">
                <div class="w-8 h-8 rounded-full bg-slate-300 text-slate-700 font-semibold text-xs flex items-center justify-center shrink-0">2</div>
                <div class="space-y-1">
                    <h5 class="text-xs font-semibold text-slate-800">Ajukan Topik</h5>
                    <p class="text-[10px] text-slate-500 leading-relaxed">Memilih & mendaftarkan topik TA hasil rekomendasi</p>
                </div>
            </div>

            <div class="bg-slate-50 border border-slate-200/70 p-4 rounded-2xl space-y-2.5 text-center flex flex-col items-center">
                <div class="w-8 h-8 rounded-full bg-slate-300 text-slate-700 font-semibold text-xs flex items-center justify-center shrink-0">3</div>
                <div class="space-y-1">
                    <h5 class="text-xs font-semibold text-slate-800">Ploting Dospem</h5>
                    <p class="text-[10px] text-slate-500 leading-relaxed">Verifikasi topik & penentuan Dospem oleh Gugus TA</p>
                </div>
            </div>

            <div class="bg-slate-50 border border-slate-200/70 p-4 rounded-2xl space-y-2.5 text-center flex flex-col items-center">
                <div class="w-8 h-8 rounded-full bg-slate-300 text-slate-700 font-semibold text-xs flex items-center justify-center shrink-0">4</div>
                <div class="space-y-1">
                    <h5 class="text-xs font-semibold text-slate-800">Ajukan Judul</h5>
                    <p class="text-[10px] text-slate-500 leading-relaxed">Menginput judul Tugas Akhir sesuai topik disetujui</p>
                </div>
            </div>

            <div class="bg-slate-50 border border-slate-200/70 p-4 rounded-2xl space-y-2.5 text-center flex flex-col items-center">
                <div class="w-8 h-8 rounded-full bg-slate-300 text-slate-700 font-semibold text-xs flex items-center justify-center shrink-0">5</div>
                <div class="space-y-1">
                    <h5 class="text-xs font-semibold text-slate-800">Status Validasi</h5>
                    <p class="text-[10px] text-slate-500 leading-relaxed">Persetujuan & validasi resmi dari Dosen Pembimbing</p>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection