<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Color;
use App\Type;
use App\Product;
use Auth;

class ClothesController extends Controller
{

    public function addClothes(){

        $colors = Color::all();
        $types = Type::all();

        return view('clothes.add')->withColors($colors)->withTypes($types);
    }

    public function saveClothes(Request $request){

        $product = new Product;
        $product->FK_type = $request->input('type');
        $product->FK_user = Auth::user()->id;
        $product->brand = $request->input('brand');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->seller = Auth::user()->name;
        $product->paid = 0;

        $product->save();

        $product = Product::find($product->id);
        $product->colors()->attach($request->input('colors'));

        return redirect()->action('DashboardController@index');
    }

    public function updateClothes(Request $request, $id){

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
