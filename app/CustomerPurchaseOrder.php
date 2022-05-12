<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerPurchaseOrder extends Model
{

    public function unit(){
        return $this->hasOne(Unit::class,'id','unit_id');
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }

    public function customer(){
    return $this->hasOne(Customer::class,'id','customer_id');
}



    public function terms(){
        return $this->hasMany(CpoTerm::class,'po_id','id');
    }

    public function expense(){
    return $this->hasMany(CpoExpense::class,'po_id','id');

}  public function agent(){
    return $this->hasMany(CommissionAgent::class,'po_id','id');

}

}
