<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pengajuan Judul - SIPETA</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50/50 font-sans text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside
            class="w-64 bg-[#0b132b] text-white flex flex-col justify-between hidden md:flex p-4 border-r border-slate-800/50">
            <div>
                <!-- Logo & Brand -->
                <div class="flex items-center gap-3 px-3 py-4 mb-4">
                    <div class="text-white">
                        <!-- Icon Topi Toga (Mortarboard) -->
                        <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-black tracking-wide text-white leading-none">SIPETA</h1>
                        <p class="text-xs text-slate-400 mt-1 font-medium">Tugas Akhir Politala</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="space-y-1.5">
                    <!-- Dashboard -->
                    <a href="{{ route('gugusta.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl text-slate-200 hover:bg-slate-800/60 transition-all">
                        <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <!-- Verifikasi Proposal (Active) -->
                    <a href="{{ route('gugusta.verifikasi') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-600/30 transition-all">
                        <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Verifikasi Proposal</span>
                    </a>

                    <!-- Kelola Bank Topik -->
                    <a href="{{ route('topik.index') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl text-slate-200 hover:bg-slate-800/60 transition-all">
                        <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Kelola Bank Topik</span>
                    </a>

                    <!-- Data Mahasiswa -->
                    <a href="{{ url('/gugus-ta/mahasiswa') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl text-slate-200 hover:bg-slate-800/60 transition-all">
                        <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>Data Mahasiswa</span>
                    </a>

                    <!-- Data Dosen -->
                    <a href="{{ url('/gugus-ta/dosen') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl text-slate-200 hover:bg-slate-800/60 transition-all">
                        <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>Data Dosen</span>
                    </a>

                    <!-- Ploting Dospem -->
                    <a href="/gugus-ta/ploting"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl text-slate-200 hover:bg-slate-800/60 transition-all">
                        <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span>Ploting Dospem</span>
                    </a>

                    <!-- Arsip Judul -->
                    <a href="{{ route('arsip.index') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl text-slate-200 hover:bg-slate-800/60 transition-all">
                        <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5 8h14M5 8a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v1a2 2 0 01-2 2M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <span>Arsip Judul</span>
                    </a>
                </nav>
            </div>

            <div class="p-3 text-xs text-slate-400 border-t border-slate-800/60 text-center font-mono">
                Gugus TA POV &copy; 2026
            </div>
        </aside>

        <!-- MAIN CONTENT CONTAINER -->
        <div class="flex-1 flex flex-col overflow-y-auto">

            <!-- TOP NAVBAR -->
            <header
                class="h-16 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-10">
                <h1 class="text-sm font-medium text-slate-600">Sistem Informasi Proposal dan Tugas Akhir</h1>

                <!-- User Profile & Dropdown Container -->
                <div class="relative">
                    <button id="profileBtn"
                        class="flex items-center gap-3 focus:outline-none hover:bg-slate-50 p-1.5 rounded-lg transition-colors cursor-pointer">
                        <span
                            class="text-xs font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200">Admin
                            Gugus TA</span>
                        <div
                            class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold text-xs tracking-wider shadow-sm">
                            AG</div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl border border-slate-200/80 shadow-lg py-1.5 z-50">
                        <div class="px-4 py-2.5 border-b border-slate-100">
                            <p class="text-xs font-semibold text-slate-800">Admin Gugus TA</p>
                            <p class="text-[10px] text-slate-500">admin@politala.ac.id</p>
                        </div>

                        <button type="button" id="btnGantiRole"
                            class="w-full text-left px-4 py-2 text-xs text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors flex items-center gap-2 mt-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Ganti Role
                        </button>

                        <form action="/logout" method="POST" class="block w-full">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 hover:text-rose-700 transition-colors flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Keluar Sistem
                            </button>
                        </form>
                    </div>
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
                        class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Total
                                Pengajuan
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
                        class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Menunggu
                                Review
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
                        class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-[11px] font-semibold text-slate-500 uppercase tracking-wider">Telah
                                Disetujui
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
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

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
                                <tr class="hover:bg-slate-50/60 transition-colors">
                                    <td class="py-4 px-5 align-middle">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-slate-800 text-white font-bold flex items-center justify-center text-[11px] tracking-wider shadow-sm">
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
                                                class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg text-xs transition-colors shadow-sm">
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

    <!-- MODAL GANTI ROLE -->
    <div id="modalRole" class="hidden fixed inset-0 z-[100] flex items-center justify-center">
        <div id="modalOverlay"
            class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm cursor-pointer transition-opacity"></div>

        <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-sm overflow-hidden p-6">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-base font-bold text-slate-900">Pilih Hak Akses</h3>
                <button type="button" id="closeModalRole"
                    class="text-slate-400 hover:text-rose-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="space-y-3">
                <!-- Admin Gugus TA (Aktif) -->
                <div
                    class="w-full flex items-center justify-between p-3 rounded-xl border-2 border-blue-500 bg-blue-50 text-left cursor-default">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow-sm">
                            AG</div>
                        <div>
                            <div class="text-sm font-semibold text-blue-900">Admin Gugus TA</div>
                            <div class="text-[10px] font-medium text-blue-600 uppercase tracking-wider">Sedang Aktif
                            </div>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                <!-- Dosen Pembimbing -->
                <a href="{{ url('/dosen/dashboard') }}"
                    class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200 hover:border-slate-300 hover:bg-slate-50 text-left transition-all group">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700 flex items-center justify-center font-bold text-xs transition-colors">
                            DP</div>
                        <div>
                            <div class="text-sm font-medium text-slate-700 group-hover:text-slate-900">Dosen Pembimbing
                            </div>
                            <div class="text-[10px] text-slate-400">2 Mahasiswa Bimbingan</div>
                        </div>
                    </div>
                </a>

                <!-- Koordinator Prodi -->
                <a href="{{ url('/koorprodi/dashboard') }}"
                    class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200 hover:border-slate-300 hover:bg-slate-50 text-left transition-all group">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700 flex items-center justify-center font-bold text-xs transition-colors">
                            KP</div>
                        <div>
                            <div class="text-sm font-medium text-slate-700 group-hover:text-slate-900">Koordinator
                                Prodi</div>
                            <div class="text-[10px] text-slate-400">Akses Penuh Akademik</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- SCRIPT DROPDOWN PROFIL & MODAL ROLE -->
    <script>
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileBtn && profileDropdown) {
            profileBtn.addEventListener('click', (event) => {
                event.stopPropagation();
                profileDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', (event) => {
                if (!profileDropdown.contains(event.target) && !profileDropdown.classList.contains('hidden')) {
                    profileDropdown.classList.add('hidden');
                }
            });
        }

        const btnGantiRole = document.getElementById('btnGantiRole');
        const modalRole = document.getElementById('modalRole');
        const closeModalRole = document.getElementById('closeModalRole');
        const modalOverlay = document.getElementById('modalOverlay');

        if (btnGantiRole && modalRole) {
            btnGantiRole.addEventListener('click', () => {
                profileDropdown.classList.add('hidden');
                modalRole.classList.remove('hidden');
            });
        }

        const tutupModalRole = () => modalRole && modalRole.classList.add('hidden');
        if (closeModalRole) closeModalRole.addEventListener('click', tutupModalRole);
        if (modalOverlay) modalOverlay.addEventListener('click', tutupModalRole);
    </script>

</body>

</html>
