<?php

namespace App\Http\Controllers\Person;
use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Auth::user()->orders()->active()->paginate(5); 
        return view('orders.index', compact('orders'));
    }

     public function show(Order $order)
    {
    	if (!Auth::user()->orders->contains($order)) {
    		return back();
    	}
        return view('orders.show', compact('order'));
    }
}
