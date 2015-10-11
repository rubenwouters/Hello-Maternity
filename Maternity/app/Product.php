<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function colors(){
    	return $this->belongsToMany('App\Color', 'tblColors_tblProducts', 'FK_color', 'FK_product');
    }
}
