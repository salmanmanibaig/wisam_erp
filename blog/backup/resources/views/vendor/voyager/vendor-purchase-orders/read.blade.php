@extends('voyager::master')
@php  $role_check=App\VendorPurchaseOrder::first(); @endphp
@can('add',$role_check)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .tooltip {
            position: relative;
            display: inline-block;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
@stop



@section('page_header')

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title" style="margin-left: 20%;">
                    <i class=""></i>
                    Purhase Order
                </p>


            </div>
            <div class="col-md-6" style="margin-bottom: 0px">


                @if ($message = Session::get('info'))
                    @foreach($message as $ids)
                        <div class="alert alert-danger alert-block" style="opacity: 0.7">
                            <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                            <strong>{{ $ids->product_name }} </strong>
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
                                            <input type="text" required class="form-control" value="{{$do}}" name="po_number" placeholder="Enter Item Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Date<span class="color">*</span></label>
                                            <input type="text"  readonly required class="form-control" value="{{$po->date}}"  placeholder="Enter Item Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Company<span class="color">*</span></label>
                                            <select class="form-control select2" required name="company_id" >
                                                @foreach($company as $comp)

                                                    <option @if($po->company_id == $comp->id) selected @endif value="{{$comp->id}}">{{$comp->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Vendors<span class="color">*</span></label>
                                            <select class="form-control select2" required name="vendor_id" >
                                                @foreach($vendor as $vendors)

                                                    <option  @if($po->vendor_id == $vendors->id) selected @endif value="{{$vendors->id}}">{{$vendors->name}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>             <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Purchase Order type<span class="color">*</span></label>
                                            <select disabled class="form-control   select2" required name="po_type" >


                                                <option @if($po->po_type == 'local') selected @endif  value="local">Local</option>
                                                <option @if($po->po_type == 'international') selected @endif  value="international">International</option>



                                            </select>
                                        </div>
                                    </div>

                                    @if($po->po_type == 'international')

                                        <div class="col-md-4">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="name">Performa Invoice Number</label>
                                                <input type="text"  class="form-control"value="{{$po->p_inv_number}}"  name="date" placeholder="Enter Inv Number">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="name">Attach Performa Invoice</label>
                                                <input type="file"  class="form-control"  name="performa_invoice" placeholder="Enter Item Name">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <a href="#gardenImage" data-id="{{asset('images/performa_invoice/po/'.$po->p_attachment)}}" class="openImageDialog thumbnail btn btn-info" style="width: 80%;text-decoration: none;padding: 5px 2px 5px 3px;font-size: 12px;" data-toggle="modal">
                                                View Document
                                            </a>


                                            <div class="modal fade" id="gardenImage" tabindex="-1" role="dialog" aria-labelledby="gardenImageLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content" style="width: 70%;height: 500px;margin-left: 16%;">
                                                        <div class="modal-body">
                                                            <img id="myImage" class="img-responsive" src="{{asset('images/performa_invoice/po/'.$po->p_attachment)}}" alt="" style="width: auto;height: 387px;">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger center-block" data-dismiss="modal">close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href='{{url("admin/vendor-letter-credits/create")}}' class="btn btn-warning  des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                            <i class="voyager-eye"></i> <span>Add LC</span>
                                        </a>

                                    @else

                                        <div class="col-md-4">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="name">Warehouse<span class="color">*</span></label>
                                                <select class="form-control select2"  name="warehouse_id" >
                                                    <option   value="">Select one</option>
                                                    @foreach($warehouse as $house)


                                                        <option   value="{{$house->id}}">{{$house->name}}</option>

                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="name">Add To Stock</label>
                                                @if($po->stock_status == 0)
                                                    <input type="checkbox"  value="1"  name="add_stock" placeholder="">
                                                @else
                                                    <input type="checkbox" disabled checked  name="date" placeholder="Enter Inv Number">
                                                @endif
                                            </div>
                                        </div>



                                    @endif

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
                                        @foreach($vendor_purchase_expense as $expense)

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
                                                <td><input type="number" step="0.01" name="amount" value="{{$expense->selected_amount}}" placeholder="" required class="expense form-control"></td>

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

                                    @include('vendor.voyager.vendor-purchase-orders.lc_view')



                                </div><!-- panel-body -->
                                {{--                        <div id="btn2" style="margin-left: 42%;" class="btn btn-success">+ Add Line</div>--}}
                                {{--                        <div class="col-md-12">--}}
                                {{--                            <div class="form-group" >--}}
                                {{--                                <label class="font-weight-bold" for="name">Remarks<span class="color">*</span></label>--}}
                                {{--                                <textarea type="textarea" required class="form-control" name="remarks" placeholder="Order Remarks">--}}
                                {{--                                </textarea>--}}
                                {{--                            </div>--}}
                                {{--                        </div>--}}













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

                            // $("input").prop("disabled", true);
                            // $(".btn").prop("disabled", true);
                            // $(".select2").prop("disabled", true);
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

                                }
                                else if($(this).is(":not(:checked)")){
                                    $(this).closest('tr').find('.expense').val(0)
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



                        function check()
                        {       var selects = document.querySelectorAll('select'),
                            notify = document.getElementById('notification');
                            function getOthers(current){
                                var values = [];
                                for(var i=0;i<selects.length;i++){
                                    if(selects[i].value!='null' && selects[i]!=current)
                                        values.push(selects[i].value);
                                }
                                return values;
                            }
                            function checkUnique(){
                                if(this.value && getOthers(this).indexOf(this.value)>-1){
                                    notify.innerText = 'You already selected that';
                                    this.value = null;
                                }
                            }
                            for(var i=0;i<selects.length;i++)
                                selects[i].onchange = checkUnique;
                            document.getElementById('submit').onclick = function(){
                                var values = getOthers();
                                console.log(values);
                                if(values.length < 6){
                                    notify.innerText = 'select all six';
                                    return false;
                                }
                                notify.innerText = '';
                                return true;
                            }

                        }



                    </script>

                    <script>
                        $(document).ready(function(){


                        });


                        $(document).mousemove(function( event ) {
                            $("input").prop("disabled", true);
                            $(".btn").prop("disabled", true);
                            $(".select2").prop("disabled", true);
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
