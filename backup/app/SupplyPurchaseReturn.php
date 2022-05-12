<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyPurchaseReturn extends Model
{

    protected $table = 'supply_purchase_returns';

    public function returnDetails()
    {
        return $this->hasMany(SupplyPurchaseReturnDetail::class,'returnPurchase_id','id');
    }
}
