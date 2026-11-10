@extends('layouts.app')

@section('title', 'Pengajuan Judul Tugas Akhir')

@section('content')
@php
    $kodeTopik = $topikDipilih->kode_topik ?? 'A1';
    
    // Parse tag integrasi lama ke format array JSON untuk Alpine.js
    $existingTags = isset($pengajuanJudul->integrasi_sistem) && !empty($pengajuanJudul->integrasi_sistem) 
        ? array_map('trim', explode(',', $pengajuanJudul->integrasi_sistem)) 
        : [];
@endphp

<div class="space-y-6 max-w-6xl mx-auto" x-data="pengajuanJudulApp('{{ $kodeTopik }}', {{ json_encode($existingTags) }})">

    <!-- Banner Info Sistem -->
    <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-xs flex items-center justify-between">
        <div>
            <h3 class="text-base font-bold text-slate-800">Sistem Pengajuan Tugas Akhir</h3>
            <p class="text-xs text-slate-500 mt-0.5">Modul Mahasiswa • Politeknik Negeri Tanah Laut</p>
        </div>
        <span class="text-[11px] font-bold px-3 py-1 bg-slate-100 text-slate-600 rounded-full border border-slate-200">
            Tahun Akademik 2026/2027
        </span>
    </div>

    <!-- Alert Success -->
    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 p-4 rounded-xl text-xs font-semibold flex items-center space-x-2">
        <svg width="20" height="20" style="width:20px; height:20px;" class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <span>{{ session('success') }}</span>
    </div>
    @endif

    <!-- 1. JIKA SUDAH SUBMIT JUDUL & TIDAK DALAM MODE EDIT: KARTU RINGKASAN PENGAJUAN -->
    @if(isset($pengajuanJudul) && $pengajuanJudul && !($isEdit ?? false))
    <div class="space-y-5">
        
        <!-- Status Header Card -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-xs relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-500/10 rounded-full blur-2xl"></div>

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-100 pb-5">
                <div>
                    <span class="text-[11px] font-bold text-blue-600 uppercase tracking-wider">Pengajuan Judul Tugas Akhir</span>
                    <h3 class="text-lg font-extrabold text-slate-900 mt-0.5">Kartu Ringkasan Pengajuan</h3>
                    <p class="text-xs text-slate-400">Diajukan pada {{ \Carbon\Carbon::parse($pengajuanJudul->created_at)->translatedFormat('d F Y • H:i') }} WITA</p>
                </div>

                <div class="flex items-center space-x-2 bg-amber-50 border border-amber-200/80 px-3.5 py-1.5 rounded-xl self-start md:self-auto">
                    <span class="relative flex h-2.5 w-2.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-amber-500"></span>
                    </span>
                    <span class="text-xs font-bold text-amber-700 uppercase tracking-wide">
                        {{ $pengajuanJudul->status ?? 'Menunggu Verifikasi' }}
                    </span>
                </div>
            </div>

            <!-- Content Grid Info -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-5">
                
                <div class="md:col-span-2 space-y-4">
                    <div class="bg-slate-50/80 border border-slate-200/60 rounded-xl p-4 space-y-2 relative">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">Judul Ditinjau</span>
                        <h4 class="text-sm font-bold text-slate-800 leading-relaxed">
                            "{{ $pengajuanJudul->judul_ta }}"
                        </h4>
                    </div>

                    <div class="space-y-2">
                        <span class="text-[11px] font-bold text-slate-500 block">Kebutuhan Fungsional / Integrasi:</span>
                        <div class="flex flex-wrap gap-1.5">
                            @if(!empty($pengajuanJudul->integrasi_sistem))
                                @foreach(explode(',', $pengajuanJudul->integrasi_sistem) as $tag)
                                    <span class="bg-blue-50 text-blue-700 border border-blue-200/60 text-xs px-3 py-1 rounded-lg font-bold">
                                        {{ trim($tag) }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-xs text-slate-400 italic">Tidak ada tag khusus</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="bg-blue-50/40 border border-blue-100 rounded-xl p-3.5 flex items-center space-x-3">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-xs">
                            TA
                        </div>
                        <div class="min-w-0">
                            <span class="text-[10px] text-slate-400 font-semibold block">Topik Utama</span>
                            <p class="text-xs font-extrabold text-slate-800 truncate">
                                {{ $pengajuanJudul->nama_topik ?? 'SI Terintegrasi' }}
                            </p>
                        </div>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-xl p-3.5 space-y-1">
                        <span class="text-[10px] text-slate-400 font-semibold block">Plotting Dosen Pembimbing:</span>
                        <p class="text-xs font-bold text-slate-500 italic">Belum Diplot (Proses Verifikasi)</p>
                    </div>
                </div>

            </div>

            <!-- Action Controls -->
            <div class="flex justify-end items-center space-x-3 pt-6 mt-6 border-t border-slate-100">
                <a href="{{ route('mahasiswa.pengajuan-judul', ['edit' => 1]) }}" 
                   class="inline-flex items-center space-x-1.5 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs rounded-xl transition">
                    <svg width="14" height="14" style="width:14px; height:14px;" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    <span>Edit Judul</span>
                </a>

                <form action="{{ route('mahasiswa.pengajuan-judul.hapus', $pengajuanJudul->id ?? 1) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengajuan judul ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center space-x-1.5 px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold text-xs rounded-xl transition border border-rose-100 cursor-pointer">
                        <svg width="14" height="14" style="width:14px; height:14px;" class="w-3.5 h-3.5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        <span>Batalkan</span>
                    </button>
                </form>
            </div>

        </div>
    </div>

    <!-- 2. JIKA BELUM PENGAJUAN JUDUL ATAU SEDANG DALAM MODE EDIT -->
    @elseif(isset($topikDipilih) && $topikDipilih)
    <form action="{{ route('mahasiswa.pengajuan-judul.simpan') }}" method="POST">
        @csrf

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-xs space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h4 class="text-sm font-bold text-slate-800">
                    {{ isset($isEdit) && $isEdit ? 'Edit Judul Tugas Akhir' : 'Input Judul Tugas Akhir' }}
                </h4>
                @if(isset($isEdit) && $isEdit)
                <a href="{{ route('mahasiswa.pengajuan-judul') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
                    &larr; Batal Edit
                </a>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 space-y-5">

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-700 block">Pilih Topik Utama</label>
                        <input type="text" 
                               value="{{ $topikDipilih->nama_topik }}" 
                               readonly 
                               class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-xs font-semibold text-slate-700 cursor-not-allowed focus:outline-none">
                        
                        <input type="hidden" name="kode_topik" value="{{ $topikDipilih->kode_topik }}">
                        <input type="hidden" name="nama_topik" value="{{ $topikDipilih->nama_topik }}">
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-700 block">Judul Tugas Akhir <span class="text-rose-500">*</span></label>
                        <input type="text" 
                               name="judul_ta" 
                               required 
                               value="{{ old('judul_ta', $pengajuanJudul->judul_ta ?? '') }}"
                               placeholder="Contoh: Pengembangan Aplikasi Sistem Informasi..." 
                               class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
                    </div>

                    @if($kodeTopik == 'A1' || str_contains(strtolower($topikDipilih->nama_topik ?? ''), 'terintegrasi'))
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-700 block">Jenis Kasus <span class="text-rose-500">*</span></label>
                        <input type="text" 
                               name="jenis_kasus" 
                               value="{{ old('jenis_kasus', $pengajuanJudul->jenis_kasus ?? '') }}"
                               placeholder="Misal: Penjualan, Inventaris, Surat Menyurat..." 
                               class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    @endif

                    @if(str_contains(strtolower($topikDipilih->nama_topik ?? ''), 'game'))
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-slate-700 block">Genre Game <span class="text-rose-500">*</span></label>
                            <input type="text" 
                                   name="genre_game" 
                                   value="{{ old('genre_game', $pengajuanJudul->genre_game ?? '') }}"
                                   placeholder="Misal: RPG, Action, Educational" 
                                   class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-slate-700 block">Tools / Game Engine <span class="text-rose-500">*</span></label>
                            <input type="text" 
                                   name="tools_game" 
                                   value="{{ old('tools_game', $pengajuanJudul->tools_game ?? '') }}"
                                   placeholder="Misal: Unity 3D, Unreal Engine, Construct 3" 
                                   class="w-full bg-white border border-slate-300 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>
                    @endif

                    <div class="space-y-1.5 relative" @click.outside="openDropdown = false">
                        <label class="text-xs font-bold text-slate-700 block" x-text="dynamicTagLabel"></label>
                        <input type="hidden" name="dynamic_tags" :value="tags.join(', ')">

                        <div class="w-full bg-white border border-slate-300 rounded-xl p-2 min-h-[46px] flex flex-wrap items-center gap-2 focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition">
                            <template x-for="(tag, index) in tags" :key="index">
                                <span class="bg-blue-50 text-blue-700 border border-blue-200 text-xs px-3 py-1 rounded-lg font-bold flex items-center space-x-1.5">
                                    <span x-text="tag"></span>
                                    <button type="button" @click="removeTag(index)" class="text-blue-500 hover:text-rose-600 font-bold focus:outline-none ml-1">&times;</button>
                                </span>
                            </template>

                            <input type="text" 
                                   x-model="searchQuery" 
                                   @focus="openDropdown = true"
                                   @input="openDropdown = true"
                                   @keydown.enter.prevent="selectTopMatch()" 
                                   :placeholder="dynamicPlaceholder" 
                                   class="bg-transparent text-xs text-slate-800 focus:outline-none flex-1 min-w-[200px] px-2 py-1">
                        </div>

                        <div x-show="openDropdown && filteredOptions.length > 0" 
                             x-transition
                             class="absolute z-30 left-0 right-0 mt-1 bg-white border border-slate-200 rounded-xl shadow-lg max-h-48 overflow-y-auto divide-y divide-slate-100">
                            <template x-for="(item, idx) in filteredOptions" :key="idx">
                                <button type="button" 
                                        @click="addTag(item)"
                                        class="w-full text-left px-4 py-2.5 text-xs text-slate-700 hover:bg-blue-600 hover:text-white font-medium transition">
                                    <span x-text="item"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-700 block">Deskripsi Singkat / Rincian Kasus <span class="text-rose-500">*</span></label>
                        <textarea name="deskripsi_judul" 
                                  rows="4" 
                                  required 
                                  placeholder="Tuliskan latar belakang singkat dan rincian masalah yang ingin diselesaikan..." 
                                  class="w-full bg-white border border-slate-300 rounded-xl p-3.5 text-xs font-medium text-slate-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:outline-none">{{ old('deskripsi_judul', $pengajuanJudul->deskripsi_judul ?? '') }}</textarea>
                    </div>

                </div>

                <div class="space-y-4">
                    <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-4 space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-9 h-9 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-sm shrink-0">i</div>
                            <h5 class="text-xs font-bold text-slate-800">Rekomendasi SPK</h5>
                        </div>

                        <div class="bg-white p-3.5 rounded-xl border border-blue-100 flex items-center space-x-3">
                            <svg width="20" height="20" style="width:20px; height:20px;" class="w-5 h-5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                            <div>
                                <span class="text-[10px] text-slate-400 font-semibold block">Topik Terpilih</span>
                                <p class="text-xs font-extrabold text-slate-800">
                                    {{ $topikDipilih->nama_topik }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 space-y-3">
                        <div class="flex items-center space-x-3">
                            <div class="w-9 h-9 rounded-xl bg-slate-400 text-white flex items-center justify-center shrink-0">
                                <svg width="20" height="20" style="width:20px; height:20px;" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <h5 class="text-xs font-bold text-slate-800">Dosen Pembimbing</h5>
                        </div>

                        <div class="bg-white p-3.5 rounded-xl border border-slate-200 space-y-1">
                            <span class="text-[10px] text-slate-400 font-semibold block">Plotting Dospem:</span>
                            <p class="text-xs font-bold text-slate-400 italic">Belum Diplot (Menunggu Verifikasi Gugus TA)</p>
                            <span class="inline-flex items-center space-x-1 text-[10px] text-amber-600 font-semibold pt-1">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                <span>Proses Pengajuan</span>
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex justify-end pt-4 border-t border-slate-100">
                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-md flex items-center space-x-2 transition cursor-pointer">
                    <span>{{ isset($isEdit) && $isEdit ? 'Simpan Perubahan Judul' : 'Kirim Pengajuan Judul' }}</span>
                    <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>

        </div>
    </form>

    <!-- 3. JIKA BELUM PILIH TOPIK SAMA SEKALI: FORM TERKUNCI -->
    @else
    <div class="bg-white rounded-2xl p-12 border border-slate-200 text-center shadow-xs space-y-4">
        <div class="w-14 h-14 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center mx-auto border border-slate-200 shadow-xs">
            <svg width="28" height="28" style="width:28px; height:28px;" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
        </div>
        
        <div class="space-y-1.5 max-w-md mx-auto">
            <h4 class="text-sm font-bold text-slate-800">Form Pengajuan Judul Terkunci</h4>
            <p class="text-xs text-slate-500 leading-relaxed">
                Anda belum memilih topik Tugas Akhir. Silakan isi kuesioner rekomendasi topik terlebih dahulu untuk membuka form pengajuan judul.
            </p>
        </div>

        <div class="pt-2">
            <a href="{{ route('mahasiswa.pengajuan-topik') }}" class="inline-block px-6 py-2.5 bg-blue-600 text-white text-xs font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
                Pilih Topik Sekarang &rarr;
            </a>
        </div>
    </div>
    @endif

</div>

<script>
    function pengajuanJudulApp(kodeTopik, initialTags = []) {
        return {
            tags: initialTags,
            searchQuery: '',
            openDropdown: false,
            kodeTopik: kodeTopik,
            
            get dynamicTagLabel() {
                if (this.kodeTopik === 'A2' || this.kodeTopik.includes('IoT')) return 'Sensor yang Digunakan (Jumlah Dinamis)';
                if (this.kodeTopik === 'A5' || this.kodeTopik.includes('SPK') || this.kodeTopik.includes('Mining')) return 'Metode Datamining / SPK (Jumlah Dinamis)';
                return 'Integrasi Sistem (Layanan / API Pihak ketiga)';
            },

            get dynamicPlaceholder() {
                if (this.kodeTopik === 'A2' || this.kodeTopik.includes('IoT')) return 'Ketik/Cari nama sensor...';
                if (this.kodeTopik === 'A5' || this.kodeTopik.includes('SPK') || this.kodeTopik.includes('Mining')) return 'Ketik/Cari nama metode (misal: SAW, AHP, C4.5)...';
                return 'Ketik/Cari API atau Layanan...';
            },

            get masterList() {
                if (this.kodeTopik === 'A2' || this.kodeTopik.includes('IoT')) {
                    return [
                        'Sensor DHT11', 'Sensor DHT22', 'Sensor LM35', 'Sensor DS18B20',
                        'Sensor Ultrasonik (HC-SR04)', 'Sensor PIR', 'Sensor RCWL-0516',
                        'Sensor VL53L0X', 'Sensor Gas MQ-2', 'Sensor Gas MQ-135',
                        'Soil Moisture Sensor', 'Water Level Sensor', 'Rain Sensor',
                        'pH Sensor', 'TDS Sensor', 'Sensor Arus ACS712', 'Voltage Sensor',
                        'Load Cell', 'Modul HX711', 'RFID RC522', 'RFID PN532',
                        'Fingerprint AS608', 'Barcode Scanner Module', 'QR Code Scanner Module',
                        'GPS NEO-6M', 'Gyroscope MPU6050', 'Speed Sensor'
                    ];
                }

                if (this.kodeTopik === 'A5' || this.kodeTopik.includes('SPK') || this.kodeTopik.includes('Mining')) {
                    return [
                        'AHP (Analytical Hierarchy Process)', 'SAW (Simple Additive Weighting)',
                        'TOPSIS', 'VIKOR', 'PROMETHEE', 'Profile Matching',
                        'WP (Weighted Product)', 'MABAC', 'COPRAS', 'K-Means Clustering',
                        'K-Medoids Clustering', 'C4.5 / Decision Tree', 'Naive Bayes',
                        'K-NN (K-Nearest Neighbors)', 'SVM (Support Vector Machine)',
                        'Random Forest', 'Algoritma Apriori', 'FP-Growth',
                        'Neural Network', 'Backpropagation'
                    ];
                }

                return [
                    'WhatsApp Gateway', 'Fonnte API', 'Wablas API', 'Twilio API',
                    'Telegram Bot API', 'SMTP Email', 'SendGrid API', 'Mailgun API',
                    'Firebase Cloud Messaging (FCM)', 'SMS Gateway', 'Zenziva API',
                    'Midtrans Payment Gateway', 'Xendit Payment Gateway', 'Doku Payment Gateway',
                    'Tripay Payment Gateway', 'Google Maps API', 'Google Calender API',
                    'OpenStreetMap API', 'Leaflet.js', 'Mapbox API', 'Google OAuth',
                    'Facebook Login API', 'OAuth2', 'OpenAI API', 'ChatGPT API',
                    'Google Cloud Vision API', 'OCR API', 'Face Recognition API',
                    'AWS S3 Storage', 'Firebase Storage', 'RajaOngkir API',
                    'RESTful API External', 'Custom Webhook', 'SIAKAD API'
                ];
            },

            get filteredOptions() {
                if (this.searchQuery.trim() === '') return [];
                let q = this.searchQuery.toLowerCase().replace(/[^a-z0-9]/g, '');
                return this.masterList.filter(item => {
                    let cleanItem = item.toLowerCase().replace(/[^a-z0-9]/g, '');
                    return cleanItem.includes(q) && !this.tags.includes(item);
                });
            },

            addTag(val) {
                let cleanVal = val.trim();
                if (cleanVal !== '' && !this.tags.includes(cleanVal)) {
                    this.tags.push(cleanVal);
                }
                this.searchQuery = '';
                this.openDropdown = false;
            },

            selectTopMatch() {
                if (this.searchQuery.trim() === '') return;
                if (this.filteredOptions.length > 0) {
                    this.addTag(this.filteredOptions[0]);
                } else {
                    this.addTag(this.searchQuery);
                }
            },

            removeTag(index) {
                this.tags.splice(index, 1);
            }
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection