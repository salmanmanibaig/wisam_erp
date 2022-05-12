<?php

namespace App\Http\Controllers\employee;

use App\Account;
use App\Employee;
use App\EmployeeCategory;
use App\EmployeeSalary;
use App\EmployeeSalaryDetail;
use App\PettycashExpense;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $emp_salary_data=EmployeeSalary::with('salary_details')->with('emp_category')->get();
        return view('vendor.voyager.employee_salary.browse',compact('emp_salary_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $request_data=0;
        $employees_name=0;
        $employee_data=Employee::with('employee_category')->get();
        $accounts=Account::with('account_category')->get();
        $employee_categories=EmployeeCategory::all();

        return view('vendor.voyager.employee_salary.create',compact('request_data','employees_name','employee_data','accounts','employee_categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->checkout == 'check')
        {
//dd($request->all());
            $emp_salary=new EmployeeSalary();
            $emp_salary->account_id=$request->account_id;
            $emp_salary->emp_category_id=$request->employee_category_id;
            $emp_salary->date=$request->date;
            $emp_salary->save();
            foreach ($request->employee_name as$key=>$emp_name)
            {
                $emp_salary_detail=new EmployeeSalaryDetail();
                $emp_salary_detail->employee_salary_id=$emp_salary->id;
                $emp_salary_detail->name=$emp_name;
                $emp_salary_detail->current_salary=$request->current_salary[$key];
                $emp_salary_detail->actual_salary=$request->actual_salary[$key];
                $emp_salary_detail->paid_salary=$request->paid_salary[$key];
                $emp_salary_detail->absent=$request->absent[$key];
                $emp_salary_detail->save();

            }
return redirect('admin/employee-salaries');
        }
        else {
            $employee_data = 0;
            $accounts = Account::with('account_category')->get();
            $employee_categories = EmployeeCategory::all();
            $request_data = $request->all();
            $employees_name = Employee::with('employee_category')->where('employee_category_id', $request->employee_category_id)->get();

            return view('vendor.voyager.employee_salary.create', compact('employees_name', 'employee_data', 'accounts', 'employee_categories', 'request_data'));

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $emp_salary_data=EmployeeSalary::with('salary_details')->with('emp_category')->find($id);
        return view('vendor.voyager.employee_salary.read',compact('emp_salary_data'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $employee_data = 0;
        $accounts = Account::with('account_category')->get();
        $employee_categories = EmployeeCategory::all();
         $emp_salary_data=EmployeeSalary::with('salary_details')->find($id);

        return view('vendor.voyager.employee_salary.edit', compact('emp_salary_data', 'accounts', 'employee_categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $arr=array();
        $i=0;
        if ($request->checkout == 'check')
        {
            $emp_salary=EmployeeSalary::with('salary_details')->find($id);

            $emp_salary->account_id=$request->account_id;
//            $emp_salary->emp_category_id=$request->employee_category_id;
            $emp_salary->date=$request->date;
            $emp_salary->save();
            $emp_salary_detail=EmployeeSalaryDetail::where('employee_salary_id',$id)->get();
            foreach ($emp_salary_detail as$key=>$salary_detail)
            {
//
                $salary_detail->employee_salary_id=$emp_salary->id;
                $salary_detail->name=$request->employee_name[$key];
                $salary_detail->current_salary=$request->current_salary[$key];
                $salary_detail->actual_salary=$request->actual_salary[$key];
                $salary_detail->paid_salary=$request->paid_salary[$key];
                $salary_detail->absent=$request->absent[$key];

                $salary_detail->save();


            }
            return redirect('admin/employee-salaries');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        EmployeeSalary::with('salary_details')->find($request->deleteid)->delete();
        EmployeeSalaryDetail::where('employee_salary_id',$request->deleteid)->delete();
        return redirect('admin/employee-salaries');

    }
}
