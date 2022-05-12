@extends('voyager::master')
@php  $customerset=App\VendorPurchaseOrder::first(); @endphp
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
        .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 0px;
        }
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .row {
             margin-right: 0px;
             margin-left: 0px;
        }
        .vendor{
            border: 1px solid black;!important;
        }
        .error-color{
            background-color: rgba(255, 0, 0, 0.4) ;
        }

    </style>
@stop



@section('page_header')
    <div class="headingClass">
        <p class="page-title headingLocalPurchaseOrder">
            <i class=""></i>
            Add Customer Invoice
        </p>

    </div>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="panel panel-bordered">
                    <!-- form start -->

                    <div class="panel-body">
                        <div class="legendClass">
                            <legend class="legendPurchaseOrder" style="">Customer Invoice Info</legend>
                        </div>
                        <form action="{{url('admin/customer-invoice/store')}}" method="post" class="invoice_form" id="invoice_form">
                            {{@csrf_field()}}

                            <div class="row">
                                <div class="col-md-6" style="margin-bottom: 0px;">
                                    <label class="font-weight-bold">Reference No : <span class="color">*</span></label>
                                    <h4>{{sprintf('%04d', $invoice_ref_number+1).date('-Y-m') }}</h4>
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
                                            <option value="{{$customer->id}}">{{$customer->name}}  {{--{{ \Illuminate\Support\Str::limit($delivery_order->remarks, 50, $end='...') }}--}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-md-3" style="margin-bottom: 0px; margin-top: 22px;" >
                                    <label for="invoiceNumber">Invoice No : <span class="font-weight-bold" style="color: red;">*</span></label>
                                    <input  type="number" name="invoiceNumber" required id="inv_number" class="inv_number form-control font-weight-bold" style="border-radius: 0px" placeholder="Invoice Number" value="">
                                </div>

                                <div class="col-md-3" style="margin-bottom: 0px; margin-top: 22px;" >
                                    <label for="invoiceNumber">GST<span class="font-weight-bold" style="color: red;">*</span></label>
                                    <input  type="checkbox" name="gst" checked  id="gst" class="gst" style="border-radius: 0px" value="1">
                                </div>


                            </div>



                            <div class="col-md-12" style="margin-bottom: 20px;"></div>
                            <table class="table table-striped myTable" id="myTable"  >
                                <thead id="myTableHead">


                                </thead>
                                <tbody id="accTable">
                                <tr>
                                    <td>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-md-11">
                                            <label for="pending_delivery_orders" class="font-weight-bold">Pending Delivery Orders:<span style="color: red;">*</span></label>
                                            <select name="po_id" id="pending_delivery_orders" required class="pending_delivery_orders form-control select2">
                                                <option value="">Select DO:</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" id="btn_do" class="btn btn-success" style="margin-top: 27px;">Add DO</button>
                                        </div>
                                        <input type="hidden" name="do_id[]" class="do_id" id="do_id">
                                    </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="col-md-6 col-lg-6 col-sm-6">

                            </div>


                            <div style="text-align: right" class="grand_total col-md-4 col-lg-4 col-sm-4">
                                <label style="text-align: right;margin: 5px;" for="Total" class="font-weight-bold">Gst</label><span style="color: red;">*</span><br>
                                <label style="text-align: right ;margin: 5px;" for="Total" class="font-weight-bold">Additional Charges</label><span style="color: red;">*</span><br>
                                <label style="text-align: right; margin: 5px;" for="Total" class="font-weight-bold">Grand Total</label><span style="color: red;">*</span>
                            </div>



                            <div class=" grand_total col-md-2 col-lg-2 col-sm-2">

                                <input type="text" name="gst_total" id="gst_total" readonly class="grand_total_amount form-control font-weight-bold">
                                <input type="text" name="expense_total" id="expense_total" readonly class="grand_total_amount form-control font-weight-bold">
                                <input type="text" name="grand_total" id="grand_total" readonly class="grand_total_amount form-control font-weight-bold">
                            </div>


                            <button type="button" class="btn btn-success save" id="save">Save</button>
                            <div class="modal fade" id="modalRemarks" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header"
                                             style="background-color:#2ecc71;color:#fff;">
                                            <button type="button" class="close"
                                                    data-dismiss="modal">&times;
                                            </button>
                                            <h4 class="modal-title"
                                                style="text-align: left"><i
                                                    class="voyager-documentation"></i>Remarks</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <textarea name="remarks" required id="" class="form-control" cols="30" rows="4"></textarea>
                                               <div class="" style="margin-top: 20px;">
                                                   <button type="submit" class="btn btn-default pull-right" style="background-color:#2ecc71 ; color:#fff; ">
                                                       Submit
                                                   </button>
                                                   <button type="button"
                                                           class="btn btn-default pull-right"
                                                           data-dismiss="modal">Close
                                                   </button>
                                               </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

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
@if(1)
@section('javascript')
    @else
@section('javascript1')
    @endif

    <script>
    $(document).ready(function (){

        // Frontend Validations
        $('#save').click(function (e){
            var i = 0;
            $("input").each(function(){
                if (!$(this).val()){
                    e.preventDefault();
                    $(this).addClass('error-color');
                    var thiss = $(this);
                    $(this).closest('.row').attr('id','scroll');
                    toastr.error('Please fill all feilds');
                    i =1;
                    $([document.documentElement, document.body]).animate({
                        scrollTop: thiss.closest('#scroll').offset().top
                    }, 300);
                    $(this).closest('.row').attr('id','');
                    $(this).focus();
                    return false;
                }
            });
            if (i == 0) {
                $('#modalRemarks').modal('show');
            }
        })

        $(document).click(function (e){
            $("input").each(function(){
                $(this).on('input',function (){
                    $(this).removeClass('error-color')
                })
            });
        })

        // Grand Total Count
        function countTotal(){
            var gTotal =0;
            var gst =0;
            var expense =0;
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

            $('.gst').each(function (){
                var thsTotal  = parseInt( $(this).val());
                if(!thsTotal){
                    thsTotal = 0;
                }
                gst  = gst + thsTotal;
            })

                $('.expense').each(function (){
                var thsTotal  = parseInt( $(this).val());
                if(!thsTotal){
                    thsTotal = 0;
                }
             expense  = expense + thsTotal;
            })





            $('#gst_total').val(gst);
            $('#expense_total').val(expense);
            $('#grand_total').val(gTotal+gst+expense);

            apply_gst()

        }

        $(document).on('input','.item_price',function (){
            countTotal();
        })

        function apply_gst() {
          //   var gTotal=0;
          //   $('.sub_total').each(function () {
          //     gTotal=parseInt(gTotal)+parseInt(   $(this).val())
          // });
          //
          //
          //
          //   if ($('input.gst').is(':checked')) {
          //           var tax=((gTotal*17)/100)
          //       $('#grand_total').val(parseInt(gTotal)+ parseInt(tax));
          //   }
          //   else
          //   {
          //       $('#grand_total').val(gTotal);
          //   }

        }
        $('.gst').on('click',function () {
            apply_gst()
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
            // alert(selectCurrent)
            var tbodyIndex = $(this).closest('tbody').index()
            var status=  eachtr(tbodyIndex,doId)

            if (status == 1) {
                $(this).children("option:selected").remove()
            }
        })

        // Module Append
        $('#btn_do').click(function (e){
            $('select').select2();

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
                // selectRefresh()
                // var selectorParant = $('select').select2();
                // $('.myTable').append(selectorParant);
                // $('select').select2();
                // $('.select2').select2();

            }else {
                toastr.error('Select Customer')
                e.preventDefault()
            }
            // $('select').select2('destroy');
            // var selectorParant = $('.acc_table').html();
            // $('.acc_table').append(selectorParant);
            $('select').select2();
        })

        // Delete Module
        $('#myTable').on('click','.btn_do_remove',function (){

            var sub_total =  parseInt($(this).closest('tbody').find('.sub_total').val());
            var grandTotal = parseInt($('#grand_total').val());
            if(sub_total){
                $('#grand_total').val(grandTotal - sub_total )

                apply_gst()
            }

            $(this).closest('tbody').remove();

            countTotal()
        })

        // Add data in last appened select
        $('#btn_do').click(function (){
            var id = $('#customer').val()
            if (id>0) {
                $.ajax({
                    url: '/public/admin/customer-invoice/customer-details/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function (response){
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

        // Add data in select when customer slelect
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
                        console.log(response)
                        // $('#accTable').find('tr').remove();
                        $('.pending_delivery_orders').find('option').remove()
                        $('.pending_delivery_orders').append('<option value="" >Select One:</option>')
                        for (var i=0;i<response.length;i++){
                          $('.pending_delivery_orders').append('<option value='+response[i].po_id+' >'+response[i].id+' -> '+response[i].do_number +'</option>')
                        }
                    }
                })
            }else {

                $('.pending_delivery_orders').find('option').remove()
                $('.pending_delivery_orders').append('<option value="" >Select Customer:</option>')
            }
        })

        // Append Row when Select delievery Order
        $('#myTable').on('change','.pending_delivery_orders',function (){

            var id = parseInt($(this).val());
            var thisText = $(this).find('option:selected').text();
            var do_id = parseInt(thisText.substring(0,5));
            // alert(do_id)
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
                                '                                            <input type="text" name="item_category[]" value='+response.item.type+' readonly class="item_category form-control">\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-md-4">\n' +
                                '                                            <label for="item_qty">Item Quantity<span class="color">*</span></label>\n' +
                                '                                            <input type="text" name="item_qty[]" value='+ response.do.truck_net_weight1+' readonly class="item_qty form-control">\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-md-4">\n' +
                                '                                            <label for="item_price">Item Price<span class="color">*</span></label>\n' +
                                '                                            <input type="text" class=" item_price form-control" name="item_price[]" value='+ response.po.unit_price +'  >\n' +
                                '                                            <input type="hidden" class=" expense form-control" name="expense[]" value='+ response.do.total_expense +'  >\n' +
                                '                                            <input type="hidden" class=" gst form-control" name="gst[]" value='+ response.do.gst +'  >\n' +
                                '                                        </div>\n' +
                                '                                        <div class="col-md-4">\n' +
                                '                                            <label for="sub_total">Sub Total<span class="color">*</span></label>\n' +
                                '                                            <input type="text" class="sub_total form-control" readonly name="sub_total[]" value= '+ response.do.truck_net_weight1 * response.po.unit_price+' >\n' +
                                '                                        </div>\n' +

                                '\n' +
                                '                                    </div>' +
                                '</td>' +
                                '</tr>')
                            countTotal()
                        }
                    }
                })
            }
        })

        // unique name to each input
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

        // strop scroll number input
        $('#inv_number').on('wheel',function (){
            $(this).blur()
        })

        // Set date
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
