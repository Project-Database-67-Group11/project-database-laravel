<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\UserInformation;
use Illuminate\Http\Request;

abstract class Controller
{
    //
    public function checkout(Request $request)
    {
        // ดึงข้อมูล user_information_id ของผู้ใช้ที่ล็อกอิน
        $userInformation = UserInformation::where('user_id', auth()->id())->first();

        if (!$userInformation) {
            return redirect()->back()->with('error', 'User information not found.');
        }

        // ดึงข้อมูลสินค้าจากตะกร้า
        $cartItems = Cart::where('user_information_id', $userInformation->user_information_id)->get();

        // คำนวณ subtotal
        $subtotal = $cartItems->sum(fn($item) => $item->product->product_price * $item->quantity);

        // คำนวณภาษี (3%)
        $taxes = 0.03 * $subtotal;

        // ตรวจสอบว่าผู้ใช้เลือกการจัดส่งแบบใด
        $shippingMethod = $request->input('shipping', 'normal'); // ค่าเริ่มต้นเป็น 'normal' หากไม่มีการเลือก
        if ($shippingMethod === 'fast') {
            $shippingCost = 0.005 * $subtotal;
        } else {
            $shippingCost = 0.003 * $subtotal;
        }

        // คำนวณ grand total
        $grandTotal = $subtotal + $taxes + $shippingCost;

        // ส่งข้อมูลไปยัง view
        return view('checkout.checkout', compact('userInformation', 'cartItems', 'subtotal', 'taxes', 'shippingCost', 'grandTotal'));
    }
}
