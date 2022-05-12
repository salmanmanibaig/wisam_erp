<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PettyCash extends Model
{
    public function pettycash_payment(){
        return $this->hasMany(PettyCashPayment::class,'pettycash_id','id');
    }
}
