<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyInvoice extends Model
{
    protected $table = 'supply_invoices';
    public function invoiceDetails()
    {
        return $this->hasMany(SupplyInvoiceDetail::class,'invoice_id','id');
    }
}
