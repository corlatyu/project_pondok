<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('santris', function (Blueprint $table) {
            // Menambahkan kolom status
            $table->string('status')->default('aktif');
        });

        // Memperbarui nilai kolom status berdasarkan santri_aktif dan santri_pulang
        DB::table('santris')->update([
            'status' => DB::raw("CASE WHEN santri_aktif = 1 THEN 'aktif' ELSE 'tidak aktif' END")
        ]);

        Schema::table('santris', function (Blueprint $table) {
            // Menghapus kolom santri_aktif dan santri_pulang
            $table->dropColumn('santri_aktif');
            $table->dropColumn('santri_pulang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('santris', function (Blueprint $table) {
            // Menambahkan kembali kolom santri_aktif dan santri_pulang
            $table->boolean('santri_aktif')->default(true);
            $table->boolean('santri_pulang')->default(false);
        });

        // Memperbarui nilai kolom santri_aktif dan santri_pulang berdasarkan status
        DB::table('santris')->update([
            'santri_aktif' => DB::raw("CASE WHEN status = 'aktif' THEN 1 ELSE 0 END"),
            'santri_pulang' => DB::raw("CASE WHEN status = 'tidak aktif' THEN 1 ELSE 0 END")
        ]);

        Schema::table('santris', function (Blueprint $table) {
            // Menghapus kolom status
            $table->dropColumn('status');
        });
    }
};
