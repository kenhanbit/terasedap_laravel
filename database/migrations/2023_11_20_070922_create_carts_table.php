<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_item_name');
            $table->integer('quantity')->default(1);
            $table->decimal('food_item_price', 8, 2);
            $table->timestamps();

            $table->foreign('food_item_name')->references('name')->on('food_items')->onDelete('cascade');
            $table->foreign('food_item_price')->references('price')->on('food_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
};
