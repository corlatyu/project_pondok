<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToDispensasiTable extends Migration
{
    public function up()
    {
        Schema::table('dispensasi', function (Blueprint $table) {
            if (!Schema::hasColumn('dispensasi', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    public function down()
    {
        Schema::table('dispensasi', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}