<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\UserInformation;

abstract class Controller
{
    //
    public function checkout()
    {
        // ดึงข้อมูล user_information_id ของผู้ใช้ที่ล็อกอิน
        $userInformation = UserInformation::where('user_id', auth()->id())->first();
    
        if (!$userInformation) {
            return redirect()->back()->with('error', 'User information not found.');
        }
    
        // ดึงข้อมูลสินค้าจากตะกร้า
        $cartItems = Cart::where('user_information_id', $userInformation->user_information_id)->get();
    
        // คำนวณ subtotal, taxes, shipping cost และ grand total
        $subtotal = $cartItems->sum(fn($item) => $item->product->product_price * $item->quantity);
        $taxes = 0.07*$subtotal;
        $shippingCost = 0.005*$subtotal;
        $grandTotal = $subtotal + $taxes + $shippingCost;
    
        // ส่งข้อมูลไปยัง view
        return view('checkout.checkout', compact('userInformation', 'cartItems', 'subtotal', 'taxes', 'shippingCost', 'grandTotal'));
    }
}
