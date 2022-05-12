@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('add',$customerset)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }
    </style>
@stop



@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Update Requisition
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
                    <form action="{{url('admin/supply-requisitions/')}}/{{$requisition->id}}" method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
                        {{method_field('PUT')}}
                        {{ csrf_field() }}
                        <div class="panel-body">
                        {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                        {{--<li></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        <!-- Adding / Editing -->
                            <!-- GET THE DISPLAY OPTIONS -->
                            <legend class="" style="">Requisition Info</legend>
                            {{--<div class="row">--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label for="" class="font-weight-bold">Reference No : 00{{$requisition->referenceNumber}}</label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Date<span class="color">*</span></label>
                                        <input type="date" required class="form-control" name="date" value="" id="myDate" placeholder="Enter Description">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="factory" class="font-weight-bold">Usage : <span class="color">*</span></label>
                                        <select name="factory" id="" class="form-control">

                                            @if($requisition->factory == 'Biotech')
                                                <option value="{{$requisition->factory}}">{{$requisition->factory}}</option>
                                                <option value="Lamitech">Lamitech</option>
                                                <option value="Office">Office</option>
                                            @endif
                                            @if($requisition->factory == 'Lamitech')
                                                <option value="{{$requisition->factory}}">{{$requisition->factory}}</option>
                                                <option value="Biotech">Biotech</option>
                                                <option value="Office">Office</option>
                                            @endif
                                            @if($requisition->factory == 'Office')
                                                <option value="{{$requisition->factory}}">{{$requisition->factory}}</option>
                                                <option value="Lamitech">Lamitech</option>
                                                <option value="Biotech">Biotech</option>
                                            @endif

                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="name">Remarks<span class="color">*</span></label>
                                        <input type="text" required class="form-control" name="remarks" value="{{$requisition->remarks}}" id="myDate" placeholder="Enter Remarks">
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped" id="myTable">
                                <thead>

                                <tr>
                                    <th style="width: 300px;">ITEM NAME</th>
                                    <th>ITEM CATEGORY</th>
                                    <th>ITEM UOM</th>
                                    <th>ITEM QUANTITY</th>
                                    <th>ACTIONS</th>
                                </tr>

                                </thead>

                                <tbody id="accTable">
                                @foreach($requisition->requisitionDetail as $key => $detail)
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
                                                <option value="{{$detail->id}}" >{{$detail->uom}}</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" value="{{$detail->quantity}}" required name="quantity[]" id="" class="form-control">
                                        </td>
                                        <td>
                                            @if($key == 0)

                                            <button class="btn btn-success addItem pull-right" style="margin-top: -1px; "> ADD ITEM</button>
                                            @endif
                                            @if($key != 0)
                                                <button class="btn btn-danger action pull-right btnDelete"><i class="voyager-trash"></i>
                                                </button>
                                            @endif
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
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
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

    {{--<div class="modal fade modal-danger" id="confirm_delete_modal">--}}
    {{--<div class="modal-dialog">--}}
    {{--<div class="modal-content">--}}

    {{--<div class="modal-header">--}}
    {{--<button type="button" class="close" data-dismiss="modal"--}}
    {{--aria-hidden="true">&times;</button>--}}
    {{--<h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>--}}
    {{--</div>--}}

    {{--<div class="modal-body">--}}
    {{--<h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>--}}
    {{--</div>--}}

    {{--<div class="modal-footer">--}}
    {{--<button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>--}}
    {{--<button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <!-- End Delete File Modal -->




    <script>
        $('#myDate').val("{{date('yy-m-d', strtotime($requisition->date))}}")
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
            console.log(id);
            var select_this = $(this)
            $.ajax({
                url: '/admin/requisitions-item/'+id,
                type: 'get',
                dataType: 'json',
                success:function (response){
                    console.log(response)

                    // if (response.error)
                    // {
                    //     console.log('this is error')
                    //     select_this.closest('tr').find('.uom option').remove();
                    //     select_this.closest('tr').find('.uom').append("<option>No details</option>");
                    //     select_this.closest('tr').find('.category').val(response.error.category_item);
                    // }
                    // else
                    // {
                        select_this.closest('tr').find('.uom option').remove();
                        $.each(response.r1.item_uom,function (j,k){
                            select_this.closest('tr').find('.uom').append("<option value="+k.id+">"+k.unitName+'-'+ k.unitQuantity+ "</option>");
                        })
                        select_this.closest('tr').find('.category').val(response.r1.category_item);
                    // }
                }
            })
        })

        $('.item_id').on('change', function (e) {
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
                "                                            <select name=\"item_id[]\" required  id=\"\" class=\"form-control item_id\">\n" +
                "                                                    <option readonly value=\"\">Select One</option>\n" +
                " @foreach($items as $item)\n" +
                "                                                <option value=\"{{$item->id}}\">{{$item->item_name}}</option>\n" +
                "                                                @endforeach" +
                "                                                </select>\n" +
                "                                        </td>\n" +
                "                                        <td>\n" +
                "                                            <input name=\"category[]\" required id=\"\" class=\"form-control category\" readonly>\n" +
                "                                        </td>\n" +
                "                                        <td>\n" +
                "<select required name=\"uom[]\" id=\"\" class=\"form-control uom\">\n" +
                "                                                <option value=\"\" readonly >Select Item</option>\n" +
                "                                            </select>" +
                "                                        </td>\n" +
                "                                        <td>\n" +
                "                                            <input type=\"number\" required value=\"\" name=\"quantity[]\" id=\"\" class=\"form-control\">\n" +
                "                                        </td>\n" +
                "                                        <td>\n" +
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
    </script>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')
@stop
