<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CpoExpense extends Model
{
    public function customer_expense(){
        return $this->hasOne(CustomerPurchaseOrderExpense::class,'id','expense_id');
    }
}
