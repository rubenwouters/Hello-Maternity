<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;

    // RELATIONS
    public function colors(){
    	return $this->belongsToMany('App\Color', 'colors_products', 'FK_product', 'FK_color');
    }

    public function type(){
		return $this->belongsTo('App\Type', 'FK_type');
	}

	public function bags(){
    	return $this->belongsToMany('App\Bag', 'bags_products', 'FK_product', 'FK_bag');
    }


	// DB INTERACTION 
	public static function getProducts(){
		return Product::where('paid', 0)->orderBy('id', 'DESC')->get();
	}

	public static function getUserProducts(){
		return Product::where('FK_user', Auth::user()->id)
                        ->where('paid', 0)
                        ->orderBy('id', 'DESC')
                        ->get();
	}

	public static function getSoldProducts(){
		return Product::where('FK_user', Auth::user()->id)
                        ->where('paid', 1)
                        ->orderBy('id', 'DESC')
                        ->get();
	}

	public static function getRelated($id){
		
		$currentProduct = Product::find($id);

		foreach ($currentProduct->colors as $key => $value) {
			$arColors[$key] = $value->id;
		}

		$related = Product::where('size', $currentProduct->size)
								->where('FK_type', $currentProduct->type->id)
								->where('id', '!=', $id)
								->whereHas('colors', function($query) use ($arColors) {
							    	$query->whereIn('id', $arColors);
								})->get();
								
		return $related;
	}

	public static function search($type, $size, $maxPrice, $minPrice, $colors){
		
		if($colors == null){
			$colors = Color::all();
			foreach ($colors as $key => $color) {
				$colors[$key] = $color->id;
			}
		}

		if($colors != null && $type == null && $size == null){
			return Product::where('price', '>=', $minPrice)
                        	->where('price', '<=', $maxPrice)
							->whereHas('colors', function($query) use ($colors) {
						    	$query->whereIn('id', $colors);
							})->get();

		}

		if($type == null){
			return Product::where('size', $size)
							->where('price', '>=', $minPrice)
                        	->where('price', '<=', $maxPrice)
							->whereHas('colors', function($query) use ($colors) {
						    	$query->whereIn('id', $colors);
							})->get();
		}

		if($size == null){
			return Product::where('FK_type', $type)
							->where('price', '>=', $minPrice)
                        	->where('price', '<=', $maxPrice)
							->whereHas('colors', function($query) use ($colors) {
						    	$query->whereIn('id', $colors);
							})->get();
		}

		return Product::where('size', $size)
							->where('FK_type', $type)
							->where('price', '>=', $minPrice)
                        	->where('price', '<=', $maxPrice)
							->whereHas('colors', function($query) use ($colors) {
						    	$query->whereIn('id', $colors);
							})->get();
	}

	public static function searchByColor($id){
		return Product::whereHas('colors', function($query) use ($id) {
						    	$query->where('id', $id);
							})->get();
	}
}