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
        $arBag = $this->getBag();
        $arHeartbag = $this->getHeartBag();

        return view('home')->withProducts($products)->withBag($arBag)->withWishlist($arHeartbag);
    }

    public function productInfo($id){

        $product = Product::find($id);
        $user = User::find($product->FK_user);
        $related = Product::getRelated($id);
        $arBag = $this->getBag();
        $arHeartbag = $this->getHeartBag();

        return view('clothes.view')
                    ->withProduct($product)
                    ->withUser($user)
                    ->withBag($arBag)
                    ->withWishlist($arHeartbag)
                    ->withRelated($related);
    }

    public function getHeartBag(){
        $arHeartBag = [];

        if(Auth::check()){
            foreach (Auth::user()->bags->where('inBag', 0) as $key => $value) {
                $arHeartBag[$key] = $value->productId;
            }
        }

        return $arHeartBag;
    }

    public function getBag(){
        $arBag = [];

        if(Auth::check()){
            foreach (Auth::user()->bags->where('inBag', 1) as $key => $value) {
                $arBag[$key] = $value->productId;
            }
        }

        return $arBag;
    }
}