<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class EmployeeCategory extends Model
{
    public function employee(){
        return $this->hasMany(Employee::class,'employee_category_id','id');
    }
}
