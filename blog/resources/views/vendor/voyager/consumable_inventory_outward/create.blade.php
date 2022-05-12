@extends('voyager::master')
@php  $jobcardss=App\ConsumeInventoryTransactionOpe::first(); @endphp
@can('add',$jobcardss)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }
        output {
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            border: 1px solid;
            border-radius: 4px;}
        label{
            color: black;
        }
        .chk{
            width: 12%;
            font-size: 9px;
        }
        .panel-body .select2-selection {
            border: 1px solid black;
        }
        .form-control {
            color: #76838f;
            background-color: #fff;
            background-image: none;
            border: 1px solid black;
            border-radius: 0px;
        }
        .btn_set{
            margin-top: 25%;
            font-size: 12px;
            padding: 6px 7px 6px 7px;
        }
        #errmsg
        {
            color: red;
            position: absolute;
        }
        input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
        .qtyss{
            color: green;
        }
        .table-striped{
            background: #e7e8e8 !important;
        }
    </style>
@stop



@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Add Raw Inventory Outward
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="panel panel-bordered" >
                    <!-- form start -->
                    <form action="{{url('admin/consume-inventory-outwards')}}" method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                        <div class="panel-body " id="main_body" >
                            <!-- Adding / Editing -->
                            <!-- GET THE DISPLAY OPTIONS -->
                            <legend class="" style="">Raw Inventory Outward &nbsp;&nbsp;&nbsp;
                            <input type="hidden" name="factory_id" value="{{$request->factory_id}}">
                            </legend>


                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Outward No:<span class="color">*</span></label>


                                    <h4>{{sprintf('%04d',$ref_no)}}{{'-'}}{{date('Y-m')}}</h4>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="name">Tracking iD:<span class="color">*</span></label>
                                    <div>
                                        @php
                                            echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG(sprintf("%04d",$ref_no)."-".date('m-y')  , "C128",2,50) . '" alt="barcode"   />';
                                        @endphp
                                    </div>
                                </div>
                            </div>

