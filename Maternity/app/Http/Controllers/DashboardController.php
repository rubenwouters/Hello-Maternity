<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $products = Product::where('FK_user', Auth::user()->id)->where('paid', 0)->get();

        
        return view('dashboard.index')->withUser($user)->withProducts($products);
    }

    public function settings(){

    	$user = User::find(Auth::user()->id);
    	return view('dashboard.settings')->withUser($user);
    }

    public function postSettings(Request $request, $id){

    	$user = User::find($id);
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->password = bcrypt($request->input('password'));
    	$user->location = $request->input('location');

    	$user->save();

        return redirect()->action('DashboardController@index');
    }
}
