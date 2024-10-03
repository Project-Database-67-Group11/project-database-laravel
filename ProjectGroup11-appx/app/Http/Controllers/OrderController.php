<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')->get();

        return view('orders.index', compact('orders'));
    }

    public function pending()
    {
        $orders = Order::with('items')->where('status', 'pending')->get();
        return view('orders.pending', compact('orders'));
    }

    public function completed()
    {
        $orders = Order::with('items')->where('status', 'completed')->get();
        return view('orders.completed', compact('orders'));
    }

    public function cancelled()
    {
        $orders = Order::with('items')->where('status', 'cancelled')->get();
        return view('orders.cancelled', compact('orders'));
    }
}
