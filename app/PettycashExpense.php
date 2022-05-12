<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PettycashExpense extends Model
{
    protected $fillable=['_token','pettycash_id','account_id','amount'];

    public function pettycash(){
        return $this->belongsTo(PettyCash::class,'pettycash_id','id');
    }
    public function pettycash_account(){
        return $this->belongsTo(Account::class,'account_id','id');
    }
}
