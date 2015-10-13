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
        $products = Product::orderBy('id', 'DESC')->get();
        return view('home')->withProducts($products);
    }

    public function productInfo($id){

        $product = Product::find($id);
        $user = User::find(Auth::user()->id);

        return view('clothes.view')->withProduct($product)->withUser($user);
    }

    
}
