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
            $table->string('food_item_name'); // Column for the name of the food item
            $table->unsignedBigInteger('food_item_id'); // Foreign key to the food_items table
            $table->integer('quantity')->default(1);
            $table->decimal('food_item_price', 8, 2);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('food_item_id')->references('id')->on('food_items')->onDelete('cascade');
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
