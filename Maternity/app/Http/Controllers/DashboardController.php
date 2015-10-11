<?php

namespace App\Http\Controllers;
use App\User;
use Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
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

        return redirect()->action('DashboardController@settings');
    }
}
