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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code', 15)->unique();
            $table->string('nama_customer', 30);
            $table->dateTime('order_date');
            $table->integer('table_number');
            $table->string('payment_method', 20);
            $table->string('status', 20)->default('pending');
            // Add more columns as needed for the cart items
            $table->json('cart_items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
