<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Judul - SIPETA</title>
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
                        <a href="/pengajuan-topik" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Pengajuan Topik</a>
                        <a href="/pengajuan-judul" class="flex items-center px-3.5 py-2 text-sm font-semibold rounded-lg bg-blue-600/10 text-blue-400 border border-blue-500/20">Pengajuan Judul</a>
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
            <main class="p-8 max-w-7xl w-full mx-auto space-y-6 flex-1">

                <!-- Header Banner Card -->
                <div class="bg-white rounded-2xl shadow-xs border border-slate-200 p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-xl font-bold text-slate-800">Pengajuan Judul</h1>
                        <p class="text-sm text-slate-500 mt-1">
                            Lengkapi usulan judul, rincian integrasi sistem, dan deskripsi Tugas Akhir Anda untuk ditinjau oleh Dosen Pembimbing.
                        </p>
                    </div>
                    <div>
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full border border-blue-100">
                            Step 2 dari 3
                        </span>
                    </div>
                </div>

                <!-- KONDISI TERKUNCI (JIKA BELUM PENGAJUAN TOPIK) -->
                <div id="lockedSection" class="bg-amber-50/70 border border-amber-200/80 rounded-2xl p-8 text-center space-y-4 shadow-xs hidden">
                    <div class="w-14 h-14 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center text-xl mx-auto shadow-xs">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="space-y-1">
                        <h3 class="text-base font-bold text-amber-950">Form Pengajuan Judul Masih Terkunci</h3>
                        <p class="text-xs text-amber-900/80 max-w-md mx-auto leading-relaxed">
                            Kamu harus memilih & mengajukan topik Tugas Akhir terlebih dahulu sebelum dapat mengisi form pengajuan judul.
                        </p>
                    </div>
                    <a href="/pengajuan-topik" class="inline-flex items-center space-x-2 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs px-5 py-2.5 rounded-xl shadow-xs transition cursor-pointer">
                        <span>Ke Halaman Pengajuan Topik</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>

                <!-- FORM INPUT JUDUL TUGAS AKHIR -->
                <div id="formJudulSection" class="bg-white rounded-2xl shadow-xs border border-slate-200 space-y-6 overflow-hidden hidden">
                    <div class="border-b border-slate-100 px-6 py-4">
                        <h3 class="text-base font-bold text-slate-800">Input Judul Tugas Akhir</h3>
                    </div>

                    <form onsubmit="submitJudul(event)" class="p-6 space-y-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            
                            <!-- Kolom Kiri: Form Input -->
                            <div class="lg:col-span-2 space-y-5">
                                
                                <!-- Pilih Topik Utama -->
                                <div class="space-y-1.5">
                                    <label class="text-xs font-bold text-slate-800">Pilih Topik Utama <span class="text-red-500">*</span></label>
                                    <select id="inputTopikUtama" required class="w-full bg-white border border-slate-300 text-slate-800 text-xs rounded-xl p-3 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition cursor-pointer font-medium">
                                        <option value="" disabled selected>-- Pilih Topik Utama --</option>
                                        <option value="SI Terintegrasi (Sensor API)">SI Terintegrasi (Sensor API)</option>
                                        <option value="Internet of Things (IoT)">Internet of Things (IoT)</option>
                                        <option value="Data Mining / Kecerdasan Buatan / SPK">Data Mining / Kecerdasan Buatan / SPK</option>
                                        <option value="Virtual (VR) / Augmented Reality (AR)">Virtual (VR) / Augmented Reality (AR)</option>
                                        <option value="Pengembangan Game (Menggunakan Database)">Pengembangan Game (Menggunakan Database)</option>
                                    </select>
                                </div>

                                <!-- Judul Proposal -->
                                <div class="space-y-1.5">
                                    <label class="text-xs font-bold text-slate-800">Judul Proposal <span class="text-red-500">*</span></label>
                                    <input type="text" id="inputJudul" required placeholder="Contoh: Rancang Bangun Sistem Informasi Pengajuan Tugas Akhir (SIPETA) Berbasis Web" class="w-full bg-white border border-slate-300 text-slate-800 text-xs rounded-xl p-3 placeholder:text-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                                </div>

                                <!-- Integrasi Sistem -->
                                <div class="space-y-1.5">
                                    <label class="text-xs font-bold text-slate-800">Integrasi Sistem (Layanan / API Pihak Ketiga) <span class="text-red-500">*</span></label>
                                    <input type="text" id="inputIntegrasi" required placeholder="Contoh: WhatsApp Gateway (Fonnte API), Mail Server (SMTP), Payment Gateway (Midtrans)" class="w-full bg-white border border-slate-300 text-slate-800 text-xs rounded-xl p-3 placeholder:text-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                                </div>

                                <!-- Deskripsi Singkat -->
                                <div class="space-y-1.5">
                                    <label class="text-xs font-bold text-slate-800">Deskripsi Singkat <span class="text-red-500">*</span></label>
                                    <textarea id="inputDeskripsi" rows="5" required placeholder="Jelaskan secara singkat latar belakang masalah, tujuan penelitian, serta batasan fitur utama dari sistem yang akan dikembangkan..." class="w-full bg-white border border-slate-300 text-slate-800 text-xs rounded-xl p-3 placeholder:text-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition leading-relaxed"></textarea>
                                </div>
                            </div>

                            <!-- Kolom Kanan: Card Rekomendasi SPK & Dospem -->
                            <div class="space-y-4">
                                <div class="bg-blue-50/60 border border-blue-100 rounded-2xl p-5 space-y-4">
                                    <!-- Rekomendasi SPK -->
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-xs font-bold shrink-0">i</div>
                                        <h4 class="text-xs font-bold text-blue-900">Rekomendasi SPK</h4>
                                    </div>
                                    <div class="flex items-start space-x-3 pl-1">
                                        <div class="w-8 h-8 border border-blue-200 bg-white rounded-full flex items-center justify-center text-blue-600 shrink-0 text-xs">
                                            <i class="fa-regular fa-lightbulb"></i>
                                        </div>
                                        <div>
                                            <p class="text-[11px] text-slate-500">Topik Rekomendasi</p>
                                            <p class="text-xs font-bold text-slate-900">Sistem Informasi (88%)</p>
                                        </div>
                                    </div>

                                    <hr class="border-blue-100/80">

                                    <!-- Dosen Pembimbing -->
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-xs shrink-0">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <h4 class="text-xs font-bold text-blue-900">Dosen Pembimbing</h4>
                                    </div>
                                    <div class="flex items-start space-x-3 pl-1">
                                        <div class="w-8 h-8 border border-blue-200 bg-white rounded-full flex items-center justify-center text-blue-600 shrink-0 text-xs">
                                            <i class="fa-solid fa-graduation-cap"></i>
                                        </div>
                                        <div class="space-y-1">
                                            <p class="text-[11px] text-slate-500">Ploting Dospem:</p>
                                            <p class="text-xs font-bold text-slate-900 leading-tight">Sausan Hidayah, S.Kom., M.Kom.</p>
                                            <div class="inline-flex items-center space-x-1 text-[10px] font-bold text-emerald-600 bg-emerald-50 border border-emerald-200/60 px-2 py-0.5 rounded-md">
                                                <i class="fa-solid fa-circle-check"></i>
                                                <span>Terverifikasi Gugus TA</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex justify-end pt-2">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-6 py-3 rounded-xl shadow-md transition flex items-center space-x-2 cursor-pointer">
                                <span>Input Pengajuan Proposal</span>
                                <i class="fa-solid fa-paper-plane text-xs"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- HASIL / STATUS SETELAH JUDUL DIAJUKAN (CARD KARTU STATUS SINGLE) -->
                <div id="statusJudulBerhasilSection" class="space-y-6 hidden">

                    <div>
                        <h2 class="text-lg font-bold text-slate-800">Kartu Status Pengajuan</h2>
                        <p class="text-xs text-slate-500">Kartu Ringkasan Form & Status Single</p>
                    </div>

                    <div class="bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
                        
                        <div class="bg-slate-50/70 border-b border-slate-200/80 px-6 py-4">
                            <h3 class="text-sm font-bold text-slate-800">Status Pengajuan Judul TA Anda</h3>
                        </div>

                        <div class="p-6 space-y-5 text-xs">
                            
                            <!-- Judul Proposal -->
                            <div class="flex items-center space-x-4">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                                    <i class="fa-regular fa-lightbulb text-sm"></i>
                                </div>
                                <div class="w-36 font-bold text-slate-800 shrink-0">Judul Proposal</div>
                                <div id="displayJudul" class="font-bold text-slate-900 flex-1">
                                    : Aplikasi SIPETA Berbasis Web Menggunakan Framework Laravel di Politala
                                </div>
                            </div>

                            <!-- Topik Utama -->
                            <div class="flex items-center space-x-4">
                                <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 border border-blue-100 flex items-center justify-center shrink-0">
                                    <i class="fa-regular fa-calendar-check text-sm"></i>
                                </div>
                                <div class="w-36 font-bold text-slate-800 shrink-0">Topik Utama</div>
                                <div id="displayTopik" class="font-bold text-slate-900 flex-1">
                                    : SI Terintegrasi
                                </div>
                            </div>

                            <!-- Integrasi Sistem -->
                            <div class="flex items-center space-x-4">
                                <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 border border-purple-100 flex items-center justify-center shrink-0">
                                    <i class="fa-solid fa-plug text-sm"></i>
                                </div>
                                <div class="w-36 font-bold text-slate-800 shrink-0">Integrasi Sistem</div>
                                <div id="displayIntegrasi" class="font-bold text-slate-900 flex-1">
                                    : Whatsapp Gateway & Email API
                                </div>
                            </div>

                            <!-- Tanggal Pengajuan -->
                            <div class="flex items-center space-x-4">
                                <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 border border-emerald-100 flex items-center justify-center shrink-0">
                                    <i class="fa-regular fa-file-lines text-sm"></i>
                                </div>
                                <div class="w-36 font-bold text-slate-800 shrink-0">Tanggal Pengajuan</div>
                                <div class="font-bold text-slate-900 flex-1">
                                    : 17 Oktober 2026
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Tombol Aksi Edit & Hapus -->
                    <div class="flex justify-end items-center space-x-3 pt-2">
                        <button onclick="editFormJudul()" title="Edit Pengajuan" class="w-10 h-10 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 rounded-2xl shadow-xs transition flex items-center justify-center cursor-pointer">
                            <i class="fa-solid fa-pen text-xs"></i>
                        </button>
                        <button onclick="hapusPengajuan()" title="Hapus / Reset Pengajuan" class="w-10 h-10 bg-white hover:bg-red-50 border border-slate-200 text-red-500 rounded-2xl shadow-xs transition flex items-center justify-center cursor-pointer">
                            <i class="fa-regular fa-trash-can text-xs"></i>
                        </button>
                    </div>

                </div>

            </main>
        </div>

    </div>

    <!-- SCRIPT PROGRESS & DATA persistence -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            renderPage();
        });

        function renderPage() {
            const currentStep = localStorage.getItem('ta_progress_step') || '0';

            const lockedSec = document.getElementById('lockedSection');
            const formSec = document.getElementById('formJudulSection');
            const successSec = document.getElementById('statusJudulBerhasilSection');

            // Load saved input values if available
            if(localStorage.getItem('ta_judul')) {
                document.getElementById('displayJudul').textContent = ': ' + localStorage.getItem('ta_judul');
            }
            if(localStorage.getItem('ta_topik_utama')) {
                document.getElementById('displayTopik').textContent = ': ' + localStorage.getItem('ta_topik_utama');
            }
            if(localStorage.getItem('ta_integrasi')) {
                document.getElementById('displayIntegrasi').textContent = ': ' + localStorage.getItem('ta_integrasi');
            }

            if (currentStep === '3') {
                if(lockedSec) lockedSec.classList.add('hidden');
                if(formSec) formSec.classList.add('hidden');
                if(successSec) successSec.classList.remove('hidden');
            } else if (parseInt(currentStep) >= 2) {
                if(lockedSec) lockedSec.classList.add('hidden');
                if(formSec) formSec.classList.remove('hidden');
                if(successSec) successSec.classList.add('hidden');
            } else {
                if(lockedSec) lockedSec.classList.remove('hidden');
                if(formSec) formSec.classList.add('hidden');
                if(successSec) successSec.classList.add('hidden');
            }
        }

        function submitJudul(e) {
            e.preventDefault();
            const topik = document.getElementById('inputTopikUtama').value;
            const judul = document.getElementById('inputJudul').value;
            const integrasi = document.getElementById('inputIntegrasi').value;

            localStorage.setItem('ta_topik_utama', topik);
            localStorage.setItem('ta_judul', judul);
            localStorage.setItem('ta_integrasi', integrasi);
            localStorage.setItem('ta_progress_step', '3');
            
            renderPage();
        }

        function editFormJudul() {
            localStorage.setItem('ta_progress_step', '2');
            renderPage();
        }

        function hapusPengajuan() {
            if(confirm('Apakah Anda yakin ingin membatalkan pengajuan judul ini?')) {
                localStorage.setItem('ta_progress_step', '2');
                localStorage.removeItem('ta_judul');
                localStorage.removeItem('ta_integrasi');
                renderPage();
            }
        }
    </script>
</body>

</html>