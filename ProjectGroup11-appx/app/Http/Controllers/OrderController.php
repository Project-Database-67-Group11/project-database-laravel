<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('profile.orders.index', compact('orders'));
    }

    public function pending()
    {
        $orders = Order::with('items')->where('status', 'pending')->get();
        return view('profile.orders.pending', compact('orders'));
    }

    public function completed()
    {
        $orders = Order::with('items')->where('status', 'completed')->get();
        return view('profile.orders.completed', compact('orders'));
    }

    public function cancelled()
    {
        $orders = Order::with('items')->where('status', 'cancelled')->get();
        return view('profile.orders.cancelled', compact('orders'));
    }

    public function placeOrder(Request $request)
    {
        // ดึงข้อมูล user_information_id ของผู้ใช้ที่ล็อกอิน
        $userInformation = UserInformation::where('user_id', auth()->id())->first();
    
        if (!$userInformation) {
            return redirect()->back()->with('error', 'User information not found.');
        }
    
        // ดึงข้อมูลสินค้าจากตะกร้า
        $cartItems = Cart::where('user_information_id', $userInformation->user_information_id)->get();
    
        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Cart is empty.');
        }
    
        // คำนวณ subtotal
        $subtotal = $cartItems->sum(fn($item) => $item->product->product_price * $item->quantity);
    
        // ตรวจสอบการเลือกการชำระเงินและการจัดส่ง
        $paymentMethod = $request->input('payment');
        $shippingMethod = $request->input('shipping');
    
        // คำนวณค่าขนส่ง
        $shippingCost = $shippingMethod === 'fast' ? 0.005 * $subtotal : 0.003 * $subtotal;
    
        // คำนวณภาษี (7%)
        $taxes = 0.07 * $subtotal;
    
        // คำนวณ grand total
        $totalPrice = $subtotal + $taxes + $shippingCost;
    
        // สร้าง All Order ID สำหรับกลุ่มคำสั่งซื้อเดียวกัน
        $allOrderId = Order::max('all_order_id') + 1; // เพิ่มค่า all_order_id ให้มากที่สุดที่มีอยู่ +1
    
        // สร้างคำสั่งซื้อในตาราง orders
        foreach ($cartItems as $item) {
            Order::create([
                'all_order_id' => $allOrderId,
                'product_id' => $item->product_id,
                'user_information_id' => $userInformation->user_information_id,
                'date' => now(),
                'quantity' => $item->quantity,
                'total_price' => $totalPrice,
                'status' => 'Pending',
                'payment' => $paymentMethod,
                'shipping' => $shippingMethod,
            ]);
        }
    
        // ล้างตะกร้าหลังจากทำการสั่งซื้อสำเร็จ
        Cart::where('user_information_id', $userInformation->user_information_id)->delete();
    
        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }
}
