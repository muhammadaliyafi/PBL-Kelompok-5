<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pengajuan Judul - SIPETA</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100/70 font-sans text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside
            class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex border-r border-slate-800">
            <div>
                <!-- Logo & Brand -->
                <div
                    class="h-16 flex items-center px-6 bg-slate-950/60 border-b border-slate-800 text-white font-semibold tracking-wide">
                    <svg class="w-5 h-5 text-blue-500 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7" />
                    </svg>
                    SIPETA
                </div>

                <!-- Navigation Menu -->
                <nav class="mt-6 px-3 space-y-1">
                    <a href="{{ route('gugusta.dashboard') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Dashboard
                    </a>

                    <a href="{{ route('gugusta.verifikasi') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-semibold rounded-lg bg-blue-600/10 text-blue-400 border border-blue-500/20">
                        Verifikasi Proposal
                    </a>

                    <a href="{{ route('topik.index') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Kelola Bank Topik
                    </a>

                    <a href="{{ url('/gugus-ta/mahasiswa') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Data Mahasiswa
                    </a>

                    <a href="{{ route('dosen.index') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Data Dosen
                    </a>

                    <a href="{{ route('gugusta.ploting') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Ploting Dospem
                    </a>

                    <a href="{{ route('arsip.index') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Arsip Judul
                    </a>
                </nav>
            </div>

            <div class="p-4 text-xs text-slate-500 border-t border-slate-800 text-center font-mono">
                Gugus TA POV &copy; 2026
            </div>
        </aside>

        <!-- MAIN CONTENT CONTAINER -->
        <div class="flex-1 flex flex-col overflow-y-auto">

            <!-- TOP NAVBAR -->
            <header
                class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10 shadow-xs">
                <h1 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Sistem Informasi Proposal dan
                    Tugas Akhir</h1>

                <div class="relative">
                    <button id="profileBtn"
                        class="flex items-center gap-3 focus:outline-none hover:bg-slate-50 p-1.5 rounded-lg transition-colors cursor-pointer">
                        <span
                            class="text-xs font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200">Admin
                            Gugus TA</span>
                        <div
                            class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold text-xs tracking-wider shadow-xs">
                            AG</div>
                    </button>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <main class="p-8 max-w-7xl w-full mx-auto space-y-6">

                <!-- Header Section -->
                <div>
                    <h1 class="text-xl font-bold text-slate-900">Verifikasi Pengajuan Judul</h1>
                    <p class="text-xs text-slate-500 mt-1">Lakukan peninjauan kesesuaian topik serta validasi status
                        pengajuan judul mahasiswa.</p>
                </div>

                <!-- Stat Overview Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div
                        class="bg-white rounded-xl p-4 border border-slate-200 shadow-2xs flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Total Pengajuan
                            </p>
                            <p class="text-2xl font-bold text-slate-900 mt-1">12</p>
                        </div>
                        <div class="p-2.5 bg-slate-100 text-slate-600 rounded-lg border border-slate-200/60">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl p-4 border border-slate-200 shadow-2xs flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Menunggu Review
                            </p>
                            <p class="text-2xl font-bold text-amber-600 mt-1">4</p>
                        </div>
                        <div class="p-2.5 bg-amber-50 text-amber-600 rounded-lg border border-amber-200/60">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-xl p-4 border border-slate-200 shadow-2xs flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Telah Disetujui
                            </p>
                            <p class="text-2xl font-bold text-emerald-600 mt-1">8</p>
                        </div>
                        <div class="p-2.5 bg-emerald-50 text-emerald-600 rounded-lg border border-emerald-200/60">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Table Card Container -->
                <div class="bg-white rounded-xl shadow-2xs border border-slate-200 overflow-hidden">

                    <!-- Search & Filter Bar -->
                    <div
                        class="p-4 border-b border-slate-200 bg-slate-50/50 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div class="relative flex-1 max-w-xs">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                            <input type="text" placeholder="Cari nama, NIM, atau judul..."
                                class="w-full pl-9 pr-3 py-1.5 text-xs rounded-lg border border-slate-300 bg-white focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600 transition-all">
                        </div>

                        <select
                            class="px-3 py-1.5 text-xs rounded-lg border border-slate-300 bg-white text-slate-700 focus:outline-none focus:border-blue-600">
                            <option value="">Semua Status</option>
                            <option value="Menunggu">Menunggu</option>
                            <option value="Disetujui">Disetujui</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                                    <th class="py-3 px-5">Mahasiswa</th>
                                    <th class="py-3 px-5">Judul Proposal & Topik</th>
                                    <th class="py-3 px-5">Status</th>
                                    <th class="py-3 px-5 text-center">Aksi Keputusan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-xs">

                                <!-- Row Item -->
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <td class="py-4 px-5 align-middle">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-slate-800 text-white font-bold flex items-center justify-center text-[11px] tracking-wider shadow-2xs">
                                                MY
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900">Muhammad Ali Yafi</div>
                                                <div class="text-[11px] text-slate-400 font-mono mt-0.5">2501301052
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-5 align-middle max-w-md">
                                        <div class="font-semibold text-slate-800 leading-snug">Sistem Informasi
                                            Pengelolaan Tugas Akhir (SIPETA)</div>
                                        <div class="mt-1">
                                            <span
                                                class="inline-block px-2 py-0.5 text-[10px] font-medium bg-slate-100 text-slate-600 border border-slate-200 rounded">
                                                Sistem Informasi
                                            </span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-5 align-middle">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-medium bg-amber-50 text-amber-700 border border-amber-200/70">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                            Menunggu
                                        </span>
                                    </td>
                                    <td class="py-4 px-5 align-middle">
                                        <div class="flex items-center justify-center gap-2">
                                            <button
                                                class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg text-xs transition-colors shadow-2xs">
                                                ACC Judul
                                            </button>
                                            <button
                                                class="px-3 py-1.5 bg-white hover:bg-rose-50 text-rose-600 border border-slate-200 hover:border-rose-200 font-semibold rounded-lg text-xs transition-colors">
                                                Tolak
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>

            </main>
        </div>

    </div>

</body>

</html>
