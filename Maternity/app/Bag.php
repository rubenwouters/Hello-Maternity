<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    protected $table = 'bags';
    public $timestamps = false;
    
    // RELATIONS
    public function users(){
    	return $this->belongsToMany('App\User', 'bags_users', 'FK_bag', 'FK_user');
    }
}
