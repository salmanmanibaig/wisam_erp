<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyCustomerInvoice extends Model
{
    public function invoice_details(){
        return $this->hasMany(SupplyCustomerInvoiceDetail::class,'invoice_id','id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
