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
        $product = Product::find(1);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);
        $quantity = $cart[$product->id]['quantity'] ?? 1;

        return view('cart', compact('product', 'quantity'));
    }

    public function update(Request $request, $productId)
    {
        $userInformation = UserInformation::where('user_id', auth()->id())->first();

        if (!$userInformation) {
            return redirect()->back()->with('error', 'User information not found.');
        }

        $cartItem = Cart::where('product_id', $productId)
            ->where('user_information_id', $userInformation->user_information_id)
            ->first();

        if (!$cartItem) {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }

        if ($request->action === 'increase') {
            $cartItem->quantity += 1;
        } elseif ($request->action === 'decrease' && $cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
        }

        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }


    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $product = Product::where('product_id', $productId)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $userInformation = UserInformation::where('user_id', auth()->id())->first();

        if (!$userInformation) {
            return redirect()->back()->with('error', 'User information not found.');
        }

        $existingCartItem = Cart::where('product_id', $productId)
            ->where('user_information_id', $userInformation->user_information_id)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->quantity += $quantity;
            $existingCartItem->save();
        } else {
            Cart::create([
                'product_id' => $product->product_id,
                'user_information_id' => $userInformation->user_information_id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removed(Request $request)
    {
        $cart_id = $request->input('cart_id');

        // ตรวจสอบว่ามีการส่ง cart_id มาหรือไม่
        if (!$cart_id) {
            return redirect()->back()->with('error', 'Cart ID not provided.');
        }

        $userInformation = UserInformation::where('user_id', auth()->id())->first();

        if (!$userInformation) {
            return redirect()->back()->with('error', 'User information not found.');
        }

        $cartItem = Cart::where('cart_id', $cart_id)
            ->where('user_information_id', $userInformation->user_information_id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
        } else {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }


    public function index()
    {
        $userInformation = UserInformation::where('user_id', auth()->id())->first();

        if (!$userInformation) {
            return redirect()->back()->with('error', 'User information not found.');
        }

        // ดึงข้อมูลตะกร้าพร้อม cart_id เพื่อให้สามารถใช้งานใน Blade Template ได้
        $cartItems = Cart::select('cart_id', 'product_id', \DB::raw('SUM(quantity) as total_quantity'))
            ->where('user_information_id', $userInformation->user_information_id)
            ->groupBy('cart_id', 'product_id')
            ->get();

        return view('cart.index', compact('cartItems'));
    }
}
