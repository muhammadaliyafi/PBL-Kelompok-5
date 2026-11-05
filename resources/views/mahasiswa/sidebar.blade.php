<aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex border-r border-slate-800 shrink-0 h-screen sticky top-0">
    <div>
        <!-- Logo & Brand -->
        <div class="h-16 flex items-center px-6 bg-slate-950/50 border-b border-slate-800/80 text-white font-semibold tracking-wide">
            <svg class="w-5 h-5 text-blue-500 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7" />
            </svg>
            SIPETA
        </div>

        <!-- Navigation Menu Mahasiswa -->
        <nav class="mt-6 px-3 space-y-1">
            <a href="/dashboard" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('dashboard*') ? 'bg-blue-600/10 text-blue-400 border border-blue-500/20 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-200' }}">
                Dashboard
            </a>

            <a href="/pengajuan-topik" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('pengajuan-topik*') ? 'bg-blue-600/10 text-blue-400 border border-blue-500/20 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-200' }}">
                Pengajuan Topik
            </a>

            <a href="/pengajuan-judul" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('pengajuan-judul*') ? 'bg-blue-600/10 text-blue-400 border border-blue-500/20 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-200' }}">
                Pengajuan Judul
            </a>

            <a href="/status-validasi" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('status-validasi*') ? 'bg-blue-600/10 text-blue-400 border border-blue-500/20 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-200' }}">
                Status Validasi
            </a>

            <a href="/data-arsip" class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg transition-colors {{ request()->is('data-arsip*') ? 'bg-blue-600/10 text-blue-400 border border-blue-500/20 font-semibold' : 'text-slate-400 hover:bg-slate-800/60 hover:text-slate-200' }}">
                Data Arsip
            </a>
        </nav>
    </div>

    <div class="p-4 text-xs text-slate-500 border-t border-slate-800/60 text-center font-mono">
        Mahasiswa POV &copy; 2026
    </div>
</aside>