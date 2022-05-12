<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EmployeeSalary extends Model
{
    public function salary_details(){
        return $this->hasMany(EmployeeSalaryDetail::class,'employee_salary_id','id');
    }
    public function emp_category(){
        return $this->belongsTo(EmployeeCategory::class,'emp_category_id','id');
    }

}
