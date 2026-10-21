<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('arsip_juduls', function (Blueprint $table) {
            $table->id();
            $table->year('tahun');
            $table->string('nim');
            $table->string('nama');
            $table->string('judul');
            $table->string('topik');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('arsip_juduls');
    }
};
