<?php
namespace App\Http\Controllers;

use App\Models\Rating; // Ensure to import the Rating model
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function store(Request $request, $product)
    {
        $request->validate([
            'rating' => 'required|integer',
            'stars' => 'required|integer',
            'comment' => 'nullable|string',
            'item_id' => 'required|exists:items,id', // ตรวจสอบว่า item_id มีอยู่จริงในตาราง items
        ]);
        

        // ใช้ $product ID ในการบันทึกการให้คะแนน
        $rating = new Rating();
        $rating->user_id = auth()->id(); // กำหนด user_id ที่ถูกต้อง
        $rating->item_id = $request->input('item_id'); // ตรวจสอบว่า item_id มีค่า
        $rating->product_id = $product; // หรือใช้ค่า product_id ที่เหมาะสม
        $rating->rating = $request->input('rating'); // ค่าระดับคะแนน
        $rating->stars = $request->input('stars'); // จำนวนดาวที่ให้
        $rating->comment = $request->input('comment'); // คอมเมนต์
        $rating->save();
    
        return redirect()->route('product.show', $product)->with('success', 'ความคิดเห็นของคุณถูกบันทึกแล้ว');

        // Flash message
session()->flash('success', 'ความคิดเห็นของคุณถูกบันทึกแล้ว');
dd(session()->all()); // ดูว่า session มีข้อมูลอะไรอยู่
return redirect()->route('product.show', $product);

    }
    

    public function create($productId)
{
    $product = Product::findOrFail($productId);
    return view('ratings.create', compact('product'));
}

}
