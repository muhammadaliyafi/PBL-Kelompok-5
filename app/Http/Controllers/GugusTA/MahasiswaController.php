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
            'name' => 'required'
        ]);

        User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'role' => 'mahasiswa',
            'password' => Hash::make($request->nim)
        ]);

        return redirect()->back()->with('success', 'Mahasiswa berhasil ditambahkan manual!');
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
        $mhs = User::findOrFail($id);

        $request->validate([
            'nim' => 'required|unique:users,nim,' . $id,
            'name' => 'required',
            'semester' => 'nullable'
        ]);

        $mhs->update([
            'nim' => $request->nim,
            'name' => $request->name,
            'semester' => $request->semester, // Tambahkan ini
        ]);

        return redirect('/gugus-ta/mahasiswa')->with('success', 'Data Mahasiswa berhasil diperbarui!');
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

            if (!empty($nim) && strtolower($nim) !== 'nim') {
                User::updateOrCreate(
                    ['nim' => $nim],
                    [
                        'name' => $nama,
                        'role' => 'mahasiswa',
                        'password' => Hash::make($nim)
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Data Mahasiswa berhasil di-import!');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Mahasiswa berhasil dihapus!');
    }
}
