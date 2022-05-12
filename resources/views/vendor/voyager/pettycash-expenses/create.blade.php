@extends('voyager::master')
@php  $product=App\PettycashExpense::first(); @endphp
@can('add',$product)
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
        Add New Petty Cash Expense
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-1"></div>


                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form action="{{url('admin/pettycash-expenses')}}" method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                        <div class="panel-body">

                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">PETTYCASH NAME:<span class="color">*</span></label>
{{--                                    <input type="text" required class="form-control" name="pettycash_id" placeholder="Enter PettyCash Name">--}}
                                    <select required class="form-control select2" name="pettycash_id">
                                        <option>Select One</option>
                                        @foreach($petty_cash as $key=>$cash)
                                            <option value="{{$cash->id}}">{{$cash->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

{{--                            {{dd(@$accounts[0]->account_category->name=='bank')}}--}}

                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">ACCOUNT:<span class="color">*</span></label>
{{--                                    <input type="number" min="0"  required class="form-control" name="account_id" placeholder="">--}}
                                    <select type="number" required class="form-control select2" name="account_id">
                                        <option>Select One</option>
                                        @foreach($accounts as $key=>$account)
                                            @if(@$account->account_category->name=='Expense' )
                                            <option value="{{$account->id}}">{{$account->account_title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">AMOUNT:<span class="color">*</span></label>
                                    <input type="text" required class="form-control" name="amount" >
                                </div>
                            </div>
                            <button type="submit" style="margin-left: 44%;" class="btn btn-primary float-right save">{{ ('Submit') }}</button>

                        </div><!-- panel-body -->

{{--                        <div class="panel-footer">--}}
{{--                            <button type="submit" style="margin-left: 44%;" class="btn btn-primary save">{{ ('Submit') }}</button>--}}
{{--                        </div>--}}
                    </form>



                </div>

        </div>
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
@section('javascript')
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
    <script type="text/javascript">


    </script>




@stop
