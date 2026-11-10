<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilai_prasyarats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Hubungkan ke tabel Mahasiswa
            $table->string('kode_topik'); // A1, A2, A3, A4, A5
            $table->string('nama_matkul');
            $table->integer('nilai'); // Nilai 0 - 100
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilai_prasyarats');
    }
};