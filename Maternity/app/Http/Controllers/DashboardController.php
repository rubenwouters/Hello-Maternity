<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use Auth;
use Validator;
use Image;
use Input;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $products = Product::getUserProducts();
        $sold = Product::getSoldProducts();

        return view('dashboard.index')->withUser($user)->withProducts($products)->withSold($sold);
    }

    public function settings(){

    	$user = Auth::user();
    	return view('dashboard.settings')->withUser($user);
    }

    public function postSettings(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'location' => 'required',
        ]);

    	$user = $this->findUser($id);
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->location = $request->input('location');

    	$user->save();

        return redirect()->action('DashboardController@index');
    }

    public function changePassword(Request $request, $id){
        
        $this->validate($request, [
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $user = $this->findUser($id);
        $user->password = bcrypt($request->input('password'));

        $user->save();
        return redirect()->action('DashboardController@index');


    }

    public function uploadProfilePic(Request $request, $id){
        
        $user = $this->findUser($id);
        $input = array('image' => $request->file('profilePic'));
        $rules = array( 'image' => 'required|image|max:10000' );
        $validator = Validator::make($input, $rules);

        if( ! $validator->fails() ){

            $image = $request->file('profilePic');
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('profile_pictures/' . $filename);
            Image::make($image->getRealPath())->fit(200, 200, null, 'top')->save($path);

            $user->picture = $filename;
            $user->save();
        }

        return redirect()->action('DashboardController@index');
    }

    public function findUser($id){
        return User::find($id);
    }
}
