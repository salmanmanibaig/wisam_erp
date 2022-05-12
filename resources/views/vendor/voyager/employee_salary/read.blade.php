@extends('voyager::master')
@php  $product=App\EmployeeSalary::first(); @endphp
@can('read',$product)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }
    </style>
@stop



@section('page_header')
    <p class="page-title" style="margin-left: 20%;">
        <i class=""></i>
        VIEWING SALARY
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
{{--        <form action="{{url('admin/employee_salary/store')}}" method="POST" enctype="multipart/form-data">--}}

        <div class="row">
            <div class="col-md-1"></div>


            <div class="panel panel-bordered">
                <!-- form start -->
                <!-- PUT Method if we are editing -->
                <!-- CSRF TOKEN -->
                {{ csrf_field() }}
                <div class="panel-body">
                    <div class="col-md-3">
                        <div class="form-group" >
                            <label class="font-weight-bold" for="name">ACCOUNT:<span class="color">*</span></label>
                               <input type="text"  readonly required class="form-control" name="account_id" placeholder="" value="{{\App\Account::where('id',$emp_salary_data->account_id)->value('account_title')}}">

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group" >
                            <label class="font-weight-bold" for="name">EMPLOYEE TYPE:<span class="color">*</span></label>

                            <input type="text" readonly required class="form-control select2" name="employee_category_id" value="{{\App\EmployeeCategory::where('id',$emp_salary_data->emp_category_id)->value('name')}}">

                        </div>
                    </div>
                    <div class="col-md-2">
                        {{--                                <input type="date" name="date" class="form-control">--}}
                    </div>

                </div><!-- panel-body -->
            </div>

        </div>
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-10">
                    <table class="table table-hover" id="myTable">
                        <thead>
                        <tr>
                            <th style="width: 300px;">Employee Name</th>
                            <th style="width: 150px;" >Current Salary</th>
                            <th style="width: 100px;">Absent</th>
                            <th>Calculated Actual Salary</th>
                            <th>Paid Salary</th>

                        </tr>
                        </thead>
                        <tbody id="acc_tablebody">
                        @if(@$emp_salary_data)
                            @foreach(@$emp_salary_data->salary_details as $key=>$employee)
                                <tr>

                                    <td>
                                        <input type="text" readonly name="employee_name[]" placeholder="" required class="form-control employee_name" value="{{$employee->name}}">
                                    </td>
                                    <td><input type="number" readonly name="current_salary[]" placeholder="" required class="form-control current_salary" value="{{$employee->current_salary}}"></td>
                                    <td><input type="text"  readonly name="absent[]" placeholder="" required class="form-control absent" value="{{$employee->absent}}"></td>
                                    <td><input type="number"  name="calculated_actual_salary[]" readonly placeholder="" required class="form-control calculated_actual_salary" value="{{$employee->actual_salary}}"></td>
                                    <td><input type="number" readonly name="paid_salary[]" placeholder="" required class="form-control paid_salary" value="{{$employee->paid_salary}}"></td>

                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </form>
    </div>
    <?php

    $simple = 'demo text string';

    $complexArray = array('demo', 'text', array('foo', 'bar'));

    ?>

    <!-- End Delete File Modal -->
    <script href="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@if(1)
@section('javascript')
    @else
@section('javascript1')
    @endif
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    {{--<script>--}}
    {{--var obj = {--}}
    {{--"flammable": "inflammable",--}}
    {{--"duh": "no duh"--}}
    {{--};--}}
    {{--$.each( obj, function( key, value ) {--}}
    {{--// alert( key + ": " + value );--}}
    {{--});--}}
    {{--</script>--}}


    <script>
        $(document).ready(function (){


            $('#acc_tablebody').on('keyup','.absent',function (){
                var total_absent=$(this).val();
                var salary=$(this).closest('tr').find('.current_salary').val();
                var actual_salary=salary/30;
                var actual_salary1=actual_salary*total_absent;
                var calculated_salary=parseInt(salary-actual_salary1);
                $(this).closest('tr').find('.calculated_actual_salary').val(calculated_salary);
                $(this).closest('tr').find('.paid_salary').val(calculated_salary);
            })
        })

    </script>


@stop
