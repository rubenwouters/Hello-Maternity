<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::getProducts();
        return view('home')->withProducts($products);
    }

    public function productInfo($id){

        $product = Product::find($id);
        $user = User::find($product->FK_user);
        $related = Product::getRelated($id);
        $arBag = [];

        foreach (Auth::user()->bags as $key => $value) {
            $arBag[$key] = $value->productId;
        }

        return view('clothes.view')
                    ->withProduct($product)
                    ->withUser($user)
                    ->withBag($arBag)
                    ->withRelated($related);
    }
}