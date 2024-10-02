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
        Schema::create('users_information', function (Blueprint $table) {
            $table->id('user_information_id');  // Primary key
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->text('address');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');  // Foreign key referencing users table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_information');
    }
};
