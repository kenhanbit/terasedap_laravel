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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('order_code', 20);
            $table->string('menu_name', 50);
            $table->integer('quantity');
            $table->integer('single_price');
            $table->integer('total_price');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('order_code')->references('order_code')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
