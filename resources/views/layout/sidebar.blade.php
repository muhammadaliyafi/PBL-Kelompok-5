<!-- resources/views/layouts/sidebar.blade.php -->
<aside
    class="w-64 bg-[#0b132b] text-white flex flex-col justify-between hidden md:flex p-4 border-r border-slate-800/50">
    <div>
        <!-- Logo & Brand -->
        <div class="flex items-center gap-3 px-3 py-4 mb-4">
            <div class="text-white">
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
                class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl transition-all {{ request()->is('gugus-ta/dashboard*') || request()->routeIs('gugusta.dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-200 hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- Verifikasi Proposal -->
            <a href="{{ route('gugusta.verifikasi') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl transition-all {{ request()->is('gugus-ta/verifikasi*') || request()->routeIs('gugusta.verifikasi') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-200 hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Verifikasi Proposal</span>
            </a>

            <!-- Kelola Bank Topik -->
            <a href="{{ route('topik.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl transition-all {{ request()->is('gugus-ta/topik*') || request()->routeIs('topik.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-200 hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Kelola Bank Topik</span>
            </a>

            <!-- Data Mahasiswa -->
            <a href="{{ url('/gugus-ta/mahasiswa') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl transition-all {{ request()->is('gugus-ta/mahasiswa*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-200 hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span>Data Mahasiswa</span>
            </a>

            <!-- Data Dosen -->
            <a href="{{ url('/gugus-ta/dosen') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl transition-all {{ request()->is('gugus-ta/dosen*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-200 hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <span>Data Dosen</span>
            </a>

            <!-- Ploting Dospem -->
            <a href="/gugus-ta/ploting"
                class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl transition-all {{ request()->is('gugus-ta/ploting*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-200 hover:bg-slate-800/60' }}">
                <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                <span>Ploting Dospem</span>
            </a>

            <!-- Arsip Judul -->
            <a href="{{ route('arsip.index') }}"
                class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl transition-all {{ request()->is('gugus-ta/arsip*') || request()->routeIs('arsip.*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30' : 'text-slate-200 hover:bg-slate-800/60' }}">
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
