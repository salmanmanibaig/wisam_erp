<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmAdvanceloan extends Model
{
    public static function totalDeduction($id){
    	$payroll_generates = SmHrPayrollGenerate::where('staff_id', $id)->get();
    	$total_deduction = 0; 
    	foreach($payroll_generates as $payroll_generate){
    		$total_deduction = $total_deduction + $payroll_generate->total_deduction;
    	}
    	return $total_deduction;	
    }




    public static function staffDetail($id){
        $staffDetails = SmStaff::find($id);
        
        return $staffDetails;    
    }




    public function staffDetails(){
    	return $this->belongsTo('App\SmStaff', 'staff_id', 'id');
    }
}
