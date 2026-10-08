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
        Schema::table('users', function (Blueprint $table) {
            // 1. Tambah kolom baru (tahun_angkatan & status_aktif)
            $table->string('tahun_angkatan', 4)->after('name')->nullable();
            $table->string('status_aktif')->after('tahun_angkatan')->default('Aktif');

            // 2. Buang kolom semester yang udah nggak dipakai
            $table->dropColumn('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Rollback jika terjadi kesalahan (kembalikan seperti semula)
            $table->dropColumn(['tahun_angkatan', 'status_aktif']);
            $table->string('semester')->nullable();
            //
        });
    }
};
