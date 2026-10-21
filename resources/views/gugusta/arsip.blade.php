<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Arsip Judul TA - SIPETA</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100/70 font-sans text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR GUGUS TA -->
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
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
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
                        class="flex items-center px-3.5 py-2 text-sm font-semibold rounded-lg bg-blue-600/10 text-blue-400 border border-blue-500/20">
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
                class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10 shadow-2xs">
                <h1 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Sistem Informasi Proposal dan
                    Tugas Akhir</h1>

                <div class="relative">
                    <button id="profileBtn"
                        class="flex items-center gap-3 focus:outline-none hover:bg-slate-50 p-1.5 rounded-lg transition-colors cursor-pointer">
                        <span
                            class="text-xs font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200">Admin
                            Gugus TA</span>
                        <div
                            class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold text-xs tracking-wider shadow-2xs">
                            AG</div>
                    </button>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <main class="p-8 max-w-7xl w-full mx-auto space-y-6">

                <!-- Header Banner Card -->
                <div
                    class="bg-white rounded-2xl shadow-2xs border border-slate-200/80 p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Data Arsip Judul TA</h1>
                        <p class="text-xs text-slate-500 mt-1">Bank pencarian referensi judul dan topik proposal Tugas
                            Akhir yang telah terarsip.</p>
                    </div>
                    <div>
                        <span
                            class="px-3 py-1.5 bg-slate-100 text-slate-600 font-semibold text-xs rounded-full border border-slate-200">
                            {{ $arsips->count() }} dari {{ $totalJudul ?? 0 }} judul
                        </span>
                    </div>
                </div>

                @if (session('success'))
                    <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Main Card (Search, Filter, Actions & Table) -->
                <div class="bg-white rounded-2xl shadow-2xs border border-slate-200/80 overflow-hidden space-y-4">

                    <!-- Search & Filter Bar -->
                    <div class="p-6 pb-2">
                        <form action="{{ route('arsip.index') }}" method="GET"
                            class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-end">
                            <!-- Search Bar -->
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Search Bar</label>
                                <div class="relative">
                                    <span
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </span>
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Cari judul, nama, atau topik..."
                                        class="w-full pl-9 pr-3 py-2 text-xs rounded-xl border border-slate-200 bg-white focus:outline-none focus:border-blue-600 focus:ring-1 focus:ring-blue-600 transition-all">
                                </div>
                            </div>

                            <!-- Year Dropdown (Otomatis Dinamis) -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Year</label>
                                <select name="tahun" onchange="this.form.submit()"
                                    class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 bg-white text-slate-700 focus:outline-none focus:border-blue-600 cursor-pointer">
                                    <option value="semua"
                                        {{ request('tahun') == 'semua' || !request('tahun') ? 'selected' : '' }}>
                                        Semua Tahun
                                    </option>
                                    @foreach ($daftarTahun as $t)
                                        <option value="{{ $t }}"
                                            {{ request('tahun') == $t ? 'selected' : '' }}>
                                            {{ $t }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>

                    <!-- Action Buttons -->
                    <div class="px-6 flex flex-wrap items-center justify-end gap-3">

                        <!-- Tombol Hapus Semua Data -->
                        <form action="{{ route('arsip.delete-all') }}" method="POST"
                            onsubmit="return confirm('⚠️ Yakin ingin menghapus SELURUH data arsip judul?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white font-semibold text-xs rounded-xl transition-colors shadow-2xs cursor-pointer">
                                Hapus Semua Data
                            </button>
                        </form>

                        <!-- Tombol Unduh Template -->
                        <button type="button" onclick="alert('Template Excel berhasil diunduh!')"
                            class="px-4 py-2 bg-slate-50 hover:bg-slate-100 text-slate-700 border border-slate-200 font-semibold text-xs rounded-xl transition-colors cursor-pointer">
                            Unduh template
                        </button>

                        <!-- Form Import Excel -->
                        <form action="{{ route('arsip.import') }}" method="POST" enctype="multipart/form-data"
                            class="flex items-center gap-2">
                            @csrf
                            <input type="file" name="file" required accept=".xlsx, .xls, .csv"
                                class="text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs rounded-xl transition-colors shadow-2xs cursor-pointer">
                                Import Excel
                            </button>
                        </form>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr
                                    class="bg-slate-50/80 border-y border-slate-200/80 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
                                    <th class="py-3.5 px-5 text-center w-12">NO</th>
                                    <th class="py-3.5 px-5">TAHUN</th>
                                    <th class="py-3.5 px-5">NIM</th>
                                    <th class="py-3.5 px-5">NAMA MAHASISWA</th>
                                    <th class="py-3.5 px-5">JUDUL PROPOSAL</th>
                                    <th class="py-3.5 px-5">TOPIK</th>
                                    <th class="py-3.5 px-5 text-right">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-xs">
                                @forelse($arsips as $index => $item)
                                    <tr class="hover:bg-slate-50/60 transition-colors">
                                        <td class="py-4 px-5 text-center text-slate-400 font-medium">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="py-4 px-5 font-medium text-slate-600">{{ $item->tahun }}</td>
                                        <td class="py-4 px-5 font-mono text-slate-500">{{ $item->nim }}</td>
                                        <td class="py-4 px-5 font-bold text-slate-800 uppercase tracking-wide">
                                            {{ $item->nama }}
                                        </td>
                                        <td class="py-4 px-5 text-slate-700 max-w-md leading-relaxed">
                                            {{ $item->judul }}
                                        </td>
                                        <td class="py-4 px-5">
                                            <span
                                                class="inline-block px-2.5 py-1 text-[10px] font-semibold bg-blue-50 text-blue-600 border border-blue-200/60 rounded-md">
                                                {{ $item->topik }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-5 text-right">
                                            <form action="{{ route('arsip.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin hapus arsip ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-rose-500 hover:text-rose-700 font-semibold text-xs cursor-pointer">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-8 text-center text-slate-400 text-xs">Belum ada
                                            data arsip judul yang tersimpan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Footer Info Bar -->
                    <div
                        class="px-6 py-4 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                        <div>Menampilkan {{ $arsips->count() }} Data Arsip Judul</div>
                        <div class="font-medium text-blue-600">Akses Pengelola (Gugus TA)</div>
                    </div>

                </div>

            </main>
        </div>

    </div>

</body>

</html>
