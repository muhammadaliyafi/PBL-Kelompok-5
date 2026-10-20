<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bank_topiks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_topik')->unique(); // Misal: TP-01, TP-02
            $table->string('nama_topik');          // Misal: Internet of Things (IoT), Sistem Informasi
            $table->text('deskripsi')->nullable();  // Keterangan singkat topik
            $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bank_topiks');
    }
};
