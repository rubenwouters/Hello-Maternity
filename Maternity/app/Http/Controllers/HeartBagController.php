<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Bag;
use App\Product;
use Auth;

class HeartBagController extends Controller
{
    public function index(){

        $user = Auth::user();
        $arProducts = [];

        foreach ($user->bags->where('inBag', 0) as $key => $product){
            $arProducts[$key] = Product::findOrFail($product->productId);
        } 

        return view('heartBag.index')->with('products', $arProducts);
    }

    public function add($id){

        $bag = new Bag;
        $bag->productId = $id;
        $bag->inBag = 0;

        $bag->save();
        $bag->users()->attach(Auth::user()->id);
        $bag->products()->attach($id);

        return redirect::back();
    }

    public function delete($id){

        $user = Auth::user();
        $userBag = $user->bags->where('productId', $id)->first();
        $userBag->delete();

        $user->bags()->detach($userBag->pivot->FK_bag);
        $userBag->products()->detach($id);

        return back();
    }

    public function toBag($id){
        $product = Bag::where('productId', $id)->first();
        $product->inBag = 1;
        $product->save();

        return redirect()->action('HeartBagController@index');
    }
}
