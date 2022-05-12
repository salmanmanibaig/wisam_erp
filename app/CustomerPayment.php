<?php

namespace App;
use App\Vendor;
use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    protected $table='vendor_payments';

    public function payment(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
