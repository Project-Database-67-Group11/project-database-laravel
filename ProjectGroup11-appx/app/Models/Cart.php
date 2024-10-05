<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id',
        'user_information_id',
        'quantity',
    ];

    // แก้ไขความสัมพันธ์ระหว่าง Cart และ Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}