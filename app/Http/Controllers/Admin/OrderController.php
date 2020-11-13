<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::active()->paginate(5); 
        return view('orders.index', compact('orders'));
    }

     public function show(Order $order)
    {
        $products = $order->products()->withTrash()->get();
        return view('orders.show', compact('order', 'products'));
    }
}
