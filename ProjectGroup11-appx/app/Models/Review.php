<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $primaryKey = 'review_id';

    protected $fillable = [
        'user_information_id', // อ้างอิงถึง User
        'product_id',          // อ้างอิงถึง Product
        'order_id',            // อ้างอิงถึง Order
        'comment',
        'rate',
    ];

    // Define the relationship with User (Many-to-One)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_information_id');
    }

    // Define the relationship with Product (Many-to-One)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Define the relationship with Order (One-to-One)
    public function order()
    {
        return $this->hasOne(Order::class, 'order_id', 'order_id');
    }
}