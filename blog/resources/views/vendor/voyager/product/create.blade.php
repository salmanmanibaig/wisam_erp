@extends('voyager::master')
@php  $product=App\Product::first(); @endphp
@can('add',$product)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }
    </style>
@stop



@section('page_header')
    <p class="page-title" style="margin-left: 20%;">
        <i class=""></i>
        Add New Product Assembly
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form action="{{url('admin/products')}}" method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                        <div class="panel-body">

                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">PRODUCT NAME:<span class="color">*</span></label>
                                    <input type="text" required class="form-control" name="product_name" placeholder="Enter Item Name">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">DOZ IN CARTOON:<span class="color">*</span></label>
                                    <input type="number" min="0"  required class="form-control" name="doz_cart" placeholder="eg.100">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">UNIT OF MEASURE:<span class="color">*</span></label>
                                    <input type="text" required class="form-control" VALUE="DOZENS" disabled >
                                </div>
                            </div>

                            {{-- <h2>Accommodation</h2> --}}
                            <table class="table table-hover" id="myTable">
                                <thead>
                                <tr>

                                    {{--<th style="width: 70px;">ID</th>--}}
                                    <th style="width: 400px;">Item</th>
                                    {{--<th style="width: 200px;">Category</th>--}}
                                    <th style="width: 100px;">Quantity/Doz</th>
                                    {{--<th style="width: 150px;">UOM</th>--}}
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody id="acc_table">
                                <tr>

                                    {{--<td><input type="text" id="item_id" name="id[]" placeholder="" required class="form-control"></td>--}}
                                    <td>
                                        {{--<input type="text" name="items[]" placeholder="" required class="form-control">--}}
                                        <select class="form-control select2" required name="items[]" id="target1">
                                            <option value="">Select One</option>

                                            @foreach($items as $item)
                                            <option value="{{$item->id}}">{{$item->item_name }} | @if($item->category_item == 'biocos')
                                                    {{'BIOCOS'}}

                                                @endif | {{strtoupper($item->uom)}}

                                                {{--{{$item->category_item}}--}}
                                            </option>
                                        @endforeach
                                        </select>
                                    </td>
                                    {{--<td><input type="text" id="cat_id" name="category[]" placeholder="" required class="form-control"></td>--}}
                                    <td><input type="number" min="0" step="0.1" name="in_qty[]" placeholder="" required class="form-control"></td>
                                    {{--<td><input type="text" id="uom_id" name="uom[]" placeholder="" required class="form-control"></td>--}}
                                    <td><button style="margin-top: 0px" class="btnDelete btn btn-danger" > <i class="voyager-trash"></i>  </button></td>

                                </tr>

                                </tbody>
                            </table>
                        </div><!-- panel-body -->
                        <div id="btn2" style="margin-left: 42%;" class="btn btn-success">+ Add Line</div>
                        <div class="panel-footer">
                            <button type="submit" style="margin-left: 44%;" class="btn btn-primary save">{{ ('Submit') }}</button>
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
@section('javascript')
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


    </script>

    <script>
        $(document).ready(function(){


            $("#btn2").click(function(){

                $("#acc_table").append("<tr>\n" +
                    // "                            <td><input type=\"text\" name=\"board_type[]\"  required class=\"form-control\"></td>\n" +
                    "                            <td> <select class=\" select2 form-control \" name=\"items[]\" >\n" +
                    "                                             <option value=\"\">Select One</option>\n" +
                    "                                           @foreach($items as $item)\n" +
                    "                                            <option value=\"{{$item->id}}\">{{$item->item_name }} | {{$item->uom}} |\n" +
                    "                                                @if($item->category_item == 'biocos')\n" +
                    "                                                    {{'BIOCOS'}}\n" +
                    "                                                @elseif($item->category_item == 'varnish')\n" +
                    "                                                    {{'VARNISHE/COATING'}}\n" +
                    "                                                @elseif($item->category_item == 'consume')\n" +
                    "                                                    {{'CONSUMABLE'}}\n" +
                    "                                                @endif\n" +
                    "                                                {{--{{$item->category_item}}--}}\n" +
                    "                                            </option>\n" +
                    "                                            @endforeach\n" +
                    "                                        </select></td>\n" +
                    // "                            <td><input type=\"text\" name=\"board_type[]\"  required class=\"form-control\"></td>\n" +
                    // "                            <td><input type=\"text\" name=\"board_type[]\"  required class=\"form-control\"></td>\n" +
                    "                            <td><input type=\"number\" step=\"0.1\" min=\"0\" name=\"in_qty[]\"  required class=\"form-control\"></td>\n" +
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
