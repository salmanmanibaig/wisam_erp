@extends('voyager::master')
@php  $customerset=App\VendorPurchaseOrder::first(); @endphp
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
        Add New Letter Credit
    </p>


    <div class="col-md-6" style="margin-bottom: 0px">




        @if ($errors->any())
            <div class="alert alert-danger alert-block" style="opacity: 0.7">

                @foreach ($errors->all() as $error)
                    <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                    / <strong>{{ $error }}</strong>
                @endforeach

            </div>
        @endif
            @if ($message = Session::get('info'))
                @foreach($message as $ids)
                    <div class="alert alert-danger alert-block" style="opacity: 0.7">
                        <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                        <strong>{{ $ids->product_name }} ALREDY TAKEN </strong>
                    </div>
                @endforeach
            @endif


    </div>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form action="{{url('admin/vendor-letter-credits')}}" method="POST" enctype="multipart/form-data">
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
                                    <legend class="" style="">Letter Credit</legend>
                                    {{--<div class="row">--}}

                                    <div class="col-md-4" >
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Purchase Order<span class="color">*</span></label>
{{--                                        <select class="form-control select2 select-contact board " required name="po_id">--}}

{{--                                            <option readonly value="">Select One</option>--}}
{{--                                            @foreach($purchase_order as $order)--}}
{{--                                                <option value="{{$order->id}}">{{$order->po_number}}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
                                        <input type="hidden" required readonly class="form-control" value="{{$purchase_order->id}}" name="po_id" placeholder="LC Number">
                                        <input type="text" required readonly class="form-control" value="{{$purchase_order->po_number}}" placeholder="LC Number">

                                    </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">LC Number<span class="color">*</span></label>
                                            <input type="text" required class="form-control" name="lc_number" placeholder="LC Number">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">LC qty<span class="color">*</span></label>
                                            <input type="text" readonly required class="form-control lc_qty" name="lc_qty" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Return Po<span class="color">*</span></label>
                                            <select  class="form-control select2 select-contact board "  name="return_po">

                                                <option readonly value="">Select One</option>
                                                @foreach($return_po as $order)
                                                    <option {{-- @if($letter_credit->po_id == $order->id)  selected @endif--}} value="{{$order->id}}">{{$order->po_number.'|'.$order->qty.' '.$order->unit->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <table class="table table-striped" id="myTable">
                                        <thead>

                                        <tr>
                                            <th>BL Number</th>
                                            <th>Qty</th>
{{--                                            <th>GD Number</th>--}}
                                            <th>Actions</th>
                                        </tr>

                                        </thead>
                                        <tbody id="acc_table">

                                        <tr>

                                            <td>
                                                <div class="form-group" >

                                                    <input class="form-control" required type="text" name="bl_number[]">
                                                </div>

                                            </td>

                                            <td>
                                                <input class="form-control bl_qty" required  type="number" name="qty[]" >
                                            </td>
{{--                                            <td>--}}
{{--                                                <input class="form-control"   type="text" name="gd_number[]" >--}}
{{--                                            </td>--}}

                                            <td>
                                                <button type="button" id="btn1" value="1" class="btn btn-success">Add BL</button>
                                            </td>


                                        </tr>


                                        <tr>

                                            <td>
                                                <div class="form-group" >

                                                    <input class="form-control" required type="text" name="bl_number[]">
                                                </div>

                                            </td>

                                            <td>
                                                <input class="form-control bl_qty" required  type="number" name="qty[]" >
                                            </td>
{{--                                            <td>--}}
{{--                                                <input class="form-control"   type="text" name="gd_number[]" >--}}
{{--                                            </td>--}}

                                            <td>
                                                <button type="button"   class="btn btn-danger  btnDelete"><i class="voyager-trash"></i> </button>
                                            </td>
                                        </tr>
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


@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@if(1)
@section('javascript')
 @else
@section('javascripts')
    @endif
    <script>

        function compare_qty()
        {

            var sum =0

            $('.bl_qty').each(function (){
                           if(parseInt($(this).val())>0)
                           {
                               sum= sum + parseInt($(this).val())
                           }

                })

            return sum

        }


        $(document).keyup(function (){


            $('.lc_qty').val(compare_qty())
        })

        $(document).click(function (){

            $('.lc_qty').val(compare_qty())

        })




        $(document).ready(function () {


            var arr = [];
            var row_arr = []
            var r = 0;
            var i = 0;

            function findTr(selectOption ){
                return  selectOption.closest('tr').index();
            }

            $.fn.rowCount = function() {
                return $('tr', $(this).find('tbody')).index();
            };

            // function productIndex(){
            //     $('#myTable').('tr', $(this).find('tbody'))
            // }

            function eachtr(selected_index,select_value)
            {
                var check=0;
                $("tr").each(function ()
                {

                    var index = $(this).index();

                    var contact_id = $(this).find('.select-contact').val()

                    console.log(index,selected_index,select_value,contact_id)

                    if(index!=selected_index)
                    {

                        if(select_value == contact_id)
                        {
                            //alert('same')
                            check=1
                        }
                    }
                })

                return check;


            }

            $("table").on('change','.select-contact', function (e) {
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


            $("form").submit(function () {

                var this_master = $(this);

                this_master.find('input[type="checkbox"]').each(function () {
                    var checkbox_this = $(this);


                    if (checkbox_this.is(":checked") == true) {
                        checkbox_this.attr('value', '1');
                    } else {
                        checkbox_this.prop('checked', true);
                        //DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA
                        checkbox_this.attr('value', '0');
                    }
                });
            });
            $("#myTable").on('click', '.btnDelete', function () {

                $(this).closest('tr').remove();
                compare_qty()
            });

            $("#btn1").click(function () {

                var btn_val = parseInt($('#btn1').val());

                // alert(btn_val)

                // alert('a')
                $("#acc_table").append("      <tr>\n" +
                    "\n" +
                    "                                            <td>\n" +
                    "                                                <div class=\"form-group\" >\n" +
                    "\n" +
                    "                                                    <input class=\"form-control\" required type=\"text\" name=\"bl_number[]\">\n" +
                    "                                                </div>\n" +
                    "\n" +
                    "                                            </td>\n" +
                    "\n" +
                    "                                            <td>\n" +
                    "                                                <input class=\"form-control bl_qty\" required  type=\"number\" name=\"qty[]\" >\n" +
                    "                                            </td>\n" +
                    // "                                            <td>\n" +
                    // "                                                <input class=\"form-control\"   type=\"text\" name=\"gd_number[]\" >\n" +
                    // "                                            </td>\n" +
                    "\n" +
                    "                                            <td>\n" +
                    "                                                <button type=\"button\"   class=\"btn btn-danger  btnDelete\"><i class=\"voyager-trash\"></i> </button>\n" +
                    "                                            </td>\n" +
                    "                                        </tr>");



                $(".select-contact").on('change', function (e) {


                    var thisAttribute = $(this)
                    var trIndex = findTr(thisAttribute)+1
                    console.log(trIndex)


                    var selCurrent = $(this).closest('tr').find('.select-contact option:selected').val();
                    console.log(selCurrent);


                });

                var selectorParant = $('select').select2();
                $('.acc_table').append(selectorParant);

            })
        });
    </script>
@stop







