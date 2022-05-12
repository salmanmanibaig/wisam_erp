<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PoExpense extends Model
{
    public function vendor_expense(){
        return $this->hasOne(VendorPurchaseOrderExpense::class,'id','expense_id');
    }
}
