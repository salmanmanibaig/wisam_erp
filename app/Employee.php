<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table='employees';
    public function employee_category(){
        return $this->belongsTo(EmployeeCategory::class,'employee_category_id','id');
    }
}
