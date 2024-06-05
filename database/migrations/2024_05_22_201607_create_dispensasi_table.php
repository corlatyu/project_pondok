<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDispensasiTable extends Migration
{
    public function up()
    {
        Schema::create('dispensasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_santri')->unsigned();
            $table->string('nama');
            $table->string('jenjang');
            $table->string('kamar');
            $table->date('pulang_tanggal');
            $table->date('kembali_tanggal');
            $table->text('keperluan');
            $table->boolean('santri_pulang')->default(0);
            $table->string('email_orangtua');
            $table->timestamps();
            
            // Foreign key constraint
            $table->foreign('id_santri')->references('id')->on('santris')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('dispensasi');
    }
}
