<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyCustomerInvoiceDetail extends Model
{
    public function delivery_order(){
        return $this->belongsTo(DeliveryOrder::class,'do_id','id');
    }
}
