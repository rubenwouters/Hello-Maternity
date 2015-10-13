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

        $user = User::find(Auth::user()->id);

        if(count($user->bags) != 0){
            foreach ($user->bags as $product) {
                $arProducts[] = Product::findOrFail($product->productId);
            } 

            return view('bag.index')->withUser($user)->withProducts($arProducts);
        }
       
        return view('bag.index')->withUser($user);

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
}
