<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // กำหนดฟิลด์ที่สามารถเติมข้อมูลได้
    protected $fillable = [
        'product_id',
        'product_name',
        'product_description',
        'product_img',
        'product_price',
        'product_quantity',
        'product_type',
        'created_at',
        'updated_at',
    ];
}