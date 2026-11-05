<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Arsip Judul TA - SIPETA</title>
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
                        <a href="/status-validasi" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Status Validasi</a>
                        <a href="/data-arsip" class="flex items-center px-3.5 py-2 text-sm font-semibold rounded-lg bg-blue-600/10 text-blue-400 border border-blue-500/20">Data Arsip</a>
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
                <div class="bg-white rounded-2xl shadow-xs border border-slate-200/80 p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-xl font-bold text-slate-800">Data Arsip Judul TA</h1>
                        <p class="text-xs text-slate-400 mt-1">Bank pencarian referensi judul dan topik proposal Tugas Akhir yang telah terarsip.</p>
                    </div>
                    <div>
                        <span class="px-3.5 py-1.5 bg-slate-100 text-slate-500 text-xs font-semibold rounded-full border border-slate-200/60">
                            0 dari 0 judul
                        </span>
                    </div>
                </div>

                <!-- Main Card Konten Arsip -->
                <div class="bg-white rounded-2xl shadow-xs border border-slate-200/80 p-6 space-y-6">

                    <!-- Filter Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-end">
                        <!-- Search Bar -->
                        <div class="lg:col-span-8 space-y-1.5">
                            <label class="text-xs font-semibold text-slate-600">Search Bar</label>
                            <div class="relative">
                                <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                                <input type="text" placeholder="Cari judul, nama, atau topik..." class="w-full bg-white border border-slate-200 rounded-xl pl-10 pr-4 py-2.5 text-xs text-slate-700 placeholder:text-slate-300 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition">
                            </div>
                        </div>

                        <!-- Year Filter (2021 - 2030) -->
                        <div class="lg:col-span-4 space-y-1.5">
                            <label class="text-xs font-semibold text-slate-600">Year</label>
                            <select class="w-full bg-white border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-600 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition cursor-pointer">
                                <option value="">Semua Tahun</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                    </div>

                    <!-- Tabel Data Arsip (Read-Only) -->
                    <div class="overflow-x-auto border border-slate-200/80 rounded-xl">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="bg-slate-50/80 border-b border-slate-200/80 text-slate-400 font-bold uppercase tracking-wider">
                                    <th class="py-3.5 px-4 font-bold text-[11px]">NO</th>
                                    <th class="py-3.5 px-4 font-bold text-[11px]">TAHUN</th>
                                    <th class="py-3.5 px-4 font-bold text-[11px]">NIM</th>
                                    <th class="py-3.5 px-4 font-bold text-[11px]">NAMA MAHASISWA</th>
                                    <th class="py-3.5 px-4 font-bold text-[11px]">JUDUL PROPOSAL</th>
                                    <th class="py-3.5 px-4 font-bold text-[11px]">TOPIK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="py-16 text-center text-slate-400 font-medium">
                                        Belum ada data arsip judul yang tersimpan.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Info Table -->
                    <div class="flex items-center justify-between pt-2 text-xs">
                        <span class="text-slate-400 font-medium">Menampilkan 0 Data Arsip Judul</span>
                        <a href="#" class="text-blue-600 font-semibold hover:underline">Akses Pengelola (Gugus TA)</a>
                    </div>

                </div>

            </main>
        </div>

    </div>

</body>

</html>