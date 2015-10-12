<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = false;

    public function colors(){
    	return $this->belongsToMany('App\Color', 'colors_products', 'FK_product', 'FK_color');
    }
}
