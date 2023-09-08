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
        Schema::create('orders_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('customer_type');
            $table->string('name');
            $table->string('email');
            $table->unsignedBigInteger('phone');
            $table->unsignedBigInteger('inn')->nullable();
            $table->string('manager')->nullable();
            $table->timestamps();
            // связывание таблиц
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_customers');
    }
};
