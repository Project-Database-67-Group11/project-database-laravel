<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // ระบุคอลัมน์ที่อนุญาตให้เพิ่มข้อมูลได้
    protected $fillable = [
        'product_id',
        'user_information_id',
        'quantity',
    ];

    // กำหนด primary key ให้เป็น 'cart_id' แทน 'id'
    protected $primaryKey = 'cart_id';

    // กำหนดให้ primary key เป็น auto-increment
    public $incrementing = true;

    // กำหนดประเภทของ primary key (ในกรณีนี้คือ int)
    protected $keyType = 'int';

    // แก้ไขความสัมพันธ์ระหว่าง Cart และ Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}