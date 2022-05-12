<?php

namespace App;

use App\Http\Controllers\pettycash_payment\PettyCashPaymentController;
use Illuminate\Database\Eloquent\Model;


class PettyCashPayment extends Model
{
    protected $fillable=['_token','pettycash_id','account_id','amount'];

    public function pettycash(){
        return $this->belongsTo(PettyCash::class,'pettycash_id','id');
    }
    public function pettycash_account(){
        return $this->belongsTo(Account::class,'account_id','id');
    }
}
