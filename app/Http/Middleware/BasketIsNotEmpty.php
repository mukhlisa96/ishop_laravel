<?php

namespace App\Http\Middleware;

use Closure;
use App\Order;
class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $orderId = session('orderId');

        if (!is_null($orderId) && Order::getFullSum() > 0) {
                return $next($request);
            }
        
        session()->flash('warning', 'Vasha korzina pusta');
        return redirect()->route('index');
    }
}
