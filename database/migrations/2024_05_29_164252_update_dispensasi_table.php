<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDispensasiTable extends Migration
{
    public function up()
    {
        Schema::table('dispensasi', function (Blueprint $table) {
            // Tambah kolom status jika belum ada
            if (!Schema::hasColumn('dispensasi', 'status')) {
                $table->string('status')->default('izin');
            }

            // Ganti nama kolom keperluan menjadi keterangan jika keperluan ada dan keterangan belum ada
            if (Schema::hasColumn('dispensasi', 'keperluan') && !Schema::hasColumn('dispensasi', 'keterangan')) {
                $table->renameColumn('keperluan', 'keterangan');
            }

            // Hapus kolom email_orangtua jika ada
            if (Schema::hasColumn('dispensasi', 'email_orangtua')) {
                $table->dropColumn('email_orangtua');
            }

            // Tambah kolom no_telp jika belum ada
            if (!Schema::hasColumn('dispensasi', 'no_telp')) {
                $table->string('no_telp');
            }
        });
    }

    public function down()
    {
        Schema::table('dispensasi', function (Blueprint $table) {
            // Rollback perubahan dengan menambahkan kembali kolom email_orangtua jika tidak ada
            if (!Schema::hasColumn('dispensasi', 'email_orangtua')) {
                $table->string('email_orangtua')->nullable();
            }

            // Rollback perubahan nama kolom keterangan menjadi keperluan jika keterangan ada dan keperluan tidak ada
            if (Schema::hasColumn('dispensasi', 'keterangan') && !Schema::hasColumn('dispensasi', 'keperluan')) {
                $table->renameColumn('keterangan', 'keperluan');
            }

            // Rollback perubahan dengan menghapus kolom no_telp jika ada
            if (Schema::hasColumn('dispensasi', 'no_telp')) {
                $table->dropColumn('no_telp');
            }

            // Rollback perubahan dengan menghapus kolom status jika ada
            if (Schema::hasColumn('dispensasi', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
}