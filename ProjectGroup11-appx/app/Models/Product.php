<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Specify the table if necessary (optional)
    protected $table = 'products';

    // Specify the primary key
    protected $primaryKey = 'product_id';

    // Indicate if the primary key is incrementing
    public $incrementing = true; // Use true since product_id is an auto-increment field

    // Set the data type for the primary key
    protected $keyType = 'int'; // Set to 'int' since product_id is an integer

    // Specify fillable fields
    protected $fillable = [
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