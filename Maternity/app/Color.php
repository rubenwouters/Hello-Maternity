<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    // RELATIONS
    public function products(){
    	return $this->belongsToMany('App\Product', 'colors_products', 'FK_color', 'FK_product');
    }
}
