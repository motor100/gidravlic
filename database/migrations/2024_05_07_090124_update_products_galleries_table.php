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
        Schema::table('products_galleries', function (Blueprint $table) {
            $table->renameColumn('product_id', 'product_uuid'); // переименование поля
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_galleries', function (Blueprint $table) {
            $table->renameColumn('product_uuid', 'product_id');
        });
    }
};
