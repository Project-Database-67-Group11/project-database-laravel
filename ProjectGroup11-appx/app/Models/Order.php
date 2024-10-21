<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'all_order_id',  // เพิ่มฟิลด์ all_order_id
        'product_id', // รหัสสินค้า
        'user_information_id', // รหัสผู้ใช้
        'date', // วันที่
        'quantity', // ปริมาณ
        'total_price', // ราคารวม
        'status', // สถานะ
        'payment', // การชำระเงิน
        'shipping', // การจัดส่ง
    ];

    // ความสัมพันธ์ระหว่าง Order และ Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    
}