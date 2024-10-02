<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');  // Primary key
            $table->foreignId('product_id')->constrained('products', 'product_id')->onDelete('cascade');  // Foreign key referencing products table
            $table->foreignId('user_information_id')->constrained('users_information', 'user_information_id')->onDelete('cascade');  // Foreign key referencing users_information table
            $table->date('date');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
