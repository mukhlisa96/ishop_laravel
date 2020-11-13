<?php

namespace App\Providers;

use App\Product;
use App\Observers\ProductObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Blade::directive('routeactive', function($route){
                return "<?php echo Route::currentRouteNamed($route)? 'class=\"active\"' : ''?>";
        });

        Blade::if('admin', function(){
            return Auth::check() && Auth::user()->isAdmin();
        });

        Product::observe(ProductObserver::class);
    }
}
