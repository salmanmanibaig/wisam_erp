<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_Transactions extends Model
{
    protected $table='bank_transactions';
    protected $fillable=['supplier_id','_token','cashCheckbox	','onlineCheckbox','checkCheckbox','cash_amount','online_amount','account_number','cross_Checkbox','cash_check_Checkbox','cash_check_amount','cash_check_date','cash_check_number','cash_check_bank','cash_check_branch','cross_check_amount','cross_check_name','cross_check_date','cross_check_number','cross_check_bank','cross_check_branch'];
    public function transactions(){
            return $this->belongsTo(Payment::class);
    }
}
