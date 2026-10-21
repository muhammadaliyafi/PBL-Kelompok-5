<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koor Prodi (Supervisor Eksekutif) - SIPETA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-100/70 text-slate-800 antialiased">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR KOORPRODI -->
<aside class="w-64 bg-slate-900 text-slate-300 flex flex-col justify-between hidden md:flex border-r border-slate-800">
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

        <!-- Navigation Menu -->
        <nav class="mt-6 px-3 space-y-1">
            <a href="{{ route('koorprodi.dashboard') }}"
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
        Gugus TA POV &copy; 2026
    </div>
</aside>

        <!-- KONTEN UTAMA -->
        <div class="flex-1 flex flex-col overflow-y-auto">

            <!-- HEADER TOPBAR -->
            <header class="bg-white border-b border-slate-200 px-8 py-3.5 flex justify-between items-center sticky top-0 z-10">
                <span class="text-xs font-semibold text-slate-700">Sistem Informasi Proposal dan Tugas Akhir</span>
                <div class="flex items-center gap-3">
                    <span class="text-xs text-slate-500 font-medium">Koor Prodi (Supervisor Eksekutif)</span>
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-sm">
                        AG
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
                        <h3 class="text-2xl font-bold text-slate-900 mt-1">5.2 <span class="text-sm font-semibold">mahasiswa</span></h3>
                    </div>
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
                        <p class="text-xs font-medium text-slate-500">Topik Paling Diminati</p>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">IoT & Game Dev</h3>
                    </div>
                </div>

                <!-- SECTION CHART (DONUT & BAR) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- CHART TREN TOPIK (DONUT) -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                        <h4 class="text-sm font-bold text-slate-800 mb-4">Tren Topik Tugas Akhir</h4>
                        <div class="w-full h-64 flex items-center justify-center">
                            <canvas id="topicChart"></canvas>
                        </div>
                    </div>

                    <!-- CHART PEMERATAAN BEBAN (BAR HORIZONTAL) -->
                    <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
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

    <!-- SCRIPT CHART.JS -->
    <script>
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
                    legend: { position: 'bottom', labels: { boxWidth: 12, font: { size: 10 } } }
                },
                cutout: '60%'
            }
        });

        // 2. Chart Bar Horizontal Beban Bimbingan
        const ctxLoad = document.getElementById('loadChart').getContext('2d');
        new Chart(ctxLoad, {
            type: 'bar',
            data: {
                labels: ['Sausan Hidayah, M.Kom', 'Nina Mia Aristi, M.Kom', 'Data Dosen, M.Kom', 'Nina Mia Aristi, M.Kom', 'Data Dosen, M.Kom', 'Rathar Dosen, M.Kom', 'Web Dev, M.Kom', 'AI'],
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
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { font: { size: 10 } } },
                    y: { grid: { display: false }, ticks: { font: { size: 10 } } }
                }
            }
        });
    </script>

</body>
</html>