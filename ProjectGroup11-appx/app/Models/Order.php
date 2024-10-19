<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'all_order_id',  // เพิ่มฟิลด์ all_order_id
        'product_id',
        'user_information_id',
        'date',
        'quantity',
        'total_price',
        'status',
        'payment',
        'shipping',
    ];

    // ความสัมพันธ์ระหว่าง Order และ Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}