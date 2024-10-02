<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'review_id',
        'user_information_id',
        'product_id',
        'comment',
    ];
}
