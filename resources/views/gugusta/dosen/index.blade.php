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

        <!-- SIDEBAR (Presisi Sesuai Kode Asli Kamu) -->
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
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
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

                    <a href="#"
                        class="flex items-center px-3.5 py-2 text-sm font-medium rounded-lg hover:bg-slate-800/60 text-slate-400 hover:text-slate-200 transition-colors">
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

        <!-- KONTEN UTAMA (KANAN) -->
        <main class="flex-1 flex flex-col overflow-y-auto">
            
            <!-- Header Bar Atas -->
            <header class="h-16 bg-white border-b border-slate-200/80 px-8 flex justify-between items-center flex-shrink-0">
                <span class="text-xs text-slate-500 font-medium">Sistem Informasi Proposal dan Tugas Akhir</span>

                <div class="flex items-center gap-3">
                    <span class="text-xs bg-slate-100 text-slate-600 px-3 py-1.5 rounded-lg font-medium border border-slate-200/60">Admin Gugus TA</span>
                    <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow-sm">AG</div>
                </div>
            </header>

            <!-- Isi Halaman Data Dosen -->
            <div class="p-8">
                
                <!-- Title Halaman -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-slate-800">Kelola Data Dosen</h1>
                    <p class="text-xs text-slate-400 mt-1">Pusat kelola akun, NIP/NIDN, dan hak akses dosen tugas akhir.</p>
                </div>

                <!-- Notifikasi Sukses -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl flex items-center gap-2">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    <!-- Form Tambah Dosen (Kiri) -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200/60 h-fit">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="font-bold text-slate-800 text-sm">Tambah Dosen</h2>
                            <span class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">MANUAL</span>
                        </div>

                        <form action="{{ route('dosen.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-semibold text-slate-600 mb-1">NIP Dosen</label>
                                <input type="text" name="nip" required placeholder="Contoh: 198501012010121001" 
                                    class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-600 mb-1">Nama Lengkap & Gelar</label>
                                <input type="text" name="name" required placeholder="Contoh: Dr. Ahmad Subagja, M.T." 
                                    class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-600 mb-1">Bidang Keahlian / Program Studi</label>
                                <input type="text" name="keahlian" required placeholder="Contoh: Rekayasa Perangkat Lunak" 
                                    class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>

                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg text-xs transition-all shadow-md">
                                + Simpan Dosen
                            </button>
                        </form>
                    </div>

                    <!-- Tabel Daftar Dosen (Kanan) -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-slate-200/60">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="font-bold text-slate-800 uppercase tracking-wider text-xs">DAFTAR DOSEN</h2>
                            
                            <!-- Search Input -->
                            <form action="" method="GET" class="flex gap-2">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari NIP / Nama Dosen..." 
                                    class="px-3 py-1.5 border border-slate-200 rounded-lg text-xs focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <button type="submit" class="px-3 py-1.5 bg-slate-100 text-slate-600 rounded-lg text-xs font-semibold hover:bg-slate-200">Cari</button>
                            </form>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-xs">
                                <thead>
                                    <tr class="border-b border-slate-200 text-slate-400 font-bold uppercase tracking-wider">
                                        <th class="py-3 px-2">NO</th>
                                        <th class="py-3 px-2">NIP / NIDN</th>
                                        <th class="py-3 px-2">NAMA DOSEN</th>
                                        <th class="py-3 px-2">KEAHLIAN</th>
                                        <th class="py-3 px-2">STATUS</th>
                                        <th class="py-3 px-2 text-center">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-700">
                                    @forelse($dosens as $index => $dosen)
                                    <tr class="hover:bg-slate-50 transition-all">
                                        <td class="py-3 px-2 text-slate-400">{{ $index + 1 }}</td>
                                        <td class="py-3 px-2 font-mono text-slate-600">{{ $dosen->nip }}</td>
                                        <td class="py-3 px-2 font-semibold text-slate-800">{{ $dosen->name }}</td>
                                        <td class="py-3 px-2 text-slate-500">{{ $dosen->keahlian }}</td>
                                        <td class="py-3 px-2">
                                            <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 rounded-full font-semibold text-[10px]">Aktif</span>
                                        </td>
                                        <td class="py-3 px-2">
                                            <div class="flex items-center justify-center gap-2">
                                                <!-- Tombol Edit -->
                                                <button type="button" onclick="openEditModal('{{ $dosen->id }}', '{{ $dosen->nip }}', '{{ $dosen->name }}', '{{ $dosen->keahlian }}')" 
                                                    class="p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all" title="Edit Dosen">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                </button>

                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dosen ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all" title="Hapus Dosen">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="py-6 text-center text-slate-400">Belum ada data dosen.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Modal Pop-up Edit Dosen -->
    <div id="editModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl p-6 max-w-md w-full shadow-xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-slate-800 text-sm">Edit Data Dosen</h3>
                <button type="button" onclick="closeEditModal()" class="text-slate-400 hover:text-slate-600">✕</button>
            </div>
            
            <form id="editForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">NIP Dosen</label>
                    <input type="text" id="edit_nip" name="nip" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Nama Lengkap & Gelar</label>
                    <input type="text" id="edit_name" name="name" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-600 mb-1">Bidang Keahlian</label>
                    <input type="text" id="edit_keahlian" name="keahlian" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-slate-100 text-slate-600 text-xs rounded-lg font-semibold hover:bg-slate-200">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-xs rounded-lg font-semibold hover:bg-blue-700">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
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