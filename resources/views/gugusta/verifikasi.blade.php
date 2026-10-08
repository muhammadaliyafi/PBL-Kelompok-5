<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Proposal - SIPETA</title>
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
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg bg-blue-600/10 text-blue-400 font-semibold border border-blue-500/20">
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
                <!-- TAMBAHKAN KODE INI DI SINI -->
                @if (session('success'))
                    <div
                        class="mb-6 p-4 bg-emerald-50/80 border border-emerald-200/60 text-emerald-800 rounded-xl text-sm flex items-center gap-2 shadow-sm">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endif
                <!-- BATAS KODE NOTIFIKASI -->

                <!-- Header Banner -->
                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 mb-6 flex justify-between items-center">
                    <div>
                        <h1 class="text-xl font-bold text-slate-800">Verifikasi Kelayakan Judul & Berkas</h1>
                        <p class="text-sm text-slate-500 mt-1">Pusat review proposal mahasiswa, pengecekan dokumen, dan
                            pemberian keputusan status.</p>
                    </div>
                </div>

                <!-- Tabel Daftar Pengajuan Proposal -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                        <h2 class="text-xs font-bold text-slate-700 uppercase tracking-wider">Daftar Pengajuan Masuk
                        </h2>
                        <span class="text-xs text-slate-400">Menampilkan pengajuan mahasiswa</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse text-sm">
                            <thead>
                                <tr class="border-b border-slate-200 text-slate-400 font-medium text-xs bg-slate-50/30">
                                    <th class="py-3 px-6">Mahasiswa & NIM</th>
                                    <th class="py-3 px-6">Topik / Judul Proposal</th>
                                    <th class="py-3 px-6">Berkas</th>
                                    <th class="py-3 px-6">Status Validasi</th>
                                    <th class="py-3 px-6 text-center">Aksi / Review</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-slate-600 text-xs">
                                <!-- Looping data dari Database -->
                                @foreach ($proposals as $p)
                                    <tr class="hover:bg-slate-50/60 transition-colors">
                                        <td class="py-4 px-6">
                                            <div class="font-bold text-slate-800 text-sm">{{ $p->nama_mahasiswa }}</div>
                                            <div class="text-slate-400 font-mono text-xs">{{ $p->nim }}</div>
                                        </td>
                                        <td class="py-4 px-6 font-medium text-slate-700">{{ $p->judul }}</td>
                                        <td class="py-4 px-6">
                                            <a href="#"
                                                class="inline-flex items-center gap-1 text-blue-600 hover:underline font-medium">
                                                📄 Proposal.pdf
                                            </a>
                                        </td>
                                        <td class="py-4 px-6">
                                            <!-- Logika Warna Badge Status -->
                                            @if ($p->status == 'Disetujui (ACC)')
                                                <span
                                                    class="px-2.5 py-1 bg-emerald-50 text-emerald-600 font-semibold rounded-full text-[11px] border border-emerald-200">
                                                    {{ $p->status }}
                                                </span>
                                            @elseif($p->status == 'Ditolak')
                                                <span
                                                    class="px-2.5 py-1 bg-red-50 text-red-600 font-semibold rounded-full text-[11px] border border-red-200">
                                                    {{ $p->status }}
                                                </span>
                                            @elseif($p->status == 'Butuh Revisi Administrasi')
                                                <span
                                                    class="px-2.5 py-1 bg-amber-50 text-amber-600 font-semibold rounded-full text-[11px] border border-amber-200">
                                                    Revisi
                                                </span>
                                            @else
                                                <span
                                                    class="px-2.5 py-1 bg-slate-100 text-slate-600 font-semibold rounded-full text-[11px] border border-slate-200">
                                                    {{ $p->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            <a href="{{ route('gugusta.verifikasi.review', $p->id) }}"
                                                class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors shadow-sm inline-block">
                                                Review Keputusan
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>

    </div>

</body>

</html>
