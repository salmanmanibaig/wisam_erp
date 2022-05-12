<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class DeliveryOrder extends Model
{

    public function po_number(){
        return $this->hasOne(CustomerPurchaseOrder::class,'id','po_id');
    }


    public function warehouse(){
        return $this->hasOne(Warehouse::class,'id','warehouse_id');
    }
    public function stock(){
        return $this->hasOne(StockManagment::class,'do_id','id');
    }


    public function company(){
        return $this->hasOne(Company::class,'id','company_id');
    }

    public function unit1(){
        return $this->hasOne(Unit::class,'id','unit_id1');
    }
 public function unit2(){
        return $this->hasOne(Unit::class,'id','unit_id2');
    }


    public function delete()
    {
        // delete all related photos
        $this->stock()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }


}
