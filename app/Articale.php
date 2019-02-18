<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Articale extends Model
{	

    public function image(){
    	return $this->belongsTo('App\Image');	
    }

    public function user(){
    	return $this->belongsTo('App\User');	
    }

    public function department(){
    	return $this->belongsTo('App\Department');	
    }

    public function comment(){
    	return $this->hasMany('App\Comment');	
    }
}
