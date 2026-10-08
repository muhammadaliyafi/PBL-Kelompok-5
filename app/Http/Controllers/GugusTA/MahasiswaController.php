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

        // Filter Semester
        if ($request->filled('semester')) {
            $query->where('semester', $request->semester);
        }

        $mahasiswa = $query->get();
        return view('gugusta.mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:users,nim',
            'name' => 'required',
            'tahun_angkatan' => 'required|digits:4',
        ]);

        User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'tahun_angkatan' => $request->tahun_angkatan,
            'status_aktif' => 'Aktif', // Default Aktif saat tambah manual
            'role' => 'mahasiswa',
            'password' => bcrypt('password'), // Sesuaikan enkripsi password lu
        ]);

        return redirect()->back()->with('success', 'Data Mahasiswa berhasil ditambahkan!');
    }

    public function deleteAll()
    {
        // Hapus khusus akun yang rolenya 'mahasiswa'
        User::where('role', 'mahasiswa')->delete();

        return redirect()->back()->with('success', 'Semua data mahasiswa berhasil dibersihkan!');
    }

    // Nampilin halaman form edit
    public function edit($id)
    {
        $mhs = User::findOrFail($id);
        return view('gugusta.mahasiswa.edit', compact('mhs'));
    }

    // Proses simpan perubahan data edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required',
            'name' => 'required',
            'tahun_angkatan' => 'required|digits:4',
            'status_aktif' => 'required',
        ]);

        $mhs = User::findOrFail($id);
        $mhs->update([
            'nim' => $request->nim,
            'name' => $request->name,
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

        // Hapus mahasiswa berdasarkan ID yang dicentang
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

        array_shift($lines); // Skip baris pertama (header CSV)

        foreach ($lines as $line) {
            if (trim($line) === '') continue;

            // Deteksi pemisah (bisa koma atau titik koma, tergantung Excel admin)
            $delimiter = strpos($line, ';') !== false ? ';' : ',';
            $row = str_getcsv($line, $delimiter);

            // Sesuaikan index dengan kolom CSV terbaru lu
            // Kolom A = No (Index 0) -> Gak kita pakai
            $nim = isset($row[1]) ? trim($row[1]) : '';            // Kolom B
            $nama = isset($row[2]) ? trim($row[2]) : '';           // Kolom C
            $tahunAngkatan = isset($row[3]) ? trim($row[3]) : '';  // Kolom D (Yang baru)

            // Kalau NIM-nya nggak kosong dan bukan tulisan "NIM" header
            if (!empty($nim) && strtolower($nim) !== 'nim') {
                User::updateOrCreate(
                    ['nim' => $nim], // Cek apakah NIM ini udah ada di database?
                    [
                        'name'           => $nama,
                        'tahun_angkatan' => $tahunAngkatan,
                        'status_aktif'   => 'Aktif', // FIX: Otomatis set status jadi Aktif!
                        'role'           => 'mahasiswa',
                        'password'       => Hash::make($nim) // Password default pakai NIM
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
