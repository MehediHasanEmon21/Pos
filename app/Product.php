<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function supplier(){

    	return $this->belongsTo('App\Model\Supplier');

    }

    public function category(){

    	return $this->belongsTo(Category::class);

    }

    public function unit(){

    	return $this->belongsTo(Unit::class);

    }
}
