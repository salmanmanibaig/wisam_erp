<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class InvItem extends Model
{

//    use \OwenIt\Auditing\Auditable;

    public function product()
    {
        return $this->belongsToMany(Product::class,ProductInvitem::class);
    }

    public function consumable_inv_ope()
    {
        return $this->hasMany(ConsumeInventoryTransactionOpe::class,'item_id','id');
    }
}
