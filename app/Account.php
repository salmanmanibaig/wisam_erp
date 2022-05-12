<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table='accounts';


    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');

    }
    public function account(){
        return $this->hasMany(PettyCashPayment::class,'account_id','id');
    }
    public function account_category(){
        return $this->belongsTo(AccountCategory::class,'category_id','id');
    }
}
