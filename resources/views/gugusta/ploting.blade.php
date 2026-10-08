<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ploting Dospem - SIPETA</title>
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
                    <a href="{{ route('gugusta.dashboard') ?? '#' }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Dashboard
                    </a>
                    <a href="{{ route('gugusta.verifikasi') ?? '#' }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Verifikasi Proposal
                    </a>
                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Kelola Bank Topik
                    </a>
                    <a href="/gugus-ta/mahasiswa"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Data Mahasiswa
                    </a>
                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Data Dosen
                    </a>
                    <!-- Menu Ploting Dospem Aktif -->
                    <a href="{{ route('gugusta.ploting') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg bg-blue-600/10 text-blue-400 font-semibold border border-blue-500/20">
                        Ploting Dospem
                    </a>
                    <a href="#"
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
                    <!-- Tombol Profile (Yang bisa diklik) -->
                    <button id="profileBtn"
                        class="flex items-center gap-3 focus:outline-none hover:bg-slate-50 p-1.5 rounded-lg transition-colors cursor-pointer">
                        <span
                            class="text-xs font-semibold text-slate-600 bg-slate-100 px-2.5 py-1 rounded-md border border-slate-200">Admin
                            Gugus TA</span>
                        <div
                            class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold text-xs tracking-wider shadow-sm">
                            AG</div>
                    </button>

                    <!-- Kotak Dropdown Menu (Awalnya disembunyikan pakai class 'hidden') -->
                    <div id="profileDropdown"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl border border-slate-200/80 shadow-lg py-1.5 z-50">

                        <!-- Info Akun Singkat -->
                        <div class="px-4 py-2.5 border-b border-slate-100">
                            <p class="text-xs font-semibold text-slate-800">Admin Gugus TA</p>
                            <p class="text-[10px] text-slate-500">admin@politala.ac.id</p>
                        </div>

                        <!-- Tombol Switch Role -->
                        <button type="button" id="btnGantiRole"
                            class="w-full text-left px-4 py-2 text-xs text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors flex items-center gap-2 mt-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Ganti Role
                        </button>

                        <!-- Tombol Logout -->
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

                <!-- HEADER SECTION -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900 tracking-tight">Kelola Ploting Dosen Pembimbing</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Atur dan tetapkan dosen pembimbing untuk mahasiswa
                            tugas akhir.</p>
                    </div>
                </div>

                <!-- CARD FORM TAMBAH & TABEL -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

                    <!-- Kolom Kiri: Form Ploting (Masih Pakai Data Dummy) -->
                    <div class="bg-white p-6 rounded-xl border border-slate-200/80 shadow-sm">
                        <h3
                            class="text-sm font-semibold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center justify-between">
                            Form Ploting Dospem
                            <span class="text-[10px] font-normal text-slate-400 uppercase tracking-wider">Manual</span>
                        </h3>
                        <form action="#" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Pilih Mahasiswa</label>
                                <select name="mahasiswa_id"
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 bg-white text-slate-700 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all cursor-pointer">
                                    <option value="">-- Pilih Mahasiswa --</option>

                                    <!-- Ini Looping Data Asli dari Database -->
                                    @foreach ($mahasiswas as $mhs)
                                        <option value="{{ $mhs->id }}">{{ $mhs->nim }} - {{ $mhs->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Dosen Pembimbing
                                    1</label>
                                <select name="dospem1_id"
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 bg-white text-slate-700 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all cursor-pointer">
                                    <option value="">-- Pilih Pembimbing 1 --</option>
                                    <option value="1">Nina Mia Aristi, M.Kom</option>
                                    <option value="2">Sausan Hidayah Nova, S.Kom,
                                        M.Kom</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-slate-700 mb-1.5">Dosen Pembimbing
                                    2</label>
                                <select name="dospem2_id"
                                    class="w-full px-3 py-2 text-xs rounded-lg border border-slate-200 bg-white text-slate-700 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all cursor-pointer">
                                    <option value="">-- Pilih Pembimbing 2 --</option>
                                    <option value="3">Nina Mia Aristi, M.Kom</option>
                                    <option value="4">Sausan Hidayah Nova, S.Kom,
                                        M.Kom</option>
                                </select>
                            </div>
                            <button type="button"
                                onclick="alert('Fitur simpan masih menunggu database dari temen lu kelar bro! wkwk')"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium py-2.5 rounded-lg transition-colors shadow-sm mt-2">
                                + Simpan Ploting
                            </button>
                        </form>
                    </div>

                    <!-- Kolom Kanan: Tabel Daftar Ploting -->
                    <div
                        class="lg:col-span-2 bg-white rounded-xl border border-slate-200/80 shadow-sm overflow-hidden">
                        <div
                            class="px-5 py-3.5 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between">
                            <span class="text-xs font-semibold text-slate-700 uppercase tracking-wider">Daftar Ploting
                                Aktif</span>
                            <input type="text" placeholder="Cari mahasiswa / dosen..."
                                class="px-3 py-1.5 text-xs rounded-lg border border-slate-200 bg-white focus:outline-none focus:border-slate-400 w-44 placeholder:text-slate-400">
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="bg-slate-50/80 text-slate-400 text-[11px] font-semibold uppercase tracking-wider border-b border-slate-100">
                                        <th class="py-3 px-4 w-10 text-center">No</th>
                                        <th class="py-3 px-5">Mahasiswa</th>
                                        <th class="py-3 px-5">Dospem 1</th>
                                        <th class="py-3 px-5">Dospem 2</th>
                                        <th class="py-3 px-5 text-center">Status</th>
                                        <th class="py-3 px-5 text-center w-24">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-xs text-slate-600">
                                    <!-- Baris Dummy 1 -->
                                    <tr class="hover:bg-slate-50/60 transition-colors">
                                        <td class="py-3 px-4 text-center text-slate-400 font-mono">1</td>
                                        <td class="py-3 px-5">
                                            <div class="font-medium text-slate-900">Muhammad Ali Yafi</div>
                                            <div class="text-[10px] text-slate-400 font-mono">2501301024</div>
                                        </td>
                                        <td class="py-3 px-5 font-medium text-slate-700">Nina Mia Aristi, M.Kom</td>
                                        <td class="py-3 px-5 font-medium text-slate-700">Sausan Hidayah Nova, S.Kom,
                                            M.Kom</td>
                                        <td class="py-3 px-5 text-center">
                                            <span
                                                class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-emerald-50 text-emerald-600 border border-emerald-200/60">
                                                Disetujui
                                            </span>
                                        </td>
                                        <td class="py-3 px-5 text-center">
                                            <button
                                                class="p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-colors"
                                                title="Edit Data">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Baris Dummy 2 -->
                                    <tr class="hover:bg-slate-50/60 transition-colors">
                                        <td class="py-3 px-4 text-center text-slate-400 font-mono">2</td>
                                        <td class="py-3 px-5">
                                            <div class="font-medium text-slate-900">Arif</div>
                                            <div class="text-[10px] text-slate-400 font-mono">2501302076</div>
                                        </td>
                                        <td class="py-3 px-5 font-medium text-slate-700">Nina Mia Aristi, M.Kom</td>
                                        <td class="py-3 px-5 font-medium text-slate-700">Sausan Hidayah Nova, S.Kom,
                                            M.Kom</td>
                                        <td class="py-3 px-5 text-center">
                                            <span
                                                class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-amber-50 text-amber-600 border border-amber-200/60">
                                                Menunggu
                                            </span>
                                        </td>
                                        <td class="py-3 px-5 text-center">
                                            <button
                                                class="p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-colors"
                                                title="Edit Data">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
</body>

<!-- MODAL GANTI ROLE -->
<div id="modalRole" class="hidden fixed inset-0 z-[100] flex items-center justify-center">
    <!-- Background gelap nge-blur -->
    <div id="modalOverlay"
        class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm cursor-pointer transition-opacity"></div>

    <!-- Kotak Modal Tengah -->
    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-sm overflow-hidden p-6">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-base font-bold text-slate-900">Pilih Hak Akses</h3>
            <button type="button" id="closeModalRole" class="text-slate-400 hover:text-rose-500 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>

        <div class="space-y-3">
            <!-- Opsi 1: Gugus TA (Lagi dipakai) -->
            <button
                class="w-full flex items-center justify-between p-3 rounded-xl border-2 border-blue-500 bg-blue-50 text-left transition-colors cursor-default">
                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow-sm">
                        AG</div>
                    <div>
                        <div class="text-sm font-semibold text-blue-900">Admin Gugus TA</div>
                        <div class="text-[10px] font-medium text-blue-600 uppercase tracking-wider">Sedang Aktif</div>
                    </div>
                </div>
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </button>

            <!-- Opsi 2: Dosen Pembimbing -->
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

            <!-- Opsi 3: Koordinator Prodi -->
            <button
                class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200 hover:border-slate-300 hover:bg-slate-50 text-left transition-all group"
                onclick="alert('Sabar, nunggu persetujuan Koorprodi beneran! wkwk')">
                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700 flex items-center justify-center font-bold text-xs transition-colors">
                        KP</div>
                    <div>
                        <div class="text-sm font-medium text-slate-700 group-hover:text-slate-900">Koordinator Prodi
                        </div>
                        <div class="text-[10px] text-slate-400">Akses Penuh Akademik</div>
                    </div>
                </div>
            </button>
        </div>
    </div>
</div>
<!-- SCRIPT UNTUK DROPDOWN PROFIL -->
<script>
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    // Kalau tombol 'AG' diklik, buka/tutup menunya
    profileBtn.addEventListener('click', (event) => {
        event.stopPropagation(); // Biar kliknya nggak bocor ke body
        profileDropdown.classList.toggle('hidden');
    });

    // Kalau user ngeklik layar di luar kotak menu, tutup otomatis menunya
    document.addEventListener('click', (event) => {
        if (!profileDropdown.contains(event.target) && !profileDropdown.classList.contains('hidden')) {
            profileDropdown.classList.add('hidden');
        }
    });

    // --- LOGIKA UNTUK MODAL GANTI ROLE ---
    const btnGantiRole = document.getElementById('btnGantiRole');
    const modalRole = document.getElementById('modalRole');
    const closeModalRole = document.getElementById('closeModalRole');
    const modalOverlay = document.getElementById('modalOverlay');

    // 1. Kalau tombol "Ganti Role" diklik
    btnGantiRole.addEventListener('click', () => {
        profileDropdown.classList.add('hidden'); // Tutup dulu dropdown kecilnya
        modalRole.classList.remove('hidden'); // Munculin pop-up gede di tengah layar
    });

    // 2. Fungsi buat nutup Modal
    const tutupModalRole = () => {
        modalRole.classList.add('hidden');
    };

    // 3. Pasang fungsi nutup kalau tombol silang (X) atau background gelapnya diklik
    closeModalRole.addEventListener('click', tutupModalRole);
    modalOverlay.addEventListener('click', tutupModalRole);
</script>


</html>
