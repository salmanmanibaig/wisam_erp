
@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('add',$customerset)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }
        .voyager .table.table-striped>tbody>tr:nth-of-type(odd) {
             background-color: #f1f1f1;
         }
        /*Black boder to input feilds*/

        .form-control {
            color: #76838f;
            background-color: #fff;
            background-image: none;
            border: 1px solid black;
        }
        .panel-body .select2-selection {
            border: 1px solid #0c0a0a;
        }
        /*Disaable Wheel*/
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@stop



@section('page_header')

    <div class="headingClass">
        <p class="page-title headingRequisition">
            <i class=""></i>
        Add New Requisition
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
                    <form action="{{url('admin/requisitions')}}" method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                        <div class="panel-body">
                                {{--<div class="alert alert-danger">--}}
                                    {{--<ul>--}}
                                            {{--<li></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                        <!-- Adding / Editing -->
                            <!-- GET THE DISPLAY OPTIONS -->
                                    <div class="legendClass">
                                        <legend class="legendRequisition" style="">Requisition Info</legend>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 noReference"  style="margin-bottom: 0px;">
                                            <div class="noRequisition">
                                                <label for="number" class="font-weight-bold">Requisition No: </label>
                                                <h4>{{sprintf('%04d',$refNumber+1).date('-Y-m')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <div class="radio" >
                                                    <input type="radio" class="radioRequisition" name="radioRequisition" id="radioRequisition" style="margin-left: 0;" ><label for="radioRequisition" class="font-weight-bold">Requisition<span class="color">*</span></label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" class="radioQuotation" name="radioQuotation" id="radioQuotation" style="margin-left: 0;"><label for="radioQuotation" class="font-weight-bold">Quotation <span class="color">*</span></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" style="margin-bottom: 0px;">
                                            <div class="form-group">
                                                <label for="date">Date: <span class="color">*</span></label>
                                                <input type="date" name="date" readonly id="myDate" class="form-control myDate">
                                            </div>
                                        </div>
                                        <input type="hidden" name="factory" value="{{$factory}}">
                                    </div>
                                    <div class="row">
                                        <div class="table table-responsive">
                                            <table class="table table-striped " id="myTable">
                                                <thead>
                                                <tr>
                                                </tr>
                                                </thead>
                                                <tbody id="accTable">
                                                <tr>
                                                    <td>
                                                            <div class="col-md-12" style="margin-bottom: 30px;">
                                                            </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="item" class="font-weight-bold"> SELECT ITEM: <span class="color">*</span></label>
                                                                <select name="item_id[]" required id="" class="form-control select2 item_id" >
                                                                    <option value="">Select One</option>
                                                                    @foreach($items as $item)
                                                                        <option value="{{$item->id}}">{{$item->item_name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="category" class="font-weight-bold"> ITEM CATEGORY: <span class="color">*</span></label>
                                                                <input name="category[]" id="" class="form-control category" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="uom" class="font-weight-bold"> ITEM UOM: <span class="color">*</span></label>
                                                                <select name="uom[]" id="" class="form-control uom">
                                                                    <option value="" readonly="">Select Uom</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="quantity"  class="font-weight-bold"> ITEM QUANTITY: <span class="color">*</span></label>
                                                                <input type="number" required name="quantity[]" id="" class="form-control quantity">
                                                            </div>
                                                            <div class="col-md-12" style="margin-top: 10px;">

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-md-12 btnAddDiv" id="btnAddDiv">
                                                <button class="btn btn-success addItem pull-right"> ADD ITEM</button>
                                            </div>
                                        </div>
                                    </div>





                                    {{--<div class="row">--}}

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="button" class="btn btn-primary save" data-toggle="modal" data-target="#exampleModal">{{ __('voyager::generic.save') }}</button>
                            <label for="total" class="font-weight-bold" style=" float: right; margin-top: -20px;">Sub Total <input type="text" readonly value="" class="form-control txtTotal" style="width: 100%; float: right"></label>

                        </div>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-primary text-white">
                                    <h3 class="modal-title" id="exampleModalLabel">Add Remarks</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <textarea name="remarks" id="" required cols="15" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addNewUom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="" id="formUom" class="formUom">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary" style="color: white;">
                        <h2 class="modal-title" id="exampleModalLabel">Add New UOM</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">

                            <table class="table table-striped" id="myTable">
                                <thead>
                                <th>
                                    UNIT NAME
                                </th>
                                <th>
                                    UNIT QUANTITY
                                </th>
                                <th style="width: 150px;">
                                    BASE UNIT
                                </th>
                                <th class="action text-right">
                                    ACTION
                                </th>
                                </thead>
                                <tbody id="accModalTable">
                                <tr>
                                    <div class="row">
                                        <input type="hidden" name="itemId" value="" class="itemId" id="itemId">
                                        <td>
                                            <input type="text" required name="unitName[]" id="unitName" class="unitName form-control" >
                                        </td>
                                        <td>
                                            <input type="text" required  name="unitQuantity[]" id="unitQuantity" class=" unitQuantity form-control" >
                                        </td>
                                        <td>
                                            <select type="text" required  name="baseUnit[]"  id="baseUnit" class="form-control base_unit1" >
                                                    <option value="">Select One</option>
                                                    <option value="kg">KG's</option>
                                                    <option value="liter">LITER</option>
                                                    <option value="pack">PACK</option>
                                                    <option value="bundle">BUNDLE</option>
                                                    <option value="pcs">PCS</option>
                                                    {{--<option value="audi">Audi</option>--}}
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" id="addUomField" value="1" class="btn btn-success addUomField action pull-right"> <i class="fas fa-plus"></i> Add UOM</button>
                                        </td>
                                    </div>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: left;">Close</button>
                        <button type="submit" id="saveUom"  class="btn btn-primary saveUom">Save UOM</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>


{{--    // Jquery--}}

    <script>
        $(document).ready(function (){




            $('#accModalTable').on('click','#addUomField',function (e){
                e.preventDefault();
                console.log($('#baseUnit').val())

                var basUnite11 = $('#baseUnit').val()

                $('#accModalTable').append("<tr>\n" +
                    "                                    <div class=\"row\">\n" +
                    "                                        <td>\n" +
                    "                                            <input type=\"text\" required name=\"unitName[]\"  class=\"unitName form-control\" >\n" +
                    "                                        </td>\n" +
                    "                                        <td>\n" +
                    "                                            <input type=\"text\" required name=\"unitQuantity[]\" id=\"unitQuantity\" class=\" unitQuantity form-control\" >\n" +
                    "                                        </td>\n" +
                    "                                        <td>\n" +
                    '                                            <input type=\"text\" readonly name=\"baseUnit\" class=\"form-control baseUnit1\" value='+basUnite11+'  />' +
                    "                                        </td>\n" +
                    "                                        <td>\n" +
                    "                                            <button type=\"button\" id=\"deleteModalUom\" value=\"1\" class=\"btn btn-danger deleteModalUom action pull-right\"> <i class=\"voyager-trash\"></i></button>\n" +
                    "                                        </td>\n" +
                    "                                    </div>\n" +
                    "                                </tr>")





            })

            $('#accModalTable').on('change','#baseUnit',function (){
                var baseUnit = $(this).val()
                $('.baseUnit1').val(baseUnit)
            })


            $('#accModalTable').on('click','#deleteModalUom',function (e){
                $(this).closest('tr').remove();
            })


            // Modal Open
            $('#accTable').on('change','.uom',function (){

                var id = $(this).closest('tr').find('.item_id').val();
                // alert(id)
                var thisTr = $(this)

                if ($(this).val() == 00)
                {
                    // $('form#formUom input[type="text"], select').val('');

                    $('#addNewUom').modal("show");

                    $('#itemId').val(id);
                }
            })

            // Save new Uom from modal
            $('#saveUom').on('click', function (e) {
                e.preventDefault()
                if(!$('#accModalTable').find('.unitName').val() || !$('#accModalTable').find('.unitQuantity').val() || !$('#baseUnit').val() )
                {
                    alert("please fill all feilds")
                }
                else
                {
                    var id = $('#itemId').val()
                    $.ajax({

                        url: '/admin/store-newUom/'+id,
                        type: 'POST',
                        processData: false,
                        ContentType: false,
                        dataType: 'json',
                        data: $('#formUom').serialize(),
                        success: function (dt) {
                            if (dt)
                            {
                                $('#accTable tr').filter(function(){
                                    var itemId = $(this).find('.item_id').val()
                                    var thisRow = $(this)
                                    if (itemId == id)
                                    {
                                        console.log(thisRow.index())
                                        $('#addNewUom').modal("hide");
                                        thisRow.find('.uom option').remove();
                                        // $('form.formUom input[type="text"], select').val('');
                                        $.each(dt,function (j,k){
                                            thisRow.find('.uom').append("<option value="+k.id+">"+k.unitName+'-'+ parseInt(k.unitQuantity) + "</option>");
                                            // console.log(k)
                                        })
                                        thisRow.closest('tr').find('.uom').append("<option value='00'>Add New UOM</option>");
                                        toastr.success("Uom Added");
                                    }
                                });





                                // $.each(response.r1.item_uom,function (j,k){
                                // })
                            }
                        }

                    })
                }
            })

            // $('#accTable').on('change','.uom',function (){
            //     // $(this).closest('tr').find('.uom select').text()
            //     var valueThis = $(this).find('option select').val();
            //     // console.log(valueThis)
            //     // alert(  );
            // })

            //
            $('#accTable').on('input','.price',function (){

                $(this).each(function (){
                   var totalQuantity =  parseInt($(this).closest('tr').find('.quantity').val())
                    var price = parseInt($(this).val());
                    // console.log(parseInt($(this).val()) * totalQuantity)

                    $(this).closest('tr').find('.subTotal').val(totalQuantity * price)
                })

            })

            var d = new Date();
            var strDate =  d.getFullYear() + "-" + (d.getMonth()+1)  + (d.getDate()<10 ? "-0" : "-" ) +  d.getDate();
            // console.log(strDate)
            $('.myDate').val(strDate);

            $('.radioRequisition').prop('checked',true)
            $('.radioQuotation').prop('checked',false)

            //==================================================== Convert Form to Requisition View==================================
            $('.radioRequisition').on('change',function (){

                //Change Heading

                $('.headingClass').find('.headingRequisition').remove();
                $('.headingClass').find('.headingQuotation').remove();
                $('.headingClass').append("<p class=\"page-title headingRequisition\">\n" +
                    "            <i class=\"\"></i>\n" +
                    "        Add New Requisition\n" +
                    "        </p>")



                // Change Legend
                $('.legendClass').find('.legendRequisition').remove()
                $('.legendClass').find('.legendQuotation').remove()
                $('.legendClass').append("<legend class=\"legendRequisition\" style=\"\">Requisition Info</legend>")

                // Change Reference Number
                $('.noReference').find('.noRequisition').remove()
                $('.noReference').find('.noQuotation').remove()
                $('.noReference').append("<div class=\"noQuotation\">\n" +
                    "                                                <label for=\"number\" class=\"font-weight-bold\">Requisition No: </label>\n" +
                    "                                                <h4>{{sprintf('%04d',$refNumber+1).date('-Y-m')}}</h4>\n" +
                    "                                            </div>")


                $('.radioQuotation').prop('checked',false);
                $('#accTable').find('tr').remove();
                $('#btnAddDiv').find('.btnAddQuotation').remove()
                $('#btnAddDiv').find('.btnAddRequisition').remove()
                $('.addQuotation').remove();
                $('#btnAddDiv').append(" <button class=\"btn btn-success btnAddRequisition pull-right\"> ADD ITEM</button>")
                $('#accTable').append("        <tr>\n" +
                    "                                                    <td>\n" +
                    "                                                            <div class=\"col-md-12\" style=\"margin-bottom: 30px;\">\n" +
                    "                                                            </div>\n" +
                    "                                                        <div class=\"col-md-5\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"item\" class=\"font-weight-bold\"> SELECT ITEM: <span class=\"color\">*</span></label>\n" +
                    "                                                                <select name=\"item_id[]\" required id=\"\" class=\"form-control select2 item_id\">\n" +
                    "                                                                    <option value=\"\">Select One</option>\n" +
                    "                                                                    @foreach($items as $item)\n" +
                    "                                                                        <option value=\"{{$item->id}}\">{{$item->item_name}}</option>\n" +
                    "                                                                    @endforeach\n" +
                    "                                                                </select>\n" +
                    "                                                            </div>\n" +
                    "\n" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-3\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"category\" class=\"font-weight-bold\"> ITEM CATEGORY: <span class=\"color\">*</span></label>\n" +
                    "                                                                <input name=\"category[]\" id=\"\" class=\"form-control category\" readonly>\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-2\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"uom\" class=\"font-weight-bold\"> ITEM UOM: <span class=\"color\">*</span></label>\n" +
                    "                                                                <select name=\"uom[]\" id=\"\" class=\"form-control uom\">\n" +
                    "                                                                    <option value=\"\" readonly=\"\">Select Uom</option>\n" +
                    "                                                                </select>\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-2\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"quantity\"  class=\"font-weight-bold\"> ITEM QUANTITY: <span class=\"color\">*</span></label>\n" +
                    "                                                                <input type=\"number\" required name=\"quantity[]\" id=\"\" class=\"form-control quantity\">\n" +
                    "                                                            </div>\n" +
                    "                                                            <div class=\"col-md-12\" style=\"margin-top: 10px;\">\n" +
                    "\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                    </td>\n" +
                    "                                                </tr>")

                $('.btnAddRequisition').click(function (e){
                    e.preventDefault();

                    $('#accTable').append("        <tr>\n" +
                        "                                                    <td>\n" +
                        "                                                        <div class=\"col-md-12\">\n" +
                        "                                                            <button class=\"btn btn-danger pull-right deleteItem\"><i class=\"voyager-trash\"></i></button>\n" +
                        "                                                        </div>\n" +
                        "                                                        <div class=\"col-md-5\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"item\" class=\"font-weight-bold\"> SELECT ITEM: <span class=\"color\">*</span></label>\n" +
                        "                                                                <select name=\"item_id[]\" required id=\"\" class=\"form-control  item_id\">\n" +
                        "                                                                    <option value=\"\">Select One</option>\n" +
                        "                                                                    @foreach($items as $item)\n" +
                        "                                                                        <option value=\"{{$item->id}}\">{{$item->item_name}}</option>\n" +
                        "                                                                    @endforeach\n" +
                        "                                                                </select>\n" +
                        "                                                            </div>\n" +
                        "\n" +
                        "                                                        </div>\n" +
                        "                                                        <div class=\"col-md-3\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"category\" class=\"font-weight-bold\"> ITEM CATEGORY: <span class=\"color\">*</span></label>\n" +
                        "                                                                <input name=\"category[]\" id=\"\" class=\"form-control category\" readonly>\n" +
                        "                                                            </div>\n" +
                        "                                                        </div>\n" +
                        "                                                        <div class=\"col-md-2\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"uom\" class=\"font-weight-bold\"> ITEM UOM: <span class=\"color\">*</span></label>\n" +
                        "                                                                <select name=\"uom[]\" id=\"\" class=\"form-control uom\">\n" +
                        "                                                                    <option value=\"\" readonly=\"\">Select Uom</option>\n" +
                        "                                                                </select>\n" +
                        "                                                            </div>\n" +
                        "                                                        </div>\n" +
                        "                                                        <div class=\"col-md-2\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"quantity\"  class=\"font-weight-bold\"> ITEM QUANTITY: <span class=\"color\">*</span></label>\n" +
                        "                                                                <input type=\"number\" required name=\"quantity[]\" id=\"\" class=\"form-control quantity\">\n" +
                        "                                                            </div>\n" +
                        "                                                            <div class=\"col-md-12\" style=\"margin-top: 10px;\">\n" +
                        "\n" +
                        "                                                            </div>\n" +
                        "                                                        </div>\n" +
                        "                                                    </td>\n" +
                        "                                                </tr>")
                })
            })

            //========================================== change form view to Add quotation =====================================================
            $('.radioQuotation').on('change',function (){

                //Change Heading
                $('.headingClass').find('.headingRequisition').remove();
                $('.headingClass').find('.headingQuotation').remove();
                $('.headingClass').append("<p class=\"page-title headingQuotation\">\n" +
                    "            <i class=\"\"></i>\n" +
                    "        Add New Quotation\n" +
                    "        </p>")

                // Change Legend
                $('.legendClass').find('.legendRequisition').remove()
                $('.legendClass').find('.legendQuotation').remove()
                $('.legendClass').append("<legend class=\"legendQuotation\" style=\"\">Quotation Info</legend>")

                // Change Reference Number
                $('.noReference').find('.noRequisition').remove()
                $('.noReference').find('.noQuotation').remove()
                $('.noReference').append("<div class=\"noQuotation\">\n" +
                    "                                                <label for=\"number\" class=\"font-weight-bold\">Quotation No: </label>\n" +
                    "                                                <h4>{{sprintf('%04d',$quotationNo+1).date('-Y-m')}}</h4>\n" +
                    "                                            </div>")

                // Radio value uncheck
                $('.radioRequisition').prop('checked',false);

                //Clear all row in table
                $('#accTable').find('tr').remove();
                $('#accTable').append("<input type='hidden' class='valueQuotation' value='1' name='valueQuotation'>");


                // Change Append Row Button
                $('.addItem').remove();
                $('#btnAddDiv').find('.btnAddRequisition').remove()
                $('#btnAddDiv').find('.btnAddQuotation').remove()
                $('#btnAddDiv').append(" <button class=\"btn btn-success btnAddQuotation pull-right\"> ADD ITEM</button>")
                $('#accTable').append("<tr>\n" +
                    "                                                    <td>\n" +
                    "                                                            <div class=\"col-md-12\" style=\"margin-bottom: 30px;\">\n" +
                    "                                                            </div>\n" +
                    "<div class=\"row\" style=\"margin-right: -5px;\n" +
                    "    margin-left: -5px;\">" +
                    "                                                        <div class=\"col-md-4\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"item\" class=\"font-weight-bold\"> SELECT ITEM: <span class=\"color\">*</span></label>\n" +
                    "                                                                <select name=\"item_id[]\" required id=\"\" class=\"form-control select2 item_id\">\n" +
                    "                                                                    <option value=\"\">Select One</option>\n" +
                    "                                                                    @foreach($items as $item)\n"+
                    "                                                                        <option value=\"{{$item->id}}\">{{$item->item_name}}</option>\n" +
                    "                                                                    @endforeach\n" +
                    "                                                                </select>\n" +
                    "                                                            </div>\n" +
                    "\n" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-4\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"category\" class=\"font-weight-bold\"> ITEM CATEGORY: <span class=\"color\">*</span></label>\n" +
                    "                                                                <input name=\"category[]\" id=\"\" class=\"form-control category\" readonly>\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-4\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"uom\" class=\"font-weight-bold\"> ITEM UOM: <span class=\"color\">*</span></label>\n" +
                    "                                                                <select name=\"uom[]\" id=\"\" class=\"form-control uom\">\n" +
                    "                                                                    <option value=\"\" readonly=\"\">Select Uom</option>\n" +
                    "                                                                </select>\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-5\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"quantity\"  class=\"font-weight-bold\"> ITEM QUANTITY: <span class=\"color\">*</span></label>\n" +
                    "                                                                <input type=\"number\" required name=\"quantity[]\" id=\"\" class=\"form-control quantity\">\n" +
                    "                                                            </div>\n" +
                    "</div>" +
                    " <div class=\"col-md-5\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"price\"  class=\"font-weight-bold\"> ITEM PRICE: <span class=\"color\">*</span></label>\n" +
                    "                                                                <input type=\"number\" required name=\"price[]\" id=\"price\" class=\"form-control price\">\n" +
                    "                                                            </div>\n" +
                    "</div>" +
                    "                                                        <div class=\"col-md-2\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"price\"  class=\"font-weight-bold\">SUB TOTAL: <span class=\"color\">*</span></label>\n" +
                    "                                                                <input type=\"number\" required readonly name=\"subTotal[]\" id=\"subTotal\" class=\"form-control subTotal\">\n" +
                    "                                                            </div>\n" +
                    "</div>" +
                    "</div>" +
                    "                                                            <div class=\"col-md-12\" style=\"margin-top: 10px;\">\n" +
                    "\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                    </td>\n" +
                    "                                                </tr>")


                $('.btnAddQuotation').click(function (e){
                    e.preventDefault();
                    $('#accTable').append("<tr>\n" +
                        "                                                    <td>\n" +
                        "                                                        <div class=\"col-md-12\">\n" +
                        "                                                            <button class=\"btn btn-danger pull-right deleteItem\"><i class=\"voyager-trash\"></i></button>\n" +
                        "                                                        </div>\n" +
                        "<div class=\"row\" style=\"margin-right: -5px;\n" +
                        "    margin-left: -5px;\">" +
                        "                                                        <div class=\"col-md-4\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"item\" class=\"font-weight-bold\"> SELECT ITEM: <span class=\"color\">*</span></label>\n" +
                        "                                                                <select name=\"item_id[]\" required id=\"\" class=\"form-control select2 item_id\">\n" +
                        "                                                                    <option value=\"\">Select One</option>\n" +
                        "                                                                    @foreach($items as $item)\n" +
                        "                                                                        <option value=\"{{$item->id}}\">{{$item->item_name}}</option>\n" +
                        "                                                                    @endforeach\n" +
                        "                                                                </select>\n" +
                        "                                                            </div>\n" +
                        "\n" +
                        "                                                        </div>\n" +
                        "                                                        <div class=\"col-md-4\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"category\" class=\"font-weight-bold\"> ITEM CATEGORY: <span class=\"color\">*</span></label>\n" +
                        "                                                                <input name=\"category[]\" id=\"\" class=\"form-control category\" readonly>\n" +
                        "                                                            </div>\n" +
                        "                                                        </div>\n" +
                        "                                                        <div class=\"col-md-4\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"uom\" class=\"font-weight-bold\"> ITEM UOM: <span class=\"color\">*</span></label>\n" +
                        "                                                                <select name=\"uom[]\" id=\"\" class=\"form-control uom\">\n" +
                        "                                                                    <option value=\"\" readonly=\"\">Select Uom</option>\n" +
                        "                                                                </select>\n" +
                        "                                                            </div>\n" +
                        "                                                        </div>\n" +
                        "                                                        <div class=\"col-md-5\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"quantity\"  class=\"font-weight-bold\"> ITEM QUANTITY: <span class=\"color\">*</span></label>\n" +
                        "                                                                <input type=\"number\" required name=\"quantity[]\" id=\"\" class=\"form-control quantity\">\n" +
                        "                                                            </div>\n" +
                        "</div>" +
                        "                                                        <div class=\"col-md-5\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"price\"  class=\"font-weight-bold\"> ITEM PRICE: <span class=\"color\">*</span></label>\n" +
                        "                                                                <input type=\"number\" required name=\"price[]\" id=\"price\" class=\"form-control price\">\n" +
                        "                                                            </div>\n" +
                        "</div>" +
                        "                                                        <div class=\"col-md-2\">\n" +
                        "                                                            <div class=\"form-group\">\n" +
                        "                                                                <label for=\"price\"  class=\"font-weight-bold\">SUB TOTAL: <span class=\"color\">*</span></label>\n" +
                        "                                                                <input type=\"number\" required readonly name=\"subTotal[]\" id=\"subTotal\" class=\"form-control subTotal\">\n" +
                        "                                                            </div>\n" +
                        "</div>" +
                        "</div>" +
                        "                                                        </div>\n" +
                        "                                                    </td>\n" +
                        "                                                </tr>")
                })
            })

            $('#accTable').on('wheel','.quantity',function (){
                $(this).blur();
            })
            $('#accTable').on('wheel','.price',function (){
                $(this).blur();
            })

            $('#accTable').on('input','.price',function (){
                // console.log($(this).val();

                    var temp=0;
                    $('.price').each(function (){

                        var quantityItem = $(this).closest('tr').find('.quantity').val();
                        var total= $(this).val();
                        var total_price = quantityItem *total
                        if(  $.isNumeric(total_price))
                        {
                            temp=temp+ parseInt(total_price);
                        }
                    })
                    var temp1 = temp;
                $('.txtTotal').val(temp1)


            })
            $('#accTable').on('input','.quantity',function (){
                // console.log($(this).val();

                var temp=0;
                $('.price').each(function (){

                    var quantityItem = $(this).closest('tr').find('.quantity').val();
                    var total= $(this).val();
                    var total_price = quantityItem *total
                    if(  $.isNumeric(total_price))
                    {
                        temp=temp+ parseInt(total_price);
                    }
                })
                var temp1 = temp;
                $('.txtTotal').val(temp1)




            })


            function showTotal(temp1){
                    // console.log(temp1)
            }






            function eachtr(selected_index,select_value)
            {
                var check=0;
                $("tr").each(function ()
                {

                    var index = $(this).index();

                    var contact_id = $(this).find('.item_id').val()

                    // console.log(index,selected_index,select_value,contact_id)

                    if(index!=selected_index)
                    {

                        if(select_value == contact_id)
                        {
                            alert('Already Selected')
                            check=1
                        }
                    }
                })

                return check;


            }

            $('#accTable').on('change','.item_id', function (e) {

                var thisAttribute = $(this)
                var selectCurrent = $(this).val();


                var trIndex = $(this).closest('tr').index()

                var status=  eachtr(trIndex,selectCurrent)
                if (status == 1)
                {
                    $(this).children("option:selected").remove()
                    // $(this).closest('tr').prepend('<p id="presentState">Hey</p></br>');
                    // $(this).children("option").append('<option selected>hey</option>')
                    // $(this).find('.select-contact').append('<option>hey</option>')
                }
                // console.log(status)



            })


            $('#accTable').on('change','.item_id',function (){
                var id = $(this).val();
                var select_this = $(this)




                $.ajax({
                    url: '/admin/requisitions-item/'+id,
                    type: 'get',
                    dataType: 'json',
                    success:function (response){
                        // if (response.error)
                        // {
                        //     console.log('this is error')
                        //     select_this.closest('tr').find('.uom option').remove();
                        //     select_this.closest('tr').find('.uom').append("<option>No details</option>");
                        //     select_this.closest('tr').find('.category').val(response.error.category_item);
                        // }
                        // else

                        // console.log(response.error + 'This is error')
                        // console.log(response.r1 + 'This is r1')
                        if (response.r1)
                        {
                            select_this.closest('tr').find('.uom option').remove();
                            $.each(response.r1.item_uom,function (j,k){
                                select_this.closest('tr').find('.uom').append("<option value="+k.id+">"+k.unitName+'-'+ parseInt(k.unitQuantity) + "</option>");
                            })
                            select_this.closest('tr').find('.uom').append("<option value='00'>Add New UOM</option>");
                            select_this.closest('tr').find('.category').val(response.r1.category_item);
                        }
                        else
                        {
                            console.log(response.error.item_uom[0])
                            select_this.closest('tr').find('.uom option').remove();
                            select_this.closest('tr').find('.uom').append('<option value='+response.error.item_uom[0].id+'>'+response.error.uom+'-'+1+'</option>');
                            // select_this.closest('tr').find('.uom').append("<option value='00'>Add New UOM</option>");
                            // console.log(response.error.category_item)
                            select_this.closest('tr').find('.category').val(response.error.category_item);
                        }

                        var valueThis = $('.uom').val();

                        // $('#accTable').on('input', '.quantity', function () {
                        //
                        //
                        //
                        //     // var totalQuantity = parseInt($(this).val()) * parseInt(response.r1.item_uom[0].unitQuantity)
                        //
                        //     $(this).closest('tr').find('.totalQuantity').val(totalQuantity)
                        //
                        //     $(this).each(function () {
                        //         var price = parseInt($(this).closest('tr').find('.price').val());
                        //         $(this).closest('tr').find('.subTotal').val(totalQuantity * price)
                        //     })
                        //
                        //
                        // })



                    }
                })




                // $('#accTable').on('change','.uom',function (){
                //     // $(this).closest('tr').find('.uom select').text()
                //
                //     // alert(  );
                // })
            })

            $('#accTable').on('click','.deleteItem',function (e){
                e.preventDefault()
                $(this).closest('tr').remove();
            })

            $('.addItem').on('click',function (e){
                e.preventDefault();

                $('#accTable').append("<tr>\n" +
                    "                                                    <td >\n" +
                    "                                                        <div class=\"col-md-12\">\n" +
                    "                                                            <button class=\"btn btn-danger pull-right deleteItem\"><i class=\"voyager-trash\"></i></button>\n" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-5\">\n" +
                    "<div class=\"form-group\">" +
                    "                                                            <label for=\"item\" class=\"font-weight-bold\"> SELECT ITEM: <span class=\"color\">*</span></label>\n" +
                    " <select name=\"item_id[]\" required id=\"\" class=\"form-control item_id select2\">\n" +
                    "                                                                <option value=\"\">Select One</option>\n" +
                    "                                                                @foreach($items as $item)\n" +
                    "                                                                <option value=\"{{$item->id}}\">{{$item->item_name}}</option>\n" +
                    "                                                                @endforeach\n" +
                    "                                                            </select>" +
                    "</div>" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-3\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"category\" class=\"font-weight-bold\"> ITEM CATEGORY: <span class=\"color\">*</span></label>\n" +
                    "                                                                <input name=\"category[]\" id=\"\" class=\"form-control category\" readonly>\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-2\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"uom\" class=\"font-weight-bold\"> ITEM UOM: <span class=\"color\">*</span></label>\n" +
                    "                                                                <select name=\"uom[]\" id=\"\" class=\"form-control uom\">\n" +
                    "<option>Select Uom</option>" +
                    "</select>" +
                    "\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                        <div class=\"col-md-2\">\n" +
                    "                                                            <div class=\"form-group\">\n" +
                    "                                                                <label for=\"quantity\" class=\"font-weight-bold\"> ITEM QUANTITY: <span class=\"color\">*</span></label>\n" +
                    "                                                                <input type=\"number\" required name=\"quantity[]\" id=\"\" class=\"form-control quantity\">\n" +
                    "                                                            </div>\n" +
                    "                                                        </div>\n" +
                    "                                                    </td>\n" +
                    "                                                </tr>");

            })
        })
    </script>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')

@stop
