<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ConsumableInventoryTransaction extends Model
{
    protected $table="consumable_inventory_transactions";

    public function invent_transaction_ope(){
        return $this->hasMany(ConsumeInventoryTransactionOpe::class,'transaction_id','id');
    }
    public function factory(){
        return $this->hasOne(Factory::class,'id','factory_id');
    }
}
