<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\SmStaff; 
use App\SmSupplier; 
use App\SmItem; 
class SmStaff extends Model
{
    public function roles(){
		return $this->belongsTo('App\Role', 'role_id', 'id');
	}

	public function departments(){
		return $this->belongsTo('App\SmHumanDepartment', 'department_id', 'id');
	}

	public function designations(){
		return $this->belongsTo('App\SmDesignation', 'designation_id', 'id');
	}

	public function genders(){
		return $this->belongsTo('App\SmBaseSetup', 'gender_id', 'id');
	}

	public static function getNumberVendor(){
		return SmSupplier::all()->count();
	}
	public static function getNumberCustomer(){
		return SmStaff::where('role_id',2)->where('active_status',1)->get()->count();
	}

	public static function getNumberStaff(){
		return SmStaff::where([['role_id','!=',2],['role_id','!=',7]])->get()->count();
	}


	public static function getNumberItemStock(){

		$product_receive = SmItemReceive::sum('qnt');
        $product_sale = SmTenderProduct::sum('qnt');
        return $product_receive - $product_sale;

	}


}
