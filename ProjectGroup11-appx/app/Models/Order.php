<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders'; // ชื่อของตาราง
    protected $primaryKey = 'order_id'; // ตั้งชื่อ primary key
    public $incrementing = false; // กำหนดว่า primary key เป็น auto-increment หรือไม่
    protected $keyType = 'string'; // กำหนดประเภทของ primary key หากเป็น string (เช่น UUID)

    protected $fillable = [
        'all_order_id',
        'product_id',
        'user_information_id',
        'date',
        'quantity',
        'total_price',
        'status',
        'payment',
        'shipping',
        'order_addr',
    ];

    // ความสัมพันธ์ระหว่าง Order และ Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
}
