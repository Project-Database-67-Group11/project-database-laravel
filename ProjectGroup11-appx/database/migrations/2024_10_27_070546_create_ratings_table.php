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
            Schema::create('ratings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->nullable(); // สามารถเป็น null
                $table->foreignId('item_id')->constrained()->onDelete('cascade'); // สร้างความสัมพันธ์ foreign key
                $table->integer('rating'); // ค่าระดับคะแนน
                $table->unsignedBigInteger('product_id'); // ต้องใช้ unsigned
                $table->integer('stars')->unsigned(); // จำนวนดาวที่ให้
                $table->text('comment')->nullable(); // คอมเมนต์ที่สามารถเป็น null ได้.
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
