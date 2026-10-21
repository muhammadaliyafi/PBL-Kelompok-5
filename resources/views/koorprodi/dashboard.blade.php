<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koor Prodi (Supervisor Eksekutif) - SIPETA</title>

    <!-- CDN Tailwind CSS & Chart.js -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100/70 text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR KOORPRODI -->
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
                    <a href="{{ url('/koorprodi/dashboard') }}"
                        class="flex items-center px-3.5 py-2 text-sm font-semibold rounded-lg bg-blue-600/10 text-blue-400 border border-blue-500/20">
                        Dashboard & Laporan
                    </a>

                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Arsip & Pengajuan (Read-only)
                    </a>
                </nav>
            </div>

            <!-- Footer Sidebar -->
            <div class="p-4 text-xs text-slate-500 border-t border-slate-800/60 text-center font-mono">
                Koorprodi POV &copy; 2026
            </div>
        </aside>

        <!-- KONTEN UTAMA -->
        <div class="flex-1 flex flex-col overflow-y-auto">

            <!-- HEADER TOPBAR -->
            <header
                class="bg-white border-b border-slate-200 px-8 py-3.5 flex justify-between items-center sticky top-0 z-10">
                <span class="text-xs font-semibold text-slate-700">Sistem Informasi Proposal dan Tugas Akhir</span>

                <!-- User Profile & Dropdown Container -->
                <div class="relative">
                    <button id="profileBtn" type="button"
                        class="flex items-center gap-3 focus:outline-none hover:bg-slate-50 p-1 rounded-lg transition-colors cursor-pointer">
                        <span class="text-xs text-slate-500 font-medium">Koor Prodi (Supervisor Eksekutif)</span>
                        <div
                            class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-sm">
                            KP
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profileDropdown"
                        class="hidden absolute right-0 mt-2 w-52 bg-white rounded-xl border border-slate-200/80 shadow-lg py-1.5 z-50">
                        <div class="px-4 py-2.5 border-b border-slate-100">
                            <p class="text-xs font-semibold text-slate-800">Koordinator Prodi</p>
                            <p class="text-[10px] text-slate-500">koorprodi@politala.ac.id</p>
                        </div>

                        <button type="button" id="btnGantiRole"
                            class="w-full text-left px-4 py-2 text-xs text-slate-600 hover:bg-blue-50 hover:text-blue-600 transition-colors flex items-center gap-2 mt-1 cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Ganti Role
                        </button>

                        <form action="/logout" method="POST" class="block w-full">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 hover:text-rose-700 transition-colors flex items-center gap-2 cursor-pointer">
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

            <!-- ISI KONTEN -->
            <main class="p-8 space-y-6">

                <!-- JUDUL HALAMAN -->
                <div>
                    <h1 class="text-xl font-bold text-slate-900">Dashboard & Laporan (Halaman Utama)</h1>
                    <p class="text-xs text-slate-400 mt-0.5">Evaluasi Makro dan Pemantauan Tugas Akhir</p>
                </div>

                <!-- 4 CARD STATISTIK -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="text-xs font-medium text-slate-500">Total Mahasiswa TA</p>
                        <h3 class="text-2xl font-bold text-slate-900 mt-1">125</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="text-xs font-medium text-slate-500">Total Dosen Pembimbing</p>
                        <h3 class="text-2xl font-bold text-slate-900 mt-1">24</h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="text-xs font-medium text-slate-500">Rata-rata Beban Bimbingan</p>
                        <h3 class="text-2xl font-bold text-slate-900 mt-1">5.2 <span
                                class="text-sm font-semibold">mahasiswa</span></h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="text-xs font-medium text-slate-500">Topik Paling Diminati</p>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">IoT & Game Dev</h3>
                    </div>
                </div>

                <!-- SECTION CHART (DONUT & BAR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- CHART TREN TOPIK (DONUT) -->
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                        <h4 class="text-sm font-bold text-slate-800 mb-4">Tren Topik Tugas Akhir</h4>
                        <div class="w-full h-64 flex items-center justify-center">
                            <canvas id="topicChart"></canvas>
                        </div>
                    </div>

                    <!-- CHART PEMERATAAN BEBAN (BAR HORIZONTAL) -->
                    <div
                        class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                        <h4 class="text-sm font-bold text-slate-800 mb-4">Rekapitulasi Pemerataan Beban Bimbingan</h4>
                        <div class="w-full h-64">
                            <canvas id="loadChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- TABEL STATUS DISTRIBUSI MAHASISWA -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-100">
                        <h4 class="text-sm font-bold text-slate-800">Status Distribusi Mahasiswa</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-xs">
                            <thead>
                                <tr class="border-b border-slate-200 text-slate-500 font-bold bg-slate-50/50">
                                    <th class="py-3 px-5 w-12">No</th>
                                    <th class="py-3 px-5">NIP/NIDN</th>
                                    <th class="py-3 px-5">Nama Dosen</th>
                                    <th class="py-3 px-5">Keahlian</th>
                                    <th class="py-3 px-5">Sisa Kuota</th>
                                    <th class="py-3 px-5">Total Bimbingan</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-700">
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-3.5 px-5">1</td>
                                    <td class="py-3.5 px-5 font-mono text-slate-500">1998112222025062007</td>
                                    <td class="py-3.5 px-5 font-semibold text-slate-900">Nina Mia Aristi, M.Kom</td>
                                    <td class="py-3.5 px-5">Teknik Pengambilan Keputusan</td>
                                    <td class="py-3.5 px-5">60%</td>
                                    <td class="py-3.5 px-5 font-semibold">6</td>
                                </tr>
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-3.5 px-5">2</td>
                                    <td class="py-3.5 px-5 font-mono text-slate-500">199008262022032002</td>
                                    <td class="py-3.5 px-5 font-semibold text-slate-900">Sausan Hidayah, M.Kom</td>
                                    <td class="py-3.5 px-5">Rekayasa Perangkat Lunak</td>
                                    <td class="py-3.5 px-5">50%</td>
                                    <td class="py-3.5 px-5 font-semibold">7</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>

    </div>

    <!-- MODAL GANTI ROLE -->
    <div id="modalRole" class="hidden fixed inset-0 z-[100] flex items-center justify-center">
        <div id="modalOverlay"
            class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm cursor-pointer transition-opacity"></div>

        <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-sm overflow-hidden p-6 z-10">
            <div class="flex items-center justify-between mb-5">
                <h3 class="text-base font-bold text-slate-900">Pilih Hak Akses</h3>
                <button type="button" id="closeModalRole"
                    class="text-slate-400 hover:text-rose-500 transition-colors cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="space-y-3">
                <!-- Admin Gugus TA -->
                <a href="{{ url('/gugus-ta/dashboard') }}"
                    class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200 hover:border-slate-300 hover:bg-slate-50 text-left transition-all group">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 group-hover:bg-slate-200 group-hover:text-slate-700 flex items-center justify-center font-bold text-xs transition-colors">
                            AG</div>
                        <div>
                            <div class="text-sm font-medium text-slate-700 group-hover:text-slate-900">Admin Gugus TA
                            </div>
                            <div class="text-[10px] text-slate-400">Pusat Kendali Sistem</div>
                        </div>
                    </div>
                </a>

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
                            <div class="text-[10px] text-slate-400">Verifikasi & Pengajuan</div>
                        </div>
                    </div>
                </a>

                <!-- Koordinator Prodi (Aktif) -->
                <div
                    class="w-full flex items-center justify-between p-3 rounded-xl border-2 border-blue-500 bg-blue-50 text-left cursor-default">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow-sm">
                            KP</div>
                        <div>
                            <div class="text-sm font-semibold text-blue-900">Koordinator Prodi</div>
                            <div class="text-[10px] font-medium text-blue-600 uppercase tracking-wider">Sedang Aktif
                            </div>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT DROPDOWN, MODAL ROLE, & CHART.JS -->
    <script>
        // Dropdown Profile Toggle
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');

        if (profileBtn) {
            profileBtn.addEventListener('click', (event) => {
                event.stopPropagation();
                profileDropdown.classList.toggle('hidden');
            });
        }

        document.addEventListener('click', (event) => {
            if (profileDropdown && !profileDropdown.contains(event.target) && !profileDropdown.classList.contains(
                    'hidden')) {
                profileDropdown.classList.add('hidden');
            }
        });

        // Modal Role Toggle
        const btnGantiRole = document.getElementById('btnGantiRole');
        const modalRole = document.getElementById('modalRole');
        const closeModalRole = document.getElementById('closeModalRole');
        const modalOverlay = document.getElementById('modalOverlay');

        if (btnGantiRole) {
            btnGantiRole.addEventListener('click', () => {
                profileDropdown.classList.add('hidden');
                modalRole.classList.remove('hidden');
            });
        }

        const tutupModalRole = () => modalRole.classList.add('hidden');
        if (closeModalRole) closeModalRole.addEventListener('click', tutupModalRole);
        if (modalOverlay) modalOverlay.addEventListener('click', tutupModalRole);

        // 1. Chart Donut Tren Topik
        const ctxTopic = document.getElementById('topicChart').getContext('2d');
        new Chart(ctxTopic, {
            type: 'doughnut',
            data: {
                labels: ['Visualizing IoT', 'Game Dev', 'Web Dev', 'Mobile Dev', 'AI'],
                datasets: [{
                    data: [35, 25, 20, 12, 8],
                    backgroundColor: ['#2563eb', '#3b82f6', '#22c55e', '#38bdf8', '#f97316'],
                    borderWidth: 2,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 12,
                            font: {
                                size: 10
                            }
                        }
                    }
                },
                cutout: '60%'
            }
        });

        // 2. Chart Bar Horizontal Beban Bimbingan
        const ctxLoad = document.getElementById('loadChart').getContext('2d');
        new Chart(ctxLoad, {
            type: 'bar',
            data: {
                labels: ['Sausan Hidayah, M.Kom', 'Nina Mia Aristi, M.Kom', 'Data Dosen, M.Kom',
                    'Nina Mia Aristi, M.Kom', 'Data Dosen, M.Kom', 'Rathar Dosen, M.Kom', 'Web Dev, M.Kom', 'AI'
                ],
                datasets: [{
                    data: [8, 6, 5, 4, 3, 3, 2, 1],
                    backgroundColor: '#2563eb',
                    borderRadius: 4
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 10
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 10
                            }
                        }
                    }
                }
            }
        });
    </script>

</body>

</html>
