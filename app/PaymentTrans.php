<?php

namespace App;
use App\Vendor;
use Illuminate\Database\Eloquent\Model;

class PaymentTrans extends Model
{
    protected $table='vendor_payments';

    public function vendor(){
        return $this->belongsTo(Vendor::class,'object_id','id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'object_id','id');
    }
}
