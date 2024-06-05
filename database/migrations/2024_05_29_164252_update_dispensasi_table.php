<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDispensasiTable extends Migration
{
    public function up()
    {
        Schema::table('dispensasi', function (Blueprint $table) {
            // Tambah kolom status
            $table->string('status')->default('izin');

            // Ganti nama kolom keperluan menjadi keterangan
            $table->renameColumn('keperluan', 'keterangan');

            // Hapus kolom email_orangtua
            $table->dropColumn('email_orangtua');

            // Tambah kolom no_telp
            $table->string('no_telp');
        });
    }

    public function down()
    {
        Schema::table('dispensasi', function (Blueprint $table) {
            // Rollback perubahan dengan menambahkan kembali kolom email_orangtua
            $table->string('email_orangtua');

            // Rollback perubahan nama kolom keterangan menjadi keperluan
            $table->renameColumn('keterangan', 'keperluan');

            // Rollback perubahan dengan menghapus kolom no_telp
            $table->dropColumn('no_telp');

            // Rollback perubahan dengan menghapus kolom status
            $table->dropColumn('status');
        });
    }
}
