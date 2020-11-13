<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Http\SubscriptionRequest;
use App\Http\Requests\ProductsFilterRequest;
use App\Category;
use App\Product;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Collection;


class MainController extends Controller
{


    public function index(ProductsFilterRequest $request){
        $productsQuery = Product::with('category');
        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }
        foreach (['hit', 'new', 'recommend'] as $field) {
            if ($request->has($field)) {
                $productsQuery->$field();
            }
        }
        $products = $productsQuery->paginate(6)->withPath("?".$request->getQueryString());
    	return view('index', compact('products'));
    }

     public function categories(){
     	$categories = Category::get();
    	return view('categories', compact('categories'));
    } 

    public function category($code){
    	$category = Category::where('code', $code)->first();
    	return view('category', compact('category'));
    }

    public function product($ategory, $productCode){
        $product = Product::withTrashed()->byCode($productCode)->firstOrFail();
    	return view('product', compact('product'));
    }

    public function subscribe(SubscriptionRequest $request, Product $product){
        Subscription::create([
            'email'=>$request->email,
            'product_id'=>$product->id,
        ]);
        return redirect()->back()->with('success', 'Spasibo mi soobshim vam o postuplenii tovara');
    }

    public function changeLocale($locale){

        $availableLocales = ['ru', 'en'];
        if (!in_array($locale, $availableLocales)) {
            $locale = config('app.locale');
        }
        session(['locale' => $locale]);
        App::setlocale($locale);
        return redirect()->back();
    }

}
