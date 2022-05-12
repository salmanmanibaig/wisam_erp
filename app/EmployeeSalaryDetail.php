<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryDetail extends Model
{
    protected $table='employee_salaries_details';

    public function salary(){
        return $this->belongsTo(EmployeeSalary::class,'employee_salary_id','id');
    }

}
