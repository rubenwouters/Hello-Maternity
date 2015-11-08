<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Bag;
use App\Product;
use Redirect;

class BagController extends Controller
{
    public function index(){

        $user = Auth::user();
        $price = 0;

        if(count($user->bags) != 0){

            foreach ($user->bags as $key => $product){

                $arProducts[$key] = Product::findOrFail($product->productId);
                $price += $arProducts[$key]->price;
            } 
            return view('bag.index')->withProducts($arProducts)->withPrice($price);
        }
        return view('bag.index');
    }

    public function add($id){

        $bag = new Bag;
        $bag->productId = $id;

        $bag->save();
        $bag->users()->attach(Auth::user()->id);

        return redirect::back();
    }

    public function remove($id){
        
        $user = User::find(Auth::user()->id);
        $bagNr = $user->bags->last()->id;
        $user->bags()->detach($bagNr);

        return redirect()->action('BagController@index');
    }

    public function checkout(){

        foreach(Auth::user()->bags as $bag){

            $product = Product::find($bag->productId);
            $product->paid = 1;
            $product->save();
        }

        Auth::user()->bags()->detach();
        
        return redirect()->action('BagController@index');
    }
}
