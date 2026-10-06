<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Proposal Mahasiswa - SIPETA</title>
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
                    <svg class="w-5 h-5 text-blue-500 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7" />
                    </svg>
                    SIPETA
                </div>
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

                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
                        Ploting Dospem
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
            <main class="p-8 max-w-5xl w-full mx-auto">
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

                <!-- Back Link -->
                <div class="mb-4">
                    <a href="{{ route('gugusta.verifikasi') }}"
                        class="text-xs font-medium text-blue-600 hover:underline flex items-center gap-1">
                        &larr; Kembali ke Daftar Pengajuan
                    </a>
                </div>

                <!-- Card Utama Form Review -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">

                    <!-- Header Mahasiswa -->
                    <div
                        class="p-6 border-b border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <div
                            class="w-16 h-16 rounded-lg bg-slate-200 border border-slate-300 flex items-center justify-center text-slate-500 font-bold text-lg">
                            MHS
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">Muhammad Ali Yafi</h2>
                            <p class="text-xs text-slate-500 font-mono mt-0.5">NIM: 2501301052 | Program Studi: D3
                                Teknologi Informasi</p>
                            <p class="text-xs text-slate-700 font-medium mt-1">Judul: <span class="text-blue-600">Sistem
                                    Informasi Pengelolaan Tugas Akhir (SIPETA)</span></p>
                        </div>
                    </div>

                    <!-- Form Keputusan & Catatan -->
                    <form action="{{ route('gugusta.verifikasi.update', 1) }}" method="POST" class="p-6 space-y-6">
                        @csrf

                        <!-- Dokumen Proposal -->
                        <div
                            class="p-4 bg-slate-50 rounded-lg border border-slate-200/80 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="text-2xl">📄</span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-700">Berkas Proposal Mahasiswa</h4>
                                    <p class="text-[11px] text-slate-400">Proposal_TA_AliYafi.pdf (Ukurannya 2.4 MB)</p>
                                </div>
                            </div>
                            <a href="#"
                                class="px-3 py-1.5 bg-white border border-slate-200 hover:bg-slate-100 text-slate-700 text-xs font-medium rounded-lg transition-colors shadow-sm">
                                Unduh / Lihat Berkas
                            </a>
                        </div>

                        <!-- Catatan Gugus TA -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Catatan
                                / Revisi dari Gugus TA</label>
                            <textarea name="catatan" rows="4" placeholder="Tuliskan catatan revisi atau alasan keputusan di sini..."
                                class="w-full px-3 py-2.5 text-xs rounded-lg border border-slate-200 focus:outline-none focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-all placeholder:text-slate-400"></textarea>
                        </div>

                        <!-- Status Validasi -->
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Status
                                Validasi Keputusan</label>
                            <select name="status"
                                class="w-full px-3 py-2.5 text-xs rounded-lg border border-slate-200 bg-white focus:outline-none focus:border-slate-400 text-slate-700 cursor-pointer">
                                <option value="Belum Di-Review">Belum Di-Review</option>
                                <option value="Butuh Revisi Administrasi">Butuh Revisi Administrasi</option>
                                <option value="Disetujui">Disetujui (ACC)</option>
                                <option value="Ditolak">Ditolak</option>
                            </select>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                            <a href="{{ route('gugusta.verifikasi') }}"
                                class="px-4 py-2 text-xs font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors shadow-sm">
                                Simpan Keputusan
                            </button>
                        </div>

                    </form>
                </div>

            </main>
        </div>

    </div>

</body>

</html>
