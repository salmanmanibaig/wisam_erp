@extends('voyager::master')
@php  $role_check=App\VendorPurchaseOrder::first(); @endphp
@can('add',$role_check)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }

        label{
            color: black;
        }

        input{
            border: black;
        }
    </style>
@stop



@section('page_header')

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title" style="margin-left: 20%;">
                    <i class=""></i>
                    Add Dellivery Order
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
                            <form action="{{url('admin/delivery-orders')}}" method="POST" enctype="multipart/form-data">
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

                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">DO Number<span class="color">*</span></label>
                                            <input type="text" required class="form-control" readonly value="{{$do}}" name="do_number" placeholder="Enter Item Name">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Date<span class="color">*</span></label>
                                            <input type="text" required readonly  value="{{date('Y-m-d h:i:s')}}"  name="date" placeholder="Enter Item Name">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Customer P.O<span class="color">*</span></label>
                                            <select class="form-control customer_po select2" required name="po_id" >
                                                <option value="">Select one</option>
                                                @foreach($cp_orders as $order)

                                                    <option order_qty="{{$order->qty}}"
                                                            product="{{$order->product->name}}"
                                                            customer="{{$order->customer->name}}"
                                                            weight_measure="{{$order->customer->weight_measure}}"
                                                            sent_qty="{{$order->sent_qty}}"
{{--                                                            deliver_qty="{{$order->deliver_qty}}"--}}
                                                            value="{{$order->id}}">{{$order->po_number}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Order Qty (MT)</label>
                                            <input type="text" readonly class="form-control order_qty"   >
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Order Qty Left (MT)</label>
                                            <input type="text"  class="form-control left_qty" readonly  placeholder="Enter Inv Number">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Warehouse<span class="color">*</span></label>
                                            <select class="form-control select2" required name="warehouse_id" >
                                                <option value="">Select One</option>
                                                @foreach($warehouse as $house)

                                                    <option value="{{$house->id}}">{{$house->name}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Customer</label>
                                            <input type="text"  class="form-control customer" readonly >
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Product</label>
                                            <input type="text"  class="form-control product" readonly >
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Transporter<span class="color">*</span></label>
                                            <select class="form-control select2" required name="transporter_id" >
                                                @foreach($transports as $transport)

                                                    <option value="{{$transport->id}}">{{$transport->name}}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Truck No</label>
                                            <input type="text" required  class="form-control"  name="truck_no" placeholder="Enter Inv Number">
                                        </div>
                                    </div>


                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Bilty Number</label>
                                            <input type="number" required   class="form-control bilty_number"  name="bilty_number" >
                                        </div>
                                    </div>



                                    <div class="col-md-2">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Proof</label>
                                            <input type="file" required  class="form-control bilty_attachment"  name="bilty_attachment" placeholder="Enter Item Name">
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <hr>
                                    </div>

                                    <div class="col-md-12">

{{--                                        Bridge1--}}


                                        <div class="col-md-4 bridge1">
                                          <h4 class="font-weight-bold" style="color: black">Weight Bridge 1</h4>
                                            <br>
                                          <div class="col-md-12">
                                              <div class="form-group" >
                                                  <label class="font-weight-bold" for="name">Weight Bridge Company</label>
                                                  <input type="text" required   class="form-control weight_calculate_company1"  name="weight_calculate_company1" >
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group" >
                                                  <label class="font-weight-bold" for="name">UOM</label>
                                                  <select class="form-control select2 unit_id1" required name="unit_id1">
                                                      <option value="">Select One</option>
                                                      @foreach($units as $unit)
                                                          <option  value="{{$unit->id}}">{{$unit->name}}
                                                          </option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group" >
                                                  <label class="font-weight-bold" for="name">Truck Pre LOAD WEIGHT</label>
                                                  <input type="number" required  class="form-control truck_preload_weight1"  name="truck_preload_weight1" >
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group" >
                                                  <label class="font-weight-bold" for="name">Truck Post LOAD WEIGHT</label>
                                                  <input type="number" required class="form-control truck_post_load_weight1"  name="truck_post_load_weight1" >
                                              </div>
                                          </div>

                                          <div class="col-md-12">
                                              <div class="form-group" >
                                                  <label class="font-weight-bold" for="name">Net weight</label>
                                                  <input type="number" required readonly  class="form-control truck_net_weight1"  name="truck_net_weight1" >
                                              </div>
                                          </div>



                                          <div class="col-md-6">
                                              <div class="form-group" >
                                                  <label class="font-weight-bold" for="name">Proof</label>
                                                  <input type="file"  class="form-control attachment1"  name="attachment1" placeholder="Enter Item Name">
                                              </div>
                                          </div>

                                          <div class="col-md-6">
                                              <div class="form-group" >

                                                  <input type="radio" checked id="male" name="stock_out" value="1">
                                                  <label class="font-weight-bold" for="male">Stock Effect</label><br>

                                              </div>
                                          </div>
                                      </div>
{{--                                         Bridge2                                  --}}




                                        <div class="col-md-4 bridge2">
                                            <h4 class="font-weight-bold" style="color: black">Weight Bridge 2</h4>
                                            <input class="check_bridge" type="checkbox" id="vehicle1" name="check_bridge" >
                                            <label  for="vehicle1">Enable</label><br>


                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Weight Bridge Company  </label>
                                                    <input type="text" required   class="form-control weight_calculate_company2"  name="weight_calculate_company2" >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">UOM</label>
                                                    <select  class="form-control select2 unit_id2" required name="unit_id2">
                                                        <option value="">Select One</option>
                                                        @foreach($units as $unit)
                                                            <option value="{{$unit->id}}">{{$unit->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Truck Pre LOAD WEIGHT</label>
                                                    <input type="number" required  class="form-control truck_preload_weight2"  name="truck_preload_weight2" >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Truck Post LOAD WEIGHT</label>
                                                    <input type="number"  required class="form-control truck_post_load_weight2"  name="truck_post_load_weight2" >
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Net weight</label>
                                                    <input type="number" required  readonly class="form-control truck_net_weight2"  name="truck_net_weight2" >
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Proof</label>
                                                    <input type="file" required  class="form-control attachment2"  name="attachment2" placeholder="Enter Item Name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group" >


                                                    <input type="radio"  id="female" name="stock_out" value="2">
                                                    <label class="font-weight-bold" for="female">Stock Effect</label><br>

                                                </div>
                                            </div>
                                        </div>
{{--                                        bridge3--}}
{{--                                        <div class="col-md-4 bridge3">--}}
{{--                                            <h4 class="font-weight-bold" style="color: black">Customer Weight</h4>--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="form-group" >--}}
{{--                                                    <label class="font-weight-bold" for="name">Weight Bridge Company</label>--}}
{{--                                                    <input type="text"  class="form-control"  name="weight_calculate_company1" >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="form-group" >--}}
{{--                                                    <label class="font-weight-bold" for="name">UOM</label>--}}
{{--                                                    <select class="form-control select2" required name="unit_id1">--}}
{{--                                                        <option value="">Select One</option>--}}
{{--                                                        @foreach($units as $unit)--}}
{{--                                                            <option value="{{$unit->id}}">{{$unit->name }}--}}
{{--                                                            </option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}



{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="form-group" >--}}
{{--                                                    <label class="font-weight-bold" for="name">Net weight</label>--}}
{{--                                                    <input type="number"  class="form-control"  name="truck_post_load_weight1" >--}}
{{--                                                </div>--}}
{{--                                            </div>--}}



{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="form-group" >--}}
{{--                                                    <label class="font-weight-bold" for="name">Proof</label>--}}
{{--                                                    <input type="file"  class="form-control"  name="attachment1" placeholder="Enter Item Name">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}


{{--                                        </div>--}}
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



                        $('.customer_po').change(function (){

                            var element = $(this).find('option:selected');
                            var customer = element.attr("customer");
                            var order_qty = element.attr("order_qty");
                            var product = element.attr("product");
                            var sent_qty = element.attr("sent_qty");
                            var weight_measure = element.attr("weight_measure");

                            $('.customer').val(customer)
                            $('.order_qty').val(order_qty)
                            $('.product').val(product)

                            var left_qty=order_qty-sent_qty

                            $('.left_qty').val(left_qty)




                        })

                        $(document).keyup(function (){
                            calculate()
                        })


                        function calculate()
                        {
                           var truck_preload_weight1 = parseInt($('.truck_preload_weight1').val())
                           var truck_preload_weight2 = parseInt($('.truck_preload_weight2').val());
                           var unit_id1 = parseInt($('.unit_id1').val());



                           var truck_post_load_weight1 = parseInt($('.truck_post_load_weight1').val());
                           var truck_post_load_weight2 = parseInt($('.truck_post_load_weight2').val());
                           var unit_id2= parseInt($('.unit_id2').val());


                           var net_weight1= truck_post_load_weight1 - truck_preload_weight1 ;
                           var net_weight2= truck_post_load_weight2 - truck_preload_weight2;

                           $('.truck_net_weight1').val(net_weight1)
                           $('.truck_net_weight2').val(net_weight2)










                        }


                        $(document).ready(function (){


                                $(".bridge2 :input").attr("disabled", true);
                                $(".check_bridge").attr("disabled", false);
                        })

                        $(".check_bridge").click(function (){

                            if( $(this).is(':checked'))
                            {
                                $(".bridge2 :input").attr("disabled", false);
                            }
                            else
                            {         $(".bridge2 :input").attr("disabled", true);
                                $(".check_bridge").attr("disabled", false);
                            }
                        });









                    </script>








@stop
