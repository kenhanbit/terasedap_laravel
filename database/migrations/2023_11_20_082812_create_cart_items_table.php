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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_item_id');
            $table->integer('quantity');
            $table->decimal('food_price', 10, 2); // Adding the 'price' column
            // Other fields as needed
            $table->foreign('food_item_id')->references('id')->on('food_items')->cascadeOnDelete();
            // Define a foreign key to link cart items to food items
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
