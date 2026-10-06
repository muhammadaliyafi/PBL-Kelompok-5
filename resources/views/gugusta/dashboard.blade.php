<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Gugus TA - SIPETA</title>
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
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg bg-blue-600/10 text-blue-400 font-semibold border border-blue-500/20">
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

                    <!-- TAMBAHAN: Data Dosen -->
                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Data Dosen
                    </a>

                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Ploting Dospem
                    </a>

                    <!-- TAMBAHAN: Arsip Judul -->
                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Arsip Judul
                    </a>
                </nav>

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
                        class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold text-xs tracking-wider">
                        AG</div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <main class="p-8 max-w-7xl w-full mx-auto">

                <!-- Banner Selamat Datang -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6 flex justify-between items-center">
                    <div>
                        <h1 class="text-xl font-bold text-slate-800">Selamat Datang, Admin Gugus TA</h1>
                        <p class="text-sm text-slate-500 mt-1">Pusat kendali, monitoring, dan manajemen sistem informasi
                            proposal tugas akhir (SIPETA).</p>
                    </div>
                    <div class="hidden md:flex items-center space-x-3">
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-semibold rounded-full">Role: Gugus
                            TA</span>
                    </div>
                </div>

                <!-- Grid Statistik, Alur Proses, dan Aksi Cepat -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

                    <!-- Statistik Global Prodi -->
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wider mb-4">Statistik Global
                            Prodi</h2>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-500">Total Mahasiswa</span>
                                <span class="font-bold text-slate-800">0</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-500">Total Dosen</span>
                                <span class="font-bold text-slate-800">0</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-500">Topik Tersedia</span>
                                <span class="font-bold text-slate-800">5</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-500">Arsip Judul</span>
                                <span class="font-bold text-slate-800">125</span>
                            </div>
                        </div>
                    </div>

                    <!-- Proses Masuk / Alur -->
                    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wider mb-4">Proses Masuk
                            (Verifikasi)</h2>
                        <div class="space-y-3 text-sm">
                            <div class="flex items-center space-x-3 text-slate-600">
                                <span
                                    class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">1</span>
                                <span>Validasi Pengajuan Mahasiswa</span>
                            </div>
                            <div class="flex items-center space-x-3 text-slate-600">
                                <span
                                    class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">2</span>
                                <span>Plotting Dosen Pembimbing</span>
                            </div>
                            <div class="flex items-center space-x-3 text-slate-600">
                                <span
                                    class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">3</span>
                                <span>Pengecekan Arsip & ACC Final</span>
                            </div>
                        </div>
                    </div>

                    <!-- Aksi Cepat -->
                    <div class="bg-white rounded-xl border border-slate-200/80 shadow-sm p-6 flex flex-col h-full">
                        <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wider mb-5">Aksi Cepat</h2>

                        <div class="space-y-3 mt-auto">
                            <a href="{{ route('gugusta.verifikasi') }}"
                                class="flex items-center justify-center w-full px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-lg transition-colors shadow-sm">
                                Verifikasi Proposal Masuk
                            </a>
                            <a href="#"
                                class="flex items-center justify-center w-full px-4 py-2.5 bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-medium rounded-lg transition-colors">
                                Ploting Dosen Pembimbing
                            </a>
                            <a href="{{ url('/gugus-ta/mahasiswa') }}"
                                class="flex items-center justify-center w-full px-4 py-2.5 bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-700 text-xs font-medium rounded-lg transition-colors">
                                Kelola Data Mahasiswa
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Tracking Proposal Mahasiswa -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-5">
                    <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wider mb-4">Tracking Proposal
                        Mahasiswa</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="border-b border-slate-200 text-slate-400 font-medium">
                                    <th class="py-3 px-4">Nama Mahasiswa</th>
                                    <th class="py-3 px-4">Topik / Judul Pilihan</th>
                                    <th class="py-3 px-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-600">
                                <tr>
                                    <td class="py-3 px-4 font-medium text-slate-800">Aditya Pratama</td>
                                    <td class="py-3 px-4">Internet of Things (IoT) Sensor Suhu</td>
                                    <td class="py-3 px-4"><span
                                            class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-xs font-semibold rounded-full">Disetujui</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 font-medium text-slate-800">Citra Lestari</td>
                                    <td class="py-3 px-4">Pengembangan Game Edukasi</td>
                                    <td class="py-3 px-4"><span
                                            class="px-2.5 py-1 bg-amber-50 text-amber-600 text-xs font-semibold rounded-full">Menunggu</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>

    </div>

</body>

</html>
