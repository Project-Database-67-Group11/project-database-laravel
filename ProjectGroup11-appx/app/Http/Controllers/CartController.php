<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserInformation;

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

    public function add(Request $request)
    {
        // รับค่าจำนวนสินค้าที่ต้องการและรหัสสินค้า
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // ตรวจสอบสินค้าว่ามีอยู่หรือไม่
        $product = Product::where('product_id', $productId)->firstOrFail();

        // ดึงข้อมูล user_information_id โดยอ้างอิงจาก user_id ที่ล็อกอินอยู่
        $userInformation = UserInformation::where('user_id', auth()->id())->firstOrFail();

        // เพิ่มสินค้าลงในตะกร้า
        Cart::create([
            'product_id' => $product->product_id,
            'user_information_id' => $userInformation->user_information_id, // ใช้ user_information_id
            'quantity' => $quantity,
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function index()
    {
        // ดึง user_information_id ของผู้ใช้ที่ล็อกอิน
        $userInformation = UserInformation::where('user_id', auth()->id())->firstOrFail();

        // ดึงข้อมูลตะกร้าและรวมจำนวนสินค้าที่มี product_id เดียวกัน
        $cartItems = Cart::select('product_id', \DB::raw('SUM(quantity) as total_quantity'))
            ->where('user_information_id', $userInformation->user_information_id)
            ->groupBy('product_id')
            ->get();

        // ส่งข้อมูลไปยัง view
        return view('cart.index', compact('cartItems'));
    }
}
