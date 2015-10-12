<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Color;
use App\Type;

class ClothesController extends Controller
{

    public function addClothes(){

        $colors = Color::all();
        $types = Type::all();

        return view('clothes.add')->withColors($colors)->withTypes($types);
    }

    public function saveClothes(Request $request){
        dd($request->input('colors'));
    }
}
