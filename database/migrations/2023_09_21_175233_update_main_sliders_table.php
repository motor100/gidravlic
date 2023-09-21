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
        // Добавление столбца link
        Schema::table('main_sliders', function (Blueprint $table) {
            $table->string('link')->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('main_sliders', function (Blueprint $table) {
            $table->dropColumn('link');
        });
    }
};
