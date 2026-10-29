<?php

namespace App\Http\Controllers\GugusTA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'mahasiswa');

        // Filter Pencarian (Berdasarkan Nama atau NIM)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('nim', 'like', "%{$search}%");
            });
        }

        // Filter Tahun Angkatan
        if ($request->filled('tahun_angkatan')) {
            $query->where('tahun_angkatan', $request->tahun_angkatan);
        }

        $mahasiswa = $query->get();
        return view('gugusta.mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:users,nim',
            'name' => 'required',
            'tahun_angkatan' => 'required|numeric|digits:4|min:2015|max:2030',
        ], [
            'nim.required' => 'NIM wajib diisi!',
            'nim.unique' => 'NIM sudah terdaftar di sistem!',
            'name.required' => 'Nama lengkap wajib diisi!',
            'tahun_angkatan.required' => 'Tahun angkatan wajib diisi!',
            'tahun_angkatan.numeric' => 'Tahun angkatan harus berupa angka!',
            'tahun_angkatan.digits' => 'Tahun angkatan harus 4 digit angka!',
            'tahun_angkatan.min' => 'Tahun angkatan minimal tahun 2015!',
            'tahun_angkatan.max' => 'Tahun angkatan maksimal tahun 2030!',
        ]);

        User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->nim . '@mhs.politala.ac.id', // <-- Otomatis generate email dari NIM
            'tahun_angkatan' => $request->tahun_angkatan,
            'status_aktif' => 'Aktif',
            'role' => 'mahasiswa',
            'password' => bcrypt('password'),
        ]);

        return redirect()->back()->with('success', 'Data Mahasiswa berhasil ditambahkan!');
    }

    public function deleteAll()
    {
        User::where('role', 'mahasiswa')->delete();

        return redirect()->back()->with('success', 'Semua data mahasiswa berhasil dibersihkan!');
    }

    // Proses simpan perubahan data edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:users,nim,' . $id,
            'name' => 'required',
            'tahun_angkatan' => 'required|numeric|digits:4|min:2015|max:2030',
            'status_aktif' => 'required',
        ], [
            'nim.required' => 'NIM wajib diisi!',
            'nim.unique' => 'NIM sudah terdaftar di sistem!',
            'name.required' => 'Nama lengkap wajib diisi!',
            'tahun_angkatan.required' => 'Tahun angkatan wajib diisi!',
            'tahun_angkatan.numeric' => 'Tahun angkatan harus berupa angka!',
            'tahun_angkatan.digits' => 'Tahun angkatan harus 4 digit angka!',
            'tahun_angkatan.min' => 'Tahun angkatan minimal tahun 2015!',
            'tahun_angkatan.max' => 'Tahun angkatan maksimal tahun 2030!',
            'status_aktif.required' => 'Status aktif wajib dipilih!',
        ]);

        $mhs = User::findOrFail($id);
        $mhs->update([
            'nim' => $request->nim,
            'name' => $request->name,
            'email' => $request->nim . '@mhs.politala.ac.id', // <-- Update email jika NIM diubah
            'tahun_angkatan' => $request->tahun_angkatan,
            'status_aktif' => $request->status_aktif,
        ]);

        return redirect('/gugus-ta/mahasiswa')->with('success', 'Data Mahasiswa berhasil diperbarui!');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->ids;

        if (!$ids || count($ids) === 0) {
            return redirect()->back()->with('error', 'Pilih minimal satu mahasiswa yang ingin dihapus!');
        }

        User::whereIn('id', $ids)->delete();

        return redirect()->back()->with('success', count($ids) . ' data mahasiswa berhasil dihapus!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:csv,txt'
        ]);

        $file = $request->file('file_excel');
        $content = file_get_contents($file->getRealPath());
        $lines = explode(PHP_EOL, $content);

        array_shift($lines);

        foreach ($lines as $line) {
            if (trim($line) === '') continue;

            $delimiter = strpos($line, ';') !== false ? ';' : ',';
            $row = str_getcsv($line, $delimiter);

            $nim = isset($row[1]) ? trim($row[1]) : '';
            $nama = isset($row[2]) ? trim($row[2]) : '';
            $tahunAngkatan = isset($row[3]) ? trim($row[3]) : '';

            if (!empty($nim) && strtolower($nim) !== 'nim') {
                User::updateOrCreate(
                    ['nim' => $nim],
                    [
                        'name'           => $nama,
                        'email'          => $nim . '@mhs.politala.ac.id', // <-- Tambahkan email di CSV import
                        'tahun_angkatan' => $tahunAngkatan,
                        'status_aktif'   => 'Aktif',
                        'role'           => 'mahasiswa',
                        'password'       => Hash::make($nim)
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Data Mahasiswa berhasil di-import dan status otomatis Aktif!');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
