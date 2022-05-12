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
    </style>
@stop



@section('page_header')
    <div class="headingClass">
        <p class="page-title headingLocalPurchaseOrder">
            <i class=""></i>
            Add New Local Purchase Order Invoice
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
                            <legend class="legendPurchaseOrder" style="">Invoice Info</legend>
                        </div>
                        <form action="{{url('admin/invoice/save-invoice')}}" method="post" class="invoice_form" id="invoice_form">
                            {{@csrf_field()}}
                            <div class="row">
                                <div class="col-md-6" style="margin-bottom: 0px;">
                                    <label class="font-weight-bold">Reference No : <span class="color">*</span></label>
                                    <h4>{{sprintf('%04d', $invoice_ref_number+1).date('-Y-m') }}</h4>
                                </div>
                                <div class="col-md-6" style="margin-bottom: 0px;">
                                    <div class="form-group" style="float: right;">
                                        Date<span style="color: red;">*</span>
                                        <input type="date" class="inv_date form-control font-weight-bold" required
                                               readonly
                                               id="inv_date" name="date" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="margin-bottom: 0px;">
                                    <div class="input-group">
                                        <div class="radio">
                                            <input type="radio" class="radioInvoice" name="radioInvoice" id="radioInvoice" style="margin-left: 0;"><label for="radioInvoice" class="font-weight-bold">Invoice <span class="color">*</span></label>
                                        </div>
                                        <div class="radio" >
                                            <input type="radio" class="radioPurchaseOrderInvoice" name="radioPurchaseOrderInvoice" id="radioPurchaseOrderInvoice" style="margin-left: 0;" ><label for="radioPurchaseOrderInvoice" class="font-weight-bold">Local Purchase Order Invoice<span class="color">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4" id="deliveryType" style="margin-bottom: 0px;">
                                </div>

                                <div class="col-md-4" style="margin-bottom: 0px;">
                                        <div class="input-group" id="invoice" style="float: right; padding-top: 5px;">
                                            Invoice No :<span class="font-weight-bold" style="color: red;">*</span>

                                            <input type="number" name="invoiceNumber" required id="inv_number"
                                                   class="inv_number form-control font-weight-bold"
                                                   placeholder="Invoice Number" value="">
                                        </div>
                                </div>
                            </div>



                            {{--{{dd($invoice_ref_number)}}--}}

                            <div id="selectClass" class="selectClass" >
                                <div class="selectVendor">
                                    <div class="col-md-12 vendor_select" id="vendor_select" >
                                        <br>
                                        <label for="vendor" class="font-weight-bold">Vendor Name</label>
                                        <span style="color: red;">*</span>
                                        <select name="vendor" Select2 required id="vendor"
                                                class="vendor form-control font-weight-bold">
                                            <option value="" class="vendorValue" Select2>Select Vendor</option>
                                            @foreach( $vendors as $vendor)
                                                <option value="{{$vendor->id}}">{{$vendor->f_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12" style="margin-bottom: 20px;"></div>
                            <table class="table table-striped" id="myTable" >
                                <thead id="myTableHead">
                                </thead>
                                <tbody id="accTable">
                                <tr>
                                    <td>
                                        <div class="col-md-5">
                                            <label for="name" class="font-weight-bold">Product Name:</label><span
                                                style="color: red;">*</span>
                                            <select name="product_id[]" select2 required id="namevalue"
                                                    class="namevalue form-control font-weight-bold  ">
                                                <option value="">Select Product</option>
                                                @foreach($products as $key=>$product)
                                                    <option value="{{$product->id}}"
                                                            class="select_product">{{$product->item_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="UOM" class="font-weight-bold">UOM</label><span
                                                    style="color: red;">*</span>
                                                <select type="text" name="uom[]" required id="uom"
                                                       class="uom form-control">
                                                    <option value="">Select Item</option>
                                                </select>
{{--                                                <input type="text" name="uom[]" id="uom" readonly--}}
{{--                                                       class="uom form-control">--}}
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="margin-top: 23px;">
                                            <button class="btn btn-success  add-product">+Add Product</button>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="quantity" class="font-weight-bold">Quantity</label><span
                                                    style="color: red;">*</span>
                                                <input type="number" name="quantity[]" id="quantity" required
                                                       class="quantity hidethis form-control font-weight-bold">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Price" class="font-weight-bold">Price</label><span
                                                    style="color: red;">*</span>
                                                <input type="number" name="price[]" id="price" required
                                                       class="price hidethis form-control font-weight-bold">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Total" class="font-weight-bold">Total</label><span
                                                    style="color: red;">*</span>
                                                <input type="text" name="total[]" id="total" readonly
                                                       class="total hidethis form-control font-weight-bold">
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                            </div>

                            <div class=" grand_total col-md-4">
                                <label for="Total" class="font-weight-bold">Grand Total</label><span
                                    style="color: red;">*</span>
                                <input type="text" name="grand_total" readonly
                                       class="grand_total_amount form-control font-weight-bold">
                            </div>
                            <button class="btn btn-success save" id="save">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (){


            $('#accTable').on('input','.quantity',function (){
                var grandTotal = 0;
                var thisComponent = $(this)
                var total =  thisComponent.val() * thisComponent.closest('tr').find('.price').val();
                thisComponent.closest('tr').find('.total').val(total)
                $('.total').each(function (){
                    grandTotal = parseInt(grandTotal) + parseInt($(this).val())

                })
                $('.grand_total_amount').val(grandTotal)
            })
            $('#accTable').on('input','.price',function (){
                var grandTotal = 0;
                var thisComponent = $(this)
                var total =  thisComponent.val() * thisComponent.closest('tr').find('.quantity').val();
                thisComponent.closest('tr').find('.total').val(total)
                $('.total').each(function (){
                    grandTotal = parseInt(grandTotal) + parseInt($(this).val())
                })
                $('.grand_total_amount').val(grandTotal)
            })

            $('#deliveryType').on('change','.selectDeliveryType',function (){
                // alert($(this).val())
                if($(this).val() == 2) {
                    $('.quantity').prop('readonly',false)
                } else {
                    $('.quantity').prop('readonly',true)
                }
            })

            $('#accTable').on('wheel','.quantity',function (){
                $(this).blur();
            })
            $('#accTable').on('click','.deleteItem',function (){
                var valueG = $('.grand_total_amount').val() - ($(this).closest('tr').find('.itemPrice').val() *$(this).closest('tr').find('.quantity').val())
                $('.grand_total_amount').val(valueG)
                $(this).closest('tr').remove();
            })
            $('.selectClass').on('change','.selectPurchaseOrder',function (){
                var orderId = $(this).val();
                $('#deliveryType').on('change','.selectDeliveryType',function (){
                    var thisSelectVal = $(this)
                    if  ($(this).val()==1) {
                        $.ajax({
                            url: '/admin/get-lpoDetails/'+orderId,
                            type: 'GET',
                            success: function (response){
                              if (response.lpo.length == 0) {
                                    $('.grand_total_amount').val(0)
                                    $('#accTable').find('tr').remove();
                                    $('#accTable').append("<tr><td><h1 style='color:red'> Record not Exist </h1></td></tr>")
                                } else{
                                    var total = 0;
                                    $('#accTable').find('tr').remove();
                                    for(var i = 0; i<response.lpo.length; i++) {
                                        var sumQ = 0;
                                        for (var j=0; j<response.partialDetail.length; j++) {
                                            if (response.lpo[i].id == response.partialDetail[j].product_id) {
                                                sumQ = parseInt(sumQ) + parseInt(response.partialDetail[j].quantity);
                                            }
                                        }
                                        if (parseInt(response.lpo[i].quantity - sumQ)   ) {
                                            $('#accTable').append(" <tr>\n" +
                                                '                                                <input type=\"hidden\" name=\"purchaseItem_id[]\" readonly value=' + response.lpo[i].id + '  id=\"\" class=\"form-control  item_id\">\n' +
                                                "                                            <td>\n" +
                                                '                                                <input name=\"item_id[]\" readonly value=' + response.lpo[i].name + '  id=\"\" class=\"form-control  item_id\">\n' +
                                                "                                            </td>\n" +
                                                "                                            <td>\n" +
                                                '                                                <input name=\"category[]\" id=\"\" value=' + response.lpo[i].category + ' class=\"form-control category\" readonly>\n' +
                                                "                                            </td>\n" +
                                                "                                            <td>\n" +
                                                '                                                <input name=\"uom[]\" id=\"\"  value=' + response.lpo[i].uomName + ' class=\"form-control uom\" readonly>\n' +
                                                "                                            </td>\n" +
                                                "                                            <td>\n" +
                                                '                                                <input type=\"number\" required readonly name=\"quantity[]\" value=' + ((!$.trim(response.partialDetail) ? response.lpo[i].quantity : response.lpo[i].quantity - sumQ)) + ' id=\"\" class=\"form-control quantity\">\n' +
                                                "                                            </td>\n" +
                                                "                                            <td>\n" +
                                                '                                                <input type=\"number\" name=\"price[]\" value=' + response.lpo[i].price + '  readonly id=\"\" class=\"form-control itemPrice\">\n' +
                                                "                                            </td>\n" +
                                                "                                            <td>\n" +
                                                '                                                <input type=\"number\" name=\"subTotal\" value=' + parseInt(response.lpo[i].price) * parseInt(response.lpo[i].quantity) + '   readonly id=\"\" class=\"form-control subTotal\">\n' +
                                                "                                            </td>\n" +
                                                "                                            <td>\n" +
                                                '<button class="btn btn-danger deleteItem"><i class="voyager-trash action pull-right"></i> </button>' +
                                                "                                            </td>\n" +
                                                "                                        </tr>")
                                            total = total + (response.lpo[i].price * response.lpo[i].quantity);
                                        } else
                                        {
                                            console.log('done');
                                        }
                                    }
                                    $('.grand_total_amount').val(total)
                                    $('#deliveryType').find('.selectDelivery').remove();
                                    $('#deliveryType').append("<div class=\"form-group selectDelivery\" >\n" +
                                        "                                        <label for=\"deliveryType\" class=\"font-weight-bold\">Delivery Type <span class=\"color\">*</span></label>\n" +
                                        "                                        <select name=\"partial_id\" id=\"selectDeliveryType\" class=\"form-control selectDeliveryType\" required>\n" +
                                        "                                            <option value=''>Select Delivery Type</option>\n" +
                                        "                                            <option value=\"1\" selected> complete</option>\n" +
                                        "                                            <option value=\"2\">Partial</option>\n" +
                                        "                                        </select>\n" +
                                        "                                    </div>");
                                }
                            }
                        })

                        $('.selectDeliveryType select').val('hey')

                    }
                    else {
                             $('#accTable').on('click','.quantity',function (){
                                var clickVal = $(this).closest('tr').find('.quantity').val()
                                 var selectThis = $(this).closest('tr').find('.quantity');
                                 $('#accTable').on('input','.quantity',function (){
                                     var blurVal = $(this).val()
                                     if ( parseInt(clickVal)< parseInt(blurVal) ) {
                                         selectThis.val(parseInt(clickVal))
                                     }
                                     var grandT = 0;
                                     $(this).each(function (){
                                         $('.quantity').each(function (){
                                             $(this).closest('tr').find('.subTotal').val( parseInt($(this).closest('tr').find('.itemPrice').val()) * parseInt($(this).val()))
                                             grandT = grandT + (parseInt($(this).closest('tr').find('.itemPrice').val()) * parseInt($(this).val()));
                                         })
                                     })
                                     $('.grand_total_amount').val(grandT)
                                 })
                            })
                    }

                })

                $.ajax({
                    url: '/admin/get-lpoDetails/'+orderId,
                    type: 'GET',
                    success: function (response){
                        // console.log(response.partialDetail[0].quantity)

                        // console.log(response.partialDetail)
                        // console.log(response.lpo)

                        if (response.lpo.length == 0)
                        {
                            $('.grand_total_amount').val(0)
                            $('#accTable').find('tr').remove();
                            $('#accTable').append("<tr><td><h1 style='color:red'> Record not Exist </h1></td></tr>")
                        }
                        else
                        {

                            var total = 0;
                            // console.log(response.lpo.length)
                            $('#accTable').find('tr').remove();
                            for(var i = 0; i<response.lpo.length; i++)
                            {
                                var sumQ = 0;
                                for (var j=0; j<response.partialDetail.length; j++)
                                {
                                    if (response.lpo[i].id == response.partialDetail[j].product_id)
                                    {
                                        // console.log()
                                        sumQ = parseInt(sumQ) + parseInt(response.partialDetail[j].quantity);

                                    }
                                }
                                // console.log(sumQ)
                                // break;



                                if (parseInt(response.lpo[i].quantity - sumQ)   ) {


                                    $('#accTable').append(" <tr>\n" +
                                        '                                                <input type=\"hidden\" name=\"purchaseItem_id[]\" readonly value=' + response.lpo[i].id + '  id=\"\" class=\"form-control  item_id\">\n' +
                                        "                                            <td>\n" +
                                        '                                                <input name=\"item_id[]\" readonly value=' + response.lpo[i].name + '  id=\"\" class=\"form-control  item_id\">\n' +
                                        "                                            </td>\n" +
                                        "                                            <td>\n" +
                                        '                                                <input name=\"category[]\" id=\"\" value=' + response.lpo[i].category + ' class=\"form-control category\" readonly>\n' +
                                        "                                            </td>\n" +
                                        "                                            <td>\n" +
                                        '                                                <input name=\"uom[]\" id=\"\"  value=' + response.lpo[i].uomName + ' class=\"form-control uom\" readonly>\n' +
                                        "                                            </td>\n" +
                                        "                                            <td>\n" +
                                        '                                                <input type=\"number\" required readonly name=\"quantity[]\" value=' + ((!$.trim(response.partialDetail) ? response.lpo[i].quantity : response.lpo[i].quantity - sumQ)) + ' id=\"\" class=\"form-control quantity\">\n' +
                                        "                                            </td>\n" +
                                        "                                            <td>\n" +
                                        '                                                <input type=\"number\" name=\"price[]\" value=' + response.lpo[i].price + '  readonly id=\"\" class=\"form-control itemPrice\">\n' +
                                        "                                            </td>\n" +
                                        "                                            <td>\n" +
                                        '                                                <input type=\"number\" name=\"subTotal\" value=' + parseInt(response.lpo[i].price) * parseInt(response.lpo[i].quantity) + '   readonly id=\"\" class=\"form-control subTotal\">\n' +
                                        "                                            </td>\n" +
                                        "                                            <td>\n" +
                                        '<button class="btn btn-danger deleteItem"><i class="voyager-trash action pull-right"></i> </button>' +
                                        "                                            </td>\n" +
                                        "                                        </tr>")
                                    total = total + (response.lpo[i].price * response.lpo[i].quantity);
                                }
                                else
                                {
                                    console.log('done');
                                }






                            }
                            $('.grand_total_amount').val(total)
                            $('#deliveryType').find('.selectDelivery').remove();
                            $('#deliveryType').append("<div class=\"form-group selectDelivery\" >\n" +
                                "                                        <label for=\"deliveryType\" class=\"font-weight-bold\">Delivery Type <span class=\"color\">*</span></label>\n" +
                                "                                        <select name=\"partial_id\" id=\"selectDeliveryType\" class=\"form-control selectDeliveryType\" required>\n" +
                                "                                            <option value=''>Select Delivery Type</option>\n" +
                                "                                            <option value=\"1\">Complete</option>\n" +
                                "                                            <option value=\"2\">Partial</option>\n" +
                                "                                        </select>\n" +
                                "                                    </div>");
                        }
                    }
                })

            })

            $('.radioPurchaseOrderInvoice').prop('checked',false)
            $('.radioInvoice').prop('checked',true)

            //==================================================== Convert Form to Lpo Invoice View==================================
            $('.radioPurchaseOrderInvoice').on('change',function (){

                $('.grand_total_amount').val(0);
                //Change Heading

                $('.headingClass').find('.headingLocalPurchaseOrder').remove();
                $('.headingClass').find('.headingInvoice').remove();
                $('.headingClass').append("<p class=\"page-title headingLocalPurchaseOrder\">\n" +
                    "            <i class=\"\"></i>\n" +
                    "        Add New Local Purchase Order Invoice\n" +
                    "        </p>")

                // Add delivery type select



                // Change Legend
                $('.legendClass').find('.legendPurchaseOrder').remove()
                $('.legendClass').find('.legendInvoice').remove()
                $('.legendClass').append("<legend class=\"legendPurchaseOrder\" style=\"\">Local Purchase Order Invoice Info</legend>")

                // Change Reference Number
                $('.noReference').find('.noRequisition').remove()
                $('.noReference').find('.noQuotation').remove()
                $('.noReference').append("<div class=\"noQuotation\">\n" +
                    "                                                <label for=\"number\" class=\"font-weight-bold\">Requisition No: </label>\n" +
                    "                                                <h4>{{sprintf('%04d',1).date('-Y-m')}}</h4>\n" +
                    "                                            </div>")


                $('.radioInvoice').prop('checked',false);

                $('.grand_total_amount').val(0);
                $('#myTable').find('tr').remove();


                // Add LOP Selecet
                $('.selectClass').find('.selectVendor1').remove();
                $('.selectClass').find('.selectLop').remove();
                $('.selectClass').find('.selectVendor').remove();
                $('.selectClass').append("<div class=\"selectLop\">\n" +
                    "                                    <div class=\"col-md-6 vendor_select\" id=\"vendor_select\" >\n" +
                    "                                        <br>\n" +
                    "                                        <label for=\"selectPurchaseOrder\" class=\"font-weight-bold\">Select Purchase Order</label>\n" +
                    "                                        <span style=\"color: red;\">*</span>\n" +
                    "                                        <select name=\"selectPurchaseOrder\" Select2 required id=\"selectPurchaseOrder\"\n" +
                    "                                                class=\"selectPurchaseOrder form-control font-weight-bold\">\n" +
                    "                                            <option value=\"\" Select2>Select Purchase Order</option>\n" +
                    "                                            @foreach( $purchaseOrders as $purchaseOrder)\n" +
                    "                                                <option value=\"{{$purchaseOrder->id}}\">{{$purchaseOrder->id}} - {{$purchaseOrder->description}}</option>\n" +
                    "                                            @endforeach\n" +
                    "                                        </select>\n" +
                    "                                    </div>" +
                    "<div class=\"selectVendor1\">\n" +
                    "                                    <div class=\"col-md-6 vendor_select\" id=\"vendor_select\" >\n" +
                    "                                        <br>\n" +
                    "                                        <label for=\"vendor\" class=\"font-weight-bold\">Vendor Name</label>\n" +
                    "                                        <span style=\"color: red;\">*</span>\n" +
                    "                                        <select name=\"vendor\" Select2 required id=\"vendor\"\n" +
                    "                                                class=\"vendor form-control font-weight-bold\">\n" +
                    "                                            <option value=\"\" class=\"vendorValue\" Select2>Select Vendor</option>\n" +
                    "                                            @foreach( $vendors as $vendor)\n" +
                    "                                                <option value=\"{{$vendor->id}}\">{{$vendor->f_name}}</option>\n" +
                    "                                            @endforeach\n" +
                    "                                        </select>\n" +
                    "                                    </div>\n" +
                    "                                </div>")

                $('#myTableHead').find('tr').remove()
                $('#myTableHead').append("<tr>\n" +
                    "                                            <th>\n" +
                    "                                                ITEM NAME\n" +
                    "                                            </th>\n" +
                    "                                            <th>\n" +
                    "                                                ITEM CATEGORY\n" +
                    "                                            </th>\n" +
                    "                                            <th>\n" +
                    "                                                ITEM UOM\n" +
                    "                                            </th>\n" +
                    "                                            <th>\n" +
                    "                                                ITEM QUANTITY\n" +
                    "                                            </th>\n" +
                    "                                            <th>ITEM PRICE</th>\n" +
                    "                                            <th>\n" +
                    "                                                SUB TOTAL\n" +
                    "                                            </th>\n" +
                    "                                            <th class='action text-right'>Action</th>\n" +
                    "                                        </tr>")

                $('#btnAddDiv').find('.btnAddQuotation').remove()
                $('#btnAddDiv').find('.btnAddRequisition').remove()
                $('.addQuotation').remove();
                $('#btnAddDiv').append(" <button class=\"btn btn-success btnAddRequisition pull-right\"> ADD ITEM</button>")

                $('.btnAddRequisition').click(function (e){
                    e.preventDefault();

                    $('#accTable').append()
                })
            })

            //========================================== change form view to Add Invoice  =====================================================
            $('.radioInvoice').on('change',function (){
                $('.selectClass').find('.selectLop').remove();
                $('.selectClass').find('.selectVendor1').remove();
                $('.selectClass').append("<div class=\"selectVendor1\">\n" +
                    "                                    <div class=\"col-md-12 vendor_select\" id=\"vendor_select\" >\n" +
                    "                                        <br>\n" +
                    "                                        <label for=\"vendor\" class=\"font-weight-bold\">Vendor Name</label>\n" +
                    "                                        <span style=\"color: red;\">*</span>\n" +
                    "                                        <select name=\"vendor\" Select2 required id=\"vendor\"\n" +
                    "                                                class=\"vendor form-control font-weight-bold\">\n" +
                    "                                            <option value=\"\" class=\"vendorValue\" Select2>Select Vendor</option>\n" +
                    "                                            @foreach( $vendors as $vendor)\n" +
                    "                                                <option value=\"{{$vendor->id}}\">{{$vendor->f_name}}</option>\n" +
                    "                                            @endforeach\n" +
                    "                                        </select>\n" +
                    "                                    </div>\n" +
                    "                                </div>");

                $('#myTableHead').find('tr').remove()

                //Change Heading
                $('.headingClass').find('.headingLocalPurchaseOrder').remove();
                $('.headingClass').find('.headingInvoice').remove();
                $('.headingClass').append("<p class=\"page-title headingInvoice\">\n" +
                    "            <i class=\"\"></i>\n" +
                    "        Add New Invoice\n" +
                    "        </p>")

                // Change Legend
                $('.legendClass').find('.legendPurchaseOrder').remove()
                $('.legendClass').find('.legendInvoice').remove()
                $('.legendClass').append("<legend class=\"legendInvoice\" style=\"\">Invoice Info</legend>")

                // Change Reference Number
                $('.noReference').find('.noRequisition').remove()
                $('.noReference').find('.noQuotation').remove()
                $('.noReference').append("<div class=\"noQuotation\">\n" +
                    "                                                <label for=\"number\" class=\"font-weight-bold\">Quotation No: </label>\n" +
                    "                                                <h4>{{sprintf('%04d',1).date('-Y-m')}}</h4>\n" +
                    "                                            </div>")

                // Radio value uncheck
                $('.radioPurchaseOrderInvoice').prop('checked',false);

                //Clear all row in table
                $('#accTable').find('tr').remove();
                $('#accTable').append("<input type='hidden' class='valueQuotation' value='1' name='valueQuotation'>");


                //remove delivery type
                $('#deliveryType').find('.selectDelivery').remove();

                // Change Append Row Button
                $('.addItem').remove();
                $('#btnAddDiv').find('.btnAddRequisition').remove()
                $('#btnAddDiv').find('.btnAddQuotation').remove()
                $('#btnAddDiv').append(" <button class=\"btn btn-success btnAddQuotation pull-right\"> ADD ITEM</button>")
                $('#accTable').append("<tr>\n" +
                    "                                    {{--                                    <input type=\"hidden\" name=\"detail_id[]\" value=\"{{$invoice->id}}\">--}}\n" +
                    "                                    <td>\n" +
                    "                                        <div class=\"col-md-5\">\n" +
                    "                                            <label for=\"name\" class=\"font-weight-bold\">Product Name:</label><span\n" +
                    "                                                style=\"color: red;\">*</span>\n" +
                    "                                            <select name=\"product_id[]\" select2 required id=\"namevalue\"\n" +
                    "                                                    class=\"namevalue form-control font-weight-bold  \">\n" +
                    "                                                <option value=\"\">Select Product</option>\n" +
                    "                                                @foreach($products as $key=>$product)\n" +
                    "                                                    <option value=\"{{$product->id}}\"\n" +
                    "                                                            class=\"select_product\">{{$product->item_name}}</option>\n" +
                    "                                                @endforeach\n" +
                    "\n" +
                    "                                                {{--                                <option value=\"other\">Other</option>--}}\n" +
                    "                                            </select>\n" +
                    "                                        </div>\n" +
                    "\n" +
                    "  <div class=\"col-md-5\">\n" +
                    "                                            <div class=\"form-group\">\n" +
                    "                                                <label for=\"UOM\" class=\"font-weight-bold\">UOM</label><span\n" +
                    "                                                    style=\"color: red;\">*</span>\n" +
                    "                                                <select type=\"text\" name=\"uom[]\" id=\"uom\"\n" +
                    "                                                       class=\"uom form-control\">\n" +
                    "                                                    <option value=\"\">Select Item</option>\n" +
                    "                                                </select>\n" +
                    "{{--                                                <input type=\"text\" name=\"uom[]\" id=\"uom\" readonly--}}\n" +
                    "{{--                                                       class=\"uom form-control\">--}}\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "                                        <div class=\"col-md-2\" style=\"margin-top: 23px;\">\n" +
                    "                                            <button class=\"btn btn-success  add-product\">+Add Product</button>\n" +
                    "                                        </div>\n" +
                    "                                        <div class=\"col-md-4\">\n" +
                    "                                            <div class=\"form-group\">\n" +
                    "                                                <label for=\"quantity\" class=\"font-weight-bold\">Quantity</label><span\n" +
                    "                                                    style=\"color: red;\">*</span>\n" +
                    "                                                <input type=\"number\" required name=\"quantity[]\" id=\"quantity\"\n" +
                    "                                                       class=\"quantity hidethis form-control font-weight-bold\">\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "                                        <div class=\"col-md-4\">\n" +
                    "                                            <div class=\"form-group\">\n" +
                    "                                                <label for=\"Price\" class=\"font-weight-bold\">Price</label><span\n" +
                    "                                                    style=\"color: red;\">*</span>\n" +
                    "                                                <input type=\"number\" required name=\"price[]\" id=\"price\"\n" +
                    "                                                       class=\"price hidethis form-control font-weight-bold\">\n" +
                    "                                            </div>\n" +
                    "                                        </div>" +
                    "                                        <div class=\"col-md-4\">\n" +
                    "                                            <div class=\"form-group\">\n" +
                    "                                                <label for=\"Total\" class=\"font-weight-bold\">Total</label><span\n" +
                    "                                                    style=\"color: red;\">*</span>\n" +
                    "                                                <input type=\"text\" name=\"total[]\" id=\"total\" readonly\n" +
                    "                                                       class=\"total hidethis form-control font-weight-bold\">\n" +
                    "                                            </div>\n" +
                    "                                        </div>\n" +
                    "                                    </td>\n" +
                    "                                </tr>")

                $('.add-product').click(function (e){
                    e.preventDefault();
                    $('#accTable').append("<tr>\n" +
                        "                                    <td>\n" +
                        "                                        <div class=\"col-md-5\">\n" +
                        "                                            <label for=\"name\">Product Name:</label><span style=\"color: red;\">*</span>\n" +
                        "                                            <select name=\"product_id[]\" required id=\"namevalue\"\n" +
                        "                                                    class=\"namevalue form-control select2\">\n" +
                        "                                                <option value=\"\">Select Product</option>\n" +
                        "                                                @foreach($products as $key=>$product)\n" +
                        "                                                    <option value=\"{{$product->id}}\" class=\"select_product\">{{$product->item_name}}</option>\n" +
                        "                                                @endforeach\n" +
                        "\n" +
                        "                                                {{--                                <option value=\"other\">Other</option>--}}\n" +
                        "                                            </select>\n" +
                        "                                        </div>\n" +
                        "\n" +
                        "  <div class=\"col-md-5\">\n" +
                        "                                            <div class=\"form-group\">\n" +
                        "                                                <label for=\"UOM\" class=\"font-weight-bold\">UOM</label><span\n" +
                        "                                                    style=\"color: red;\">*</span>\n" +
                        "                                                <select type=\"text\" name=\"uom[]\" id=\"uom\"\n" +
                        "                                                       class=\"uom form-control\">\n" +
                        "                                                    <option value=\"\">Select Item</option>\n" +
                        "                                                </select>\n" +
                        "{{--                                                <input type=\"text\" name=\"uom[]\" id=\"uom\" readonly--}}\n" +
                        "{{--                                                       class=\"uom form-control\">--}}\n" +
                        "                                            </div>\n" +
                        "                                        </div>\n" +
                        "                                        <div class=\"col-md-2\" style=\"margin-top: 23px;\">\n" +
                        "                                            <button type=\"button\" class=\"btn btn-danger  deleteproduct action pull-right\"><i class=\"voyager-trash\"></i></button>\n" +
                        "                                        </div>\n" +
                        "                                        <div class=\"col-md-4\">\n" +
                        "                                            <div class=\"form-group\">\n" +
                        "                                                <label for=\"quantity\" class=\"font-weight-bold\">Quantity</label><span\n" +
                        "                                                    style=\"color: red;\">*</span>\n" +
                        "                                                <input type=\"number\" name=\"quantity[]\" id=\"quantity\"\n" +
                        "                                                       class=\"quantity required hidethis form-control font-weight-bold\">\n" +
                        "                                            </div>\n" +
                        "                                        </div>\n" +
                        "                                        <div class=\"col-md-4\">\n" +
                        "                                            <div class=\"form-group\">\n" +
                        "                                                <label for=\"Price\" class=\"font-weight-bold\">Price</label><span\n" +
                        "                                                    style=\"color: red;\">*</span>\n" +
                        "                                                <input type=\"number\" required name=\"price[]\" id=\"price\"\n" +
                        "                                                       class=\"price hidethis form-control font-weight-bold\">\n" +
                        "                                            </div>\n" +
                        "                                        </div>" +
                        "                                        <div class=\"col-md-4\">\n" +
                        "                                            <div class=\"form-group\">\n" +
                        "                                                <label for=\"Total\">Total</label><span style=\"color: red;\">*</span>\n" +
                        "                                                <input type=\"text\" name=\"total[]\" id=\"total\" readonly\n" +
                        "                                                       class=\"total hidethis form-control\">\n" +
                        "                                            </div>\n" +
                        "                                        </div>\n" +
                        "                                    </td>\n" +
                        "                                </tr>")
                })
            })
        })
    </script>
@stop









@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
@section('javascript')

    // <script>

        $(document).ready(function () {
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

            console.log(today);
            document.getElementById('inv_date').value = today;
            var final_total = 0;
            var sum = 0;
            // Ajax function to fetch data in input fields
        });
    //
        function total_sum() {
            var temp = 0;
            $('.total').each(function () {

                var total = $(this).val();
                // alert(total);
                if ($.isNumeric(total)) {
                    temp = temp + parseInt(total);
                }
            });

            // alert(temp);
            $('.grand_total_amount').val(temp)
        }
    //

        $('#vendor_select').on('change', '.vendor', function () {
            var invoiceNumber = $('#inv_number').val();
            var vendor_id = $('#vendor').val();
            $.ajax({
                type: "POST",
                url: '{{url('admin/checkeinvoice')}}',
                data: {
                    invoiceNumber: invoiceNumber,
                    vendor_id: vendor_id
                },
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    if (res.exists) {
                        toastr.error('This Invoice Number is already exist');
                        $('#inv_number').css('background', 'pink');
                        $('#save').attr('disabled', true);
                    } else {
                        $('#inv_number').css('background', '#b8ffd7');
                        $('#save').attr('disabled', false);
                    }
                },

            });

        });

        function myFunction(selected, selectName) {
            $.ajax({
                url: 'invoice-product/' + selected,
                type: 'get',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    // console.log(response[0].item_uom)
                    selectName.closest('tr').find('.uom option').remove()
                    $.each(response[0].item_uom,function(j,k){
                        selectName.closest('tr').find('.uom').append('<option value='+k.id+'>'+ k.unitName+'-'+k.unitQuantity+'</option>')
                        console.log(k)
                    })
                }
            });
        }


        $('#myTable').on('click', '.deleteproduct', function () {
            var grandTotal =  $('.grand_total_amount').val()
            var thisSubTotal =  $(this).closest('tr').find('.total').val()
            var totalGrand = grandTotal - thisSubTotal;
            $('.grand_total_amount').val(totalGrand)
            $(this).closest('tr').remove();
        });
        $('#myTable').on('change', '.namevalue', function () {
// alert('function');
            var selected = $(this).find(':selected').val();
            // var selected = $(this).val();
            var selectName = $(this);
            console.log(selected)
            myFunction(selected, selectName);


        });


        $('.add-product').click(function (e) {

            e.preventDefault();
            $('#myTable').append("<tr>\n" +
                "                                    <td>\n" +
                "                                        <div class=\"col-md-5\">\n" +
                "                                            <label for=\"name\">Product Name:</label><span style=\"color: red;\">*</span>\n" +
                "                                            <select name=\"product_id[]\" required id=\"namevalue\"\n" +
                "                                                    class=\"namevalue form-control select2\">\n" +
                "                                                <option value=\"\">Select Product</option>\n" +
                "                                                @foreach($products as $key=>$product)\n" +
                "                                                    <option value=\"{{$product->id}}\" class=\"select_product\">{{$product->item_name}}</option>\n" +
                "                                                @endforeach\n" +
                "\n" +
                "                                                {{--                                <option value=\"other\">Other</option>--}}\n" +
                "                                            </select>\n" +
                "                                        </div>\n" +
                "\n" +
                "  <div class=\"col-md-5\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"UOM\" class=\"font-weight-bold\">UOM</label><span\n" +
                "                                                    style=\"color: red;\">*</span>\n" +
                "                                                <select type=\"text\" name=\"uom[]\" id=\"uom\"\n" +
                "                                                       class=\"uom form-control\">\n" +
                "                                                    <option value=\"\">Select Item</option>\n" +
                "                                                </select>\n" +
                "{{--                                                <input type=\"text\" name=\"uom[]\" id=\"uom\" readonly--}}\n" +
                "{{--                                                       class=\"uom form-control\">--}}\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                        <div class=\"col-md-2\" style=\"margin-top: 23px;\">\n" +
                "                                            <button type=\"button\" class=\"btn btn-danger  deleteproduct action pull-right\"><i class=\"voyager-trash\"></i></button>\n" +
                "                                        </div>\n" +
                "                                        <div class=\"col-md-4\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"quantity\" class=\"font-weight-bold\">Quantity</label><span\n" +
                "                                                    style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"number\" required name=\"quantity[]\" id=\"quantity\"\n" +
                "                                                       class=\"quantity hidethis form-control font-weight-bold\">\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                        <div class=\"col-md-4\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"Price\" class=\"font-weight-bold\">Price</label><span\n" +
                "                                                    style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"number\" name=\"price[]\" required id=\"price\"\n" +
                "                                                       class=\"price hidethis form-control font-weight-bold\">\n" +
                "                                            </div>\n" +
                "                                        </div>" +
                "                                        <div class=\"col-md-4\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"Total\">Total</label><span style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"text\" name=\"total[]\" id=\"total\" readonly\n" +
                "                                                       class=\"total hidethis form-control\">\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </td>\n" +
                "                                </tr>");


        });

        $('#invoice_form').on('click',function (){
            // $('#save').attr('disabled',true);
        })

    </script>

@endsection
