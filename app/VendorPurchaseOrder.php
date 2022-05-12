<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorPurchaseOrder extends Model
{
    public function unit(){
        return $this->hasOne(Unit::class,'id','unit_id');
    }

    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }

    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }public function vendor(){
        return $this->hasOne(Vendor::class,'id','vendor_id');
    }

    public function lcnumber(){
        return $this->hasMany(VendorLetterCredit::class,'po_id','id');
    }


    public function return_lc(){
        return $this->hasOne(VendorLetterCredit::class,'return_po_id','id');
    }

    public function terms(){
        return $this->hasMany(PoTerm::class,'po_id','id');
    }  public function expense(){
        return $this->hasMany(PoExpense::class,'po_id','id');
    } public function stock(){
        return $this->hasOne(StockManagment::class,'po_id','id');
    }
}
