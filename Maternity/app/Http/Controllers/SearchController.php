<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class SearchController extends Controller
{
    public function search(Request $request){

        $type = $request->input('clothes');
        $size = $request->input('size');
        $maxPrice = $request->input('maxPrice');
        $minPrice = $request->input('minPrice');
        $colors = $request->input('colors');

        $result = Product::search($type,$size,$maxPrice,$minPrice,$colors);

        return view('search.results')->withResults($result);
    }
}
