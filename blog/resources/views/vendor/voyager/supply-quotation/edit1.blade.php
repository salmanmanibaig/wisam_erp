@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('add',$customerset)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@stop



@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Edit Quotation
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form action="{{url('admin/update-quotation/')}}/{{$quotation->id}}" method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
{{--                        {{method_field('PUT')}}--}}

                        {{ csrf_field() }}
                        <div class="panel-body">
                        {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                        {{--<li></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        <!-- Adding / Editing -->
                            <!-- GET THE DISPLAY OPTIONS -->
                            <legend class="" style="">Quotation Info</legend>
                            {{--<div class="row">--}}
                            <input type="hidden" value="1" name="approveStatus" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label for="" class="font-weight-bold">Reference No : 00{{$quotation->referenceNo}}</label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="margin-bottom: 0px;">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Date<span class="color">*</span></label>
                                        <input type="date" required class="form-control" name="date" value="" id="myDate" placeholder="Enter Description">
                                    </div>
                                </div>
                                <div class="col-md-6" style="margin-bottom: 0px;">
                                    <div class="form-group">
                                        <label for="factory" class="font-weight-bold">Usage : <span class="color">*</span></label>
                                        <select name="factory" id="" class="form-control">

                                            @if($quotation->factory == 'Biotech')
                                                <option value="{{$quotation->factory}}">{{$quotation->factory}}</option>
                                                <option value="Lamitech">Lamitech</option>
                                                <option value="Office">Office</option>
                                            @endif
                                            @if($quotation->factory == 'Lamitech')
                                                <option value="{{$quotation->factory}}">{{$quotation->factory}}</option>
                                                <option value="Biotech">Biotech</option>
                                                <option value="Office">Office</option>
                                            @endif
                                            @if($quotation->factory == 'Office')
                                                <option value="{{$quotation->factory}}">{{$quotation->factory}}</option>
                                                <option value="Lamitech">Lamitech</option>
                                                <option value="Biotech">Biotech</option>
                                            @endif

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="name">Remarks<span class="color">*</span></label>
                                        <input type="text" required class="form-control" name="remarks" value="{{$quotation->remarks}}" id="myDate" placeholder="Enter Remarks">
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped" id="myTable">
                                <thead>

                                <tr>
                                    <th style="width: 300px;">ITEM NAME</th>
                                    <th>ITEM CATEGORY</th>
                                    <th style="width: 150px;">ITEM UOM</th>
                                    <th>ITEM QUANTITY</th>
                                    <th>ITEM PRICE</th>
                                    <th style="width: 110px;">ACTIONS</th>
                                </tr>

                                </thead>

                                <tbody id="accTable">
                                @foreach($quotation->quotationDetails as $key => $detail)
                                    <tr>
                                        <td>
                                            <select name="item_id[]" id="" required class="form-control item_id">
                                                <option value="{{$detail->item_id}}">{{$detail->name}}</option>
                                                @foreach($items as $item)
                                                <option value="{{$item->id}}">{{$item->item_name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input name="category[]" value="{{$detail->category}}" id="" class="form-control category" readonly>
                                        </td>
                                        <td>
{{--                                            <input name="uom[]" value="{{$detail->uom}}"  id="" class="form-control uom" readonly>--}}
                                            <select name="uom[]" id="" class="form-control uom">
                                                <option value="{{$detail->uom_id}}" >{{$detail->uom}}</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" value="{{$detail->quantity}}" required name="quantity[]" id="" class="form-control quantity">
                                        </td>
                                        <td>
                                            <input type="number" value="{{$detail->price}}" name="price[]" id="" class="form-control price">
                                        </td>
                                        <td>
                                            <div class="">
                                                <button type="button" class="btn btn-success purchase-history" style="background: #6f6b6d" data-toggle="modal" data-target="#historyModal">
                                                    <span><i class="fas fa-history"></i></span>
                                                </button>
                                                <!-- Button trigger modal -->
                                                <!-- Modal -->
                                                <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background: #6f6b6d; color: white">
                                                                <h2 class="modal-title" id="exampleModalLabel">Item Purchase History</h2>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive panel">
                                                                    <div class="panel-body">
                                                                        <table id="accTableModalHistory" class="table table-bordered">
                                                                            <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Item Name
                                                                                </th>
                                                                                <th>
                                                                                    Quantity
                                                                                </th>
                                                                                <th>
                                                                                    Price
                                                                                </th>
                                                                                <th>
                                                                                    UOM
                                                                                </th>
                                                                                <th>
                                                                                    Date
                                                                                </th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody id="accTableModalBody">

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary action pull-left closeModal" data-dismiss="modal">Close</button>
                                                                <button type="button" id="btnCompleteHistory" class="btn btn-primary " style="background: #6f6b6d; color: white">Complete History</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @if($key == 0)

                                                    <button class="btn btn-primary addItem pull-right"><i class="fas fa-plus"></i></button>
                                                @endif
                                                @if($key != 0)
                                                    <button class="btn btn-danger action pull-right btnDelete"><i class="voyager-trash"></i>
                                                    </button>
                                                @endif
                                            </div>

                                        </td>
                                        <td>
                                            <input type="hidden" value="{{$detail->id}}" class="group-id" name="detail_id[]" >
                                        </td>
                                    </tr>
                                @endforeach
                                {{--                                <tr>--}}

                                {{--                                    <td>--}}
                                {{--                                        <div class="form-group" >--}}

                                {{--                                            <select class="form-control select2 board" required name="contact_id[]">--}}
                                {{--                                                <option readonly value="">Select One</option>--}}
                                {{--                                                @foreach($whatsapp as $number)--}}
                                {{--                                                    <option value="{{$number->id}}">{{$number->contact_name}}</option>--}}
                                {{--                                                @endforeach--}}
                                {{--                                            </select>--}}
                                {{--                                        </div>--}}

                                {{--                                    </td>--}}

                                {{--                                    <td>--}}
                                {{--                                        <input type="checkbox" name="approval_right[]" >--}}
                                {{--                                    </td>--}}

                                {{--                                    <td>--}}
                                {{--                                        <button type="button" id="" value="1" class="btn btn-danger  btnDelete"><i class="voyager-trash"></i> </button>--}}
                                {{--                                    </td>--}}


                                {{--                                </tr>--}}







                                </tbody>
                            </table>


                            {{--</div>--}}


                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary" id="btnApprove">Update</button>
{{--                            <button type="submit" class="btn btn-primary" id="btnApprove"  data-toggle="modal" data-target="#exampleModal">Update</button>--}}
                        </div>
{{--                        {{dd($sumPrice)}}--}}

                        <!-- Approve  Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" id="modal-header">

                                    </div>
                                    <div class="modal-body">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal" style="float: left">Close</button>
                                        <button type="submit" class="btn btn-primary save" id="btnSave">Yes</button>
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
        $(document).ready(function (){

            $('#btnCompleteHistory').on('click',function (){
                toastr.success('Under Process...')
            })
            $('#accTable').on('click','.purchase-history',function (){
                var itemVal = $(this).closest('tr').find('.item_id').val()
                if (itemVal) {
                    $.ajax({
                        url: '/admin/purchase-history/'+itemVal,
                        type: 'get',
                        success: function (response){
                            console.log(response);
                            $('#accTableModalBody').find('tr').remove();
                            if (response.length !=0)
                            {
                                for (var i=0; i<response.length;i++) {
                                   var dt = response[i].date
                                    $('#accTableModalBody').append(' <tr>\n' +
                                        // '                                                        <td>'+ (response[0].product_name).length >10 ? str.substring(response[0].product_name,0,10) : response[0].product_name+'</td>\n' +
                                        '                                                        <td>'+response[i].product_name+'</td>\n' +
                                        '                                                        <td>'+response[i].quantity+'</td>\n' +
                                        '                                                        <td>'+response[i].price+'</td>\n' +
                                        '                                                        <td>'+response[i].uom+'</td>\n' +
                                        '                                                        <td>'+response[i].date+'</td>\n' +
                                        '                                                    </tr>')
                                    if (i==4){
                                        return false;
                                    }
                                }
                            }else {

                                $('#accTableModalBody').append(' <tr>'+
                                    '                                                        <td><h1 style="color: red;" >Not Purchased Before</h1></td>\n' +
                                    '                                                    </tr>')
                            }

                        }
                    })
                }else {
                    alert('no value')
                }

            })

            var temp = 0
            $('#btnApprove').on('click',function (e){
                $('.price').each(function (){
                    $('#modal-header').find('#withoutPriceModal').remove()
                    $('#modal-header').find('#withPriceModal').remove()
                    if($(this).val()<1) {
                        e.preventDefault()
                        $('#exampleModal').modal('show');

                        temp =1;
                        $('#modal-header').append('<div id="withoutPriceModal" style="color: red;">\n' +
                            '                                                <h2 class="modal-title" id="exampleModalLabel">Are you sure you want to approve without Prices?</h2>\n' +
                            '                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">\n' +
                            '                                                    <span aria-hidden="true">&times;</span>\n' +
                            '                                                </button>\n' +
                            '                                            </div>')
                        return false;
                    }
                })
            })

            $('#myDate').val("{{date('yy-m-d', strtotime($quotation->date))}}")
            // alert()
            function eachtr(selected_index,select_value)
            {
                var check=0;
                $("tr").each(function ()
                {

                    var index = $(this).index();

                    var contact_id = $(this).find('.item_id').val()

                    console.log(index,selected_index,select_value,contact_id)

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
            $('#accTable').on('change','.item_id',function (){
                var id = $(this).val();
                var select_this = $(this)
                $.ajax({
                    url: '/admin/requisitions-item/'+id,
                    type: 'get',
                    dataType: 'json',
                    success:function (response){
                        if (response.error)
                        {
                            console.log('this is error')
                            select_this.closest('tr').find('.uom option').remove();
                            select_this.closest('tr').find('.uom').append("<option>No details</option>");
                            select_this.closest('tr').find('.category').val(response.error.category_item);
                        }
                        else
                        {
                            select_this.closest('tr').find('.uom option').remove();
                            $.each(response.r1.item_uom,function (j,k){
                                select_this.closest('tr').find('.uom').append("<option value="+k.id+">"+k.unitName+'-'+ k.unitQuantity+ "</option>");
                            })
                            select_this.closest('tr').find('.category').val(response.r1.category_item);
                        }
                    }
                })
            })

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

            $('#accTable').on('wheel','.quantity',function (){
                $(this).blur();
            })
            $('#accTable').on('wheel','.price',function (){
                $(this).blur();
            })

            $("#myTable").on('click', '.btnDelete', function (e) {

                $(this).closest('tr').remove();
                // var deleteId  = $(this).closest('tr').find('.group-id').val()
                // e.preventDefault();
                // // alert(deleteId);
                // $.ajax({
                //     url: '/admin/delete-InUpdate/'+deleteId,
                //     type: 'post',
                //     success: function (response){
                //         alert(response);
                //     }
                // })

                // $('.btnDelete').click(function() {
                //     $(this).parent('div').remove();
            });

            $(".addItem").click(function(e){
                e.preventDefault();
                var btn_val=  parseInt($('#btn1').val());
                // alert(btn_val)

                // alert('a')
                $("#accTable").append(" <tr>\n" +
                    "                                        <td>\n" +
                    "                                            <select name=\"item_id[]\"  id=\"\" class=\"form-control item_id\">\n" +
                    "                                                    <option readonly value=\"\">Select One</option>\n" +
                    " @foreach($items as $item)\n" +
                    "                                                <option value=\"{{$item->id}}\">{{$item->item_name}}</option>\n" +
                    "                                                @endforeach" +
                    "                                                </select>\n" +
                    "                                        </td>\n" +
                    "                                        <td>\n" +
                    "                                            <input name=\"category[]\" id=\"\" class=\"form-control category\" readonly>\n" +
                    "                                        </td>\n" +
                    "                                        <td>\n" +
                    "<select name=\"uom[]\" id=\"\" class=\"form-control uom\">\n" +
                    "                                            </select>" +
                    "                                        </td>\n" +
                    "                                        <td>\n" +
                    "                                            <input type=\"number\" value=\"\" name=\"quantity[]\" id=\"\" class=\"form-control\">\n" +
                    "                                        </td>\n" +
                    "<td>\n" +
                    "                                            <input type=\"number\" value=\"\" required name=\"price[]\" id=\"\" class=\"form-control\">\n" +
                    "                                        </td>" +
                    "                                        <td>\n" +
                    " <button type=\"button\" class=\"btn btn-success purchase-history\" style=\"background: #6f6b6d\" data-toggle=\"modal\" data-target=\"#historyModal\">\n" +
                    "                                                    <span><i class=\"fas fa-history\"></i></span>\n" +
                    "                                                </button>  " +
                    "                                                <button class=\"btn btn-danger btnDelete action pull-right\"><i class=\"voyager-trash\"></i>\n" +
                    "                                              </button>\n" +
                    "                                        </td>\n" +
                    "\n" +
                    "                                            <input type=\"hidden\" value=\"0\" class=\"group-id\" name=\"detail_id[]\" >\n" +
                    "\n" +
                    "\n" +
                    "\n" +
                    "                                    </tr>");
                // var selectorParant = $('select').select2();
                // $('.acc_table').append(selectorParant);
            });
        })

    </script>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')
@stop
