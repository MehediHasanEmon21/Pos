<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function payment(){

    	return $this->hasOne(payment::class);
    }

    public function invoiceDetails(){

    	return $this->hasMany(InvoiceDetail::class);
    }
}
