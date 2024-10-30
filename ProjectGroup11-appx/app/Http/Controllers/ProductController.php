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
        $product = Product::with('reviews')->where('product_id', $id)->firstOrFail();

        // ส่งข้อมูลสินค้าและรีวิวไปยัง view ที่จะทำการแสดง
        return view('product.show', compact('product'));
    }

    // แสดงสินค้าทั้งหมด
    public function showAllProducts(Request $request)
    {
        // Start with all products
        $query = Product::query();
    
        // Check if a product type is specified for filtering
        if ($request->filled('type')) {
            $query->where('product_type', $request->input('type'));
        }
    
        // Apply sorting if specified
        if ($request->filled('sort')) {
            $sortOption = explode(',', $request->input('sort'));
            $query->orderBy($sortOption[0], $sortOption[1]);
        }
    
        // Fetch the products based on the query
        $products = $query->get();
    
        return view('dashboard', compact('products'));
    }
    

    public function sort(Request $request)
    {
        // รับค่าการเรียงลำดับจากคำขอ
        $sortOption = explode(',', $request->input('sort', 'product_name,asc'));
        $sortColumn = $sortOption[0]; // คอลัมน์ที่ใช้เรียงลำดับ
        $sortDirection = $sortOption[1]; // ทิศทางการเรียงลำดับ
    
        // กำหนดคอลัมน์ที่สามารถเรียงลำดับได้
        $validSortColumns = ['product_name', 'product_price'];
    
        // ตรวจสอบให้แน่ใจว่าคอลัมน์ที่ใช้เรียงลำดับถูกต้อง
        if (!in_array($sortColumn, $validSortColumns)) {
            $sortColumn = 'product_name'; // ค่าดีฟอลต์
        }
    
        // ตรวจสอบให้แน่ใจว่าทิศทางการเรียงลำดับถูกต้อง
        $validSortDirections = ['asc', 'desc'];
        if (!in_array($sortDirection, $validSortDirections)) {
            $sortDirection = 'asc'; // ค่าดีฟอลต์
        }
    
        // ดึงข้อมูลสินค้าจากฐานข้อมูลและเรียงลำดับ
        $products = Product::orderBy($sortColumn, $sortDirection)->get();
    
        // ส่งข้อมูลไปยังวิว
        return view('dashboard', compact('products'));
    }
}
