<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa - SIPETA</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-50/50 font-sans text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR MAHASISWA -->
        @if (View::exists('sidebar'))
            @include('sidebar')
        @else
            <aside
                class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex border-r border-slate-800 shrink-0">
                <div>
                    <div
                        class="h-16 flex items-center px-6 bg-slate-950/50 border-b border-slate-800/80 text-white font-semibold tracking-wide">
                        <svg class="w-5 h-5 text-blue-500 mr-2.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7" />
                        </svg>
                        SIPETA
                    </div>
                    <nav class="mt-6 px-3 space-y-1">
                        <a href="/dashboard"
                            class="flex items-center px-3.5 py-2 text-sm font-semibold rounded-lg bg-blue-600/10 text-blue-400 border border-blue-500/20">Dashboard</a>
                        <a href="/pengajuan-topik"
                            class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Pengajuan
                            Topik</a>
                        <a href="/pengajuan-judul"
                            class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Pengajuan
                            Judul</a>
                        <a href="/status-validasi"
                            class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Status
                            Validasi</a>
                        <a href="/data-arsip"
                            class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Data
                            Arsip</a>
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
            <header
                class="h-16 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-10 shrink-0">
                <h1 class="text-sm font-medium text-slate-600">Sistem Informasi Proposal dan Tugas Akhir</h1>

                <div class="relative flex items-center gap-3">
                    <button id="profileBtn"
                        class="flex items-center gap-3 focus:outline-none hover:bg-slate-50 p-1.5 rounded-lg transition-colors cursor-pointer">
                        <span
                            class="text-xs font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200">
                            Shelvi Ayu Setyowati (2501301050)
                        </span>
                        <div
                            class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold text-xs tracking-wider shadow-xs">
                            SA
                        </div>
                    </button>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <main class="p-8 max-w-7xl w-full mx-auto space-y-6 flex-1">

                <!-- Header Banner Card -->
                <div
                    class="bg-white rounded-xl shadow-xs border border-slate-200 p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-xl font-bold text-slate-800">Dashboard Mahasiswa</h1>
                        <p class="text-sm text-slate-500 mt-1">Pantau progress pengajuan, kelola topik, dan verifikasi
                            judul Tugas Akhir Anda.</p>
                    </div>
                    <div>
                        <span
                            class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full border border-blue-100">
                            Status: Aktif TA
                        </span>
                    </div>
                </div>

                <!-- Progress Tugas Akhir Card -->
                <div class="bg-white rounded-xl shadow-xs border border-slate-200 p-6 space-y-6 relative z-0">
                    <h2 class="text-xs font-bold text-slate-700 uppercase tracking-wider">PROGRESS TUGAS AKHIR</h2>

                    <div class="relative flex items-center justify-between max-w-3xl mx-auto px-6 py-2">
                        <!-- Garis Dasar Abu-Abu -->
                        <div class="absolute left-12 right-12 top-7 h-0.5 bg-slate-200 z-0"></div>

                        <!-- Garis Aktif Biru -->
                        <div id="progressLine"
                            class="absolute left-12 top-7 h-0.5 bg-blue-600 transition-all duration-500 z-0"
                            style="width: 0%;"></div>

                        <!-- Step 1 -->
                        <div class="flex flex-col items-center relative z-10 bg-white px-2">
                            <div id="stepCircle1"
                                class="w-10 h-10 bg-slate-400 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors">
                                1</div>
                            <span id="stepLabel1"
                                class="text-xs font-semibold text-slate-500 mt-2.5 transition-colors">Pilih Topik</span>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex flex-col items-center relative z-10 bg-white px-2">
                            <div id="stepCircle2"
                                class="w-10 h-10 bg-slate-400 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors">
                                2</div>
                            <span id="stepLabel2"
                                class="text-xs font-semibold text-slate-500 mt-2.5 transition-colors">Ajukan
                                Judul</span>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex flex-col items-center relative z-10 bg-white px-2">
                            <div id="stepCircle3"
                                class="w-10 h-10 bg-slate-400 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors">
                                3</div>
                            <span id="stepLabel3"
                                class="text-xs font-semibold text-slate-500 mt-2.5 transition-colors">Status
                                Validasi</span>
                        </div>
                    </div>
                </div>

                <!-- Card Grid Status -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- Status Topik -->
                    <div
                        class="bg-white rounded-xl shadow-xs border border-slate-200 p-6 flex flex-col justify-between space-y-4">
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-10 h-10 bg-blue-50 text-blue-600 border border-blue-200/60 rounded-xl flex items-center justify-center text-sm shadow-xs">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">STATUS TOPIK
                                </p>
                                <h3 id="statusTopikText" class="text-sm font-bold text-slate-800 mt-0.5">Belum Dipilih
                                </h3>
                            </div>
                        </div>
                        <a href="/pengajuan-topik"
                            class="px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs rounded-lg transition-colors shadow-xs cursor-pointer flex items-center justify-center gap-2">
                            <span>Pilih Topik</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>

                    <!-- Status Judul -->
                    <div
                        class="bg-white rounded-xl shadow-xs border border-slate-200 p-6 flex flex-col justify-between space-y-4">
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-10 h-10 bg-amber-50 text-amber-600 border border-amber-200/60 rounded-xl flex items-center justify-center text-sm shadow-xs">
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">STATUS JUDUL
                                </p>
                                <h3 id="statusJudulText" class="text-sm font-bold text-slate-800 mt-0.5">Belum Diajukan
                                </h3>
                            </div>
                        </div>
                        <a href="/pengajuan-judul"
                            class="px-4 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-semibold text-xs rounded-lg transition-colors shadow-xs cursor-pointer flex items-center justify-center gap-2">
                            <span>Ajukan Judul</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>

                    <!-- Status Validasi -->
                    <div
                        class="bg-white rounded-xl shadow-xs border border-slate-200 p-6 flex flex-col justify-between space-y-4">
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-10 h-10 bg-cyan-50 text-cyan-600 border border-cyan-200/60 rounded-xl flex items-center justify-center text-sm shadow-xs">
                                <i class="fa-solid fa-circle-check"></i>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">STATUS VALIDASI
                                </p>
                                <h3 id="statusValidasiText" class="text-sm font-bold text-slate-800 mt-0.5">Belum
                                    Divalidasi</h3>
                            </div>
                        </div>
                        <a href="/status-validasi"
                            class="px-4 py-2.5 bg-cyan-600 hover:bg-cyan-700 text-white font-semibold text-xs rounded-lg transition-colors shadow-xs cursor-pointer flex items-center justify-center gap-2">
                            <span>Lihat Status</span>
                            <i class="fa-solid fa-arrow-right text-[10px]"></i>
                        </a>
                    </div>

                </div>

                <!-- Alur Pengajuan Tugas Akhir -->
                <div class="bg-white rounded-xl shadow-xs border border-slate-200 p-6 space-y-4">
                    <h3 class="text-xs font-bold text-slate-700 uppercase tracking-wider">ALUR PENGAJUAN TUGAS AKHIR
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div class="bg-slate-50/80 border border-slate-200/80 rounded-xl p-4 text-center space-y-2.5">
                            <div
                                class="w-8 h-8 bg-slate-200 text-slate-700 font-bold rounded-full flex items-center justify-center mx-auto text-xs">
                                1</div>
                            <h4 class="text-xs font-bold text-slate-800">Pilih Topik</h4>
                            <p class="text-[11px] text-slate-500 leading-relaxed">Pilih topik utama dari Bank TA untuk
                                proses rekomendasi & penentuan Dospem.</p>
                        </div>

                        <div class="bg-slate-50/80 border border-slate-200/80 rounded-xl p-4 text-center space-y-2.5">
                            <div
                                class="w-8 h-8 bg-slate-200 text-slate-700 font-bold rounded-full flex items-center justify-center mx-auto text-xs">
                                2</div>
                            <h4 class="text-xs font-bold text-slate-800">Ploting Dospem</h4>
                            <p class="text-[11px] text-slate-500 leading-relaxed">Gugus TA memverifikasi topik &
                                menentukan Dosen Pembimbing kamu.</p>
                        </div>

                        <div class="bg-slate-50/80 border border-slate-200/80 rounded-xl p-4 text-center space-y-2.5">
                            <div
                                class="w-8 h-8 bg-slate-200 text-slate-700 font-bold rounded-full flex items-center justify-center mx-auto text-xs">
                                3</div>
                            <h4 class="text-xs font-bold text-slate-800">Ajukan Judul</h4>
                            <p class="text-[11px] text-slate-500 leading-relaxed">Isi form pengajuan judul setelah
                                Dospem kamu resmi diploting.</p>
                        </div>

                        <div class="bg-slate-50/80 border border-slate-200/80 rounded-xl p-4 text-center space-y-2.5">
                            <div
                                class="w-8 h-8 bg-slate-200 text-slate-700 font-bold rounded-full flex items-center justify-center mx-auto text-xs">
                                4</div>
                            <h4 class="text-xs font-bold text-slate-800">Verifikasi Validasi</h4>
                            <p class="text-[11px] text-slate-500 leading-relaxed">Pantau persetujuan judul & berkas TA
                                oleh Gugus dan Dospem.</p>
                        </div>
                    </div>
                </div>

            </main>
        </div>

    </div>

    <!-- LOGIKA SCRIPT PROGRESS & STATUS -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const currentStep = localStorage.getItem('ta_progress_step') || '0';

            const line = document.getElementById('progressLine');
            const circle1 = document.getElementById('stepCircle1');
            const label1 = document.getElementById('stepLabel1');
            const circle2 = document.getElementById('stepCircle2');
            const label2 = document.getElementById('stepLabel2');
            const circle3 = document.getElementById('stepCircle3');
            const label3 = document.getElementById('stepLabel3');

            const statusTopikText = document.getElementById('statusTopikText');
            const statusJudulText = document.getElementById('statusJudulText');
            const statusValidasiText = document.getElementById('statusValidasiText');

            if (parseInt(currentStep) >= 3) {
                if (line) line.style.width = '88%';

                if (circle1) circle1.className =
                    'w-10 h-10 bg-blue-600 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors';
                if (label1) label1.className = 'text-xs font-semibold text-blue-600 mt-2.5 transition-colors';

                if (circle2) circle2.className =
                    'w-10 h-10 bg-blue-600 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors';
                if (label2) label2.className = 'text-xs font-semibold text-blue-600 mt-2.5 transition-colors';

                if (circle3) circle3.className =
                    'w-10 h-10 bg-blue-600 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors';
                if (label3) label3.className = 'text-xs font-semibold text-blue-600 mt-2.5 transition-colors';

                if (statusTopikText) statusTopikText.innerText = "Sudah Diajukan";
                if (statusJudulText) statusJudulText.innerText = "Sudah Diajukan";
                if (statusValidasiText) statusValidasiText.innerText = "Menunggu Validasi";

            } else if (currentStep === '2') {
                if (line) line.style.width = '44%';

                if (circle1) circle1.className =
                    'w-10 h-10 bg-blue-600 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors';
                if (label1) label1.className = 'text-xs font-semibold text-blue-600 mt-2.5 transition-colors';

                if (circle2) circle2.className =
                    'w-10 h-10 bg-slate-400 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors';
                if (label2) label2.className = 'text-xs font-semibold text-slate-500 mt-2.5 transition-colors';

                if (circle3) circle3.className =
                    'w-10 h-10 bg-slate-400 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors';
                if (label3) label3.className = 'text-xs font-semibold text-slate-500 mt-2.5 transition-colors';

                if (statusTopikText) statusTopikText.innerText = "Sudah Diajukan";
                if (statusJudulText) statusJudulText.innerText = "Belum Diajukan";
                if (statusValidasiText) statusValidasiText.innerText = "Belum Divalidasi";

            } else {
                if (line) line.style.width = '0%';

                if (circle1) circle1.className =
                    'w-10 h-10 bg-slate-400 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors';
                if (label1) label1.className = 'text-xs font-semibold text-slate-500 mt-2.5 transition-colors';

                if (circle2) circle2.className =
                    'w-10 h-10 bg-slate-400 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors';
                if (label2) label2.className = 'text-xs font-semibold text-slate-500 mt-2.5 transition-colors';

                if (circle3) circle3.className =
                    'w-10 h-10 bg-slate-400 text-white font-bold rounded-full flex items-center justify-center shadow-xs transition-colors';
                if (label3) label3.className = 'text-xs font-semibold text-slate-500 mt-2.5 transition-colors';

                if (statusTopikText) statusTopikText.innerText = "Belum Dipilih";
                if (statusJudulText) statusJudulText.innerText = "Belum Diajukan";
                if (statusValidasiText) statusValidasiText.innerText = "Belum Divalidasi";
            }
        });
    </script>
</body>

</html>
