@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('add',$customerset)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color {
            color: red;
        }

        #myTable tr td {
            margin-bottom: 99px;
        }
        .form-control {
            color: #76838f;
            background-color: #fff;
            background-image: none;
            border: 1px solid #000000;
        }
    </style>
@stop



@section('page_header')
    <h1 class="page-title">
        <i class=""></i> {{ __('voyager::generic.viewing') }}

        {{--        <a href="{{url('admin/customers/'.$customer->id.'/edit')}}" class="btn btn-info customBtn">--}}
        {{--            <span class="glyphicon glyphicon-pencil"></span>&nbsp;--}}
        {{--            {{ __('voyager::generic.edit') }}--}}
        {{--        </a>--}}


        {{--<a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger customBtn" data-id="" id="">--}}
        {{--<i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>--}}
        {{--</a>--}}


        <a href="{{url('admin/invoice')}}" class="btn btn-warning customBtn">
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
                        <form action="{{url('admin/invoice/update_invoice/'.$invoice->id)}}" method="post" id="invoice_form">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div class="col-md-6">

                                <div class="input-group">
                                    <label for="date" class="font-weight-bold">Date</label><span
                                        style="color: red;"></span>
                                    <input readonly type="date" class="inv_date form-control" value="{{$invoice->date}}" required id="inv_date" name="date">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="invoice_number" class="font-weight-bold">Invoice Number</label><span
                                    style="color: red;"></span>
                                <div class="input-group">

                                    <span class="input-group-addon">#</span>
                                    <input readonly type="number" name="invoiceNumber" required id="inv_number"
                                           class="inv_number form-control" placeholder="Invoice Number" value="{{$invoice->invoiceNumber}}">
                                </div>
                            </div>

                            <table class="table table-striped" id="myTable">
                                <thead>

                                <tr>
                                    <td>
                                        <div class="col-md-12">
                                            <br>
                                            <label for="vendor">Vendor Name</label>
                                            <span style="color: red;"></span>
                                            <select name="vendor" id="vendor" readonly  class="vendor form-control">
                                                <option class="vendorValue">Select Vendor</option>
                                                @foreach( $vendors as $vendor)
                                                    <option @if($invoice->vendor_id==$vendor->id) selected @endif  value="{{$vendor->id}}">{{$vendor->f_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>

                                </tr>
                                </thead>
                                <?php $i = 0?>
                                <tbody id="acc_table">

                                @foreach($invoice->invoiceDetails as $key=>$invoice)

                                    <tr>
                                        <input type="hidden" name="detail_id[]" value="{{$invoice->id}}">
                                        <td>
                                            <div class="col-md-5">
                                                <label for="name">Item Name:</label><span style="color: red;">*</span>

                                                        <input type="text" value="{{$invoice->product_name}}" readonly class="select_product form-control">

                                            </div>

                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="UOM" class="font-weight-bold">UOM</label><span
                                                        style="color: red;"></span>
                                                    <input type="text" readonly name="uom[]" id="uom" readonly
                                                           class="uom form-control" value="{{$invoice->uom}}">
                                                </div>
                                            </div>

{{--                                            @if($key == 0)--}}
{{--                                                <div class="col-md-2" style="margin-top: 23px;">--}}
{{--                                                    <button class="btn btn-success add-product  pull-right">+Add Product--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            @else--}}
{{--                                                <div class="col-md-2" style="margin-top: 23px;">--}}
{{--                                                    <button class="btn btn-danger deleteproduct  pull-right">Delete--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="quantity">Quantity</label><span style="color: red;"></span>
                                                    <input type="text" readonly name="quantity[]" id="quantity" readonly
                                                           class="quantity hidethis form-control" value="{{$invoice->quantity}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Price">Price</label><span style="color: red;"></span>
                                                    <input type="text" readonly name="price[]" readonly id="price"
                                                           class="price hidethis form-control" value="{{$invoice->price}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Total">Total</label><span style="color: red;"></span>
                                                    <input type="text" readonly name="total[]" id="total" readonly
                                                           class="total hidethis form-control" value="{{$invoice->total}}">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class=" grand_total col-md-4">
                                <label for="Total">Grand Total</label><span style="color: red;"></span>
                                <input type="text" readonly class="grand_total_amount form-control">
                            </div>
{{--                            <button class="btn btn-success">Update</button>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <script>
        $(document).ready(function () {

            var gTotal = 0
            $('.total').each(function () {

                gTotal = gTotal + parseInt($(this).val())
            });
            $('.grand_total_amount').val(gTotal)
        })
    </script>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@section('javascript')
@endsection
