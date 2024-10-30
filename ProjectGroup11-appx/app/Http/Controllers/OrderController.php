<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
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
            // Create the order record
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
                'order_addr' => $userInformation->first_name . ' ' . $userInformation->last_name . ', ' . $userInformation->phone_number . ', ' . $userInformation->address
            ]);
    
            // Update product quantity
            $product = Product::find($item->product_id);
            if ($product) {
                $product->product_quantity -= $item->quantity; // Reduce the product quantity
                $product->save(); // Save the updated product quantity
            }
        }
    
        // ล้างตะกร้าหลังจากทำการสั่งซื้อสำเร็จ
        Cart::where('user_information_id', $userInformation->user_information_id)->delete();
    
        return redirect()->route('profile.Order_index')->with('success', 'Order placed successfully!');
    }
    

    public function getOrdersByAllOrderId($allOrderId)
    {
        // Fetch orders without checking user_information_id
        $orders = Order::where('all_order_id', $allOrderId)->get();

        // Pass orders and allOrderId to the view
        return view('profile.orders.seemore', compact('orders', 'allOrderId'));
    }

    public function action(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);
    
        // ตรวจสอบค่าจาก request และตั้งค่า status ที่เหมาะสม
        $action = $request->input('action');
        if ($action === 'cancel') {
            $newStatus = 'cancelled'; // ตั้งค่าเป็น 'cancelled'
        } elseif ($action === 'complete') {
            $newStatus = 'completed'; // ตั้งค่าเป็น 'completed'
        } else {
            return redirect()->back()->with('error', 'Invalid action.');
        }
    
        // อัปเดต status ของออเดอร์ทั้งหมดที่มี all_order_id เดียวกัน
        Order::where('all_order_id', $order->all_order_id)->update(['status' => $newStatus]);
    
        return redirect()->back()->with('status', 'Order status has been updated.');
    }
}
