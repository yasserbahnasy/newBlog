<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function articale(){
    	return $this->hasOne('Articale');	
    }
}
