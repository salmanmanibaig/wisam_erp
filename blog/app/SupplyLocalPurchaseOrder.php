<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SupplyLocalPurchaseOrder extends Model
{
    public function purchaseOrderDetails()
    {
        return $this->hasMany(SupplyLocalPurchaseOrderDetail::class,'order_id','id');
    }
}
