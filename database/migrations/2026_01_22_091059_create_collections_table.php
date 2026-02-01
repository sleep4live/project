<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('collections', function (Blueprint $table) {
        $table->id();
        $table->string('title');         // Judul
        $table->text('description');     // Deskripsi
        $table->string('image')->nullable(); // Untuk simpan nama file gambar
        $table->timestamps();
    });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
