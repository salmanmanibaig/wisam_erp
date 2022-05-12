<?php

namespace App;
use App\Models\Payment_image;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
    protected $fillable=['_token','f_name','supplier_id','vendor_company','street','city','state','postal_name','country','note','email','phone_no','mobile_no','fax_no','others','web_link','terms','opening_balance','as_of','account_no','business_id'];
    public function payment(){
       return $this->hasOne(Bank_Transactions::class);
    }

//    public function payments(){
//        return $this->hasOne(Mode::class);
//    }
    public function payments(){
        return $this->hasone(Payment_image::class,'supplier_id','id');
    }
}
