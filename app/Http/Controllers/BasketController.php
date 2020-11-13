<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Order;
use App\Product;
use App\Classes\Basket;

class BasketController extends Controller
{
    
    public function basket(){
        $order = (new Basket())->getOrder();
        return view('basket', compact('order'));
    }

    public function basketPlace(){
        $basket = new Basket();
        $order = $basket->getOrder();
        if(!$basket->countAvailable()){
            session()->flash('warning', 'tovar ne dostupen dlya zakaza v polnom obyome');
            return redirect('basket');
        }
        return view('order', compact('order'));
    }


    public function basketConfirm(Request $request){
        
        $email = Auth::check() ? Auth::user()->email : $request->email;
        if ((new Basket())->saveOrder($request->name, $request->phone, $request->email)) {
            session()->flash('success', 'Vash zakaz prinyat b obrabotku');
        }else{
            session()->flash('warning', 'tovar ne dostupen dlya zakaza v polnom obyome');
        }

        Order::eraseOrderSum();
    	return redirect()->route('index');
    }

    public function basketAdd(Product $product){
        $result = (new Basket(true))->addProduct($product);
        if ($result) {
            session()->flash('success', 'dobavlen tovar '. $product->name);
        } else {
            session()->flash('warning', 'tovar '. $product->name. ' bolshe nedostupen');
        }
        
    	return redirect()->route('basket');
    }

    public function basketRemove(Product $product){
        (new Basket())->removeProduct($product);
    	$orderId = session('orderId');
    	$order = Order::findOrFail($orderId);	



        Order::changeFullSum(-$product->price);

        session()->flash('warning', 'udalyon tovar '. $product->name);
    	return redirect()->route('basket');
    }
}
