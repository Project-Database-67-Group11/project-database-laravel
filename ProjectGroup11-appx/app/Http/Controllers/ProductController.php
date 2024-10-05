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
            'product_id' => 2,
            'product_name' => 'BAAM CREATINE MAX ATP 5000',
            'product_description' => 'เหมาะกับใคร? ต้องการสร้างความแข็งแรงของกล้ามเนื้อ, เพิ่มผลลัพธ์จากการทานโปรตีน/เวย์ เพียงอย่างเดียว',
            'product_img' => 'https://bucket.fitwhey.com/products/6b06d5e9eb360935e56fd050cab6573f.webp',
            'product_price' => 375,
            'product_quantity' => 87,
            'product_type' => 'Creatine',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return 'Product added successfully!';
    }

    // แสดงจาก product ของแต่ละ id ใน database
    public function show($id)
    {
        // ดึงข้อมูลสินค้าจากฐานข้อมูลตาม product_id
        $product = Product::where('product_id', $id)->firstOrFail();

        // ส่งข้อมูลสินค้าไปยัง view ที่จะทำการแสดง
        return view('product.show', compact('product'));
    }
}
