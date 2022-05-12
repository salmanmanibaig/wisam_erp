<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorLetterCredit extends Model
{
    public function vendorpo(){
        return $this->belongsTo(VendorPurchaseOrder::class,'po_id','id');
    }
    public function vendor_return_po(){
        return $this->belongsTo(VendorPurchaseOrder::class,'return_po_id','id');
    }

    public function blnumber(){
        return $this->hasMany(VendorBlNumber::class,'lc_id','id');
    }



   public static function check_gdnumber($letter_credit)
    {
        foreach ($letter_credit as $credit)
        {
            $check=1;
            foreach ($credit->blnumber as $number)
            {
                if($number->gd_number == null)
                {

                    $check=0;

                }
            }

            if($check ==0)
            {
                $credit->status_message="GD Number Pending";
                $credit->status=0;
            }
            else
            {  $credit->status_message="GD Number Attached";
                $credit->status=1;

            }


        }


    }


    public static function po_lc_detail($po)
    {

        if(is_array($po))
        {
            foreach ($po as $pos)
            {
                $pos->lc_sum=  VendorLetterCredit::where('po_id',$pos->id)->whereHas('blnumber',function ($query){
                    $query->where('gd_number','!=',null);
                })->get()->sum('lc_qty');
                $pos->left_qty=$pos->qty-$pos->lc_sum;
            }
        }
        else
        {
            $po->lc_sum=  VendorLetterCredit::where('po_id',$po->id)->whereHas('blnumber',function ($query){
                $query->where('gd_number','!=',null);
            })->get()->sum('lc_qty');
                $po->left_qty=$po->qty-$po->lc_sum;
        }


    }
}
