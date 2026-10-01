<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Mahasiswa - SIPETA</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 font-sans">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex">
            <div>
                <div class="h-16 flex items-center px-6 bg-slate-950 text-white font-bold text-xl tracking-wider">
                    🎓 SIPETA
                </div>
                <nav class="mt-6 px-4 space-y-1">
                    <a href="#"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-slate-800 text-slate-400">Dashboard</a>
                    <a href="#"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-slate-800 text-slate-400">Verifikasi
                        Proposal</a>
                    <a href="#"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-slate-800 text-slate-400">Kelola
                        Bank Topik</a>
                    <a href="#"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg bg-blue-600 text-white shadow-md">Data
                        Mahasiswa</a>
                    <a href="#"
                        class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg hover:bg-slate-800 text-slate-400">Ploting
                        Dospem</a>
                </nav>
            </div>
            <div class="p-4 text-xs text-slate-500 text-center">
                Gugus TA POV &copy; 2026
            </div>
        </aside>

        <!-- MAIN CONTENT CONTAINER -->
        <div class="flex-1 flex flex-col overflow-y-auto">

            <!-- TOP NAVBAR -->
            <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shadow-xs">
                <h1 class="text-lg font-semibold text-slate-800">Sistem Informasi Proposal dan Tugas Akhir (SIPETA)</h1>
                <div class="flex items-center gap-3">
                    <span class="text-sm font-medium text-slate-600">Admin Gugus TA</span>
                    <div
                        class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-sm">
                        AG</div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <main class="p-8">

                @if (session('success'))
                    <div
                        class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm flex items-center shadow-xs">
                        <span>✨ {{ session('success') }}</span>
                    </div>
                @endif

                <!-- HEADER SECTION -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">Kelola Data Mahasiswa</h2>
                        <p class="text-sm text-slate-500">Pusat data akun mahasiswa untuk akses sistem proposal tugas
                            akhir.</p>
                    </div>

                    <!-- Form Import CSV -->
                    <div class="flex items-center gap-3">
                        <form action="/gugus-ta/mahasiswa/import" method="POST" enctype="multipart/form-data"
                            class="flex items-center gap-2 bg-white px-3 py-1.5 border border-slate-300 rounded-xl shadow-xs">
                            @csrf
                            <input type="file" name="file_excel" accept=".csv" required
                                class="text-xs text-slate-500 file:mr-2 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                            <button type="submit"
                                class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-medium px-3 py-1.5 rounded-lg transition-colors">Import
                                CSV</button>
                        </form>
                    </div>
                </div>

                <!-- CARD FORM TAMBAH MANUAL & TABEL -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- Kolom Kiri: Form Tambah Manual (HANYA SEMESTER 5 & 6) -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs h-fit">
                        <h3 class="text-base font-semibold text-slate-800 mb-4 pb-2 border-b border-slate-100">Tambah
                            Mahasiswa Manual</h3>
                        <form action="/gugus-ta/mahasiswa" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">NIM Mahasiswa</label>
                                <input type="text" name="nim" placeholder="Contoh: 2501301052" required
                                    class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Nama Lengkap</label>
                                <input type="text" name="name" placeholder="Contoh: Muhammad Ali Yafi" required
                                    class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-600 mb-1">Semester</label>
                                <select name="semester" required
                                    class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                    <option value="Semester 5">Semester 5</option>
                                    <option value="Semester 6">Semester 6</option>
                                </select>
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2.5 rounded-xl transition-colors shadow-sm">
                                + Simpan Mahasiswa
                            </button>
                        </form>
                    </div>

                    <!-- Kolom Kanan: Tabel Daftar Mahasiswa dengan Filter AUTO-SUBMIT & Search -->
                    <div
                        class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden flex flex-col">

                        <div
                            class="px-6 py-4 border-b border-slate-100 bg-slate-50/50 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                            <h3 class="text-base font-semibold text-slate-800">Daftar Mahasiswa</h3>

                            <!-- Form Pencarian & Filter Semester -->
                            <form action="/gugus-ta/mahasiswa" method="GET" class="flex items-center gap-2">
                                <!-- Ditambah onchange="this.form.submit()" biar otomatis ke-filter pas dipilih -->
                                <select name="semester" onchange="this.form.submit()"
                                    class="px-3 py-1.5 text-xs rounded-xl border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                    <option value="">Semua Semester</option>
                                    <option value="Semester 5"
                                        {{ request('semester') == 'Semester 5' ? 'selected' : '' }}>Semester 5</option>
                                    <option value="Semester 6"
                                        {{ request('semester') == 'Semester 6' ? 'selected' : '' }}>Semester 6</option>
                                </select>

                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari nama / NIM..."
                                    class="px-3 py-1.5 text-xs rounded-xl border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 w-40 md:w-48">

                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium px-3 py-1.5 rounded-xl transition-colors">Cari</button>

                                @if (request('search') || request('semester'))
                                    <a href="/gugus-ta/mahasiswa"
                                        class="text-xs text-rose-600 hover:underline">Reset</a>
                                @endif
                            </form>
                        </div>

                        <div class="overflow-x-auto flex-1">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider border-b border-slate-200">
                                        <th class="py-3 px-6 font-semibold">No</th>
                                        <th class="py-3 px-6 font-semibold">NIM</th>
                                        <th class="py-3 px-6 font-semibold">Nama Mahasiswa</th>
                                        <th class="py-3 px-6 font-semibold">Semester</th>
                                        <th class="py-3 px-6 font-semibold text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                                    @forelse($mahasiswa as $index => $mhs)
                                        <tr class="hover:bg-slate-50/50 transition-colors">
                                            <td class="py-3.5 px-6 font-medium text-slate-400">{{ $index + 1 }}</td>
                                            <td class="py-3.5 px-6 font-mono text-slate-600">{{ $mhs->nim }}</td>
                                            <td class="py-3.5 px-6 font-medium text-slate-800">{{ $mhs->name }}</td>
                                            <td class="py-3.5 px-6 text-slate-500 text-xs font-medium">
                                                @if ($mhs->semester)
                                                    <span
                                                        class="px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">
                                                        {{ $mhs->semester }}
                                                    </span>
                                                @else
                                                    <span class="text-slate-300">-</span>
                                                @endif
                                            </td>
                                            <td class="py-3.5 px-6 text-center flex items-center justify-center gap-2">
                                                <a href="/gugus-ta/mahasiswa/{{ $mhs->id }}/edit"
                                                    class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                                    title="Edit">
                                                    ✏️
                                                </a>
                                                <form action="/gugus-ta/mahasiswa/{{ $mhs->id }}" method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?')"
                                                    class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="p-1.5 text-rose-600 hover:bg-rose-50 rounded-lg transition-colors"
                                                        title="Hapus">
                                                        🗑️
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="py-8 text-center text-slate-400 text-sm">Tidak
                                                ada data mahasiswa yang cocok dengan pencarian.</td>
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
