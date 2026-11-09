
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verifikasi_juduls', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 30);
            $table->string('nama_mahasiswa');
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->enum('status', [
                'Menunggu',
                'ACC',
                'Revisi',
                'Ditolak'
            ])->default('Menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verifikasi_juduls');
    }
};
