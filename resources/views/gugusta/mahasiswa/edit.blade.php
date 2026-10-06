<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa - SIPETA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 font-sans p-10">

    <div class="max-w-md mx-auto bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
        <h2 class="text-xl font-bold text-slate-800 mb-4 pb-2 border-b border-slate-100">Edit Data Mahasiswa</h2>

        <form action="/gugus-ta/mahasiswa/{{ $mhs->id }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">NIM Mahasiswa</label>
                <input type="text" name="nim" value="{{ $mhs->nim }}" required
                    class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ $mhs->name }}" required
                    class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">Tahun Angkatan</label>
                <input type="number" name="tahun_angkatan" value="{{ $mhs->tahun_angkatan }}" required min="2015"
                    max="2030"
                    class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">Status Aktif</label>
                <select name="status_aktif"
                    class="w-full px-3.5 py-2 text-sm rounded-xl border border-slate-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Aktif" {{ $mhs->status_aktif == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Cuti" {{ $mhs->status_aktif == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                    <option value="Tidak Aktif" {{ $mhs->status_aktif == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif
                    </option>
                </select>
            </div>
            <div class="flex items-center gap-2 pt-2">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2.5 rounded-xl transition-colors shadow-sm">
                    Simpan Perubahan
                </button>
                <a href="/gugus-ta/mahasiswa"
                    class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-medium px-4 py-2.5 rounded-xl transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>

</body>

</html>
