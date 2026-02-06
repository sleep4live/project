<?php

// database/migrations/2026_02_04_xxxxxx_add_foreign_key_to_collections_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('collections', function (Blueprint $table) {
            // Pastikan category_id adalah unsigned big integer
            $table->unsignedBigInteger('category_id')->nullable()->change();
            
            // Tambahkan foreign key
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('collections', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
};