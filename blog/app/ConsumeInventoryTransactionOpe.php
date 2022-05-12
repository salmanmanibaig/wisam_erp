<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ConsumeInventoryTransactionOpe extends Model
{
    protected $table='consume_inventory_transaction_ope';
    public function inv_item(){
        return $this->hasOne(InvItem::class,'id','item_id');
    }
}
