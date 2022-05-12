<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyRequisitionDetail extends Model
{
    protected $table = 'supply_requisition_details';

    public function requisition(){
        return $this->belongsTo(SupplyRequisition::class,'id','requisition_id ');
    }
}
