<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Validator;

class SearchController extends Controller
{
    public function search(Request $request){

        $validator = Validator::make($request->all(), [
            'clothes' => 'required',
            'size' => 'required',
            'maxPrice' => 'required|integer',
            'minPrice' => 'required|integer',
            'colors' => 'required',
        ]);

         if ($validator->fails()) {
         	return view('search.results')->withErrors($validator);
         }


        $type = $request->input('clothes');
        $size = $request->input('size');
        $maxPrice = $request->input('maxPrice');
        $minPrice = $request->input('minPrice');
        $colors = $request->input('colors');

        $result = Product::search($type,$size,$maxPrice,$minPrice,$colors);

        return view('search.results')->withResults($result);
    }
}
