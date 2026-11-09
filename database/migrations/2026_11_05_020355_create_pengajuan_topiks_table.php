<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_topiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('kode_topik'); // A1, A2, dll.
            $table->string('nama_topik');
            $table->double('nilai_preferensi'); // Skor SPK (V)
            $table->string('status')->default('Dipilih'); // Dipilih, Disetujui, Ditolak
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_topiks');
    }
};