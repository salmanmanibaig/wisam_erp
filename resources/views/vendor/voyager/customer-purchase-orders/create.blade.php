@extends('voyager::master')
@php  $role_check=App\VendorPurchaseOrder::first(); @endphp
@can('add',$role_check)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }
    </style>
@stop



@section('page_header')

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title" style="margin-left: 20%;">
                    <i class=""></i>
                    Add Purhase Order Items
                </p>


            </div>
            <div class="col-md-6" style="margin-bottom: 0px">


                @if ($message = Session::get('info'))
                    @foreach($message as $ids)
                        <div class="alert alert-danger alert-block" style="opacity: 0.7">
                            <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                            <strong>{{ $ids->product_name }} is UnSufficient for this transaction </strong>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>






        @stop

        @section('content')
            <div class="page-content edit-add container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="panel panel-bordered">
                            <!-- form start -->
                            <form action="{{url('admin/customer-purchase-orders')}}" method="POST" enctype="multipart/form-data">
                                <!-- PUT Method if we are editing -->
                                <!-- CSRF TOKEN -->
                                {{ csrf_field() }}
                                <div class="panel-body">
                                    {{--<div class="alert alert-danger">--}}
                                    {{--<ul>--}}
                                    {{--<li></li>--}}
                                    {{--</ul>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-md-3">--}}
                                    {{--<div class="form-group" >--}}
                                    {{--<label class="font-weight-bold" for="name">DO Number<span class="color">*</span></label>--}}
                                    {{--<input type="text" readonly required value="{{$do}}" class="form-control" name="donumber" placeholder="Enter Item Name">--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">PO Number<span class="color">*</span></label>
                                            <input type="text" required class="form-control" readonly value="{{$do}}" name="po_number" placeholder="Enter Item Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Date<span class="color">*</span></label>
                                            <input type="date" required class="form-control"  name="date" placeholder="Enter Item Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Company<span class="color">*</span></label>
                                            <select class="form-control select2" required name="company_id" >
                                                @foreach($company as $comp)

                                                    <option value="{{$comp->id}}">{{$comp->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Customer<span class="color">*</span></label>
                                            <select class="form-control select2" required name="customer_id" >
                                                @foreach($customer as $customers)

                                                    <option value="{{$customers->id}}">{{$customers->name}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Commission Agent<span class="color">*</span></label>
                                        <select class="form-control select2"  name="commission_agent[]" multiple >
                                            @foreach($commission_agents as $agent)

                                                <option value="{{$agent->id}}">{{$agent->name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >

                                                <label class="font-weight-bold" for="name">Percentage Respectively<span class="color">*</span></label>

                                            <select class="form-control select2"  name="commission_percent[]" multiple >
                                                @for($i=1;$i<=1000;$i++)

                                                    <option value="{{$i}}">{{$i." Per Ton"}}</option>

                                                @endfor

                                            </select>

                                        </div>
                                    </div>


                                    <div class="clearfix"></div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Customer PO</label>
                                            <input type="text"  class="form-control"  name="cpo_number" placeholder="Enter Inv Number">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Attachment</label>
                                            <input type="file"  class="form-control"  name="cpo_attachment" placeholder="Enter Item Name">
                                        </div>
                                    </div>






                                    {{-- <h2>Accommodation</h2> --}}
                                    <table class="table table-hover" id="myTable">
                                        <thead>
                                        <tr>

                                            {{--<th style="width: 70px;">ID</th>--}}

                                            <th style="width: 30% ">Product Name</th>
                                            <th >Start Range</th>
                                            <th >End Range</th>
                                            <th >Unit</th>
                                            <th >Qty</th>
                                            <th >Price</th>
                                            <th >Total</th>


                                        </tr>
                                        </thead>
                                        <tbody id="acc_table">
                                        <tr>

                                            {{--<td><input type="text" name="ponumber" placeholder="" required class="form-control"></td>--}}


                                            {{--<td><input type="text" id="item_id" name="id[]" placeholder="" required class="form-control"></td>--}}



                                            <td>
                                                {{--<input type="text" name="items[]" placeholder="" required class="form-control">--}}
                                                <select class="form-control select2" required name="product_id" id="target1">
                                                    <option value="">Select One</option>
                                                    @foreach($product as $item)
                                                        <option value="{{$item->id}}">{{$item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td><input type="number" name="product_size_start" placeholder="" required class=" form-control"></td>
                                            <td><input type="number" name="product_size_end" placeholder="" required class=" form-control"></td>
                                            <td>
                                                {{--<input type="text" name="items[]" placeholder="" required class="form-control">--}}
                                                <select class="form-control select2" required name="unit_id">
                                                    <option value="">Select One</option>
                                                    @foreach($units as $unit)
                                                        <option value="{{$unit->id}}">{{$unit->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>


                                            {{--<td><input type="text" id="cat_id" name="category[]" placeholder="" required class="form-control"></td>--}}
                                            <td><input type="number" name="qty" placeholder="" required class="qty form-control"></td>
                                            <td><input type="number" name="unit_price" placeholder="" required class="price form-control"></td>
                                            <td><input type="number"  placeholder="" required class="sub_total form-control"></td>

                                            {{--<td><input type="text" id="uom_id" name="uom[]" placeholder="" required class="form-control"></td>--}}
                                            {{--                                    <td><button style="margin-top: 0px" class="btnDelete btn btn-danger" > <i class="voyager-trash"></i>  </button></td>--}}

                                        </tr>
                                        @foreach($customer_purchase_expense as $expense)

                                            <tr>

                                                {{--<td><input type="text" name="ponumber" placeholder="" required class="form-control"></td>--}}


                                                {{--<td><input type="text" id="item_id" name="id[]" placeholder="" required class="form-control"></td>--}}



                                                <td>

                                                </td>

                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>


                                                {{--<td><input type="text" id="cat_id" name="category[]" placeholder="" required class="form-control"></td>--}}
                                                <td>

                                                </td>
                                                <td  style="font-weight: bolder"><input class="exp_check" amount="{{$expense->amount}}" unit="{{$expense->unit}}" type="checkbox" name="expense_id[]" value="{{$expense->id}}">  {{ucfirst($expense->name)}} </td>
                                                <td><input type="number" step="0.01" name="amount[]"  placeholder="" required class="expense form-control"></td>

                                                {{--<td><input type="text" id="uom_id" name="uom[]" placeholder="" required class="form-control"></td>--}}
                                                {{--                                    <td><button style="margin-top: 0px" class="btnDelete btn btn-danger" > <i class="voyager-trash"></i>  </button></td>--}}

                                            </tr>
                                            @endforeach
                                        <tr>

                                            {{--<td><input type="text" name="ponumber" placeholder="" required class="form-control"></td>--}}


                                            {{--<td><input type="text" id="item_id" name="id[]" placeholder="" required class="form-control"></td>--}}



                                            <td>

                                            </td>

                                            <td></td>
                                            <td></td>
                                            <td>

                                            </td>


                                            {{--<td><input type="text" id="cat_id" name="category[]" placeholder="" required class="form-control"></td>--}}
                                            <td></td>
                                            <td style="font-weight: bolder"> Total </td>
                                            <td><input type="number" step="0.01"  placeholder="" required class="total form-control"></td>

                                            {{--<td><input type="text" id="uom_id" name="uom[]" placeholder="" required class="form-control"></td>--}}
                                            {{--                                    <td><button style="margin-top: 0px" class="btnDelete btn btn-danger" > <i class="voyager-trash"></i>  </button></td>--}}

                                        </tr>

                                        </tbody>
                                    </table>


                                    <div class="col-md-12">

                                        <h3>Terms And Condition</h3>

                                        @foreach($terms as $term)

                                            <input type="checkbox" id="term{{$term->id}}"  name="terms[]" value="{{$term->id}}">
                                            <label for="term{{$term->id}}" >{{$term->description}}</label><br>
                                        @endforeach

                                    </div>



                                </div><!-- panel-body -->
                                {{--                        <div id="btn2" style="margin-left: 42%;" class="btn btn-success">+ Add Line</div>--}}
                                {{--                        <div class="col-md-12">--}}
                                {{--                            <div class="form-group" >--}}
                                {{--                                <label class="font-weight-bold" for="name">Remarks<span class="color">*</span></label>--}}
                                {{--                                <textarea type="textarea" required class="form-control" name="remarks" placeholder="Order Remarks">--}}
                                {{--                                </textarea>--}}
                                {{--                            </div>--}}
                                {{--                        </div>--}}


                                <div class="panel-footer">
                                    <button id="submit" type="submit" style="margin-left: 44%;" class="btn btn-primary save">{{ ('Submit') }}</button>
                                </div>





                            </form>




                        </div>
                    </div>
                </div>
            <?php

            $simple = 'demo text string';

            $complexArray = array('demo', 'text', array('foo', 'bar'));

            ?>

            <!-- End Delete File Modal -->
                <script href="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
                @stop
                @else
                    @include('vendor.voyager.errors.authenticate_error')

                @endcan
                @if(1)
                @section('javascript')
                    @else
                @section('javascripts')
                    @endif
                    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
                    {{--<script>--}}
                    {{--var obj = {--}}
                    {{--"flammable": "inflammable",--}}
                    {{--"duh": "no duh"--}}
                    {{--};--}}
                    {{--$.each( obj, function( key, value ) {--}}
                    {{--// alert( key + ": " + value );--}}
                    {{--});--}}
                    {{--</script>--}}
                    <script type="text/javascript">


                        $(document).on('keyup',function (){
                            calculate()
                        })
                         $(document).on('click',function (){
                            calculate()
                        })



                        function calculate()
                        {
                            var qty= $('.qty').val()
                            var  price = $('.price').val()
                            var total  =  qty * price;
                            $('.sub_total').val(total)

                            exp_check()

                            $('.total').val(total+sum_exp())
                        }


                        function exp_check() {
                            $('.exp_check').each(function(){


                                if($(this).is(":checked")){



                                    var amount=  $(this).attr('amount');
                                    var unit=  $(this).attr('unit');

                                    console.log(amount)
                                    console.log(unit)

                                    if(unit == 'percent')
                                    {
                                        var sub_total=  $('.sub_total').val()

                                        console.log()

                                        $(this).closest('tr').find('.expense').val( ((sub_total * amount)/100))
                                    }
                                    else
                                    {
                                        $(this).closest('tr').find('.expense').val(amount)
                                    }
                                    $(this).closest('tr').find('.expense').prop("disabled", false)
                                }
                                else if($(this).is(":not(:checked)")){
                                    $(this).closest('tr').find('.expense').val(0)
                                    $(this).closest('tr').find('.expense').prop("disabled", true)
                                }
                            });
                        }


                        function sum_exp() {

                            var sum =0

                            $('.expense').each(function (){
                                if(parseFloat($(this).val()))
                                {
                                    sum= sum + parseFloat($(this).val())
                                }

                            })

                            return sum
                        }



$(document).click(function (){


})







                    </script>




                    <script>
                        $(document).ready(function(){


                            });



                            $("#btn2").click(function(){



                                $("#acc_table").append("<tr>\n" +
                                    // "                            <td><input type=\"text\" name=\"board_type[]\"  required class=\"form-control\"></td>\n" +
                                    "                            <td> <select class=\" select2 form-control  \" name=\"items[]\" >\n" +
                                    "                                             <option value=\"\">Select One</option>\n" +
                                    "                                           @foreach($product as $item)\n" +
                                    "                                            <option value=\"{{$item->id}}\">  \n" +
                                    {{--"                                                @if($item->category_item == 'inks')\n" +--}}
                                        {{--"                                                    {{'INKS'}}\n" +--}}
                                        {{--"                                                @elseif($item->category_item == 'varnish')\n" +--}}
                                        {{--"                                                    {{'VARNISHE/COATING'}}\n" +--}}
                                        {{--"                                                @elseif($item->category_item == 'consume')\n" +--}}
                                        {{--"                                                    {{'CONSUMABLE'}}\n" +--}}
                                        {{--"                                                @endif\n" +--}}
                                        "                                                {{$item->product_name}}\n" +
                                    "                                            </option>\n" +
                                    "                                            @endforeach\n" +
                                    "                                        </select></td>\n" +
                                    "                            <td><input type=\"number\" name=\"cart_qty[]\"  required class=\"form-control\"></td>\n" +
                                    "                            <td><input type=\"number\" name=\"doz[]\"  required class=\"form-control\"></td>\n" +

                                    "\n" +
                                    "                     <td><button style=\"margin-top: 0px\" class=\"btnDelete btn btn-danger\" > <i class=\"voyager-trash\"></i>  </button></td>    </tr>");
                                var selectorParant = $('select').select2();
                                $('.acc_table').append(selectorParant);
                                $('select').select2();

                            });
                        });
                    </script>

                    <script>
                        $("#myTable").on('click', '.btnDelete', function () {
                            $(this).closest('tr').remove();
                        });
                    </script>



@stop
