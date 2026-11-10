<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SiPETA Politala') - SiPETA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-slate-50 font-sans antialiased min-h-screen flex text-slate-800">

    <!-- SIDEBAR MAHASISWA -->
    <aside class="w-64 bg-[#0F172A] min-h-screen text-white flex flex-col justify-between shrink-0 shadow-xl">
        <div>
            <!-- Header Brand -->
            <div class="p-6 border-b border-slate-800/80 flex items-center space-x-3">
                <div class="w-10 h-10 text-white flex items-center justify-center shrink-0">
                    <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L1 7.5L12 13L21 8.5V15H23V7.5L12 2Z"/>
                        <path d="M4 11.2V16C4 17.8 7.6 20.2 12 20.2C16.4 20.2 20 17.8 20 16V11.2L12 15.5L4 11.2Z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h1 class="text-xl font-extrabold tracking-wide text-white leading-tight">SIPETA</h1>
                    <p class="text-xs text-slate-300 font-medium leading-none mt-0.5">Tugas Akhir Politala</p>
                </div>
            </div>

            <!-- NAVIGASI SIDEBAR MAHASISWA -->
            <nav class="space-y-1.5 px-3 py-4">

                <!-- 1. Dashboard -->
                <a href="{{ route('mahasiswa.dashboard') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-bold transition {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <!-- 2. Pengajuan Topik -->
                <a href="{{ route('mahasiswa.pengajuan-topik') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-bold transition {{ request()->routeIs('mahasiswa.pengajuan-topik') || request()->routeIs('mahasiswa.kuesioner') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span>Pengajuan Topik</span>
                </a>

                <!-- 3. Pengajuan Judul -->
                <a href="{{ route('mahasiswa.pengajuan-judul') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-bold transition {{ request()->routeIs('mahasiswa.pengajuan-judul*') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    <span>Pengajuan Judul</span>
                </a>

                <!-- 4. Status Validasi -->
                <a href="{{ route('mahasiswa.status-validasi') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-bold transition {{ request()->routeIs('mahasiswa.status-validasi') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Status Validasi</span>
                </a>

                <!-- 5. Data Arsip -->
                <a href="{{ route('mahasiswa.data-arsip') }}" 
                   class="flex items-center space-x-3 px-4 py-3 rounded-xl text-xs font-bold transition {{ request()->routeIs('mahasiswa.data-arsip*') ? 'bg-blue-600 text-white shadow-md' : 'text-slate-300 hover:bg-slate-800/60 hover:text-white' }}">
                    <svg width="16" height="16" style="width:16px; height:16px;" class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v1a2 2 0 01-2 2M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                    <span>Data Arsip</span>
                </a>

            </nav>
        </div>

        <!-- FOOTER TEXT MAHASISWA POV -->
        <div class="p-4 border-t border-slate-800/80 text-center">
            <p class="text-xs font-medium text-slate-400 tracking-wide">
                Mahasiswa POV &copy; 2026
            </p>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 p-8 overflow-y-auto min-h-screen">
        @yield('content')
    </main>

</body>
</html>