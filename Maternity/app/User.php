<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'location', 'picture'];
    protected $hidden = ['password', 'remember_token'];

    // RELATIONS
    public function products(){
    	return $this->hasMany('App\Product', 'FK_user');
    }

    public function bags(){
    	return $this->belongsToMany('App\Bag', 'bags_users', 'FK_user', 'FK_bag');
    }

    // DB INTERACTION

    public static function getHeartBag(){
        if(Auth::check()){
            return User::where('id', Auth::user()->id)->first()->bags->where('inBag', 0);
        }
        return null;
    }
}
