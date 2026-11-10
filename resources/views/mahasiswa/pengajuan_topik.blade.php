@extends('layouts.app')

@section('title', 'Pengajuan Topik TA')

@section('content')
<div class="space-y-6 max-w-5xl mx-auto" x-data="{ currentFormStep: 1 }">

    <!-- Alert Notifikasi Success -->
    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-3.5 rounded-xl text-xs font-semibold flex items-center justify-between shadow-xs">
        <div class="flex items-center space-x-2">
            <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            <span>{{ session('success') }}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 font-bold">&times;</button>
    </div>
    @endif

    <!-- Banner Header -->
    <div class="bg-[#0F172A] rounded-2xl p-6 text-white shadow-sm flex justify-between items-center">
        <div>
            <h3 class="text-base font-bold mb-1">Detail Pengajuan Topik Tugas Akhir</h3>
            <p class="text-slate-300 text-xs">Informasi topik terpilih dan status verifikasi dari Gugus Tugas Akhir</p>
        </div>
        <span class="px-3 py-1 bg-slate-800 text-slate-300 rounded-xl text-xs font-semibold border border-slate-700">
            Modul Pengajuan Topik
        </span>
    </div>

    {{-- KONDISI 1: CARD HASIL SETELAH MAHASISWA MEMILIH TOPIK --}}
    @if($topikDipilih && !($isRehitung ?? false) && !session('hasil_spk'))
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 space-y-6">
            
            <!-- Alert Berhasil Diajukan -->
            <div class="bg-emerald-50/80 border border-emerald-200 p-4 rounded-xl flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold shrink-0">
                    <svg width="18" height="18" style="width:18px; height:18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <h5 class="text-xs font-bold text-emerald-800">Topik Berhasil Diajukan!</h5>
                    <p class="text-[11px] text-emerald-600 mt-0.5">Topik pilihan Anda telah terdaftar di sistem dan siap diverifikasi oleh Gugus TA.</p>
                </div>
            </div>

            <!-- Header Card Topik -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-5 border-b border-slate-100">
                <div class="flex items-center space-x-3">
                    <span class="px-3.5 py-1.5 bg-blue-600 text-white font-extrabold text-xs rounded-xl shadow-xs">
                        {{ $topikDipilih->kode_topik ?? 'A1' }}
                    </span>
                    <div>
                        <h4 class="text-sm font-bold text-slate-800">{{ $topikDipilih->nama_topik }}</h4>
                        <span class="text-[11px] text-slate-400">Topik Utama Pilihan Mahasiswa</span>
                    </div>
                </div>

                <div class="flex items-center space-x-2">
                    <span class="px-3.5 py-1.5 bg-amber-50 text-amber-700 border border-amber-200/80 rounded-xl text-xs font-bold flex items-center space-x-2 uppercase">
                        <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                        <span>STATUS TOPIK: MENUNGGU PLOTTING DOSPEM</span>
                    </span>
                </div>
            </div>

            <!-- Detail Grid Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-slate-50 border border-slate-200/80 p-4 rounded-xl space-y-1">
                    <span class="text-[10px] font-semibold text-slate-400 uppercase tracking-wider block">Waktu Pengajuan:</span>
                    <p class="text-xs font-bold text-slate-700 flex items-center space-x-1.5">
                        <svg width="14" height="14" style="width:14px; height:14px;" class="text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>{{ \Carbon\Carbon::parse($topikDipilih->created_at ?? now())->translatedFormat('d F Y • H:i') }} WITA</span>
                    </p>
                </div>

                <div class="bg-indigo-50/60 border border-indigo-200/80 p-4 rounded-xl space-y-1">
                    <span class="text-[10px] font-semibold text-indigo-600 uppercase tracking-wider block">Nilai SPK (V Score):</span>
                    <p class="text-xs font-bold text-indigo-900 flex items-center space-x-1.5">
                        <svg width="14" height="14" style="width:14px; height:14px;" class="text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        <span>Nilai V: {{ $topikDipilih->nilai_v ?? '0.850' }}</span>
                    </p>
                </div>
            </div>

            <!-- Batas Minimum Topik Terpilih -->
            @if(isset($alternatif[$topikDipilih->kode_topik ?? 'A1']))
            <div class="bg-slate-50 border border-slate-200 p-4 rounded-xl space-y-2">
                <span class="text-xs font-bold text-slate-700 block">Batas Minimum Pengerjaan Topik Ini:</span>
                <ul class="list-disc list-inside text-xs text-slate-600 space-y-1">
                    @foreach($alternatif[$topikDipilih->kode_topik ?? 'A1']['batas_minimum'] as $bm)
                        <li>{{ $bm }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Bottom Action Controls (DI SINI BAGIAN YANG DIPERBAIKI & DITAMBAHKAN) -->
            <div class="pt-4 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3">
                
                <div class="flex items-center space-x-2 w-full sm:w-auto">
                    <!-- Tombol Ganti / Hitung Ulang Topik -->
                    <a href="{{ route('mahasiswa.pengajuan-topik', ['rehitung' => 1]) }}" class="px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold rounded-xl text-xs transition flex items-center space-x-1.5">
                        <svg width="14" height="14" style="width:14px; height:14px;" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        <span>Ganti / Hitung Ulang Topik</span>
                    </a>

                    <!-- Tombol Batalkan Pengajuan (DITAMBAHKAN DI SINI) -->
                    <form action="{{ route('mahasiswa.pengajuan-topik.batal') }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan pengajuan topik ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2.5 bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold rounded-xl text-xs transition flex items-center space-x-1.5 border border-rose-100 cursor-pointer">
                            <svg width="14" height="14" style="width:14px; height:14px;" class="w-3.5 h-3.5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            <span>Batalkan Pengajuan</span>
                        </button>
                    </form>
                </div>

                <a href="{{ route('mahasiswa.pengajuan-judul') }}" class="w-full sm:w-auto px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl text-xs transition shadow-md flex items-center justify-center space-x-2">
                    <span>Lanjut ke Pengajuan Judul</span>
                    <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

        </div>
    </div>

    {{-- KONDISI 2: TAMPILAN FORM KUESIONER / HASIL SPK REKOMENDASI --}}
    @else

        @if(session('hasil_spk'))
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs space-y-6">
            <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                <div>
                    <h4 class="text-sm font-bold text-slate-800">Hasil Rekomendasi Topik (SPK AHP-SAW)</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Anda bebas memilih topik mana saja yang paling ingin diajukan.</p>
                </div>
                <a href="{{ route('mahasiswa.pengajuan-topik', ['rehitung' => 1]) }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
                    &larr; Isi Ulang Kuesioner
                </a>
            </div>

            <div class="space-y-4">
                @foreach(session('hasil_spk') as $item)
                <div class="border border-slate-200 rounded-2xl p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:border-blue-300 transition bg-slate-50/50">
                    <div class="flex items-start space-x-3.5">
                        <span class="px-3 py-1 bg-slate-800 text-white font-bold text-xs rounded-xl shadow-xs">
                            {{ $item['kode'] }}
                        </span>
                        <div class="space-y-1">
                            <h5 class="text-sm font-bold text-slate-800">{{ $item['nama'] }}</h5>
                            <div class="flex items-center space-x-2 pt-0.5">
                                <span class="inline-block px-2.5 py-0.5 text-[10px] font-bold rounded-lg border {{ $item['badgeColor'] }}">
                                    {{ $item['keterangan'] }}
                                </span>
                                <span class="text-xs font-semibold text-slate-600">
                                    Nilai SPK (V): <strong class="text-blue-600">{{ $item['v'] }}</strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('mahasiswa.kuesioner.pilih') }}" method="POST" class="shrink-0">
                        @csrf
                        <input type="hidden" name="kode_topik" value="{{ $item['kode'] }}">
                        <input type="hidden" name="nama_topik" value="{{ $item['nama'] }}">
                        <input type="hidden" name="nilai_v" value="{{ $item['v'] }}">
                        <button type="submit" class="w-full sm:w-auto px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-xs transition cursor-pointer">
                            Pilih Topik Ini &rarr;
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

        @else
        <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-xs space-y-6">
            
            <!-- 3 TOMBOL OVAL TAB BERSAMPINGAN -->
            <div class="bg-slate-50 p-2 rounded-2xl border border-slate-200/80">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <button type="button" @click="currentFormStep = 1" 
                            class="w-full py-3 px-4 rounded-xl font-bold text-xs flex items-center justify-center space-x-2.5 transition-all shadow-xs cursor-pointer"
                            :class="currentFormStep === 1 
                                ? 'bg-blue-600 text-white shadow-blue-500/20 ring-2 ring-blue-600/20' 
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200/60'">
                        <span class="w-6 h-6 rounded-full flex items-center justify-center text-[11px] font-extrabold shadow-xs"
                              :class="currentFormStep === 1 ? 'bg-white text-blue-600' : 'bg-slate-200 text-slate-600'">1</span>
                        <span>Minat Topik</span>
                    </button>

                    <button type="button" @click="currentFormStep = 2" 
                            class="w-full py-3 px-4 rounded-xl font-bold text-xs flex items-center justify-center space-x-2.5 transition-all shadow-xs cursor-pointer"
                            :class="currentFormStep === 2 
                                ? 'bg-blue-600 text-white shadow-blue-500/20 ring-2 ring-blue-600/20' 
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200/60'">
                        <span class="w-6 h-6 rounded-full flex items-center justify-center text-[11px] font-extrabold shadow-xs"
                              :class="currentFormStep === 2 ? 'bg-white text-blue-600' : 'bg-slate-200 text-slate-600'">2</span>
                        <span>Nilai Prasyarat</span>
                    </button>

                    <button type="button" @click="currentFormStep = 3" 
                            class="w-full py-3 px-4 rounded-xl font-bold text-xs flex items-center justify-center space-x-2.5 transition-all shadow-xs cursor-pointer"
                            :class="currentFormStep === 3 
                                ? 'bg-blue-600 text-white shadow-blue-500/20 ring-2 ring-blue-600/20' 
                                : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200/60'">
                        <span class="w-6 h-6 rounded-full flex items-center justify-center text-[11px] font-extrabold shadow-xs"
                              :class="currentFormStep === 3 ? 'bg-white text-blue-600' : 'bg-slate-200 text-slate-600'">3</span>
                        <span>Biaya / Budget</span>
                    </button>
                </div>
            </div>

            <!-- FORM ISIAN KUESIONER -->
            <form action="{{ route('mahasiswa.kuesioner.hitung') }}" method="POST">
                @csrf
                
                <!-- STEP 1 -->
                <div x-show="currentFormStep === 1" class="space-y-6">
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-slate-800">Langkah 1: Kriteria Minat Topik (C1)</h4>
                        <p class="text-xs text-slate-500">Pilih skala minat Anda dari 1 (Sangat Tidak Minat) sampai 5 (Sangat Minat) untuk 5 topik di bawah ini.</p>
                    </div>

                    <div class="space-y-4">
                        @if(isset($alternatif))
                        @foreach($alternatif as $kode => $alt)
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200/80 space-y-3">
                            <div class="flex items-center space-x-2">
                                <span class="px-2.5 py-0.5 bg-blue-600 text-white font-bold text-[10px] rounded-lg">{{ $kode }}</span>
                                <span class="text-xs font-bold text-slate-800">{{ $alt['nama'] }}</span>
                            </div>

                            <div class="bg-white p-3 rounded-lg border border-slate-200/60 text-[11px] text-slate-600 space-y-1">
                                <span class="font-bold text-slate-700 block">Batas Minimum Topik:</span>
                                <ul class="list-disc list-inside space-y-0.5 text-slate-500">
                                    @foreach($alt['batas_minimum'] as $bm)
                                        <li>{{ $bm }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="flex items-center justify-between pt-2 border-t border-slate-200/60">
                                <span class="text-[10px] font-semibold text-slate-500">Rating Minat:</span>
                                <div class="flex space-x-2">
                                    @for($i = 1; $i <= 5; $i++)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="minat[{{ $kode }}]" value="{{ $i }}" class="sr-only peer">
                                        <span class="w-8 h-8 flex items-center justify-center text-xs font-bold rounded-lg border border-slate-300 text-slate-600 peer-checked:bg-blue-600 peer-checked:text-white peer-checked:border-blue-600 hover:bg-slate-100 transition">
                                            {{ $i }}
                                        </span>
                                    </label>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-end">
                        <button type="button" @click="currentFormStep = 2" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-md transition flex items-center space-x-2 cursor-pointer">
                            <span>Lanjut ke Step 2 (Nilai Prasyarat)</span>
                            <svg width="16" height="16" style="width:16px; height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </div>

                <!-- STEP 2 -->
                <div x-show="currentFormStep === 2" class="space-y-6" style="display: none;">
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-slate-800">Langkah 2: Nilai Mata Kuliah Prasyarat (C2)</h4>
                        <p class="text-xs text-slate-500">Ketik nilai hasil studi Anda (angka 0 - 100) untuk 3 mata kuliah pendukung pada masing-masing topik.</p>
                    </div>

                    <div class="space-y-4">
                        @if(isset($alternatif))
                        @foreach($alternatif as $kode => $alt)
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200/80 space-y-3">
                            <div class="flex items-center space-x-2">
                                <span class="px-2.5 py-0.5 bg-slate-800 text-white font-bold text-[10px] rounded-lg">{{ $kode }}</span>
                                <span class="text-xs font-bold text-slate-800">{{ $alt['nama'] }}</span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                                @foreach($alt['matkul'] as $idx => $namaMatkul)
                                <div class="space-y-1">
                                    <label class="text-[10px] font-semibold text-slate-600 block truncate" title="{{ $namaMatkul }}">
                                        {{ $namaMatkul }}
                                    </label>
                                    <input type="number" 
                                           name="nilai_matkul[{{ $kode }}][{{ $idx }}]" 
                                           min="0" 
                                           max="100" 
                                           placeholder="Nilai (0-100)" 
                                           class="w-full bg-white border border-slate-300 rounded-lg px-3 py-2 text-xs font-semibold text-slate-800 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-between">
                        <button type="button" @click="currentFormStep = 1" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold rounded-xl transition cursor-pointer">
                            &larr; Kembali ke Step 1
                        </button>
                        <button type="button" @click="currentFormStep = 3" class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-md transition flex items-center space-x-2 cursor-pointer">
                            <span>Lanjut ke Step 3 (Estimasi Biaya)</span>
                            <svg width="16" height="16" style="width:16px; height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </div>

                <!-- STEP 3 -->
                <div x-show="currentFormStep === 3" class="space-y-6" style="display: none;">
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-slate-800">Langkah 3: Estimasi Kemampuan Biaya (C3)</h4>
                        <p class="text-xs text-slate-500">Pilih jangkauan biaya pengerjaan Tugas Akhir yang sanggup Anda alokasikan.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <label class="cursor-pointer">
                            <input type="radio" name="anggaran" value="1" class="sr-only peer">
                            <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl peer-checked:border-blue-600 peer-checked:bg-blue-50/50 transition">
                                <p class="text-xs font-bold text-slate-800">Sangat Hemat (&lt; Rp 500.000)</p>
                                <p class="text-[10px] text-slate-500 mt-1">Cocok untuk topik Software, Web, Data Mining / SPK.</p>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="anggaran" value="2" class="sr-only peer">
                            <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl peer-checked:border-blue-600 peer-checked:bg-blue-50/50 transition">
                                <p class="text-xs font-bold text-slate-800">Sedang (Rp 500.000 - Rp 1.500.000)</p>
                                <p class="text-[10px] text-slate-500 mt-1">Cocok untuk Game Dev (Asset) & Sensor Standar.</p>
                            </div>
                        </label>

                        <label class="cursor-pointer">
                            <input type="radio" name="anggaran" value="3" class="sr-only peer">
                            <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl peer-checked:border-blue-600 peer-checked:bg-blue-50/50 transition">
                                <p class="text-xs font-bold text-slate-800">Tinggi (&gt; Rp 1.500.000)</p>
                                <p class="text-[10px] text-slate-500 mt-1">Cocok untuk IoT Kompleks & Headset VR/AR.</p>
                            </div>
                        </label>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-between">
                        <button type="button" @click="currentFormStep = 2" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold rounded-xl transition cursor-pointer">
                            &larr; Kembali ke Step 2
                        </button>
                        <button type="submit" class="px-7 py-3 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold rounded-xl shadow-md transition flex items-center space-x-2 cursor-pointer">
                            <span>Hitung Rekomendasi SPK</span>
                            <svg width="16" height="16" style="width:16px; height:16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </div>

            </form>
        </div>
        @endif

    @endif

</div>
@endsection