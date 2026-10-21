<?php

namespace App\Imports;

use App\Models\ArsipJudul;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class SingleArsipSheetImport implements ToModel, WithEvents
{
    protected $tahun;

    public function __construct($tahun = null)
    {
        $this->tahun = $tahun;
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $sheetTitle = trim($event->sheet->getDelegate()->getTitle());
                // Otomatis ekstrak 4 digit angka tahun dari nama tab Excel (contoh: '2026', 'Arsip 2027')
                if (preg_match('/(20\d{2})/', $sheetTitle, $matches)) {
                    $this->tahun = (int) $matches[1];
                } else {
                    $this->tahun = (int) date('Y'); // Fallback ke tahun berjalan jika tab tidak ada angka tahun
                }
            },
        ];
    }



    public function model(array $row): ?Model
    {
        // 1. Ambil sel yang tidak kosong
        $values = array_values(array_filter(array_map(fn($v) => trim((string) $v), $row), fn($v) => $v !== ''));

        if (count($values) < 2) {
            return null;
        }

        // 2. Filter Baris Header (pastikan ada teks judul proposal panjang >= 15 karakter)
        $hasTitle = false;
        foreach ($values as $v) {
            if (strlen($v) >= 15) {
                $hasTitle = true;
                break;
            }
        }

        if (!$hasTitle) {
            return null;
        }

        // 3. Buang nomor urut di awal jika ada
        if (preg_match('/^\d{1,3}$/', $values[0])) {
            array_shift($values);
        }

        if (empty($values)) {
            return null;
        }

        $nim   = '-';
        $nama  = '-';
        $judul = '';
        $topik = 'Sistem Informasi';

        // 4. Deteksi NIM (mencakup format A1317107, 1801301141, 2101301107)
        if (preg_match('/^[A-Za-z]?\d{6,12}$/', $values[0])) {
            $nim = array_shift($values);
        }

        // 5. Ekstrak Nama, Judul, dan Topik
        if (count($values) >= 2) {
            if (strlen($values[0]) < 40) {
                $nama = array_shift($values);
            }

            if (!empty($values)) {
                $judul = array_shift($values);
            }

            if (!empty($values)) {
                $topik = array_shift($values);
            }
        } elseif (count($values) === 1) {
            $judul = $values[0];
        }

        $judul = trim($judul);

        if (empty($judul) || strlen($judul) < 5) {
            return null;
        }

        if (empty($topik) || strlen($topik) > 50) {
            $topik = 'Sistem Informasi';
        }

        return new ArsipJudul([
            'tahun' => $this->tahun ?? date('Y'),
            'nim'   => $nim,
            'nama'  => $nama,
            'judul' => $judul,
            'topik' => $topik,
        ]);
    }
}
