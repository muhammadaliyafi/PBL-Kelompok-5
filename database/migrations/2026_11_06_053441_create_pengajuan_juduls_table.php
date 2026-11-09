<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_juduls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('kode_topik')->nullable();
            $table->string('nama_topik')->nullable();
            $table->string('judul_ta');
            $table->string('jenis_kasus')->nullable();
            $table->string('genre_game')->nullable();
            $table->string('tools_game')->nullable();
            $table->text('integrasi_sistem')->nullable(); // Menampung tag dinamis (API/Sensor/Metode)
            $table->text('deskripsi_judul');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_juduls');
    }
};