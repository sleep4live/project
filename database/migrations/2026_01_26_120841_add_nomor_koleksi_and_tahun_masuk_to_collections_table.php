<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('collections', function (Blueprint $table) {
            $table->string('nomor_koleksi')->nullable();
            $table->integer('tahun_masuk')->nullable();
        });
    }

    public function down()
    {
        Schema::table('collections', function (Blueprint $table) {
            $table->dropColumn(['nomor_koleksi', 'tahun_masuk']);
        });
    }
};