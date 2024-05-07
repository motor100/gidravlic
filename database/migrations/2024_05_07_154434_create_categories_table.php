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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // название категории
            $table->string('slug')->unique(); // slug
            $table->uuid('uuid')->index(); // uuid категории 1С
            $table->unsignedBigInteger('parent_id')->nullable(); // id родительской категории. Нужен для создания _lft и _rgt, пакет lazychaser/laravel-nestedset
            $table->uuid('parent_uuid')->nullable(); // uuid родительской категории 1C. Нужен для создания parent_id
            $table->unsignedInteger('_lft')->default(0); // lazychaser/laravel-nestedset
            $table->unsignedInteger('_rgt')->default(0); // lazychaser/laravel-nestedset
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
