<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyInvoiceDetail extends Model
{
    protected $table = 'supply_invoice_details';

    public function itemUoms()
    {
        return $this->hasMany(InvItemsUom::class,'item_id','product_id');
    }
}