{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="font-weight-bold" for="name">Vendor Invoice No:<span class="color">*</span></label>--}}
{{--                                    <input type="number" class="form-control" required name="vendor_invoice_no" placeholder="Enter Vendor invoice No">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="name">Date:<span class="color">*</span></label>
                                    <input type="date" id="datepicker" required class="form-control" name="transaction_date">
                                </div>
                            </div>





                            <input type="hidden" name="object_type" value="{{'board'}}">
                            <table class="table table-striped" id="myTable" style="margin-bottom: 0px">
                                <thead>

                                </thead>
                                <tbody id="acc_table">
                                <tr>

                                    <td>
                                        <div id="new_block" class="new_block">


                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Select Item:<span class="color">*</span></label>
                                                    <select class="form-control select2 inv_item" required id="dropdown" name="item_id[]">
                                                        <option value="">Select One</option>
                                                        @foreach($inv_items as $inv_item)
                                                            <option value="{{$inv_item->id}}">{{$inv_item->item_name}} || {{$inv_item->stock_in_hand}} {{$inv_item->uom}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group" >


                                                    <input type="hidden" class="exclude_from_gram" >
                                                    <input type="hidden" class="stock_in_hand" >
                                                    <label class="font-weight-bold" for="name">Category Item:</label>

                                                    <input type="text"  readonly required class="form-control text-capitalize category_item" name="category_item[]" placeholder="">


                                                </div>
                                            </div>





                                            <div class="col-md-3">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold gram_label" for="name">UOM:<span class="color">*</span></label>
                                                    <input type="text" readonly required class="form-control text-capitalize uom" name="uom[]" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-12 weight_div">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold  weight_label" for="name">Quantity: (<span class="unit"></span>)<span class="color">*</span> &nbsp;&nbsp;<span class="stock_alert"></span></label>
                                                    <input type="number" step="any" required class="form-control qty" readonly name="quantity[]" autocomplete="off" placeholder="Enter Weight">
                                                </div>
                                            </div>



                                            <div class="col-md-12">
                                                <hr>
                                            </div>


                                        </div>
                                    </td>


                                </tr>



                                </tbody>
                            </table>

                            <div class="col-md-12">
                                <button type="button" id="btn1" value="1" class="btn btn-success pull-right">Add Further</button>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 12px">
                                <label class="font-weight-bold">Attachment:</label>
                                <input type="file" class="form-control" accept="image/jpeg,image/jpg" required name="vendor_invoice" >
                            </div>
                            {{--                            <div class="col-md-12">--}}
                            {{--                                <div class="form-group">--}}
                            {{--                                    <label class="font-weight-bold">Any Special Requirment:</label>--}}
                            {{--                                    <textarea class="form-control" name="special_requirement" rows="6"></textarea>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}


                            <div class="col-md-12">

                                {{--                                <button type="submit" id="save" class="btn btn-primary save">{{ __('Save') }}</button>--}}
                                <button type="button" id="save" class="btn btn-success " data-toggle="modal"
                                        data-target="#closeform" >
                                    Submit
                                </button>

                                <div class="modal fade" id="closeform" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"></span></button>
                                                <h4 class="modal-title alert alert-warning" style="text-align: center;margin-bottom: 0px">

                                                    <strong style="font-weight: bold">Note!</strong>  Are you sure you want to add this vendor invoice.<br>

                                                </h4>
                                            </div>
                                            <div class="modal-body" style="padding-top:0px; ">
                                                <div class="row">


                                                    <div class="col-md-12" style="margin-bottom: 3px;">
                                                        <div class="form-group" >
                                                            <label style="font-weight: bold">Remarks:</label>
                                                            <textarea class="form-control" name="remarks" rows="5" placeholder="Enter Remarks" required></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Yes I'm Sure!</button>
                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')


    <script>
        $("#datepicker").datepicker({ dateFormat: "yy-mm-dd"}).datepicker("setDate", new Date());
        document.addEventListener("mousewheel", function(event){
            if(document.activeElement.type === "number"){
                document.activeElement.blur();
            }
        });


        $(document).click(function () {
            $('tr').each(function() {
                check_input()
            });
        });
        $(document).on('keyup mousemove',function () {
            $('tr').each(function() {
                check_input()
            });
        });
        $(document).ready(function () {
            $('tr').each(function() {
                check_input()
            });
        });


        function check_input(){
            $('input').each(function() {
                if ($(this).val() != '') {
                    // console.log('all inputs filled');
                    // $('#save').attr('disabled',false);
                }
                else{
                    // console.log('please fill all inputs');
                    // $('#save').attr('disabled',true);
                }
            });
        }

        $("#btn1").click(function(){

            var btn_val=  parseInt($('#btn1').val());
            // alert(btn_val)

            // alert('a')
            $("#acc_table").append("<tr>\n" +
                "\n" +
                "   <td>\n" +
                "                                        <div id=\"new_block\" class=\"new_block\">\n" +
                "\n" +
                "\n" +
                "                                            <div class=\"col-md-12\">\n" +
                "                                                <button type=\"button\" id=\"\" value=\"1\" class=\"btn btn-danger pull-right btnDelete\"><i class=\"voyager-trash\"></i> </button>\n" +
                "                                            </div>\n" +
                "                                            <div class=\"col-md-6\">\n" +
                "                                                <div class=\"form-group\" >\n" +
                "                                                    <label class=\"font-weight-bold\" for=\"name\">Select Item:<span class=\"color\">*</span></label>\n" +
                "                                                    <select class=\"form-control select2 inv_item\" required id=\"dropdown\" name=\"item_id[]\">\n" +
                "                                                        <option value=\"\">Select One</option>\n" +
                "                                                        @foreach($inv_items as $inv_item)\n" +
                "                                                            <option value=\"{{$inv_item->id}}\">{{$inv_item->item_name}} || {{$inv_item->stock_in_hand}} {{$inv_item->uom}}</option>\n" +
                "                                                        @endforeach\n" +
                "                                                    </select>\n" +
                "\n" +
                "                                                </div>\n" +
                "                                            </div>\n" +
                "                                            <div class=\"col-md-3\">\n" +
                "                                                <div class=\"form-group\" >\n" +
                "\n" +
                "\n" +
                "                                                    <input type=\"hidden\" class=\"exclude_from_gram\" >\n" +
                "                                                    <input type=\"hidden\" class=\"stock_in_hand\" >\n" +
                "                                                    <label class=\"font-weight-bold\" for=\"name\">Category Item:</label>\n" +
                "\n" +
                "                                                    <input type=\"text\"  readonly required class=\"form-control text-capitalize category_item\" name=\"category_item[]\" placeholder=\"\">\n" +
                "\n" +
                "\n" +
                "                                                </div>\n" +
                "                                            </div>\n" +
                "\n" +
                "\n" +
                "\n" +
                "\n" +
                "\n" +
                "                                            <div class=\"col-md-3\">\n" +
                "                                                <div class=\"form-group\" >\n" +
                "                                                    <label class=\"font-weight-bold gram_label\" for=\"name\">UOM:<span class=\"color\">*</span></label>\n" +
                "                                                    <input type=\"text\" readonly required class=\"form-control text-capitalize uom\" name=\"uom[]\" placeholder=\"\">\n" +
                "                                                </div>\n" +
                "                                            </div>\n" +
                "                                            <div class=\"col-md-12 weight_div\">\n" +
                "                                                <div class=\"form-group\" >\n" +
                "                                                    <label class=\"font-weight-bold  weight_label\" for=\"name\">Quantity: (<span class=\"unit\"></span>)<span class=\"color\">*</span> &nbsp;&nbsp;<span class=\"stock_alert\"></span></label>\n" +
                "                                                    <input type=\"number\" step=\"any\" required class=\"form-control qty\" name=\"quantity[]\" autocomplete=\"off\" readonly placeholder=\"Enter Weight\">\n" +
                "                                                </div>\n" +
                "                                            </div>\n" +
                "\n" +
                "\n" +
                "\n" +
                "                                            <div class=\"col-md-12\">\n" +
                "                                                <hr>\n" +
                "                                            </div>\n" +
                "\n" +
                "\n" +
                "                                        </div>\n" +
                "                                    </td>\n" +
                "\n" +
                "\n" +
                "                                </tr>");
            var selectorParant = $('select').select2();
            $('.acc_table').append(selectorParant);
        });


        $("#myTable").on('click', '.btnDelete', function () {

            $(this).closest('tr').remove();

        });


        $("#myTable").on('change', '.inv_item', function () {



            var item =$(this).val();

            if(item)
            {
                $(this).closest('tr').find('.qty').prop('readonly',false);

            console.log(item)
            var inv_items = '<?php echo json_encode($inv_items); ?>';

                // console.log(inv_items)

            var obj = JSON.parse(inv_items);

            var  data=  getObjects(obj, 'id', item);
                // console.log(data)
            var category_item=parseInt(data[0].category_item);
            var uom=parseInt(data[0].uom);


            $(this).closest('tr').find('.category_item').val((data[0].category_item));
            $(this).closest('tr').find('.uom').val(data[0].uom);
            $(this).closest('tr').find('.unit').text(data[0].uom);
            $(this).closest('tr').find('.stock_in_hand').val(data[0].stock_in_hand);

            check_stock();

            var stock_in_hand=parseInt(data[0].stock_in_hand);



            var item_qty=$(this).closest('tr').find('.qty').val();
            console.log(item_qty);

            if (item_qty > stock_in_hand)
            {
                $(this).closest('tr').find('.stock_alert').text('entered quantity is more than stock in hand').css({ "color": "red","font-size":"9px","font-weight":"bold"});;
                toastr.error('entered quantity is more than stock in hand');
            }else
            {
                $(this).closest('tr').find('.stock_alert').text('');
            }
            }

        });


        $("#myTable").on('keyup', '.qty', function () {


            var item =$(this).closest('tr').find('.inv_item').val();

            var inv_items = '<?php echo json_encode($inv_items); ?>';


            var obj = JSON.parse(inv_items);

            var  data=  getObjects(obj, 'id', item);
            // console.log(data)
            var stock_in_hand=parseInt(data[0].stock_in_hand);



            var item_qty=$(this).val();
            console.log(item_qty);

            if (item_qty > stock_in_hand)
            {
                $(this).closest('tr').find('.stock_alert').text('entered quantity is more than stock in hand').css({ "color": "red","font-size":"9px","font-weight":"bold"});;
                toastr.error('entered quantity is more than stock in hand');
            }else
            {
                $(this).closest('tr').find('.stock_alert').text('');
            }

            check_stock();
        });

        function check_stock() {
            var temp=0;
            $('#myTable tr').each(function () {

                var stock=parseInt($(this).find('.stock_in_hand').val());
                var qty=parseInt($(this).find('.qty').val());
                console.log(stock,qty)
                if (qty > stock )
                {
                    temp=1;
                }

            });
            // alert(temp)
            if (temp == 1)
            {
                $('#save').prop('disabled',true);
            }else {
                $('#save').prop('disabled',false);
            }
        }




        function getObjects(obj, key, val) {
            var objects = [];
            for (var i in obj) {
                if (!obj.hasOwnProperty(i)) continue;
                if (typeof obj[i] == 'object') {
                    objects = objects.concat(getObjects(obj[i], key, val));
                } else if (i == key && obj[key] == val) {
                    objects.push(obj);
                }
            }
            return objects;
        }

        $(document).on('change',function () {


            $('tr').each(function (index, element ){


                var val=$(this).find('.inv_item').val();
                // alert('a')
                $('tr').each(function (index1, element1){
                    // alert('b')
                    var val1=$(this).find('.inv_item').val();

                    if(val == val1  && val!="" && val1!="" && index != index1)
                    {

                        $(this).find('.inv_item').val("").change();
                        // $(this).closest('tr').find('.waste').val("").css({'border':'1px solid','color':''});

                    }

                });

            });


        });
        jQuery('form').submit(function(){
            $(this).find(':submit').attr( 'disabled','disabled' );
        });
    </script>

@stop
