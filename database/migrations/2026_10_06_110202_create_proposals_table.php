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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->string('nama_mahasiswa');
            $table->string('judul');
            $table->string('file_proposal')->nullable();
            $table->string('status')->default('Belum Di-Review');
            $table->text('catatan_gugus_ta')->nullable();
            $table->timestamps();
        });
    }
};
