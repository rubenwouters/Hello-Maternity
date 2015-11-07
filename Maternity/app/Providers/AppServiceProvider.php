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
            if(Auth::check())  {
                $colors = Color::all();
                $types = Type::all();
                $maxPrice = Product::orderBy('price', 'DESC')->first()->price;

                $view->with('bagContent', Auth::user()->bags)
                        ->with('colors', $colors)
                        ->with('types', $types)
                        ->with('maxPrice', $maxPrice);
            }
            else{
                $view->with('bagContent', 0);
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
