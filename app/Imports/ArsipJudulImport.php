<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;

class ArsipJudulImport implements WithMultipleSheets, SkipsUnknownSheets
{
    public function sheets(): array
    {
        $sheets = [];
        // Sediakan hingga 30 slot sheet dinamis. Sheet yang tidak ada di file akan otomatis di-skip
        for ($i = 0; $i < 30; $i++) {
            $sheets[$i] = new SingleArsipSheetImport();
        }
        return $sheets;
    }

    public function onUnknownSheet(string|int $sheetName): void
    {
        // Abaikan secara halus jika jumlah sheet kurang dari 30
    }
}
