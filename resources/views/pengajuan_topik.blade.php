<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Topik - SIPETA</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-50/50 font-sans text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR MAHASISWA -->
        @if(View::exists('sidebar'))
            @include('sidebar')
        @else
            <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex border-r border-slate-800 shrink-0">
                <div>
                    <div class="h-16 flex items-center px-6 bg-slate-950/50 border-b border-slate-800/80 text-white font-semibold tracking-wide">
                        <svg class="w-5 h-5 text-blue-500 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7" />
                        </svg>
                        SIPETA
                    </div>
                    <nav class="mt-6 px-3 space-y-1">
                        <a href="/dashboard" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Dashboard</a>
                        <a href="/pengajuan-topik" class="flex items-center px-3.5 py-2 text-sm font-semibold rounded-lg bg-blue-600/10 text-blue-400 border border-blue-500/20">Pengajuan Topik</a>
                        <a href="/pengajuan-judul" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Pengajuan Judul</a>
                        <a href="/status-validasi" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Status Validasi</a>
                        <a href="/data-arsip" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Data Arsip</a>
                    </nav>
                </div>
                <div class="p-4 text-xs text-slate-500 border-t border-slate-800/60 text-center font-mono">
                    Mahasiswa POV &copy; 2026
                </div>
            </aside>
        @endif

        <!-- MAIN CONTENT CONTAINER -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">

            <!-- TOP NAVBAR -->
            <header class="h-16 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-10 shrink-0">
                <h1 class="text-sm font-medium text-slate-600">Sistem Informasi Proposal dan Tugas Akhir</h1>

                <div class="relative flex items-center gap-3">
                    <button id="profileBtn" class="flex items-center gap-3 focus:outline-none hover:bg-slate-50 p-1.5 rounded-lg transition-colors cursor-pointer">
                        <span class="text-xs font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200">
                            Shelvi Ayu Setyowati (2501301050)
                        </span>
                        <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold text-xs tracking-wider shadow-xs">
                            SA
                        </div>
                    </button>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <main class="p-8 max-w-7xl w-full mx-auto space-y-5 flex-1">

                <!-- Header Banner Card -->
                <div class="bg-white rounded-2xl shadow-xs border border-slate-200 p-6">
                    <h1 class="text-base font-bold text-slate-800">Pengajuan Topik</h1>
                    <p class="text-xs text-slate-500 mt-1">Pilih topik utama dari Bank Topik untuk diverifikasi dan dilakukan ploting Dosen Pembimbing oleh Gugus TA.</p>
                </div>

                <!-- FORM PILIHAN TOPIK (KONDISI AWAL / BELUM PENGAJUAN) -->
                <div id="formTopikSection" class="space-y-5 hidden">
                    <!-- Card SPK Rekomendasi -->
                    <div class="bg-white rounded-2xl shadow-xs border border-slate-200 p-6 space-y-5">
                        <div class="flex items-center space-x-3.5">
                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-lg shadow-xs shrink-0">
                                <i class="fa-solid fa-chart-simple"></i>
                            </div>
                            <div>
                                <h2 class="text-sm font-bold text-slate-800">Hasil Rekomendasi SPK (Metode SAW)</h2>
                                <p class="text-xs text-slate-500">Rekoemndasi dihitung berdasarkan nilai akademis dan kriteria peminatan kamu.</p>
                            </div>
                        </div>

                        <div class="overflow-x-auto border border-slate-200/80 rounded-xl">
                            <table class="w-full text-left border-collapse text-xs">
                                <thead>
                                    <tr class="bg-slate-50/80 border-b border-slate-200/80 text-slate-700 font-bold uppercase tracking-wider">
                                        <th class="py-3 px-4">PERINGKAT</th>
                                        <th class="py-3 px-4">NAMA TOPIK</th>
                                        <th class="py-3 px-4">SKOR AKHIR (V)</th>
                                        <th class="py-3 px-4">KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="py-3 px-4 font-bold">
                                            <span class="px-2.5 py-1 bg-blue-600 text-white rounded-md text-[11px]">#1</span>
                                        </td>
                                        <td class="py-3 px-4 font-bold text-slate-800">Sistem Informasi Terintegrasi</td>
                                        <td class="py-3 px-4 font-bold text-slate-800">0.925</td>
                                        <td class="py-3 px-4 font-bold text-emerald-600">Sangat Direkomendasikan</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="py-3 px-4 font-bold">
                                            <span class="px-2.5 py-1 bg-slate-200 text-slate-700 rounded-md text-[11px]">#2</span>
                                        </td>
                                        <td class="py-3 px-4 font-medium text-slate-400">Internet of Things (IoT)</td>
                                        <td class="py-3 px-4 font-medium text-slate-400">0.810</td>
                                        <td class="py-3 px-4 font-medium text-slate-400">Direkomendasikan</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="py-3 px-4 font-bold">
                                            <span class="px-2.5 py-1 bg-slate-200 text-slate-700 rounded-md text-[11px]">#3</span>
                                        </td>
                                        <td class="py-3 px-4 font-medium text-slate-400">Pengembangan Game</td>
                                        <td class="py-3 px-4 font-medium text-slate-400">0.745</td>
                                        <td class="py-3 px-4 font-medium text-slate-400">Cukup Direkomendasikan</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="py-3 px-4 font-bold">
                                            <span class="px-2.5 py-1 bg-slate-200 text-slate-700 rounded-md text-[11px]">#4</span>
                                        </td>
                                        <td class="py-3 px-4 font-medium text-slate-400">AR/VR</td>
                                        <td class="py-3 px-4 font-medium text-slate-400">0.680</td>
                                        <td class="py-3 px-4 font-medium text-slate-400">Pertimbangan</td>
                                    </tr>
                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                        <td class="py-3 px-4 font-bold">
                                            <span class="px-2.5 py-1 bg-slate-200 text-slate-700 rounded-md text-[11px]">#5</span>
                                        </td>
                                        <td class="py-3 px-4 font-medium text-slate-400">Data Mining/SPK</td>
                                        <td class="py-3 px-4 font-medium text-slate-400">0.590</td>
                                        <td class="py-3 px-4 font-medium text-slate-400">Pertimbangan</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Card Pilihan Topik Bank TA -->
                    <div class="bg-white rounded-2xl shadow-xs border border-slate-200 p-6 space-y-6">
                        <h2 class="text-sm font-bold text-slate-800">Pilihan Topik Bank TA</h2>

                        <form onsubmit="submitPilihanTopik(event)" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                <!-- Option 1: IoT -->
                                <label class="bg-slate-50 border border-slate-200 rounded-2xl p-5 block cursor-pointer hover:border-blue-300 transition">
                                    <div class="flex items-start space-x-3">
                                        <input type="radio" name="topik_pilihan" value="Internet of Things (IoT)" class="mt-1 accent-blue-600">
                                        <div class="space-y-2">
                                            <h3 class="text-xs font-bold text-slate-900">Internet of Things (IoT)</h3>
                                            <div class="text-[11px] text-slate-600 space-y-1 leading-relaxed">
                                                <p class="font-semibold text-slate-700">Batas Minimum:</p>
                                                <ol class="list-decimal list-inside space-y-0.5">
                                                    <li>Interface web/mobile (Buat Sendiri)</li>
                                                    <li>Bersedia menyerahkan alat IoT ke kampus setelah sidang</li>
                                                    <li>Harus ada database</li>
                                                    <li>Tema DIUTAMAKAN smart agrotechnology atau smart living</li>
                                                    <li>Interface platform IoT (Blynk, ThingsBoard, IoTera, dll) terintegrasi Webhook/Webservice API ke DB/app sendiri</li>
                                                    <li>Buat video demonstrasi alat dan dokumen tutorial penggunaan</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Option 2: Data Mining / SPK -->
                                <label class="bg-slate-50 border border-slate-200 rounded-2xl p-5 block cursor-pointer hover:border-blue-300 transition">
                                    <div class="flex items-start space-x-3">
                                        <input type="radio" name="topik_pilihan" value="Data Mining / Kecerdasan Buatan / SPK" class="mt-1 accent-blue-600">
                                        <div class="space-y-2">
                                            <h3 class="text-xs font-bold text-slate-900">Data Mining / Kecerdasan Buatan / SPK</h3>
                                            <div class="text-[11px] text-slate-600 space-y-1 leading-relaxed">
                                                <p class="font-semibold text-slate-700">Batas Minimum:</p>
                                                <ol class="list-decimal list-inside space-y-0.5">
                                                    <li>Ada interface (terdapat visualisasi data, akurasi)</li>
                                                    <li>Sistemnya harus ada CRUD</li>
                                                    <li>Harus ada perhitungan manual dalam laporannya</li>
                                                    <li>Program sesuai dengan alur perhitungan manual (pakai library)</li>
                                                    <li>Laporan terdapat analisis hasil dan makna pengujian</li>
                                                    <li>Data minimal 200 record</li>
                                                    <li>Studi kasus nyata (data asli) / relevan kebutuhan industri/lokal</li>
                                                    <li>Tema DIUTAMAKAN smart agrotechnology atau smart living</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Option 3: SI Terintegrasi (Sensor API) -->
                                <label class="bg-slate-50 border border-slate-200 rounded-2xl p-5 block cursor-pointer hover:border-blue-300 transition">
                                    <div class="flex items-start space-x-3">
                                        <input type="radio" name="topik_pilihan" value="SI Terintegrasi" checked class="mt-1 accent-blue-600">
                                        <div class="space-y-2">
                                            <h3 class="text-xs font-bold text-slate-900">SI Terintegrasi (Sensor API)</h3>
                                            <div class="text-[11px] text-slate-600 space-y-1 leading-relaxed">
                                                <p class="font-semibold text-slate-700">Batas Minimum:</p>
                                                <ol class="list-decimal list-inside space-y-0.5">
                                                    <li>HARUS ada integrasi pihak ketiga (RajaOngkir, Duitku, Midtrans, Email, WA Gateway/Telegram, dll)</li>
                                                    <li>Database minimal 7 tabel (sesuaikan kompleksitas)</li>
                                                    <li>Menggunakan framework terkini (Laravel 11, Golang, CI 4.7)</li>
                                                    <li>Minimal user 3</li>
                                                    <li>Harus dihosting sejak sebelum sidang</li>
                                                    <li>Laporan menyertakan pengujian UAT & pengujian integrasi</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Option 4: VR / AR -->
                                <label class="bg-slate-50 border border-slate-200 rounded-2xl p-5 block cursor-pointer hover:border-blue-300 transition">
                                    <div class="flex items-start space-x-3">
                                        <input type="radio" name="topik_pilihan" value="Virtual (VR) / Augmented Reality (AR)" class="mt-1 accent-blue-600">
                                        <div class="space-y-2">
                                            <h3 class="text-xs font-bold text-slate-900">Virtual (VR) / Augmented Reality (AR)</h3>
                                            <div class="text-[11px] text-slate-600 space-y-1 leading-relaxed">
                                                <p class="font-semibold text-slate-700">Batas Minimum:</p>
                                                <ol class="list-decimal list-inside space-y-0.5">
                                                    <li>Ada databasenya (pakai DBMS)</li>
                                                    <li>Minimal aset bikin sendiri 50%, 50% boleh pakai aset orang lain (sertakan copyright)</li>
                                                    <li>Tema HARUS smart agrotechnology atau smart living</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                                <!-- Option 5: Pengembangan Game -->
                                <label class="bg-slate-50 border border-slate-200 rounded-2xl p-5 block cursor-pointer hover:border-blue-300 transition">
                                    <div class="flex items-start space-x-3">
                                        <input type="radio" name="topik_pilihan" value="Pengembangan Game (Menggunakan Database)" class="mt-1 accent-blue-600">
                                        <div class="space-y-2">
                                            <h3 class="text-xs font-bold text-slate-900">Pengembangan Game (Menggunakan Database)</h3>
                                            <div class="text-[11px] text-slate-600 space-y-1 leading-relaxed">
                                                <p class="font-semibold text-slate-700">Batas Minimum:</p>
                                                <ol class="list-decimal list-inside space-y-0.5">
                                                    <li>Kuat mental kuat perangkat</li>
                                                    <li>Harus ada aplikasinya & ada databasenya (pakai DBMS)</li>
                                                    <li>Pada saat mengajukan proposal harus sudah lengkap skenario permainannya</li>
                                                    <li>Harus ada storynya</li>
                                                    <li>Tema boleh bebas (boleh untuk tujuan hiburan)</li>
                                                    <li>Harus mengoding (tidak boleh membuat game dengan cara drag drop)</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </label>

                            </div>

                            <div class="flex justify-end pt-2">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-6 py-3 rounded-full shadow-md transition flex items-center space-x-2 cursor-pointer">
                                    <i class="fa-solid fa-paper-plane text-xs"></i>
                                    <span>Ajukan Pilihan Topik</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- TAMPILAN STATUS: KETIKA TOPIK SUDAH DIAJUKAN -->
                <div id="topikBerhasilSection" class="space-y-5 hidden">
                    
                    <!-- Alert Hijau Topik Berhasil Diajukan -->
                    <div class="bg-emerald-50 border border-emerald-200/80 rounded-2xl p-4 flex items-center space-x-3 text-emerald-700">
                        <div class="w-7 h-7 bg-emerald-600 text-white rounded-full flex items-center justify-center text-xs shrink-0 shadow-xs">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <p class="text-xs font-bold leading-relaxed">
                            Topik berhasil diajukan! Menunggu Gugus TA memverifikasi dan menentukan Dosen Pembimbing.
                        </p>
                    </div>

                    <!-- Alert Kuning Status Topik -->
                    <div class="bg-amber-50/70 border border-amber-200/80 rounded-2xl p-5 flex items-start space-x-4">
                        <div class="w-10 h-10 bg-amber-400 text-white rounded-2xl flex items-center justify-center text-base shrink-0 shadow-xs">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-sm font-bold text-amber-950">Status Topik: Menunggu Ploting Dospem</h3>
                            <p class="text-xs text-amber-900/80 leading-relaxed">
                                Topik kamu sedang ditinjau Gugus TA untuk penentuan Dosen Pembimbing. Form pengajuan judul akan terbuka setelah Dospem diploting & topik disetujui
                            </p>
                        </div>
                    </div>

                    <!-- Card Rekomendasi Sistem SPK -->
                    <div class="bg-blue-50/50 border border-blue-200/80 rounded-2xl p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center space-x-3.5">
                            <div class="w-10 h-10 bg-blue-600 text-white rounded-2xl flex items-center justify-center text-base shrink-0 shadow-xs">
                                <i class="fa-solid fa-wand-magic-sparkles"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800">Rekomendasi Sistem (SPK SAW)</h3>
                                <p class="text-xs text-slate-500">Berdasarkan analisis nilai mata kuliah & peminatan kamu</p>
                            </div>
                        </div>
                        <div>
                            <span class="bg-blue-600 text-white text-xs font-bold px-5 py-2.5 rounded-full inline-block shadow-xs">
                                SI Teringrasi (Skor: 88%)
                            </span>
                        </div>
                    </div>

                    <!-- Card Utama Konfirmasi Pengajuan Berhasil + Tombol Ubah Topik -->
                    <div class="bg-white border border-slate-200 rounded-2xl p-10 text-center space-y-5 shadow-xs">
                        <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center text-3xl mx-auto">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div class="space-y-1.5 max-w-lg mx-auto">
                            <h3 class="text-base font-bold text-slate-900">Pengajuan Topik Berhasil Terkirim</h3>
                            <p class="text-xs text-slate-500 leading-relaxed">
                                Kamu sedang mengajukan topik <strong class="text-slate-800">"SI Terintegrasi"</strong>. Mohon menunggu proses verifikasi dan plotting Dosen Pembimbing oleh Gugus Tugas Akhir
                            </p>
                        </div>

                        <!-- Tombol Ubah / Pilih Ulang Topik -->
                        <div class="pt-2">
                            <button onclick="pilihUlangTopik()" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-6 py-3 rounded-xl shadow-md transition inline-flex items-center space-x-2 cursor-pointer">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span>Ubah / Pilih Ulang Topik</span>
                            </button>
                        </div>
                    </div>

                </div>

            </main>
        </div>

    </div>

    <!-- SCRIPT PROGRESS TA -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            renderPage();
        });

        function renderPage() {
            const currentStep = localStorage.getItem('ta_progress_step') || '0';
            const formSec = document.getElementById('formTopikSection');
            const berhasilSec = document.getElementById('topikBerhasilSection');

            if (parseInt(currentStep) >= 2) {
                // Jika sudah ajukan topik (Step 2 atau 3), tampilkan status berhasil
                if(formSec) formSec.classList.add('hidden');
                if(berhasilSec) berhasilSec.classList.remove('hidden');
            } else {
                // Jika belum (Step 0 atau 1), tampilkan form pilihan topik
                if(formSec) formSec.classList.remove('hidden');
                if(berhasilSec) berhasilSec.classList.add('hidden');
            }
        }

        function submitPilihanTopik(e) {
            e.preventDefault();
            // Set progress ke Step 2 (Topik diajukan)
            localStorage.setItem('ta_progress_step', '2');
            renderPage();
        }

        function pilihUlangTopik() {
            // Reset progress ke Step 0 (Belum ada progres/semua abu-abu di dashboard)
            localStorage.setItem('ta_progress_step', '0');
            renderPage();
        }
    </script>
</body>

</html>