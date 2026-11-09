<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Bank Topik - SIPETA</title>
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

                    <!-- Verifikasi Proposal -->
                    <a href="{{ route('gugusta.verifikasi') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-2xl text-slate-200 hover:bg-slate-800/60 transition-all">
                        <svg class="w-5 h-5 stroke-[2]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Verifikasi Proposal</span>
                    </a>

                    <!-- Kelola Bank Topik (Active) -->
                    <a href="{{ route('topik.index') }}"
                        class="flex items-center gap-3 px-4 py-3 text-sm font-bold rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-600/30 transition-all">
                        <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
            <main class="p-8 max-w-7xl w-full mx-auto">

                <div class="mb-6">
                    <h1 class="text-xl font-bold text-slate-800">Kelola Bank Topik</h1>
                    <p class="text-sm text-slate-500 mt-1">Kelola daftar rekomendasi topik Tugas Akhir untuk mahasiswa
                        prodi.</p>
                </div>

                @if (session('success'))
                    <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- FORM TAMBAH TOPIK -->
                    <div class="bg-white rounded-xl border border-slate-200/80 shadow-sm p-6 h-fit">
                        <h2 class="text-sm font-bold text-slate-800 mb-4 pb-3 border-b border-slate-100">Tambah Topik
                            Baru</h2>
                        <form action="{{ route('topik.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Kode Topik</label>
                                <input type="text" name="kode_topik" placeholder="Contoh: TP-01" required
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Nama Topik</label>
                                <input type="text" name="nama_topik"
                                    placeholder="Contoh: Internet of Things (IoT)" required
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 transition-all">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Deskripsi
                                    Singkat</label>
                                <textarea name="deskripsi" rows="3" placeholder="Penjelasan bidang atau lingkup topik..."
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 transition-all"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg transition-colors shadow-sm">
                                + Simpan Topik
                            </button>
                        </form>
                    </div>

                    <!-- DAFTAR TOPIK TABLE -->
                    <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200/80 shadow-sm p-6">
                        <h2 class="text-sm font-bold text-slate-800 mb-4">Daftar Bank Topik</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse text-sm">
                                <thead>
                                    <tr class="border-b border-slate-200 text-slate-400 font-medium text-xs">
                                        <th class="py-3 px-3">KODE</th>
                                        <th class="py-3 px-3">NAMA TOPIK</th>
                                        <th class="py-3 px-3">STATUS</th>
                                        <th class="py-3 px-3 text-right">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-600 text-xs">
                                    @forelse($topiks as $item)
                                        <tr>
                                            <td class="py-3.5 px-3 font-semibold text-slate-800">
                                                {{ $item->kode_topik }}
                                            </td>
                                            <td class="py-3.5 px-3">
                                                <div class="font-medium text-slate-800">{{ $item->nama_topik }}</div>
                                                <div class="text-[11px] text-slate-400 mt-0.5">
                                                    {{ $item->deskripsi ?? 'Tidak ada deskripsi' }}</div>
                                            </td>
                                            <td class="py-3.5 px-3">
                                                <span
                                                    class="px-2.5 py-1 text-[10px] font-semibold rounded-full {{ $item->status == 'Aktif' ? 'bg-emerald-50 text-emerald-600' : 'bg-slate-100 text-slate-500' }}">
                                                    {{ $item->status }}
                                                </span>
                                            </td>
                                            <td class="py-3.5 px-3 text-right">
                                                <form action="{{ route('topik.destroy', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Yakin hapus topik ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-rose-500 hover:text-rose-700 font-medium text-xs">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="py-6 text-center text-slate-400 text-xs">Belum
                                                ada
                                                data topik yang ditambahkan.</td>
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

    <!-- MODAL GANTI ROLE -->
    <div id="modalRole" class="hidden fixed inset-0 z-[100] flex items-center justify-center">
        <!-- Background gelap nge-blur -->
        <div id="modalOverlay"
            class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm cursor-pointer transition-opacity"></div>

        <!-- Kotak Modal Tengah -->
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

    <!-- SCRIPT UNTUK DROPDOWN PROFIL & MODAL ROLE -->
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
