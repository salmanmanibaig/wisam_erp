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
                    Edit Purhase Order Items
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
                            <form action="{{url('admin/customer-purchase-orders/'.$po->id)}}" method="POST" enctype="multipart/form-data">
                                <!-- PUT Method if we are editing -->
                                <!-- CSRF TOKEN -->
                                {{ csrf_field() }}
                                {{ method_field('put') }}
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
                                            <input type="text" required disabled class="form-control" value="{{$po->date}}"  name="date" placeholder="Enter Item Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Company<span class="color">*</span></label>
                                            <select class="form-control select2" required name="company_id" >
                                                @foreach($company as $comp)

                                                    <option @if($po->company_id == $comp->id) selected @endif  value="{{$comp->id}}">{{$comp->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Customer<span class="color">*</span></label>
                                            <select class="form-control select2" required name="customer_id" >
                                                @foreach($customer as $customers)

                                                    <option @if($po->customer_id == $customers->id) selected @endif  value="{{$customers->id}}">{{$customers->name}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Commission Agent<span class="color">*</span></label>
                                            <select class="form-control select2"  name="commission_agent[]" multiple >
                                                @foreach($commission_agents as $agent)

                                                    <option @if($agent->selected) selected @endif value="{{$agent->id}}">{{$agent->name}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group" >

                                            <label class="font-weight-bold" for="name">Percentage Respectively<span class="color">*</span></label>

                                            <select class="form-control select2"  name="commission_percent[]" multiple >
                                                @for($i=1;$i<=100;$i++)

                                                    <option @if(in_array($i,$percent)== $i) selected @endif value="{{$i}}">{{$i." Per Ton"}}</option>


                                                @endfor

                                            </select>

                                        </div>
                                    </div>


                                    <div class="clearfix"></div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Customer PO</label>
                                            <input type="text"  class="form-control" value=" {{$po->cpo_number}}"  name="cpo_number" placeholder="Enter Inv Number">
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Attachment</label>
                                            <input type="file"  class="form-control" name="cpo_attachment" placeholder="Enter Item Name">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <a href="#gardenImage" data-id="{{asset('images/customer/po/'.$po->cpo_attachment)}}" class="openImageDialog thumbnail btn btn-info" style="width: 80%;text-decoration: none;padding: 5px 2px 5px 3px;font-size: 12px;" data-toggle="modal">
                                            View Document
                                        </a>


                                        <div class="modal fade" id="gardenImage" tabindex="-1" role="dialog" aria-labelledby="gardenImageLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content" style="width: 70%;height: 500px;margin-left: 16%;">
                                                    <div class="modal-body">
                                                        <img id="myImage" class="img-responsive" src="{{asset('images/customer/po/'.$po->cpo_attachment)}}" alt="" style="width: auto;height: 387px;">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger center-block" data-dismiss="modal">close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="checkbox" class="s" name="complete_status" value="1">
                                    <label for="vehicle1">Complete</label><br>


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
                                                        <option @if($po->product_id == $item->id) selected @endif   value="{{$item->id}}">{{$item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td><input type="number" name="product_size_start" placeholder="" value="{{$po->product_size_start}}" required class=" form-control"></td>
                                            <td><input type="number" name="product_size_end" placeholder="" value="{{$po->product_size_end}}" required class=" form-control"></td>
                                            <td>
                                                {{--<input type="text" name="items[]" placeholder="" required class="form-control">--}}
                                                <select class="form-control select2" required name="unit_id">
                                                    <option value="">Select One</option>
                                                    @foreach($units as $unit)
                                                        <option  @if($po->unit_id == $unit->id) selected @endif   value="{{$unit->id}}">{{$unit->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>


                                            {{--<td><input type="text" id="cat_id" name="category[]" placeholder="" required class="form-control"></td>--}}
                                            <td><input type="number" name="qty" placeholder="" value="{{$po->qty}}" required class="qty form-control"></td>
                                            <td><input type="number" name="unit_price" placeholder="" value="{{$po->unit_price}}" required class="price form-control"></td>
                                            <td><input type="number"  placeholder="" required value="{{$po->qty * $po->unit_price}}" class="sub_total form-control"></td>

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
                                                <td  style="font-weight: bolder"><input class="exp_check" amount="{{$expense->amount}}" unit="{{$expense->unit}}" @if($expense->selected_amount) checked @endif type="checkbox" name="expense_id[]" value="{{$expense->id}}">  {{ucfirst($expense->name)}} </td>
                                                <td><input type="number" step="0.01" name="amount[]" value="{{$expense->selected_amount}}" placeholder="" required class="expense form-control"></td>

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
                                            <td>




                                                <input type="number" step="0.01"  placeholder="" required value="{{$total}}" class="total form-control"></td>

                                            {{--<td><input type="text" id="uom_id" name="uom[]" placeholder="" required class="form-control"></td>--}}
                                            {{--                                    <td><button style="margin-top: 0px" class="btnDelete btn btn-danger" > <i class="voyager-trash"></i>  </button></td>--}}

                                        </tr>

                                        </tbody>
                                    </table>

                                    <div class="col-md-3">

                                        <h3>Terms And Condition</h3>
                                        @php
                                            $check=0;
                                        @endphp
                                        @foreach($terms as $term)

                                            @php

                                                $check==0;

                                            @endphp
                                            @foreach($po->terms  as $po_term)
                                                @if($po_term->term_id == $term->id)


                                                    @php
                                                        $check=1;
                                                    @endphp

                                                @endif
                                            @endforeach


                                            <input type="checkbox" @if($check == 1) checked @endif id="term{{$term->id}}"  name="terms[]" value="{{$term->id}}">
                                            <label for="term{{$term->id}}" >{{$term->description}}</label><br>

                                            @php
                                                $check=0;
                                            @endphp
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
