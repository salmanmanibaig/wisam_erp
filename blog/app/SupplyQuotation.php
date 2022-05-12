<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SupplyQuotation extends Model
{
    public function quotationDetails()
    {
        return $this->hasMany(SupplyQuotationDetail::class,'quotation_id','id');
    }
}
