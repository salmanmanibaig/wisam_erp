<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Supplier extends Model
{
    protected $table='suppliers';
    protected $fillable=['supplier_name','company_name','supplier_email','supplier_city','supplier-address','supplier_contact','supplier_type'];
//    protected $fillable=['supplier_name','supplier_address','supplier_contact'];
//    public function product(){
//        return $this->belongsToMany(CrmProduct::class,'product_supplier','product_id','supplier_id');
//    }

    public function supplier(){
        return $this->hasOne('PaymentTrans');
    }


}
