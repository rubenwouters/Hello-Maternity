<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    public function products(){
    	return $this->belongsToMany('App\Product', 'tblColors_tblProducts', 'FK_product', 'FK_color');
    }
}
