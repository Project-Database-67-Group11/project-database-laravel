<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // ตรวจสอบว่าคุณมี Model Product

class CartController extends Controller
{
    public function showCart()
    {
        // ดึงข้อมูลสินค้า (สมมุติว่าคุณมี Model ที่ชื่อ Product)
        $product = Product::find(1); // นี่เป็นตัวอย่างการดึงสินค้าด้วย id 1

        // ดึงจำนวนสินค้าจาก session
        $cart = session()->get('cart', []);
        $quantity = $cart[$product->id]['quantity'] ?? 1;

        // ส่งข้อมูลไปยัง Blade Template
        return view('cart', compact('product', 'quantity'));
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart');

        // ตรวจสอบว่ามีสินค้านี้ในตะกร้าหรือไม่
        if (isset($cart[$id])) {
            if ($request->action === 'increase') {
                $cart[$id]['quantity'] += 1;
            } elseif ($request->action === 'decrease' && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
            }

            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated!');
    }
}
