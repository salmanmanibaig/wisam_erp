@extends('voyager::master')
@php  $product=App\EmployeeSalary::first(); @endphp
@can('edit',$product)
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
        EDIT SALARY
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <form action="{{url('admin/employee-salaries/'.$emp_salary_data->id)}}" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-md-1"></div>


                <div class="panel panel-bordered">
                    <!-- form start -->
                    <!-- PUT Method if we are editing -->
                    <!-- CSRF TOKEN -->
                    {{ csrf_field() }}
                    {{@method_field('put')}}
                    <div class="panel-body">


                        {{--                            {{dd(@$accounts[0]->account_category->name=='bank')}}--}}

                        <div class="col-md-3">
                            <div class="form-group" >
                                <label class="font-weight-bold" for="name">ACCOUNT:<span class="color">*</span></label>
                                {{--                                    <input type="number" min="0"  required class="form-control" name="account_id" placeholder="">--}}
                                <select type="number" required class="form-control select2" name="account_id">
                                    <option>Select One</option>
                                    @foreach($accounts as $key=>$account)
                                        @if(@$account->account_category->name=='bank'||@$account->account_category->name=='Cash' )
                                            <option @if($emp_salary_data->account_id==$account->id) selected @endif value="{{$account->id}}">{{$account->account_title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group" >
                                <label class="font-weight-bold" for="name">EMPLOYEE TYPE:<span class="color">*</span></label>

                                <select type="number" disabled required class="form-control select2" name="employee_category_id">
                                    <option>Select One</option>
                                    @foreach($employee_categories as $key=>$employee_category)

                                        <option @if($emp_salary_data->emp_category_id==$employee_category->id) selected @endif value="{{$employee_category->id}}">{{$employee_category->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            {{--                                <input type="date" name="date" class="form-control">--}}
                        </div>
                        <div class="col-md-2">
{{--                            <button type="submit" style="margin-left: 44%;margin-top: 25px;" class="btn btn-primary float-right save">{{ ('Generate Salary') }}</button>--}}
                            @if(@$emp_salary_data)
                                <button name="checkout" value="check" type="submit" style="margin-left: 44%;margin-top: 25px;" class="btn btn-warning float-right ">{{ ('CheckOut Salary') }}</button>
                            @endif
                        </div>
                    </div><!-- panel-body -->

                    {{--                        <div class="panel-footer">--}}
                    {{--                            <button type="submit" style="margin-left: 44%;" class="btn btn-primary save">{{ ('Submit') }}</button>--}}
                    {{--                        </div>--}}




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
                            @foreach(@$emp_salary_data->salary_details as $key=>$emp)

                                <tr>

                                    <td>
                                        <input type="text" name="employee_name[]" placeholder="" required class="form-control employee_name" value="{{$emp->name}}">
                                    </td>
                                    <td><input type="number" name="current_salary[]" placeholder="" required class="form-control current_salary" value="{{$emp->current_salary}}"></td>
                                    <td><input type="text" name="absent[]" placeholder="" required class="form-control absent" value="{{$emp->absent}}"></td>
                                    <td><input type="number" name="actual_salary[]" readonly placeholder="" required class="form-control calculated_actual_salary" value="{{$emp->actual_salary}}"></td>
                                    <td><input type="number" name="paid_salary[]" placeholder="" required class="form-control paid_salary" value="{{$emp->paid_salary}}"></td>

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
