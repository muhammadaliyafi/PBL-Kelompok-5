@extends('layouts.app')

@section('title', 'Status Validasi Judul')

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">

    <!-- Header Page -->
    <div>
        <h2 class="text-xl font-bold text-slate-900 tracking-tight">Detail Status Validasi Judul</h2>
        <p class="text-xs text-slate-500 mt-1">Pantau progress peninjauan dan riwayat catatan revisi dari Dosen Pembimbing.</p>
    </div>

    @if(!$pengajuanJudul)
        <!-- STATE: BELUM PENGAJUAN JUDUL -->
        <div class="bg-white p-12 rounded-2xl border border-slate-200/80 shadow-sm text-center">
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-blue-100">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h3 class="text-base font-bold text-slate-800">Belum Ada Judul yang Diajukan</h3>
            <p class="text-xs text-slate-500 mt-1 max-w-md mx-auto">Anda belum mengajukan judul Tugas Akhir. Silakan selesaikan pengajuan topik dan ajukan judul terlebih dahulu.</p>
            <a href="{{ route('mahasiswa.pengajuan-judul') }}" 
               class="inline-flex items-center space-x-2 mt-5 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-md transition">
                <span>Ajukan Judul Sekarang</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>

    @else
        @php
            $status = strtolower($pengajuanJudul->status ?? 'pending');
            $namaDospem = $pengajuanJudul->dospem_1 ?? $pengajuanJudul->dospem ?? 'Belum Ditentukan';
            
            // Inisial Nama Dospem
            $words = explode(' ', trim($namaDospem));
            $initials = '';
            if (count($words) >= 2) {
                $initials = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
            } else {
                $initials = strtoupper(substr($namaDospem, 0, 2));
            }

            // Parsing Integrasi Sistem / Tags (Dipisahkan Koma)
            $rawIntegrasi = $pengajuanJudul->integrasi_sistem ?? '';
            $tags = array_filter(array_map('trim', explode(',', $rawIntegrasi)));
        @endphp

        <!-- CARD 1: INFORMASI DETAIL JUDUL & INTEGRASI -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-sm space-y-5">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Detail Judul Diajukan</h3>
                <span class="text-xs font-medium text-slate-500">
                    {{ isset($pengajuanJudul->created_at) ? \Carbon\Carbon::parse($pengajuanJudul->created_at)->translatedFormat('d F Y') : '-' }}
                </span>
            </div>

            <!-- Topik & Judul Utama -->
            <div class="space-y-2">
                <div>
                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200/60">
                        Topik: {{ $pengajuanJudul->nama_topik ?? '-' }}
                    </span>
                </div>
                <h4 class="text-base font-bold text-slate-900 leading-snug">
                    "{{ $pengajuanJudul->judul_ta ?? '-' }}"
                </h4>
            </div>

            <!-- Grid Metadata (Jenis Kasus & Tools/Genre) -->
            @if(!empty($pengajuanJudul->jenis_kasus) || !empty($pengajuanJudul->genre_game) || !empty($pengajuanJudul->tools_game))
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                @if(!empty($pengajuanJudul->jenis_kasus))
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-200/60">
                    <span class="text-[10px] font-bold text-slate-400 uppercase block mb-0.5">Jenis / Studi Kasus</span>
                    <span class="text-xs font-bold text-slate-800 block truncate">
                        {{ $pengajuanJudul->jenis_kasus }}
                    </span>
                </div>
                @endif

                @if(!empty($pengajuanJudul->genre_game) || !empty($pengajuanJudul->tools_game))
                <div class="p-3 bg-slate-50 rounded-xl border border-slate-200/60">
                    <span class="text-[10px] font-bold text-slate-400 uppercase block mb-0.5">Genre & Tools / Software</span>
                    <span class="text-xs font-bold text-slate-800 block truncate">
                        {{ implode(' • ', array_filter([$pengajuanJudul->genre_game ?? '', $pengajuanJudul->tools_game ?? ''])) }}
                    </span>
                </div>
                @endif
            </div>
            @endif

            <!-- Integrasi Sistem / Dynamic Tags -->
            @if(!empty($tags))
            <div class="space-y-2">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Integrasi Sistem & Feature Tags</span>
                <div class="flex flex-wrap gap-2">
                    @foreach($tags as $tag)
                        <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-200/60 shadow-xs">
                            <svg class="w-3.5 h-3.5 mr-1 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Deskripsi Singkat -->
            <div class="space-y-1">
                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Deskripsi / Ringkasan Kasus</span>
                <div class="p-4 bg-slate-50 rounded-xl border border-slate-200/60 text-xs text-slate-700 leading-relaxed font-normal">
                    {{ $pengajuanJudul->deskripsi_judul ?? 'Tidak ada deskripsi.' }}
                </div>
            </div>
        </div>

        <!-- CARD 2: CATATAN & KOMENTAR VALIDASI DOSPEM -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
            
            <!-- Header Icon Chat -->
            <div class="px-6 py-4 border-b border-slate-100 flex items-center space-x-3 bg-slate-50/50">
                <div class="w-9 h-9 bg-blue-600 text-white rounded-xl flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
                <h3 class="text-sm font-bold text-slate-800">Catatan & Komentar Validasi Dospem</h3>
            </div>

            <!-- Content Area -->
            <div class="p-6 space-y-5">
                
                <!-- Header Dospem & Status -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 bg-slate-50 rounded-xl border border-slate-200/60">
                    <div class="flex items-center space-x-3">
                        <div class="w-11 h-11 bg-blue-600 text-white font-bold text-sm rounded-xl flex items-center justify-center shrink-0 shadow-sm">
                            {{ $initials }}
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">{{ $namaDospem }}</h4>
                            <p class="text-xs text-slate-500 font-medium">Dosen Pembimbing</p>
                        </div>
                    </div>

                    <div>
                        @if($status == 'disetujui' || $status == 'acc')
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-300">
                                Judul Disetujui
                            </span>
                        @elseif($status == 'revisi' || $status == 'ditolak')
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-300">
                                Revisi Judul
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-300">
                                Menunggu Verifikasi
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Box Catatan Dospem -->
                <div class="space-y-2">
                    <label class="text-xs font-bold text-slate-700 uppercase tracking-wider block">
                        Catatan Pengoreksian Dospem:
                    </label>
                    <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 text-xs text-slate-700 leading-relaxed font-medium italic">
                        @if(!empty($pengajuanJudul->catatan_revisi))
                            "{{ $pengajuanJudul->catatan_revisi }}"
                        @else
                            @if($status == 'disetujui' || $status == 'acc')
                                "Pengajuan judul disetujui. Silakan melanjutkan ke tahap penyusunan proposal Tugas Akhir."
                            @else
                                "Belum ada catatan umpan balik dari Dosen Pembimbing."
                            @endif
                        @endif
                    </div>
                </div>

                <!-- Tombol Aksinya -->
                @if($status == 'revisi' || $status == 'ditolak')
                    <div class="pt-2 flex justify-end">
                        <a href="{{ route('mahasiswa.pengajuan-judul', ['edit' => 1]) }}" 
                           class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-md transition flex items-center space-x-2">
                            <span>Perbaiki & Kirim Ulang Judul</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                @endif

            </div>

        </div>
    @endif

</div>
@endsection