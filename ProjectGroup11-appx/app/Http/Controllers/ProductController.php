<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // test
    public function addProduct()
    {
        Product::create([
            'product_id' => 1,
            'product_name' => 'MY WHEY PROTEIN',
            'product_description' => 'เหมาะกับใคร? ต้องการสร้างกล้ามเนื้อ, เร่งการฟื้นฟูกล้ามเนื้อ, อยากได้เวย์ที่ราคาถูก และคุณภาพดี,นักกีฬา',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/b76f455d70bcdd92ab1d90cdb83843a2.webp',
            'product_price' => 10000,
            'product_quantity' => 512,
            'product_type' => 'Protein',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return 'Product added successfully!';
    }

    // แสดงจาก database
    public function show($id)
    {
        // ดึงข้อมูลสินค้าจากฐานข้อมูลตาม product_id
        $product = Product::where('product_id', $id)->firstOrFail();

        // ส่งข้อมูลสินค้าไปยัง view ที่จะทำการแสดง
        return view('product.show', compact('product'));
    }
}
