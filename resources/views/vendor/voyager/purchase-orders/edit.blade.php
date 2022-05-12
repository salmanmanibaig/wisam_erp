@extends('voyager::master')
@php  $role_check=App\CustomerPurchaseOrder::first(); @endphp
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
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form action="{{url('admin/purchase-orders/'.$purchase_order->id)}}" method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="panel-body">
                            {{--<div class="alert alert-danger">--}}
                            {{--<ul>--}}
                            {{--<li></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-3">--}}
                                {{--<div class="form-group" >--}}
                                    {{--<label class="font-weight-bold" for="name">DO Number<span class="color">*</span></label>--}}
                                    {{--<input type="text" readonly required value="{{$do}}" class="form-control" name="donumber" >--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Buyer's Name<span class="color">*</span></label>
                                    <select class="form-control select2" required name="buyer_id" id="">
                                        <option value="">Select One</option>


                                        @foreach($buyers as $key=> $buyer)
                                            <option @if($purchase_order->buyer_id == $buyer->id) selected @endif value="{{$buyer->id}}">{{ucfirst($buyer->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>

                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">PR Number<span class="color">*</span></label>
                                    <input type="text"  class="form-control" name="po_number"  >
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">PO Date<span class="color">*</span></label>
                                    <input type="date"  class="form-control" name="po_date"  >
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">DO Number<span class="color">*</span></label>
                                    <input type="text" required class="form-control" name="do_number" value="{{$purchase_order->do_number}}" >
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">DO Date<span class="color">*</span></label>
                                    <input type="date" required class="form-control" value="{{$purchase_order->do_date}}" name="do_date"  >
                                </div>
                            </div>






                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Department<span class="color">*</span></label>
                                    <select class="form-control select2" required name="department_id" id="target2">
                                        <option value="">Select One</option>

                                        @foreach($departments as $key=> $department)
                                            <option @if($department->id == $purchase_order->department_id) selected @endif value="{{$department->id}}">{{ucfirst($department->name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group" >

                                    <label class="font-weight-bold" for="name">Driver Name<span class="color">*</span></label>
                                    <select class="form-control driver select2"  name="driver_name" id="target2">
                                        <option value="">Select One</option>

                                        @foreach($drivers as $key=> $driver)
                                            <option @if($driver->id == $purchase_order->driver_name) selected @endif  vehicle="{{$driver->vehicle}}"number="{{$driver->number}}" value="{{$driver->id}}">{{ucfirst($driver->name)}}</option>
                                        @endforeach
                                    </select>


                                </div>
                            </div>





                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Vehicle<span class="color">*</span></label>
                                    <input type="text"  class="form-control vehicle " value="{{$purchase_order->vehicle}}" name="vehicle"  >
                                </div>
                            </div>





                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Vehicle Number<span class="color">*</span></label>
                                    <input type="text"  class="form-control vehicle_no " value="{{$purchase_order->vehicle_no}}" name="vehicle_no"  >
                                </div>
                            </div>










                            {{-- <h2>Accommodation</h2> --}}
                            <table class="table table-hover" id="myTable">
                                <thead>
                                <tr>

                                    {{--<th style="width: 70px;">ID</th>--}}

                                    <th >Serial</th>
                                    <th style="width: 400px;">Particulars Name</th>

                                    {{--<th style="width: 200px;">Category</th>--}}
                                    <th > Qty</th>
                                    <th >Remarks</th>
                                    <th >Actions</th>
                                    {{--<th style="width: 150px;">UOM</th>--}}


                                </tr>
                                </thead>
                                <tbody id="acc_table">



                                @foreach($purchase_order->purchase_order_item as $key => $item)
                                <tr>

                                    {{--<td><input type="text" id="cat_id" name="category[]" placeholder="" required class="form-control"></td>--}}
                                    <td><input type="text" readonly value="{{($key+1)}}" placeholder="" required class="form-control serial"></td>
                                    <td><textarea onkeyup="textAreaAdjust(this)" type="text" name="product_name[]" placeholder="" required class="form-control">{{$item->product_name}}</textarea></td>
                                    <td><input type="number" name="qty[]" value="{{$item->qty}}" placeholder="" required class="form-control"></td>
                                    <td><input type="text" name="remarks[]" value="{{$item->remarks}}" placeholder=""  class="form-control"></td>
                                    {{--<td><input type="text" id="uom_id" name="uom[]" placeholder="" required class="form-control"></td>--}}
                                    <td><button style="margin-top: 0px" class="btnDelete btn btn-danger" > <i class="voyager-trash"></i>  </button></td>

                                </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div><!-- panel-body -->
                        <div id="btn2" style="margin-left: 42%;" class="btn btn-success">+ Add Line</div>
                        <div class="col-md-12">
                            <div class="form-group" >
                                <label class="font-weight-bold" for="name">Remarks<span class="color">*</span></label>
                                <textarea type="textarea"  class="form-control"  name="note_remarks" placeholder="Order Remarks">
                                    {{$purchase_order->remarks}}
                                </textarea>
                            </div>
                        </div>


                        <div class="panel-footer">
                            <button id="submit" type="submit" style="margin-left: 44%;" class="btn btn-primary save">{{ ('Submit') }}</button>
                        </div>





                    </form>



                </div>
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

        $( ".driver" ).change(function() {



            var vehicle = $('option:selected', this).attr('vehicle');
            var number = $('option:selected', this).attr('number');


            $('.vehicle_no').val(number);
            $('.vehicle').val(vehicle);

        });


        function textAreaAdjust(element) {
            element.style.height = "1px";
            element.style.height = (25+element.scrollHeight)+"px";
        }

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


            $("#btn2").click(function(){



                $("#acc_table").append("   <tr>\n" +
                    "\n" +
                    "                                    {{--<td><input type=\"text\" name=\"ponumber\" placeholder=\"\" required class=\"form-control\"></td>--}}\n" +
                    "\n" +
                    "\n" +
                    "                                    {{--<td><input type=\"text\" id=\"item_id\" name=\"id[]\" placeholder=\"\" required class=\"form-control\"></td>--}}\n" +
                    "\n" +
                    "\n" +
                    "\n" +
                    "\n" +
                    "\n" +
                    "\n" +
                    "                                    {{--<td><input type=\"text\" id=\"cat_id\" name=\"category[]\" placeholder=\"\" required class=\"form-control\"></td>--}}\n" +
                    "                                    <td><input type=\"text\"   readonly placeholder=\"\" required class=\"form-control serial\"></td>\n" +
                    "                                    <td><textarea onkeyup=\"textAreaAdjust(this)\"  name=\"product_name[]\" placeholder=\"\" required class=\"form-control\"></textarea></td>\n" +
                    "                                    <td><input type=\"number\" name=\"qty[]\" placeholder=\"\" required class=\"form-control\"></td>\n" +
                    "                                    <td><input type=\"text\" name=\"remarks[]\" placeholder=\"\"  class=\"form-control\"></td>\n" +
                    "                                    {{--<td><input type=\"text\" id=\"uom_id\" name=\"uom[]\" placeholder=\"\" required class=\"form-control\"></td>--}}\n" +
                    "{{--                                    <td><button style=\"margin-top: 0px\" class=\"btnDelete btn btn-danger\" > <i class=\"voyager-trash\"></i>  </button></td>--}}\n" +
                    "\n" +
                    "                                </tr>");




        });
        });


        $(document).click(function (){

            var i=1;
            $('.serial').each(function (){

                $(this).val(i);
                i++;
            })
        })

    </script>




    <script>
        $("#myTable").on('click', '.btnDelete', function () {
            $(this).closest('tr').remove();
        });
    </script>



@stop
