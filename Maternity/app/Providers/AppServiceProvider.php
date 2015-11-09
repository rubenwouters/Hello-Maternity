<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Color;
use App\Type;
use App\Product;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $maxPrice = Product::orderBy('price', 'DESC')->first()->price;
            $minPrice = Product::orderBy('price', 'ASC')->first()->price;
            $colors = Color::all();
            $types = Type::all();
            $heartBag = User::getHeartBag();

            if(Auth::check())  {
                $view->with('bagContent', Auth::user()->bags->where('inBag', 1))
                        ->with('colors', $colors)
                        ->with('types', $types)
                        ->with('maxPrice', $maxPrice)
                        ->with('minPrice', $minPrice)
                        ->with('heartBag', $heartBag);
            }
            else{
                $view->with('bagContent', 0)
                        ->with('heartBag', 0)
                        ->with('minPrice', $minPrice)
                        ->with('maxPrice', $maxPrice)
                        ->with('colors', $colors)
                        ->with('types', $types);
            }

        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
