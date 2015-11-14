<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use Validator;

class SearchController extends Controller
{
    public function search(Request $request){

        $validator = Validator::make($request->all(), [
            
            'maxPrice' => 'required|integer',
            'minPrice' => 'required|integer',
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

        $arBag = self::getBag();
        $arHeartbag = self::getHeartBag();

        return view('search.results')->withResults($result)->withBag($arBag)->withHeartbag($arHeartbag);
    }

    public function searchByColor($id){
        $arBag = self::getBag();
        $result = Product::searchByColor($id);
        return view('search.results')->withResults($result)->withBag($arBag);
    }

    private function getHeartBag(){
        $arHeartBag = [];

        if(Auth::check()){
            foreach (Auth::user()->bags->where('inBag', 0) as $key => $value) {
                $arHeartBag[$key] = $value->productId;
            }
        }

        return $arHeartBag;
    }

    private function getBag(){
        $arBag = [];

        if(Auth::check()){
            foreach (Auth::user()->bags->where('inBag', 1) as $key => $value) {
                $arBag[$key] = $value->productId;
            }
        }

        return $arBag;
    }
}
