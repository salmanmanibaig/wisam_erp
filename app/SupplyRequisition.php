<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyRequisition extends Model
{
    protected $table = 'supply_requisitions';
    public function requisitionDetail(){
        return $this->hasMany(SupplyRequisitionDetail::class,'requisition_id','id');
    }
}
