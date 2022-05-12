<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PurchaseOrder extends Model
{
    public function purchase_order_item()
    {

        return $this->hasMany(PurchaseOrderItem::class ,'po_id', 'id');
    }


    public function buyer()
    {

        return $this->belongsTo(BuyerName::class ,'buyer_id', 'id');
    }

    public function department()
    {

        return $this->belongsTo(Department::class ,'department_id', 'id');
    }
    public function driver()
    {

        return $this->belongsTo(Driver::class ,'driver_name', 'id');
    }


}
