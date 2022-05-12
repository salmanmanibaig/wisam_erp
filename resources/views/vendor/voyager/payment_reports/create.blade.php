@extends('voyager::master')
{{--@php  $customerset=App\Customer::first(); @endphp--}}
@php  $SupplyRequisition=App\CustomerPurchaseOrder::first(); @endphp
@can('add',$SupplyRequisition)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color {
            color: red;
        }
        selection__rendered {
            color: #dc1717;
            line-height: 28px;
        }
        .form-control {
            color: #76838f;
            background-color: #fff;
            background-image: none;
            border: 1px solid #000000;
        }
        .select_vendor{
            color: black;
        }
    </style>
@stop



@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Generate Payment Report
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form   id="reports" action="{{url('admin/reports_post/')}}" method="post"   enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                        <div class="panel-body">

                            <legend class="" style="">Generate Payment Report</legend>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Select Vendor<span class="color">*</span></label>
                                        <select  required class="form-control select2  select_vendor" name="select_vendor" id="select_option" style="border: solid black;">
                                            <option value="">Select One</option>
{{--                                            {{dd()}}--}}
                                            @foreach($vendor as $vendors)
                                                <option class="name_value" @if($vendor_name_id==$vendors->id) selected @endif   value="{{$vendors->id}}">

                                                    {{@$vendors->vendor_company}}
                                                    {{--                                                {{dd($payments->payment->vendor_id)}}--}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
{{--{{dd($start_date)}}--}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="name">From:<span class="color">*</span></label>
                                    @if($start_date)
                                    <input type="date" required class="form-control start_date ui-datepicker-current" name="start_date"
                                           placeholder="Date Start"  value="{{$start_date}}">
                                    @else
                                        <input type="date" required class="form-control start_date ui-datepicker-current" name="start_date"
                                               placeholder="Date Start" id="start_date" >
                                    @endif

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="name">To<span class="color">*</span></label>
                                    @if($end_date)
                                    <input type="date" required class="form-control end_date" name="end_date"
                                          placeholder="End Date" value="{{$end_date}}" >
                                    @else
                                        <input type="date" required class="form-control end_date" name="end_date"
                                               id="end_date"  placeholder="End Date"  >
                                    @endif
                                </div>
                            </div>
                        </div><!-- panel-body -->

                        <div class="panel-footer float-right">
                            <button type="submit" id="save" class="btn btn-primary  save">{{ __('Generate Report') }}</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div class="table-responsive">
            <div class="col-md-4">
{{--                <h3><i class="glyphicon glyphicon-list-alt" style="color: green;margin-right: 10px;"></i>Vendor Name: {{$vendor_name}}</h3>--}}
            </div>
            <div class="col-md-4">

{{--                <h3>From: <span>{{ Carbon\Carbon::parse($start_date)->format('d-m-Y') }}</span></h3>--}}
            </div>
            <div class="col-md-4">
{{--                <h3> <span class="">To: {{ Carbon\Carbon::parse($end_date)->format('d-m-Y') }}</span></h3>--}}
            </div>
            <table id="example" class="table table-hover">
                <thead>
                <tr>

                    <th>
                        Date
                    </th>
                    <th>
                        Reference Number
                    </th>
                    <th>
                        Narration
                    </th>
                    <th>
                        Payments Amount
                    </th>
                    <th>
                        Invoice Amount
                    </th>

                    <th>
                        Balance
                    </th>


                    {{--                                                                        <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>--}}
                </tr>
                </thead>

                <tbody>
                {{--                                {{$data->total}}--}}

                @if(count($data)>0)
                @foreach($data as $key =>   $amount)
{{--                    {{dd($amount)}}--}}
                    {{--                                    {{dd()}}--}}
                    {{--                                @if(count($vendors_amount)>0)--}}


                    <tr id="myTable">


                        <td>
                            @if(@$amount['inv_amount'] )
                                {{--                                            {{$amount['total']}}--}}
                                {{ Carbon\Carbon::parse($amount['created_at'])->format('d-m-Y') }}
                                {{--                                                {{$amount['created_at']->format('d-m-Y')}}--}}
                            @else
                                {{--                                                {{$amount['created_at']->format('d-m-Y')}}--}}
                                {{ Carbon\Carbon::parse($amount['created_at'])->format('d-m-Y') }}
                            @endif

                        </td>
                        <td>
                            @if(@$amount['amount'] )
                                <span class="font-weight-bold"> {{sprintf('%04d',$amount['payment_reference_number']).date('-Y-m',strtotime($amount['date']))}}</span>

{{--                                {{$amount['payment_reference_number']}}--}}
                            @else

                            @endif
                            @if(@$amount['inv_amount'] )
                                    <span class="font-weight-bold"> {{sprintf('%04d',$amount['invoice_reference_number']).date('-Y-m',strtotime($amount['date']))}}</span>
{{--                                {{$amount['invoice_reference_number']}}--}}
                            @else

                            @endif
                        </td>
                        <td>
                            @if(@$amount['amount'] && $amount['payment_type'])
                                {{--                                            {{$amount['total']}}--}}
                                {{$amount['payment_type'].' '.$amount['narration']}}
                            @else
                                {{$amount['third_party_payment_type'].' '.$amount['narration']}}
                            @endif
                            @if(@$amount['inv_amount'] )
                                {{--                                            {{$amount['total']}}--}}
{{--                                {{$amount['narration'].' '.$amount['payment_type']}}--}}
                            @else

                            @endif
                        </td>


                        <td>
                            @if(@$amount['amount'] )
                                {{--                                            {{$amount['total']}}--}}

                                <span class="glyphicon glyphicon-arrow-up" style="color: green;">{{$amount['amount']}}</span>
                                <a id="view_invoice" class="view_invoice" href="{{url('admin/payments_show/'.$amount['id'])}}"><span id="view" class=" view glyphicon glyphicon-search" style="color: blue;size: 20px;margin-left: 8px;"></span></a>


                            @else

                            @endif

                        </td>
                        <td>
                            @if(@$amount['inv_type'] == 'inv' )
                                {{--                                                <input type="hidden" class="" value="{{$amount['id']}}">--}}
                                <span class="glyphicon glyphicon-arrow-down" style="color: red;">{{$amount['inv_amount']}}</span>
                                <a id="view_invoice" class="view_invoice" href="{{url('admin/vendor-purchase-orders/view_detail/'.$amount['id'])}}">
                                    <span id="view" class=" view glyphicon glyphicon-search" style="color: blue;size: 20px;margin-left: 8px;"></span></a>
                            @elseif(@$amount['inv_type'] == 'return_inv')

                                <span class="glyphicon glyphicon-arrow-up" style="color: orange;">{{$amount['inv_amount']}}</span>
                                <a id="view_invoice" class="view_invoice" href="{{url('admin/vendor-purchase-orders/view_detail/'.$amount['id'])}}">
                                    <span id="view" class=" view glyphicon glyphicon-search" style="color: blue;size: 20px;margin-left: 8px;"></span></a>
                            @endif
                        </td>


                        <td>
                            @if(@$amount['balance'] )
                                {{--                                            {{$amount['total']}}--}}
                                {{$amount['balance']}}
                            @else
                                {{$amount['balance']}}
                            @endif
                        </td>

                    </tr>


                    {{--                                @endif--}}


                </tbody>
                @endforeach

                <tr class="brought_forward_tr">
                    <td></td>
                    <td></td>
                    <td>Brought Forward=<p class="brought_forward_amount">{{$temp1}}</p></td>
                    <td></td>
                    <td></td>


                </tr>
                @endif
                @if(count($data)==0)

                    <tr class="opening_balance_tr">
                        <td></td>
                        <td></td>
                        <td>Opening Balance=<p class="opening_balance_amount">{{$vendor_opening_balance}}</p></td>
                        <td></td>
                        <td></td>

                    </tr>
                @endif

            </table>
        </div>
    </div>




@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




@section('javascript')
    <script>
        $(document).ready(function(){
            document.querySelector("#end_date").valueAsDate = new Date();
            var date = new Date();
            // date => format('Y-m-d');
            document.querySelector("#start_date").valueAsDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - 30);

        })

        $('.end_date').on('change',function(){

            var from = $(".start_date").val();
            var to = $(".end_date").val();
            console.log(from);
            console.log(to);
            if(Date.parse(from) > Date.parse(to)){
                toastr.error('Invalid Date Range');
                $('#save').attr("disabled", true);

            }
            else{
                $('#save').attr("disabled", false);

            }


        });

        $('.start_date').on('change',function(){

            var from = $(".start_date").val();
            var to = $(".end_date").val();
            console.log(from);
            console.log(to);
            if(Date.parse(from) > Date.parse(to)){
                toastr.error('Invalid Date Range');
                $('#save').attr("disabled", true);

            }
            else{
                $('#save').attr("disabled", false);
                // toastr.error('Invalid Date Range');
                // $('#save').attr("disabled", true);
            }


        });


    </script>
    <script>
        $(document).ready(function(){
            // $brought_forward= $('.brought_forward_tr').closest('.brought_forward_amount').text();

            var $brought_forward = $('.brought_forward_amount').text();
            // alert($brought_forward);
            var opening_balance= $('.opening_balance_amount').text();

            if($brought_forward==0) {
                $(".brought_forward_tr").hide();
                // $('.opening_balance_tr').hide()
            }
            else{
                $(".brought_forward_tr").show();
                // $('.opening_balance_tr').hide()
            }

        });
    </script>
    <script>
        $(document).ready(function(){
            // $('.opening_balance_tr').show();
            $('#save').on('click',function (){
                // $('.opening_balance_tr').show();
            })
        });
    </script>



@stop


