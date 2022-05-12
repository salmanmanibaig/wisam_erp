@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('add',$customerset)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color {
            color: red;
        }

    </style>
@stop



@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Add Local Purchase Order
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form action="{{url('admin/supply-local-purchase-orders')}}" method="POST" enctype="multipart/form-data">
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
                            <legend class="" style="">Local Purchase Order Info</legend>
                            <input type="hidden" name="factory" value="{{$factory}}">
                            {{--<div class="row">--}}
                            <div class="col-md-9">
                                <label for="referenceNo" class="font-weight-bold"> Reference No: <span
                                        class="color">*</span></label>
                                <h4>{{sprintf('%04d',$refNumber+1).date('-Y-m')}}</h4>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date" class="font-weight-bold">Date: <span class="color">*</span></label>
                                    <input type="date" name="date" readonly id="myDate" class="form-control myDate">
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-bottom: 20px;">
                                <label for="description"> Description: <span class="color">*</span></label>
                                <input type="text" name="description" id="description" class="form-control">
                            </div>

                            <div class="table table-responsive">
                                <table class="table table-striped " id="myTable">
                                    <thead>
                                    </thead>
                                    <tbody id="accTable">
                                    <tr>
                                        <td>
                                            <div class="col-md-12" style="margin-bottom: -20px;">
                                                    <div class="form-group action pull-right">
                                                        <button class="btn btn-success addItem">Add Item</button>
                                                    </div>
                                            </div>
                                            <div class="row" style="margin-right: -5px; margin-left: -5px;">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="item" class="font-weight-bold"> SELECT ITEM: <span
                                                                class=\"color\">*</span>
                                                        </label>
                                                        <select name="item_id[]" required id=""
                                                                class="form-control select2 item_id">
                                                            <option value="">Select One</option>
                                                            @foreach($items as $item)
                                                                <option
                                                                    value="{{$item->id}}">{{$item->item_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="category" class="font-weight-bold"> ITEM CATEGORY:
                                                            <span class="color">*</span></label>
                                                        <input name="category[]" id="" class="form-control category"
                                                               readonly></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group"><label for="uom" class="font-weight-bold">
                                                            ITEM UOM: <span class="color">*</span></label>
                                                        <select name="uom[]" id="" class="form-control uom">
                                                            <option value="" readonly="">Select Uom</option>
                                                        </select></div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="quantity" class="font-weight-bold"> ITEM QUANTITY:
                                                            <span class="color">*</span></label>
                                                        <input type="number" required name="quantity[]" id=""
                                                               class="form-control quantity">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="price" class="font-weight-bold"> ITEM PRICE: <span
                                                                class="color">*</span></label>
                                                        <input type="number" required name="price[]" id="price"
                                                               class="form-control price">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="price" class="font-weight-bold">SUB TOTAL: <span
                                                                class="color">*</span></label>
                                                        <input type="number" required readonly name="subTotal[]"
                                                               id="subTotal" class="form-control subTotal">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-12" style="margin-top: 10px;">

                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>




                            </table>
                            </div>
                        </div>




                <div class="panel-footer">
                        <button type="button" class="btn btn-primary save" data-toggle="modal" data-target="#exampleModal">{{ __('voyager::generic.save') }}</button>
                        <label for="total" class="font-weight-bold" style=" float: right; margin-top: -20px;">Sub Total <input type="text" readonly value="" class="form-control txtTotal" style="width: 100%; float: right"></label>
                </div>
                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background: #0b51c5; color: white">
                                        <h2 class="modal-title" id="exampleModalLabel">Remarks</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea name="remarks" id="remarks" cols="76" required rows="4"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>

                {{--<iframe id="form_target" name="form_target" style="display:none"></iframe>--}}
                {{--<form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"--}}
                {{--enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">--}}
                {{--<input name="image" id="upload_file" type="file"--}}
                {{--onchange="$('#my_form').submit();this.value='';">--}}
                {{--<input type="hidden" name="type_slug" id="type_slug" value="">--}}
                {{--{{ csrf_field() }}--}}
                {{--</form>--}}

            </div>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function () {
            var d = new Date();
            var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + (d.getDate() < 10 ? "-0" : "-") + d.getDate();
            // console.log(strDate)
            $('#myDate').val(strDate);



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



            $('#accTable').on('input','.price',function (){

                $(this).each(function (){
                    var totalQuantity =  parseInt($(this).closest('tr').find('.quantity').val())
                    var price = parseInt($(this).val());
                    // console.log(parseInt($(this).val()) * totalQuantity)

                    $(this).closest('tr').find('.subTotal').val(totalQuantity * price)
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

// Error on same select
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
            // Append Item
            $('#accTable').on('click','.addItem',function (e){
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

            //Delete Item
            $('#accTable').on('click','.deleteItem',function (e){
                e.preventDefault()
                $(this).closest('tr').remove()
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
                            // select_this.closest('tr').find('.uom').append("<option value='00'>Add New UOM</option>");
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
        })
    </script>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')

@stop
