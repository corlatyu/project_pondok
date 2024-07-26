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
    Schema::create('santris', function (Blueprint $table) {
        $table->id();
        $table->string('id_santri');
        $table->string('nama');
        $table->string('image')->nullable(); 
        $table->string('nik'); // Perbaiki tipe data kolom NIK
        $table->string('jenis_kelamin');
        $table->string('kelas');
        $table->integer('kamar');
        $table->string('jenjang');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir'); // Perbaiki sintaks untuk definisi kolom tanggal_lahir
        $table->string('alamat');
        $table->string('provinsi');
        $table->string('kabupaten');
        $table->string('nama_ayah');
        $table->string('nama_ibu');
        $table->string('nomer_telp_orangtua');
        $table->string('no_kk');
        // $table->boolean('santri_aktif')->default(true);
        // $table->boolean('santri_pulang')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
