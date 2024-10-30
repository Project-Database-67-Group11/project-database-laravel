<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\UserInformation;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create($orderId)
    {
        // Retrieve the order by its ID
        $order = Order::findOrFail($orderId);
    
        // Retrieve the product associated with the order
        $product = Product::findOrFail($order->product_id);
    
        // Check if a review already exists for this order
        $review = Review::where('order_id', $orderId)->first();
    
        // Pass order, product, and review to the view
        return view('ratings.create', compact('order', 'product', 'review'));
    }
    

    

    // public function addReview(Request $request)
    // {
    //     $orderId = $request->input('order_id');

    //     $userInformation = UserInformation::where('user_id', auth()->id())->first();

    //     Review::create([
    //         'review_id' => $reviews->review_id,
    //         'user_information_id' => $userInformation->user_id,
    //         'product_id' =>
    //         'order_id' =>
    //         'comment' =>
    //         'rate' =>
    //     ]);

    //     return redirect()->back()->with('success', 'Product added to cart successfully!');
    // }
    // app/Http/Controllers/OrderController.php

    public function submitReview(Request $request, $order_id)
    {
        $userInformationId = auth()->user()->id;

        // ตรวจสอบว่ามีรีวิวอยู่แล้วสำหรับ order_id นี้หรือไม่
        $existingReview = Review::where('user_information_id', $userInformationId)
            ->where('order_id', $order_id)
            ->first();

        if ($existingReview) {
            return redirect()->back()->with('error', 'คุณได้รีวิวคำสั่งซื้อนี้แล้ว');
        }

        // ถ้าไม่มีรีวิว ให้สร้างรีวิวใหม่
        Review::create([
            'user_information_id' => $userInformationId,
            'product_id' => Order::findOrFail($order_id)->product_id, // Get the product ID from the order
            'comment' => $request->comment,
            'rate' => $request->rate,
            'order_id' => $order_id // ให้ order_id ถูกส่งไปที่นี่
        ]);

        return redirect()->back()->with('success', 'รีวิวของคุณถูกบันทึกแล้ว');
    }
}
