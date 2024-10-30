<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ProductController extends Controller
{
    // test
    public function addProduct()
    {
        Product::create([
            'product_id' => 4,
            'product_name' => 'ISO ABSOLUTE ZERO',
            'product_description' => 'เหมาะกับใคร ?
ต้องการสร้างกล้ามเนื้อ แบบคุมไขมัน, เร่งการฟื้นฟูกล้ามเนื้อ, อยากได้เวย์คุณภาพสูง, คนที่แพ้แลคโตสในนม, นักกีฬา, ผู้สูงอายุ',
            'product_img' => 'https://bucket.fitwhey.com/ProductType/26e75a452d8d4cad245b03203fc8e145.webp',
            'product_price' => 2295,
            'product_quantity' => 123,
            'product_type' => 'Protein',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // แสดงจาก product ของแต่ละ id ใน database
    public function show($id)
    {
        // ดึงข้อมูลสินค้าจากฐานข้อมูลตาม product_id
        $product = Product::where('product_id', $id)->firstOrFail();

        // ส่งข้อมูลสินค้าไปยัง view ที่จะทำการแสดง
        return view('product.show', compact('product'));
    }

    public function showTrendingProducts()
    {
        $trendingProducts = Order::select('product_id', \DB::raw('COUNT(product_id) as order_count'))
            ->groupBy('product_id')
            ->orderByDesc('order_count')
            ->take(4) // Get the top 4 trending products
            ->get();

        // Now, retrieve product details for each trending product
        $products = Product::whereIn('product_id', $trendingProducts->pluck('product_id'))->get();

        return view('dashboard', compact('products'));
    }
}
