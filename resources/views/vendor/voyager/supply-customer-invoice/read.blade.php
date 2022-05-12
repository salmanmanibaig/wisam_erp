@extends('voyager::master')
@php  $customerset=App\VendorPurchaseOrder::first(); @endphp
@can('add',$customerset)
    @if(1)
@section('css')
    @else
@section('css1')
    @endif
    <style>
        .color {
            color: red;
        }

    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class=""></i> {{ __('voyager::generic.viewing') }}
        <a href="{{url('admin/customer-invoice/')}}" class="btn btn-warning customBtn">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </h1>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <div class="panel-body">

                        <legend>Customer Invoice Info</legend>
                        <form action="{{url('admin/customer-invoice/update/'.$invoice->id)}}" method="post" id="invoice_form">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6" style="margin-bottom: 0px;">
                                    <label class="font-weight-bold">Reference No : <span class="color">*</span></label>
                                    <h4>{{sprintf('%04d', $invoice->reference_number).date('-Y-m') }}</h4>
                                </div>
                                <div class="col-md-6" style="margin-bottom: 0px;">
                                    <div class="form-group" style="float: right;">Date<span style="color: red;">*</span>
                                        <input type="date" class="inv_date form-control font-weight-bold" readonly id="inv_date" name="date" value="{{$invoice->date}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-9" style="margin-bottom: 0px" ><br>

                                    <label for="customer" class="font-weight-bold">Customer Name:<span style="color: red;">*</span></label>
                                    <select name="customer" id="customer" disabled  class="customer form-control font-weight-bold select2">

                                        <option value="" >Select Customer:</option>
                                        @foreach( $customer as $customer)
                                            <option @if($customer->id = $invoice->customer_id) selected @endif value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-3" style="margin-bottom: 0px; margin-top: 22px;" >
                                    <label for="invoiceNumber">Invoice No : <span class="font-weight-bold" style="color: red;">*</span></label>
                                    <input  type="number" name="invoiceNumber" readonly id="inv_number" class="inv_number form-control font-weight-bold" style="border-radius: 0px" placeholder="Invoice Number" value="{{$invoice->invoiceNumber}}">
                                </div>
                                <div class="col-md-12" style="margin-bottom: 0px; margin-top: 22px;" >
                                    <label for="remarks" class="font-weight-bold">Remarks: <span class="font-weight-bold" style="color: red;">*</span></label>
                                    <input  type="text" name="remarks" readonly id="remarks" class="remarks form-control font-weight-bold" style="border-radius: 0px"  value="{{$invoice->remarks}}">
                                </div>

                            </div>



                            <div class="col-md-12" style="margin-bottom: 20px;"></div>
                            <table class="table table-striped myTable" id="myTable"  >
                                <thead id="myTableHead">
                                </thead>
                                @foreach($invoice->invoice_details as $key => $details)
                                    <tbody id="accTable">
                                    <tr>
                                        <td>
                                            <div class="row" style="margin-top: 20px;">
                                                {{--                                            {{dd($details,$delivery_order)}}--}}
                                                <div class="col-md-12">
                                                    <label for="pending_delivery_orders" class="font-weight-bold">Delivery Order:<span style="color: red;">*</span></label>
                                                    <select name="po_id" id="pending_delivery_orders" disabled class="pending_delivery_orders form-control select2">
                                                        <option value="">Select One:</option>
                                                        @foreach($delivery_order as $order)
                                                            <option @if($order->id == $details->do_id) selected @endif value="{{$order->po_id}}">{{$order->id}} ->> {{$order->do_number}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <input type="hidden" value="{{$details->do_id}}" name="do_id[]" class="do_id" id="do_id">
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="item_name">Item Name<span class="color">*</span></label>
                                                    <input type="text" name="item_name[]" value="{{$details->product_name}}" readonly class=" item_name form-control">
                                                    <input type="hidden" class=" item_id form-control" name="item_id[]" value="{{$details->product_id}}">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="item_uom">Item Uom <span class="color">*</span></label>
                                                    <input type="text" name="item_uom[]" value="{{$details->uom}}" readonly class="item_uom form-control">
                                                    <input type="hidden" name="item_uom_id[]" value="{{$details->uom_id}}" class="item_uom_id">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="item_category">Item Category<span class="color">*</span></label>
                                                    <input type="text" name="item_category[]" value="{{$details->category}}" readonly class="item_category form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="item_qty">Item Quantity<span class="color">*</span></label>
                                                    <input type="text" name="item_qty[]" value="{{$details->quantity}}" readonly class="item_qty form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="item_price">Item Price<span class="color">*</span></label>
                                                    <input type="text" class=" item_price form-control" readonly name="item_price[]" value="{{$details->price}}">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="sub_total">Sub Total<span class="color">*</span></label>
                                                    <input type="text" class="sub_total form-control" readonly name="sub_total[]" value="{{$details->total}}">
                                                </div>

                                            </div>
                                        </td>
                                        <input type="hidden" name="detail_id[]" value="{{$details->id}}">
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                            </div>

                            <div class=" grand_total col-md-4">
                                <label for="Total" class="font-weight-bold">Grand Total</label><span style="color: red;">*</span>
                                <input type="text" name="grand_total" id="grand_total" readonly class="grand_total_amount form-control font-weight-bold">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>








    <script>
        $(document).ready(function () {

            var grand_total = 0;
            $('.sub_total').each(function (){
                var thsTotal  = parseInt( $(this).val());
                if(!thsTotal){
                    thsTotal = 0;
                }
                grand_total  = grand_total + thsTotal;
            })
            $('#grand_total').val(grand_total);

        })
    </script>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@section('javascript')
@endsection
