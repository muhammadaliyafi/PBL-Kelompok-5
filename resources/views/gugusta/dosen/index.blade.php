<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Dosen - SIPETA</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50/50 font-sans text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside
            class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex border-r border-slate-800">
            <div>
                <!-- Logo & Brand -->
                <div
                    class="h-16 flex items-center px-6 bg-slate-950/50 border-b border-slate-800/80 text-white font-semibold tracking-wide">
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

                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Kelola Bank Topik
                    </a>

                    <a href="{{ url('/gugus-ta/mahasiswa') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Data Mahasiswa
                    </a>

                    <!-- ACTIVE: Data Dosen -->
                    <a href="{{ url('/gugus-ta/dosen') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg bg-blue-600/10 text-blue-400 font-semibold border border-blue-500/20">
                        Data Dosen
                    </a>

                    <a href="/gugus-ta/ploting"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Ploting Dospem
                    </a>

                    <a href="{{ route('arsip.index') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Arsip Judul
                    </a>
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

                @if (session('error'))
                    <div
                        class="mb-6 p-4 bg-rose-50/80 border border-rose-200/60 text-rose-800 rounded-xl text-sm flex items-center gap-2 shadow-sm">
                        <span>⚠️ {{ session('error') }}</span>
                    </div>
                @endif

                <!-- HEADER SECTION -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900 tracking-tight">Kelola Data Dosen</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Pusat kelola akun, NIP/NIDN, dan hak akses dosen tugas
                            akhir.</p>
                    </div>
                </div>

                <!-- CARD FORM TAMBAH MANUAL & TABEL -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

                    <!-- Kolom Kiri: Form Tambah Manual -->
                    <div class="bg-white p-6 rounded-xl border border-slate-200/80 shadow-sm">
                        <h3
                            class="text-sm font-semibold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center justify-between">
                            Tambah Dosen
                            <span class="text-[10px] font-normal text-slate-400 uppercase tracking-wider">Manual</span>
                        </h3>
                        <form action="{{ route('dosen.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">NIP Dosen</label>
                                <input type="text" name="nip" placeholder="Contoh: 198501012010121001" required
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all placeholder:text-slate-400">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Nama Lengkap &
                                    Gelar</label>
                                <input type="text" name="name" placeholder="Contoh: Dr. Ahmad Subagja, M.T."
                                    required
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all placeholder:text-slate-400">
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Bidang Keahlian /
                                    Program Studi</label>
                                <input type="text" name="keahlian" placeholder="Contoh: Rekayasa Perangkat Lunak"
                                    required
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all placeholder:text-slate-400">
                            </div>
                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium py-2.5 rounded-lg transition-colors shadow-sm">
                                + Simpan Dosen
                            </button>
                        </form>
                    </div>

                    <!-- Kolom Kanan: Tabel Daftar Dosen -->
                    <div
                        class="lg:col-span-2 bg-white rounded-xl border border-slate-200/80 shadow-sm overflow-hidden">

                        <!-- Filter & Search Bar -->
                        <div
                            class="px-5 py-3.5 border-b border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <span class="text-xs font-semibold text-slate-700 uppercase tracking-wider">Daftar
                                Dosen</span>

                            <form action="" method="GET" class="flex items-center gap-2">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari NIP / Nama..."
                                    class="px-3 py-1.5 text-xs rounded-lg border border-slate-200 bg-white focus:outline-none focus:border-slate-400 w-36 sm:w-44 placeholder:text-slate-400">

                                <button type="submit"
                                    class="bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200 text-xs font-medium px-3 py-1.5 rounded-lg transition-colors">Cari</button>

                                @if (request('search'))
                                    <a href="/gugus-ta/dosen"
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
                                        <th class="py-3 px-4 w-10 text-center">No</th>
                                        <th class="py-3 px-5">NIP / NIDN</th>
                                        <th class="py-3 px-5">Nama Dosen</th>
                                        <th class="py-3 px-5">Keahlian</th>
                                        <th class="py-3 px-5 text-center">Status</th>
                                        <th class="py-3 px-5 text-center w-24">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                                    @forelse($dosens as $index => $dosen)
                                        <tr class="hover:bg-slate-50/60 transition-colors">
                                            <td class="py-3 px-4 text-center text-slate-400 font-mono">
                                                {{ $index + 1 }}</td>
                                            <td class="py-3 px-5 font-mono text-slate-700 font-medium">
                                                {{ $dosen->nip }}</td>
                                            <td class="py-3 px-5 font-medium text-slate-900">{{ $dosen->name }}</td>
                                            <td class="py-3 px-5 text-slate-600">{{ $dosen->keahlian }}</td>
                                            <td class="py-3 px-5 text-center">
                                                <span
                                                    class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                                                    Aktif
                                                </span>
                                            </td>
                                            <td class="py-3 px-5 text-center">
                                                <div class="flex items-center justify-center gap-1">
                                                    <button type="button"
                                                        onclick="openEditModal('{{ $dosen->id }}', '{{ $dosen->nip }}', '{{ $dosen->name }}', '{{ $dosen->keahlian }}')"
                                                        class="p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-colors"
                                                        title="Edit Dosen">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                            </path>
                                                        </svg>
                                                    </button>

                                                    <form action="{{ route('dosen.destroy', $dosen->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus dosen ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition-colors"
                                                            title="Hapus Dosen">
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
                                            <td colspan="6" class="py-10 text-center text-slate-400 text-xs">
                                                Belum ada data dosen terdaftar.
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

    <!-- MODAL POP-UP EDIT DOSEN -->
    <div id="editModal"
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center z-[100] p-4">
        <div class="bg-white rounded-2xl p-6 max-w-md w-full shadow-xl relative">
            <div class="flex justify-between items-center mb-5 border-b border-slate-100 pb-3">
                <h3 class="text-base font-bold text-slate-900">Edit Data Dosen</h3>
                <button type="button" onclick="closeEditModal()"
                    class="text-slate-400 hover:text-rose-500 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1.5">NIP Dosen</label>
                    <input type="text" id="edit_nip" name="nip" required
                        class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1.5">Nama Lengkap & Gelar</label>
                    <input type="text" id="edit_name" name="name" required
                        class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all">
                </div>

                <div>
                    <label class="block text-xs font-medium text-slate-700 mb-1.5">Bidang Keahlian</label>
                    <input type="text" id="edit_keahlian" name="keahlian" required
                        class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all">
                </div>

                <div class="flex justify-end gap-2 pt-3 border-t border-slate-100 mt-5">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-slate-100 text-slate-600 text-xs font-medium rounded-lg hover:bg-slate-200 transition-colors">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm">Simpan
                        Perubahan</button>
                </div>
            </form>
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
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="space-y-3">
                <button
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
                </button>

                <button
                    class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200 hover:border-slate-300 hover:bg-slate-50 text-left transition-all group"
                    onclick="alert('Fitur backend ganti session belum jadi bro! wkwk')">
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
                </button>

                <button
                    class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200 hover:border-slate-300 hover:bg-slate-50 text-left transition-all group"
                    onclick="alert('Sabar, nunggu persetujuan Koorprodi beneran! wkwk')">
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
                </button>
            </div>
        </div>
    </div>

    <!-- SCRIPT INTERAKTIF -->
    <script>
        // Profile Dropdown
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        profileBtn.addEventListener('click', (event) => {
            event.stopPropagation();
            profileDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!profileDropdown.contains(event.target) && !profileDropdown.classList.contains('hidden')) {
                profileDropdown.classList.add('hidden');
            }
        });

        // Modal Role
        const btnGantiRole = document.getElementById('btnGantiRole');
        const modalRole = document.getElementById('modalRole');
        const closeModalRole = document.getElementById('closeModalRole');
        const modalOverlay = document.getElementById('modalOverlay');

        btnGantiRole.addEventListener('click', () => {
            profileDropdown.classList.add('hidden');
            modalRole.classList.remove('hidden');
        });

        const tutupModalRole = () => modalRole.classList.add('hidden');
        closeModalRole.addEventListener('click', tutupModalRole);
        modalOverlay.addEventListener('click', tutupModalRole);

        // Modal Edit Dosen
        function openEditModal(id, nip, name, keahlian) {
            document.getElementById('editForm').action = '/gugus-ta/dosen/' + id;
            document.getElementById('edit_nip').value = nip;
            document.getElementById('edit_name').value = name;
            document.getElementById('edit_keahlian').value = keahlian;

            const modal = document.getElementById('editModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>

</body>

</html>
