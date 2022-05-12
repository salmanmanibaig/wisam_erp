
@extends('voyager::master')
@php  $customerset=App\VendorPurchaseOrder::first(); @endphp
@can('add',$customerset)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color {
            color: red;
        }

        table {
            border-collapse: unset;
        }
        .voyager .table.table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f5f4f4;
        }

        #myTable tr td {
            margin-bottom: 99px;
        }#myTable tr {
             border: 1px solid;
         }
        .form-control {
            color: #76838f;
            background-color: #fff;
            background-image: none;
            border: 1px solid #000000;
        }
        .Table td, .Table th {
            border: none;
        }
        .row {
            margin-right: 0px;
            margin-left: 0px;
        }
        .error-color{
            background-color: rgba(255, 0, 0, 0.2) ;
        }


    </style>
@stop



@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Edit Customer Invoice
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                {{--                {{dd($invoice)}}--}}
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
                                        <input type="date" class="inv_date form-control font-weight-bold" required readonly id="inv_date" name="date" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6" style="margin-bottom: 0px" ><br>

                                    <label for="customer" class="font-weight-bold">Customers:<span style="color: red;">*</span></label>
                                    <select name="customer" id="customer" required  class="customer form-control font-weight-bold select2">

                                        <option value="" >Select Customer:</option>
                                        @foreach( $customer as $customer)
                                            <option @if($customer->id = $invoice->customer_id) selected @endif value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-3" style="margin-bottom: 0px; margin-top: 22px;" >
                                    <label for="invoiceNumber">Invoice No : <span class="font-weight-bold" style="color: red;">*</span></label>
                                    <input  type="number" name="invoiceNumber" required id="inv_number" class="inv_number form-control font-weight-bold" style="border-radius: 0px" placeholder="Invoice Number" value="{{$invoice->invoiceNumber}}">
                                </div>

                                <div class="col-md-3" style="margin-bottom: 0px; margin-top: 22px;" >
                                    <label for="invoiceNumber">GST<span class="font-weight-bold" style="color: red;">*</span></label>
                                    <input  type="checkbox" name="gst" @if ($invoice->gst == 1) checked @endif  id="gst" class="gst" style="border-radius: 0px" value="{{$invoice->gst}}">
                                </div>

                                <div class="col-md-12" style="margin-bottom: 0px; margin-top: 22px;" >
                                    <label for="remarks" class="font-weight-bold">Remarks: <span class="font-weight-bold" style="color: red;">*</span></label>
                                    <input  type="text" name="remarks" required id="remarks" class="remarks form-control font-weight-bold" style="border-radius: 0px"  value="{{$invoice->remarks}}">
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


                                                <div class="col-md-11">
                                                    <label for="pending_delivery_orders" class="font-weight-bold">Pending Delivery Orders:<span style="color: red;">*</span></label>
                                                    <select disabled name="po_id" id="pending_delivery_orders" required class="pending_delivery_orders form-control select2">
                                                        <option value="">Select One:</option>
                                                        @foreach($delivery_order as $order)
                                                            <option @if($order->id == $details->do_id) selected @endif value="{{$order->do_id}}">{{$order->id}} ->> {{$order->do_number}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    @if($key == 0)
{{--                                                        <button type="button" id="btn_do" class="btn btn-success" style="margin-top: 27px;width: 70px;">Add DO</button>--}}
                                                    @else
{{--                                                        <button type="button" id="btn_do_remove" class="btn btn-danger btn_do_remove" style="margin-top: 27px;"><i class="voyager-trash"></i></button>--}}
                                                    @endif
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
                                                    <input type="text" readonly class=" item_price form-control" name="item_price[]" value="{{$details->price}}">
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


                            <div class="col-md-6 col-lg-6 col-sm-6">

                            </div>


                            <div style="text-align: right" class="grand_total col-md-4 col-lg-4 col-sm-4">
                                <label style="text-align: right;margin: 5px;" for="Total" class="font-weight-bold">Total</label><span style="color: red;">*</span><br>
                                <label style="text-align: right;margin: 5px;" for="Total" class="font-weight-bold">Gst</label><span style="color: red;">*</span><br>
                                <label style="text-align: right ;margin: 5px;" for="Total" class="font-weight-bold">Additional Charges</label><span style="color: red;">*</span><br>
                                <label style="text-align: right; margin: 5px;" for="Total" class="font-weight-bold">Grand Total</label><span style="color: red;">*</span>
                            </div>



                            <div class=" grand_total col-md-2 col-lg-2 col-sm-2">

                                <input type="text"  readonly value="{{$invoice->inv_total-$invoice->gst_total-$invoice->expense_total}}" class="grand_total_amount form-control font-weight-bold">
                                <input type="text" name="gst_total" id="gst_total" readonly value="{{$invoice->gst_total}}" class="grand_total_amount form-control font-weight-bold">
                                <input type="text" name="expense_total" id="expense_total" value="{{$invoice->expense_total}}" readonly class="grand_total_amount form-control font-weight-bold">
                                <input type="text" name="grand_total" id="grand_total" value="{{$invoice->inv_total}}" readonly class="grand_total_amount form-control font-weight-bold">
                            </div>


                            <button type="button" class="btn btn-success save" id="save">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@if(1)@section('javascript')@else @section('javascript1')@endif


<script>
    $(document).ready(function (){


        function apply_gst() {
            var gTotal=0;
            $('.sub_total').each(function () {
                gTotal=parseInt(gTotal)+parseInt(   $(this).val())
            });
            if ($('input.gst').is(':checked')) {
                var tax=((gTotal*17)/100)
                $('#grand_total').val(parseInt(gTotal)+ parseInt(tax));
            }
            else
            {
                $('#grand_total').val(gTotal);
            }

        }
        $('.gst').on('click',function () {
            apply_gst()
        })



        $('select').select2();
        $('#save').click(function (e){
            var i = 0;
            $("input").each(function(){
                if (!$(this).val()){
                    e.preventDefault();
                    var thiss = $(this);
                    $(this).addClass('error-color');
                    $(this).closest('.row').attr('id','scroll');
                    toastr.error('Please fill all feilds');
                    i =1;
                    $([document.documentElement, document.body]).animate({
                        scrollTop: thiss.closest('#scroll').offset().top
                    }, 500);
                    $(this).closest('.row').attr('id','')
                    return false;
                }
            });
            if (i==0){
                $('#save').attr('type','submit');
            }
        })
        $("input").each(function(){
            $(this).on('input',function (){
                $(this).removeClass('error-color')
            })
        });
        function countTotal(){
            var gTotal =0;
            $('.item_price').each(function (){
                var price = parseInt($(this).val());
                var qty = parseInt( $(this).closest('tr').find('.item_qty').val());
                var subTotal = qty * price;
                $(this).closest('tr').find('.sub_total').val(subTotal);
            })

            $('.sub_total').each(function (){
                var thsTotal  = parseInt( $(this).val());
                if(!thsTotal){
                    thsTotal = 0;
                }
                gTotal  = gTotal + thsTotal;
            })
            $('#grand_total').val(gTotal);
            apply_gst()
        }

        $(document).on('input','.item_price',function (){
            countTotal();
        })


        //Remove Duplicate
        function eachtr(tbodyIndex,doId) {

            var check=0;
            $("tbody").each(function () {
                var index = $(this).index();
                var do_id = parseInt($(this).find('.pending_delivery_orders option:selected').text().substring(0,5))
                // console.log(index,selected_index,select_value,contact_id)
                if(index!=tbodyIndex) {
                    if(doId == do_id) {
                        toastr.error('Already Selected')
                        check=1
                    }
                }
            })
            return check;
        }

        $('#myTable').on('change','.pending_delivery_orders', function (e) {

            var doId = parseInt($(this).find('option:selected').text().substring(0,5))
            var tbodyIndex = $(this).closest('tbody').index()
            var status=  eachtr(tbodyIndex,doId)

            if (status == 1) {
                $(this).children("option:selected").remove()
            }
        })

        $('#btn_do').click(function (e){
            if (parseInt($('#customer').val())){
                $('#myTable').append(' <tbody>\n' +
                    '                                <tr>\n' +
                    '<td>' +
                    '                                    <div class="row" style="margin-top: 20px;">\n' +
                    '                                        <div class="col-md-11">\n' +
                    '                                            <label for="pending_delivery_orders" class="font-weight-bold">Pending Delivery Orders:<span style="color: red;">*</span></label>\n' +
                    '                                            <select name="po_id[]" id="pending_delivery_orders" required class="pending_delivery_orders form-control select2">\n' +
                    '                                                <option value="">Select Customer:</option>\n' +
                    '                                            </select>\n' +
                    '                                        </div>\n' +
                    '                                        <div class="col-md-1">\n' +
                    '                                            <button type="button" class="btn btn-danger btn_do_remove" style="margin-top: 27px;"><i class="voyager-trash"></i></button>\n' +
                    '                                        </div>\n' +
                    '                                        <input type="hidden" name="do_id[]" class="do_id" id="do_id">\n' +
                    '                                    </div>\n' +
                    '</td>' +
                    '                                </tr>\n' +
                    '                                </tbody>')
            }else {
                toastr.error('Select Customer')
                e.preventDefault()
            }
        })
        $('#myTable').on('click','.btn_do_remove',function (){
            $(this).closest('tbody').remove();
            var sub_total =  parseInt($(this).closest('tbody').find('.sub_total').val());
            var grandTotal = parseInt($('#grand_total').val());

            if(sub_total){
                $('#grand_total').val(grandTotal - sub_total )
            }

            apply_gst()
        })
        $('#btn_do').click(function (){
            var id = $('#customer').val()


            if (id>0) {

                $.ajax({
                    url: '/public/admin/customer-invoice/customer-details/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function (response){
                        console.log(response)

                        $('#myTable tbody:last').find('.pending_delivery_orders option').remove()
                        $('#myTable tbody:last').find('.pending_delivery_orders').append('<option value="" >Select One:</option>')
                        for (var i=0;i<response.length;i++){
                            $('#myTable tbody:last').find('.pending_delivery_orders').append('<option value='+response[i].po_id+' >'+response[i].id+' ->> '+response[i].do_number +'</option>')
                        }
                    }
                })
            }else {
                $('#accTable').find('tr:gt(0)').remove();
                $('#pending_delivery_orders').find('option').remove()
                $('#pending_delivery_orders').append('<option value="" >Select Customer:</option>')
                $('#grand_total').val(0)
            }
        })

        $('#customer').on('change',function (){
            $('#grand_total').val(0)
            var id = parseInt($(this).val())
            $('tbody').each(function (){
                $(this).find('tr:gt(0)').remove()
            })
            if (id>0) {
                $.ajax({
                    url: '/public/admin/customer-invoice/customer-details/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function (response){
                        // $('#accTable').find('tr').remove();
                        $('.pending_delivery_orders').find('option').remove()
                        $('.pending_delivery_orders').append('<option value="" >Select One:</option>')
                        for (var i=0;i<response.length;i++){
                            $('.pending_delivery_orders').append('<option value='+response[i].po_id+' >'+response[i].id+' ->> '+response[i].do_number +'</option>')
                        }
                    }
                })
            }else {

                $('.pending_delivery_orders').find('option').remove()
                $('.pending_delivery_orders').append('<option value="" >Select Customer:</option>')
            }
        })

        $('#myTable').on('change','.pending_delivery_orders',function (){

            var id = parseInt($(this).val());
            var thisText = $(this).find('option:selected').text();
            var do_id = parseInt(thisText.substring(0,5));
            $(this).closest('tbody').find('.do_id').val(do_id)
            var thiss = $(this)

            if (id) {
                $.ajax({
                    url: '/public/admin/customer-invoice/customer-purchase-order-details/'+id,
                    type: 'get',
                    dataType: 'json',
                    data: {
                        do_id: do_id
                    },
                    success: function (response){
                        // $('#accTable').find('tr').remove()
                        // for (var i=0; i<response.length;i++){
                        $('#grand_total').val(0)
                        console.log(response)
                        if(response.item && response.po){
                            thiss.closest('tbody').find('tr:gt(0)').remove();
                            thiss.closest('tbody').append('<tr>' +
                                '<td>' +
                                '<div class="row">\n' +
                                '                                        <div class="col-md-6">\n' +
                                '                                            <label for="item_name">Item Name<span class="color">*</span></label>\n' +
                                '                                            <input type="text" name="item_name[]" value='+ response.item.name+' readonly class=" item_name form-control">\n' +
                                '                                            <input type="hidden" class=" item_id form-control" name="item_id[]" value='+ response.item.id+'  >\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-md-3">\n' +
                                '                                            <label for="item_uom">Item Uom <span class="color">*</span></label>\n' +
                                '                                            <input type="text" name="item_uom[]" value='+ response.po.unit.name+' readonly class="item_uom form-control">\n' +
                                '                                            <input type="hidden" name="item_uom_id[]" value='+ response.po.unit_id+' class="item_uom_id">\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-md-3">\n' +
                                '                                            <label for="item_category">Item Category<span class="color">*</span></label>\n' +
                                '                                            <input type="text" name="item_category[]" value="Coal" readonly class="item_category form-control">\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-md-4">\n' +
                                '                                            <label for="item_qty">Item Quantity<span class="color">*</span></label>\n' +
                                '                                            <input type="text" name="item_qty[]" value='+ response.po.qty+' readonly class="item_qty form-control">\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-md-4">\n' +
                                '                                            <label for="item_price">Item Price<span class="color">*</span></label>\n' +
                                '                                            <input type="text" class=" item_price form-control" name="item_price[]" value='+ response.po.unit_price +'  >\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-md-4">\n' +
                                '                                            <label for="sub_total">Sub Total<span class="color">*</span></label>\n' +
                                '                                            <input type="text" class="sub_total form-control" readonly name="sub_total[]" value= '+ response.po.qty * response.po.unit_price+' >\n' +
                                '                                        </div>\n' +
                                '\n' +
                                '                                    </div>' +
                                '</td>' +
                                '                                    <input type="hidden" name="detail_id[]" value="0">\n' +
                                '</tr>')
                            countTotal()
                        }
                    }
                })
            }
        })

        $(document).click(function (){
            $('#myTable tbody tr').each(function (){
                var indexId =  $(this).closest('tbody').index()

                $(this).find('.item_name').attr('name','item_name'+indexId)
                $(this).find('.item_id').attr('name','item_id'+indexId)
                $(this).find('.item_qty').attr('name','item_qty'+indexId)
                $(this).find('.item_uom').attr('name','item_uom'+indexId)
                $(this).find('.item_uom_id').attr('name','item_uom_id'+indexId)
                $(this).find('.item_price').attr('name','item_price'+indexId)
                $(this).find('.item_category').attr('name','item_category'+indexId)
                $(this).find('.sub_total').attr('name','sub_total'+indexId)
            })
        })

        $('#inv_number').on('wheel',function (){
            $(this).blur()
        })

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        // today = yyyy + '/' + mm + '/' + dd;
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('inv_date').value = today;

    })

</script>
@endsection
