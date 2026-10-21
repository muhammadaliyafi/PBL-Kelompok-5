<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Validasi - SIPETA</title>
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
                        <a href="/pengajuan-judul" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Pengajuan Judul</a>
                        <a href="/status-validasi" class="flex items-center px-3.5 py-2 text-sm font-semibold rounded-lg bg-blue-600/10 text-blue-400 border border-blue-500/20">Status Validasi</a>
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
                        <h1 class="text-xl font-bold text-slate-800">Detail Status Validasi Judul</h1>
                        <p class="text-xs text-slate-500 mt-1">Pantau progress peninjauan dan riwayat catatan revisi dari Dosen Pembimbing.</p>
                    </div>
                    <div>
                        <span class="px-3 py-1 bg-amber-50 text-amber-700 text-xs font-semibold rounded-full border border-amber-200">
                            Status: Revisi Judul
                        </span>
                    </div>
                </div>

                <!-- Card Catatan & Komentar Validasi Dospem -->
                <div class="bg-white rounded-2xl shadow-xs border border-slate-200 p-6 space-y-6">
                    
                    <!-- Header Kartu Catatan -->
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-600 text-white rounded-2xl flex items-center justify-center text-base shadow-xs shrink-0">
                            <i class="fa-solid fa-comment-dots"></i>
                        </div>
                        <h2 class="text-sm font-bold text-slate-800">Catatan & Komentar Validasi Dospem</h2>
                    </div>

                    <!-- Inner Box Detail Dospem & Catatan -->
                    <div class="border border-slate-200 rounded-2xl p-6 space-y-4 bg-slate-50/30">
                        
                        <!-- Profil Dospem & Badge Status -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div class="flex items-center space-x-3.5">
                                <div class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-xs tracking-wide shrink-0 shadow-xs">
                                    SH
                                </div>
                                <div>
                                    <h3 class="text-xs font-bold text-slate-900">Sausan Hidayah, S.Kom., M.Kom.</h3>
                                    <p class="text-[11px] text-slate-500">Dosen Pembimbing</p>
                                </div>
                            </div>
                            <div>
                                <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold rounded-lg inline-block">
                                    Revisi Judul
                                </span>
                            </div>
                        </div>

                        <!-- Isal Catatan Pengoreksian -->
                        <div class="space-y-2 pt-2">
                            <p class="text-xs font-bold text-slate-700">Catatan Pengoreksian Dospem:</p>
                            <div class="bg-white border border-slate-200 rounded-xl p-4 text-xs text-slate-600 leading-relaxed italic shadow-2xs">
                                "Terima kasih untuk usulan judulnya. Secara umum topik SI Terintegrasi sudah sesuai, namun judul masih perlu dipertajam. Tolong perjelas modul spesifik yang akan dikembangkan dan pastikan rincian API/Integrasi WhatsApp Gateway dijelaskan lebih detail pada deskripsi singkat. Silakan direvisi dan dikirim ulang."
                            </div>
                        </div>

                    </div>

                    <!-- Action Button Kanan Bawah -->
                    <div class="flex justify-end pt-2">
                        <a href="/pengajuan-judul" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-6 py-3 rounded-xl shadow-md transition inline-flex items-center space-x-2 cursor-pointer">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Perbaiki & Kirim Ulang Judul</span>
                        </a>
                    </div>

                </div>

            </main>
        </div>

    </div>

</body>

</html>