<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Mahasiswa - SIPETA</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50/50 font-sans text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside
            class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex border-r border-slate-800">
            <div>
                <div
                    class="h-16 flex items-center px-6 bg-slate-950/50 border-b border-slate-800/80 text-white font-semibold tracking-wide">
                    <span class="text-blue-500 mr-2">🎓</span> SIPETA
                </div>
                <nav class="mt-6 px-3 space-y-1">
                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Dashboard</a>
                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Verifikasi
                        Proposal</a>
                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Kelola
                        Bank Topik</a>
                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg bg-blue-600/10 text-blue-400 font-semibold border border-blue-500/20">Data
                        Mahasiswa</a>
                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">Ploting
                        Dospem</a>
                </nav>
            </div>
            <div class="p-4 text-xs text-slate-500 border-t border-slate-800/60 text-center font-mono">
                Gugus TA POV &copy; 2026
            </div>
        </aside>

        <!-- MAIN CONTENT CONTAINER -->
        <div class="flex-1 flex flex-col overflow-y-auto">

            <!-- TOP NAVBAR -->
            <header
                class="h-16 bg-white border-b border-slate-200/80 flex items-center justify-between px-8 sticky top-0 z-10">
                <h1 class="text-sm font-medium text-slate-600">Sistem Informasi Proposal dan Tugas Akhir</h1>
                <div class="flex items-center gap-3">
                    <span
                        class="text-xs font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200">Admin
                        Gugus TA</span>
                    <div
                        class="w-8 h-8 rounded-full bg-blue-900 text-white flex items-center justify-center font-semibold text-xs tracking-wider">
                        AG</div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <main class="p-8 max-w-7xl w-full mx-auto">

                @if (session('success'))
                    <div
                        class="mb-6 p-4 bg-emerald-50/80 border border-emerald-200/60 text-emerald-800 rounded-xl text-sm flex items-center gap-2 shadow-sm">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <!-- HEADER SECTION -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900 tracking-tight">Kelola Data Mahasiswa</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Pusat kelola akun dan hak akses mahasiswa tugas akhir.
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-2.5">
                        <!-- Form Hapus Semua (Ghost Red Style) -->
                        <form action="/gugus-ta/mahasiswa-delete-all" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus SELUA data mahasiswa?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1.5 text-xs font-medium text-rose-600 hover:text-rose-700 bg-rose-50 hover:bg-rose-100/80 border border-rose-200/60 rounded-lg transition-colors flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Bersihkan Data
                            </button>
                        </form>

                        <!-- Form Import CSV (Subtle Border Style) -->
                        <form action="/gugus-ta/mahasiswa/import" method="POST" enctype="multipart/form-data"
                            class="flex items-center gap-2 bg-white p-1 border border-slate-200 rounded-lg shadow-sm">
                            @csrf
                            <input type="file" name="file_excel" accept=".csv" required
                                class="text-xs text-slate-500 file:mr-2 file:py-1 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-medium file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200 cursor-pointer">
                            <button type="submit"
                                class="bg-slate-900 hover:bg-slate-800 text-white text-xs font-medium px-3 py-1.5 rounded-md transition-colors flex items-center gap-1">
                                Import CSV
                            </button>
                        </form>
                    </div>
                </div>

                <!-- CARD FORM TAMBAH MANUAL & TABEL -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

                    <!-- Kolom Kiri: Form Tambah Manual -->
                    <div class="bg-white p-6 rounded-xl border border-slate-200/80 shadow-sm">
                        <h3
                            class="text-sm font-semibold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center justify-between">
                            Tambah Mahasiswa
                            <span class="text-[10px] font-normal text-slate-400 uppercase tracking-wider">Manual</span>
                        </h3>
                        <form action="/gugus-ta/mahasiswa" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">NIM Mahasiswa</label>
                                <input type="text" name="nim" placeholder="Contoh: 2501301052" required
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all placeholder:text-slate-400">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Nama Lengkap</label>
                                <input type="text" name="name" placeholder="Contoh: Muhammad Ali Yafi" required
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all placeholder:text-slate-400">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Semester</label>
                                <select name="semester" required
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 bg-white transition-all text-slate-700">
                                    <option value="Semester 5">Semester 5</option>
                                    <option value="Semester 6">Semester 6</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium py-2.5 rounded-lg transition-colors shadow-sm">
                                + Simpan Mahasiswa
                            </button>
                        </form>
                    </div>

                    <!-- Kolom Kanan: Tabel Daftar Mahasiswa -->
                    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200/80 shadow-sm overflow-hidden">

                        <!-- Filter & Search Bar -->
                        <div
                            class="px-5 py-3.5 border-b border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <span class="text-xs font-semibold text-slate-700 uppercase tracking-wider">Daftar
                                Mahasiswa</span>

                            <form action="/gugus-ta/mahasiswa" method="GET" class="flex items-center gap-2">
                                <select name="semester" onchange="this.form.submit()"
                                    class="px-2.5 py-1.5 text-xs rounded-lg border border-slate-200 bg-white text-slate-600 focus:outline-none focus:border-slate-400 cursor-pointer">
                                    <option value="">Semua Semester</option>
                                    <option value="Semester 5"
                                        {{ request('semester') == 'Semester 5' ? 'selected' : '' }}>Semester 5</option>
                                    <option value="Semester 6"
                                        {{ request('semester') == 'Semester 6' ? 'selected' : '' }}>Semester 6</option>
                                </select>

                                <div class="relative">
                                    <input type="text" name="search" value="{{ request('search') }}"
                                        placeholder="Cari NIM / Nama..."
                                        class="px-3 py-1.5 text-xs rounded-lg border border-slate-200 bg-white focus:outline-none focus:border-slate-400 w-36 sm:w-44 placeholder:text-slate-400">
                                </div>

                                <button type="submit"
                                    class="bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200 text-xs font-medium px-3 py-1.5 rounded-lg transition-colors">Cari</button>

                                @if (request('search') || request('semester'))
                                    <a href="/gugus-ta/mahasiswa"
                                        class="text-xs text-slate-400 hover:text-slate-600 px-1">Reset</a>
                                @endif
                            </form>
                        </div>

                        <!-- Table Area -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="bg-slate-50/80 text-slate-400 text-[11px] font-semibold uppercase tracking-wider border-b border-slate-100">
                                        <th class="py-3 px-5 w-12 text-center">No</th>
                                        <th class="py-3 px-5">NIM</th>
                                        <th class="py-3 px-5">Nama Mahasiswa</th>
                                        <th class="py-3 px-5">Semester</th>
                                        <th class="py-3 px-5 text-center w-24">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                                    @forelse($mahasiswa as $index => $mhs)
                                        <tr class="hover:bg-slate-50/60 transition-colors">
                                            <td class="py-3 px-5 text-center text-slate-400 font-mono">
                                                {{ $index + 1 }}</td>
                                            <td class="py-3 px-5 font-mono text-slate-700 font-medium">
                                                {{ $mhs->nim }}</td>
                                            <td class="py-3 px-5 font-medium text-slate-900">{{ $mhs->name }}</td>
                                            <td class="py-3 px-5">
                                                @if ($mhs->semester)
                                                    <span
                                                        class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-slate-100 text-slate-600 border border-slate-200/60">
                                                        {{ $mhs->semester }}
                                                    </span>
                                                @else
                                                    <span class="text-slate-300">-</span>
                                                @endif
                                            </td>
                                            <td class="py-3 px-5 text-center">
                                                <div class="flex items-center justify-center gap-1">
                                                    <a href="/gugus-ta/mahasiswa/{{ $mhs->id }}/edit"
                                                        class="p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-colors"
                                                        title="Edit Data">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                    </a>
                                                    <form action="/gugus-ta/mahasiswa/{{ $mhs->id }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Hapus data mahasiswa ini?')"
                                                        class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition-colors"
                                                            title="Hapus Data">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-10 text-center text-slate-400 text-xs">
                                                Belum ada data mahasiswa terdaftar.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </main>
        </div>

    </div>

</body>

</html>
