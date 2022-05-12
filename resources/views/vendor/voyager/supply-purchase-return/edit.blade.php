@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('add',$customerset)
@section('page_header')
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
        .voyager .table.table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f5f5f5;
        }

        .Table td, .Table th {
            /* border: 1px solid #d4d2d0; */
            border: none;
        }
    </style>
    <p class="page-title">
        <i class=""></i>
        Make Purchase Return
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <div class="panel-body">
                        <legend>Purchase Return Info</legend>
                        <form action="{{url('admin/invoice/store-purchase-return/')}}" method="post" id="invoice_form">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-4">

                                    <div class="input-group">
                                        Date<span style="color: red;">*</span>
                                        <input type="date" class="inv_date form-control" readonly required value="{{$invoice->date}}" required id="inv_date" name="date">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        Reference_Number<span style="color: red;">*</span>
                                        <input type="hidden" name="inv_ref_number" value="{{$invoice_table->reference_number}}">
                                        <input type="text" readonly required id="ref_number"
                                               class="inv_number form-control font-weight-bold"
                                               value="{{sprintf('%04d',$invoice_table->reference_number).date('-Y-m')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        Invoice Number<span style="color: red;">*</span>

                                        <input type="number" name="invoiceNumber" required id="inv_number"
                                               class="inv_number form-control" placeholder="Invoice Number"  value="{{$invoice_table->invoiceNumber}}">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="purchaseOrderId" value="{{$invoice_table->purchaseOrder_id}}">
                            <input type="hidden" name="invoiceId" value="{{$invoice_table->id}}">
                            <div class="row">
                                <div class="col-md-12" >
                                    <div class="form-group">
                                        <label for="vendor">Vendor Name</label>
                                        <span style="color: red;">*</span>
                                        <input type="text" name="vendor" id="vendor" readonly value="{{$invoice_table->vendor_name}}"  class="vendor form-control">
                                        <input type="hidden" name="vendorId" value="{{$invoice_table->vendor_id}}" >
                                    </div>
                                </div>
                            </div>


                            <table class="table table-striped" id="myTable">
                                <thead>
                                </thead>
                                <?php $i = 0?>
                                <tbody id="acc_table">


                                @foreach($invoice->invoice_details as $key=>$invoice)
                                <tr>
                                    <td>
                                        <input type="hidden" name="productId[]" value="{{$invoice->id}}"  readonly id="namevalue"
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="name">Product Name:</label><span style="color: red;">*</span>
                                                <input name="product_name[]" value="{{$invoice->product_name}}"  readonly id="namevalue"
                                                       class="namevalue form-control" >
                                            </div>
                                            <div class="col-md-3" >
                                                <div class="form-group">
                                                    <label for="returnReason"> Return Reason: <span class="color">*</span></label>
                                                    <select name="returnReason[]" id="returnReason" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="Damage">Damage</option>
                                                        <option value="Extra">Extra</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3" >
                                                <div class="form-group">
                                                    <label for="returnType"> Return Type: <span class="color">*</span></label>
                                                    <select name="returnType[]" id="returnType"  required class="form-control returnType">
                                                        <option value="">Select One</option>
                                                        <option value="1">Complete</option>
                                                        <option value="2">Partial</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3" >
                                                <div class="form-group">
                                                    <label for="UOM" class="font-weight-bold">UOM</label><span
                                                        style="color: red;">*</span>
                                                    <input type="text" name="uom[]" id="uom" readonly
                                                           class="uom form-control" value="{{$invoice->uom}}" >
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="quantity">Quantity</label><span style="color: red;">*</span>
                                                    <input type="text" name="quantity[]" id="quantity" readonly
                                                           class="quantity hidethis form-control" value="{{$invoice->quantity}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Price">Price</label><span style="color: red;">*</span>
                                                    <input type="text" name="price[]" readonly id="price"
                                                           class="price hidethis form-control" value="{{$invoice->price}}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="Total">Total</label><span style="color: red;">*</span>
                                                    <input type="text" name="total[]" id="total" readonly
                                                           class="total hidethis form-control" value="{{$invoice->total}}">
                                                </div>
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
                                <label for="Total">Grand Total</label><span style="color: red;">*</span>
                                <input type="text" readonly name="grand_total" class="grand_total_amount form-control">
                            </div>
                            <button class="btn btn-success update" id="update">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


        $(document).ready(function () {

            //============= My Work =============================

            var i =0;

            $('#myTable').on('change','.returnType',function (){

                i++
                if (i==1)
                {
                    var quantityVal = $(this).closest('tr').find('.quantity').val()
                    var  temp = quantityVal;
                }
                if($(this).val() == 2)
                {
                    var thisQuantity = $(this).closest('tr').find('.quantity');
                    thisQuantity.prop('readonly',false);
                    var qty = thisQuantity.val()

                    thisQuantity.on('input',function (){
                        if(parseInt($(this).val())>parseInt(qty))
                        {
                            $(this).val(qty)
                        }else if($(this).val()<0)
                        {
                            $(this).val(qty)
                        }

                        $(this).closest('tr').find('.total').val($(this).closest('tr').find('.price').val() * $(this).val())
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
                    })
                }else if($(this).val() == 1) {
                    var thisQuantity1 = $(this).closest('tr').find('.quantity');
                    thisQuantity1.prop('readonly',true);
                    thisQuantity1.val(quantityVal)
                }
            })

            //============== End my Work ========================

            var today = new Date();

            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd = '0'+dd
            }

            if(mm<10) {
                mm = '0'+mm
            }

            // today = yyyy + '/' + mm + '/' + dd;
            today = yyyy + '-' + mm + '-' + dd;

            console.log(today);
            document.getElementById('inv_date').value = today;
            total_sum();
            // Ajax function to fetch data in input fields
        });
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


        function myFunction(selected, selectName) {

            $.ajax({
                url: '/admin/invoice-product/' + selected,
                type: 'get',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    selectName.closest('tr').find('.uom').val(response[0].uom);
                    selectName.closest('tr').find('.quantity').val(response[0].quantity);
                    selectName.closest('tr').find('.price').val(response[0].unit_price);
                    selectName.closest('tr').find('.total').val(response[0].unit_price * response[0].quantity);

                    total_sum();
                }


            });


        }


        function  InvoiceValidate(element){
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
                        $('#update').attr('disabled', true);
                    } else {
                        $('#inv_number').css('background', '#b8ffd7');
                        $('#update').attr('disabled', false);
                    }
                },

            });

        }
        $('#vendor_select').on('change', '.vendor', function () {

            InvoiceValidate();
        });

        $('#myTable').on('click', '.deleteproduct', function () {
            $(this).closest('tr').remove();
            total_sum();
        });
        $('#myTable').on('change', '.namevalue', function () {
// alert('ok');
            var selected=$(this).find(':selected').val();
            // alert(selected)
            // var selected = $(this).val();
            var selectName = $(this);
            console.log(selected)
            myFunction(selected, selectName);
            total_sum();
            // InvoiceValidate();

        });

        $('.add-product').click(function (e) {

            e.preventDefault();
            $('#myTable').append("<tr>\n" +
                "                                    <input type=\"hidden\" name=\"detail_id[]\" value=\"0\">\n" +
                "                                    <td>\n" +
                "                                        <div class=\"col-md-5\">\n" +
                "                                            <label for=\"name\">Product Name:</label><span style=\"color: red;\">*</span>\n" +
                "                                            <select name=\"product_id[]\" id=\"namevalue\"\n" +
                "                                                    class=\"namevalue form-control\" >\n" +
                "                                                <option value=\"\">Select Product</option>\n" +
                "                                                @foreach($products as $product)\n" +
                "                                                    <option  value=\"{{$product->id}}\" class=\"select_product\">{{$product->name}}</option>\n" +
                "                                                @endforeach\n" +
                "\n" +
                "                                                {{--                                <option value=\"other\">Other</option>--}}\n" +
                "                                            </select>\n" +
                "                                        </div>\n" +
                "\n" +
                "                                        <div class=\"col-md-5\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"UOM\" class=\"font-weight-bold\">UOM</label><span\n" +
                "                                                    style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"text\" name=\"uom[]\" id=\"uom\" readonly\n" +
                "                                                       class=\"uom form-control\" value=\"\">\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "\n" +
                "\n" +
                "                                            <div class=\"col-md-2\" style=\"margin-top: 23px;\">\n" +
                "                                            <button type=\"button\" class=\"btn btn-danger  deleteproduct\"><i class=\"voyager-trash\"></i></button>\n" +
                "                                        </div>\n" +
                "\n" +
                "\n" +
                "\n" +
                "                                        <div class=\"col-md-4\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"quantity\">Quantity</label><span style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"text\" name=\"quantity[]\" id=\"quantity\" readonly\n" +
                "                                                       class=\"quantity hidethis form-control\" value=\"\">\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                        <div class=\"col-md-4\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"Price\">Price</label><span style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"text\" name=\"price[]\" readonly id=\"price\"\n" +
                "                                                       class=\"price hidethis form-control\" value=\"\">\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                        <div class=\"col-md-4\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"Total\">Total</label><span style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"text\" name=\"total[]\" id=\"total\" readonly\n" +
                "                                                       class=\"total hidethis form-control\" value=\"\">\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </td>\n" +
                "                                </tr>");


        });
        $('#invoice_form').on('submit',function (){
            $(this).attr('disabled',true);
            // alert('ok');
        });
        $('#update').on('click',function (){
            InvoiceValidate();
            // alert('ok');
        });
        $(this).keyup(function (){
            InvoiceValidate();
        })
    </script>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@section('javascript')

@endsection
