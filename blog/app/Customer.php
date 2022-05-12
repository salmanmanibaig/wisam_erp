<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function purchase_orders(){
        return $this->hasMany(CustomerPurchaseOrder::class,'customer_id','id');

    }
}
