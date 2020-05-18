<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
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

    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
