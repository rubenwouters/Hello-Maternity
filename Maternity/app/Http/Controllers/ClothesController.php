<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Color;
use App\Type;
use App\Product;
use Auth;
use Image;
use Input;

class ClothesController extends Controller
{

    public function addClothes(){

        $colors = Color::all();
        $types = Type::all();

        return view('clothes.add')->withColors($colors)->withTypes($types);
    }

    public function saveClothes(Request $request){

        $product = new Product;
        $this->fillData($request, $product);

        return redirect()->action('DashboardController@index');
    }

    public function updateClothes(Request $request, $id){

        $product = Product::find($id);
        $product->colors()->detach();
        $this->fillData($request, $product);

        return redirect()->action('DashboardController@index');
    }

    public function fillData($request, $product){

        // IMAGE
        $image = $request->file('image');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('clothes_pictures/' . $filename);
        Image::make($image->getRealPath())->resize(320, 320)->save($path);

        $product->FK_type = $request->input('type');
        $product->FK_user = Auth::user()->id;
        $product->brand = $request->input('brand');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->seller = Auth::user()->name;
        $product->paid = 0;
        $product->image = $filename;

        $product->save();

        $product = Product::find($product->id);
        $product->colors()->attach($request->input('colors'));

        return true;
    }

    public function edit($id){

        $product = Product::find($id);
        $colors = Color::all();
        $types = Type::all();
        $selectedColors = $product->colors;
        $selectedType = $product->FK_type;


        foreach ($selectedColors as $color) {
            $arSelectedColors[] = $color->id;
        }
        
        return view('clothes.edit')
                ->withProduct($product)
                ->withTypes($types)
                ->withColors($colors)
                ->with('selectedColors', $arSelectedColors)
                ->with('selectedType', $selectedType);
    }

    public function delete($id){

        $product = Product::find($id);
        $product->delete();
        return redirect()->action('DashboardController@index');
    }
}
