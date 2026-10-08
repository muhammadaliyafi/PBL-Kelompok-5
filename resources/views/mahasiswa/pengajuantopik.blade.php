@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="space-y-6 max-w-7xl mx-auto pb-10">

    <!-- HEADER TITLE -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
        <h2 class="text-xl font-extrabold text-blue-950 mb-1">Pengajuan Topik</h2>
        <p class="text-xs text-slate-500">Pilih topik utama dari Bank Topik untuk dikonsultasikan dengan Dosen Pembimbing.</p>
    </div>

    {{-- KONDISI 1: CUMA MUNCUL KALO USER SUDAH KLIK SUBMIT --}}
    @if(session('success_submit'))

        @php
            $dataTopik = session('pengajuanTopik');
        @endphp

        <!-- ALERT SUCCESS HIJAU -->
        <div class="bg-emerald-100/80 border border-emerald-200 text-emerald-800 rounded-2xl p-4 flex items-center gap-3 shadow-sm">
            <div class="w-7 h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-bold flex-shrink-0">
                <i class="fa-solid fa-check"></i>
            </div>
            <p class="text-xs font-bold">Topik berhasil diajukan! Silakan melakukan bimbingan dengan Dosen Pembimbing.</p>
        </div>

        <!-- STATUS TOPIK WARNING BOX -->
        <div class="bg-amber-50/90 border border-amber-200 rounded-2xl p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-amber-500 text-white flex items-center justify-center text-lg font-bold flex-shrink-0 shadow-sm">
                    <i class="fa-solid fa-rotate"></i>
                </div>
                <div>
                    <h3 class="text-sm font-extrabold text-amber-950">Status Topik: {{ $dataTopik->status ?? 'Menunggu Bimbingan / ACC Dospem' }}</h3>
                    <p class="text-xs text-amber-800/90 mt-0.5">Silakan temui Dosen Pembimbing untuk bimbingan topik. Form pengajuan judul akan terbuka setelah topik disetujui.</p>
                </div>
            </div>
            <span class="bg-amber-200/80 text-amber-950 font-extrabold text-xs px-4 py-2.5 rounded-xl text-center flex-shrink-0">
                Proses Bimbingan
            </span>
        </div>

        <!-- REKOMENDASI SISTEM SPK SAW BOX -->
        <div class="bg-indigo-50/60 border border-indigo-100 rounded-2xl p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 shadow-sm">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-indigo-600 text-white flex items-center justify-center text-sm font-bold shadow-sm">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </div>
                <div>
                    <h4 class="text-xs font-extrabold text-indigo-950">Rekomendasi Sistem (SPK SAW)</h4>
                    <p class="text-[11px] text-indigo-700/80">Berdasarkan analisis nilai mata kuliah & peminatan kamu</p>
                </div>
            </div>
            <div class="bg-indigo-600 text-white text-xs font-bold px-5 py-2 rounded-full shadow-sm text-center">
                {{ $dataTopik->topik_pilihan ?? 'Sistem Informasi Terintegrasi' }} (Skor: 88%)
            </div>
        </div>

        <!-- CARD PENGAJUAN TOPIK BERHASIL TERKIRIM -->
        <div class="bg-white border border-slate-200 rounded-2xl p-12 shadow-sm text-center">
            <div class="w-20 h-20 bg-emerald-100 text-emerald-500 rounded-full flex items-center justify-center mx-auto mb-5 text-3xl">
                <i class="fa-solid fa-check"></i>
            </div>
            
            <h3 class="text-xl font-extrabold text-blue-950 mb-2">Pengajuan Topik Berhasil Terkirim</h3>
            <p class="text-xs text-slate-500 max-w-md mx-auto leading-relaxed">
                Kamu sudah mengajukan topik <span class="font-bold text-slate-800">"{{ $dataTopik->topik_pilihan ?? '' }}"</span>. Silakan lakukan koordinasi atau bimbingan langsung dengan Dosen Pembimbing untuk melanjutkan ke tahap pengajuan judul.
            </p>
        </div>

    {{-- KONDISI 2: TAMPILAN DEFAULT (BELUM/SEBELUM SUBMIT) --}}
    @else

        <!-- HASIL SPK REKOMENDASI SAW -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center text-sm font-bold">
                    <i class="fa-solid fa-chart-simple"></i>
                </div>
                <div>
                    <h3 class="text-base font-extrabold text-blue-950">Hasil Rekomendasi SPK (Metode SAW)</h3>
                    <p class="text-xs text-slate-500">Rekomendasi dihitung berdasarkan nilai akademis dan kriteria peminatan kamu.</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-slate-600 border-collapse">
                    <thead class="bg-slate-50 text-slate-700 uppercase font-bold border-b border-slate-200">
                        <tr>
                            <th class="py-3 px-4">Peringkat</th>
                            <th class="py-3 px-4">Nama Topik</th>
                            <th class="py-3 px-4">Skor Akhir (V)</th>
                            <th class="py-3 px-4">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-blue-50/50 transition font-semibold text-blue-950 bg-blue-50/30">
                            <td class="py-3 px-4"><span class="bg-blue-600 text-white font-bold px-2.5 py-0.5 rounded-full text-[10px]">#1</span></td>
                            <td class="py-3 px-4 font-bold">Sistem Informasi Terintegrasi</td>
                            <td class="py-3 px-4">0.925</td>
                            <td class="py-3 px-4 text-emerald-600 font-bold"><i class="fa-solid fa-circle-check mr-1"></i> Sangat Direkomendasikan</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4"><span class="bg-slate-200 text-slate-700 font-bold px-2.5 py-0.5 rounded-full text-[10px]">#2</span></td>
                            <td class="py-3 px-4">Internet of Things (IoT)</td>
                            <td class="py-3 px-4">0.810</td>
                            <td class="py-3 px-4 text-slate-500">Direkomendasikan</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4"><span class="bg-slate-200 text-slate-700 font-bold px-2.5 py-0.5 rounded-full text-[10px]">#3</span></td>
                            <td class="py-3 px-4">Pengembangan Game</td>
                            <td class="py-3 px-4">0.745</td>
                            <td class="py-3 px-4 text-slate-500">Cukup Direkomendasikan</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4"><span class="bg-slate-200 text-slate-700 font-bold px-2.5 py-0.5 rounded-full text-[10px]">#4</span></td>
                            <td class="py-3 px-4">AR / VR</td>
                            <td class="py-3 px-4">0.680</td>
                            <td class="py-3 px-4 text-slate-500">Pertimbangan</td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="py-3 px-4"><span class="bg-slate-200 text-slate-700 font-bold px-2.5 py-0.5 rounded-full text-[10px]">#5</span></td>
                            <td class="py-3 px-4">Data Mining / SPK</td>
                            <td class="py-3 px-4">0.590</td>
                            <td class="py-3 px-4 text-slate-500">Pertimbangan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- FORM PILIH TOPIK BANK TA -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
            <h3 class="text-base font-extrabold text-blue-950 mb-4">Pilihan Topik Bank TA</h3>

            <form action="{{ route('mahasiswa.topik.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    
                    <label class="border border-slate-200 hover:border-blue-500 rounded-xl p-4 flex items-start gap-3 cursor-pointer transition bg-slate-50/50 hover:bg-blue-50/30">
                        <input type="radio" name="topik_pilihan" value="Sistem Informasi Terintegrasi" class="mt-1 text-blue-600 focus:ring-blue-500" required>
                        <div>
                            <div class="text-sm font-extrabold text-slate-800">Sistem Informasi Terintegrasi</div>
                            <div class="text-xs text-slate-500 mt-1 leading-relaxed">Pengembangan Web ERP, E-Commerce, SIM Sekolah, SIMRS, Management System.</div>
                        </div>
                    </label>

                    <label class="border border-slate-200 hover:border-blue-500 rounded-xl p-4 flex items-start gap-3 cursor-pointer transition bg-slate-50/50 hover:bg-blue-50/30">
                        <input type="radio" name="topik_pilihan" value="Internet of Things (IoT)" class="mt-1 text-blue-600 focus:ring-blue-500">
                        <div>
                            <div class="text-sm font-extrabold text-slate-800">Internet of Things (IoT)</div>
                            <div class="text-xs text-slate-500 mt-1 leading-relaxed">Smart Home, Sensor ESP32/Arduino, Sistem Monitoring Otomatis & Embedded Systems.</div>
                        </div>
                    </label>

                    <label class="border border-slate-200 hover:border-blue-500 rounded-xl p-4 flex items-start gap-3 cursor-pointer transition bg-slate-50/50 hover:bg-blue-50/30">
                        <input type="radio" name="topik_pilihan" value="Pengembangan Game" class="mt-1 text-blue-600 focus:ring-blue-500">
                        <div>
                            <div class="text-sm font-extrabold text-slate-800">Pengembangan Game</div>
                            <div class="text-xs text-slate-500 mt-1 leading-relaxed">Game Edukasi 2D/3D, Unity, Unreal Engine, Game Mechanics, Interactive Media.</div>
                        </div>
                    </label>

                    <label class="border border-slate-200 hover:border-blue-500 rounded-xl p-4 flex items-start gap-3 cursor-pointer transition bg-slate-50/50 hover:bg-blue-50/30">
                        <input type="radio" name="topik_pilihan" value="AR / VR" class="mt-1 text-blue-600 focus:ring-blue-500">
                        <div>
                            <div class="text-sm font-extrabold text-slate-800">AR / VR</div>
                            <div class="text-xs text-slate-500 mt-1 leading-relaxed">Augmented Reality, Virtual Reality, Interactive Simulation, Markerless AR.</div>
                        </div>
                    </label>

                    <label class="border border-slate-200 hover:border-blue-500 rounded-xl p-4 flex items-start gap-3 cursor-pointer transition bg-slate-50/50 hover:bg-blue-50/30 md:col-span-2">
                        <input type="radio" name="topik_pilihan" value="Data Mining / SPK" class="mt-1 text-blue-600 focus:ring-blue-500">
                        <div>
                            <div class="text-sm font-extrabold text-slate-800">Data Mining / SPK</div>
                            <div class="text-xs text-slate-500 mt-1 leading-relaxed">Sistem Pendukung Keputusan (SAW, AHP, TOPSIS), Algoritma Klastering & Klasifikasi Data.</div>
                        </div>
                    </label>

                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-6 py-2.5 rounded-xl shadow-md transition flex items-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i> Simpan Pilihan Topik
                    </button>
                </div>
            </form>
        </div>

    @endif

</div>
@endsection