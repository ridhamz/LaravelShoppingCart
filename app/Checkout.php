<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
     public function user(){
        return $this->bilongsTo('App\User');
    }
    public function checkouts(){
        return $this->hasMany('App\Post');
    }
}
