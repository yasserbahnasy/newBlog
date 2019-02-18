<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function articale(){
    	return $this->belongsTo('App\Articale');	
    }
}
