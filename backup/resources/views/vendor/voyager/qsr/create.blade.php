@extends('voyager::master')
@php  $generalorder=App\Booking::first(); @endphp
@can('add',$generalorder)
@section('css')

    <style>

        .form-control{
            border: 1px solid #ccc !important;
        }
        .panel-body .select2-selection {
            border: 1px solid #6a6767;
        }
        hr {
            margin-bottom: 20px;
            border-top: 1px solid #6a6767;
        }
        .color{
            color: red;
        } .mr_13{
              margin-right: 13px;
          }
    </style>
@stop



@section('page_header')

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">



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
                            <form action="{{url('admin/qsr')}}" method="POST" enctype="multipart/form-data">
                                <!-- PUT Method if we are editing -->
                                <!-- CSRF TOKEN -->
                                {{ csrf_field() }}
                                <div class="panel-body">



                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 ">
                                            <div class="card m-t-10">
                                                <div class="card-header  separator">
                                                    <div class="card-title">QSR Report


                                                    </div>
                                                </div>
                                                <div class="card-body">

                                                    <div class="row clearfix">

                                                        <div class="col-md-5">

                                                        </div>
                                                    </div>
                                                    <br>


                                                    <div class="row">

                                                        <div class="col-xl-3 col-lg-3">
                                                            <div class="card card-default bg-danger" style="background-image:linear-gradient(45deg, #151E3D, #314789)">
                                                                <div class="card-header  separator">
                                                                    <div class="card-title text-white">QSR Conditions
                                                                    </div>
                                                                </div>
                                                                <div class="card-body text-white">
                                                                    <h3 class="text-white">
                                                                        <span class="semi-bold text-white">Apply</span> Conditions</h3>
                                                                    <form role="form" action="https://delex.pk/Home/submit_qsr" method="post">
                                                                        <div class="form-group">
                                                                            <label>Start Date</label>
                                                                            <span class="help text-white">e.g. "2019-07-01"</span>
                                                                            <input type="date" class="form-control" value="" required="" name="start_date" id="start_date">


                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>End Date</label>
                                                                            <span class="help text-white">e.g. "2019-07-30"</span>
                                                                            <input type="date" class="form-control" value="" required="" name="end_date" id="end_date">
                                                                        </div>
                                                                    </form></div>
                                                                <div class="card-footer">
                                                                    <button class="btn btn-deflaut pull-right" type="submit">GO</button>
                                                                </div>

                                                            </div>
                                                        </div>




                                                    </div>

                                                    <div class="row">

                                                    </div>


                                                </div>
                                                <div class="card-header  separator">
                                                    <div class="card-title" name="1-success-message" id="1-success-message">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- END card -->
                                        </div>

                                    </div>

                                </div>


                                {{--<th>--}}
                                {{--Course Name--}}
                                {{--</th>--}}
                                {{--<th>--}}
                                {{--Category--}}
                                {{--</th>--}}
                                {{--<th>--}}
                                {{--Course Price--}}
                                {{--</th>--}}
                                {{--<th style="width: 100px">--}}
                                {{--Status--}}
                                {{--</th>--}}


                                {{--<th class="actions text-right" style="width: 120px;">{{ __('voyager::generic.actions') }}</th>--}}


                                <tbody>
                                @if(count($qsr)>0)
                                    @foreach($qsr as $key => $book)



                                        <tr id="myTable">


                                            {{--<td>--}}
                                            {{--<span class="font-weight-bold">{{$book->course_name}}</span>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}

                                            {{--<span class="font-weight-bold">{{@$course->cat_course->cat_name}}</span>--}}
                                            {{--</td>--}}

                                            {{--<td>--}}
                                            {{--<span class="font-weight-bold">{{$course->course_price}}</span>--}}
                                            {{--</td>--}}
                                            {{--                                            {{dd($course)}}--}}
                                            {{--<td>--}}
                                            {{--@if($course->publish)--}}
                                            {{--<div class="font-weight-bold status text-uppercase  ">{{$course->publish}}</div><br>--}}
                                            {{--@endif--}}
                                            {{--@if($course->trending)--}}
                                            {{--<div class="font-weight-bold status text-uppercase" style="background: #4dbd74 !important">{{$course->trending}}</div><br>--}}
                                            {{--@endif--}}
                                            {{--@if($course->feature)--}}
                                            {{--<span class="font-weight-bold status" style="background: yellowgreen"><span class="text-uppercase">{{$course->feature}}</span></span><br>--}}
                                            {{--@endif--}}
                                            {{--@if($course->popular)--}}
                                            {{--<span class="font-weight-bold status text-uppercase" style="background: #20a8d8 !important">{{$course->popular}}</span><br>--}}
                                            {{--@endif--}}
                                            {{--@if($course->free)--}}
                                            {{--<span class="font-weight-bold status text-uppercase" style="background: #f39c12">{{$course->free}}</span>--}}
                                            {{--@endif--}}
                                            {{--</td>--}}

                                            {{--<td class="no-sort no-click text-right" id="bread-actions">--}}
                                            {{--<div class="btn-toolbar">--}}
                                            {{--<a href='{{url("admin/courses/{$course->id}/edit")}}' class="btn btn-info pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                            {{--<i class="voyager-eye"></i> <span>Edit</span>--}}
                                            {{--</a>--}}

                                            {{--<a href='{{url("admin/courses/{$course->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                            {{--<i class="voyager-eye"></i> <span>Read</span>--}}
                                            {{--</a>--}}
                                            {{--@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('student'))--}}
                                            {{--<button type="button" class="btn btn-success pull-right" data-toggle="modal" style="text-decoration: none; font-size: 12px;padding: 5px 7px"--}}
                                            {{--data-target="#edit"  data-category="{{$course->cat_name}}" data-id="{{$course->id}}">--}}
                                            {{--<i class="voyager-eye"></i> <span>Register Course</span>--}}
                                            {{--</button>--}}
                                            {{--        <a href='{{url("admin/registration/{$course->id}")}}' class="btn btn-success pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                            {{--                                                        <i class="voyager-eye"></i> <span>Register Course</span>--}}
                                            {{--                                                    </a>--}}
                                            {{--@endif--}}
                                            {{--</div>--}}
                                            {{--</td>--}}

                                        </tr>


                                    @endforeach
                                @endif
                                </tbody>
                                </table>

                        </div>

                        {{--<div class="modal fade" id="edit" style="display: none;">--}}
                        {{--<div class="modal-dialog">--}}
                        {{--<div class="modal-content">--}}
                        {{--<div class="modal-header" style="padding-bottom: 0px">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">×</span></button>--}}
                        {{--<h4 class="modal-title alert alert-warning" style="margin-bottom: 0px">Update Category</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                        {{--<form action="{{url('admin/course-categories/update')}}" method="post" enctype="multipart/form-data">--}}
                        {{--{{csrf_field()}}--}}
                        {{--{{method_field('put')}}--}}
                        {{--<input type="hidden" name="id" id="id" value="">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-md-6" style="margin-bottom: 0px">--}}
                        {{--<div class="form-group">--}}
                        {{--<label style="font-weight: bold">Course Name</label>--}}
                        {{--<input type="text" class="form-control"  name="cat_name" id="category" >--}}

                        {{--</div>--}}

                        {{--</div>--}}
                        {{--<div class="col-md-6" style="margin-bottom: 0px;">--}}
                        {{--<div class="form-group">--}}
                        {{--<label style="font-weight: bold">Category Name</label>--}}
                        {{--<input type="text" class="form-control"  name="cat_name" id="category" >--}}

                        {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="col-md-6" style="margin-bottom: 0px">--}}
                        {{--<div class="form-group">--}}
                        {{--<label style="font-weight: bold">Course Price</label>--}}
                        {{--<input type="text" class="form-control"  name="cat_name" id="category" >--}}

                        {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="col-md-12" style="margin-bottom: 0px">--}}
                        {{--<div class="form-group">--}}
                        {{--<label style="font-weight: bold">Category</label>--}}
                        {{--<input type="file" class="form-control"  name="cat_name" id="category" >--}}

                        {{--</div>--}}

                        {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
                        {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--</div>--}}

                        {{--</div>--}}
                        {{--<!-- /.modal-content -->--}}
                        {{--</div>--}}
                        {{--<!-- /.modal-dialog -->--}}
                        {{--</div>--}}

                    </div>






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
@section('javascript')

    {{--<script type="text/javascript">--}}
    {{--function add_shipment(){--}}
    {{--var check="Pass";--}}
    {{--var shipment_type="";--}}
    {{--var order_date="";--}}
    {{--var order_piece="";--}}
    {{--var order_weight="";--}}
    {{--var cod_amount="";--}}
    {{--var pick_point="";--}}
    {{--var return_shipment="";--}}
    {{--var customer_reference_no="";--}}
    {{--var c_name="";--}}
    {{--var c_phone="";--}}
    {{--var c_email="";--}}
    {{--var d_city="";--}}
    {{--var c_address = "";--}}
    {{--var remark="";--}}
    {{--var sp_handling="";--}}
    {{--var product_detail="";--}}
    {{--//------------Shipment Type--}}
    {{--if($("#shipment_type").val()!=""){--}}
    {{--shipment_type=$("#shipment_type").val();--}}
    {{--$("#shipment_type").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#shipment_type_div").css("border-color", "red");--}}
    {{--$("#shipment_type").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//------------Order Date-------------}}
    {{--if($("#order_date").val()!="" ){--}}
    {{--order_date=$("#order_date").val();--}}
    {{--$("#order_date").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#order_date_div").css("border-color", "red");--}}
    {{--$("#order_date").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------order_weight------}}
    {{--if($("#order_weight").val()!=""){--}}
    {{--order_weight=$("#order_weight").val();--}}
    {{--$("#order_weight_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#order_weight_div").css("border-color", "red");--}}
    {{--$("#order_weight").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------order_piece------}}
    {{--if($("#order_piece").val()!=""){--}}
    {{--order_piece=$("#order_piece").val();--}}
    {{--$("#order_piece_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#order_piece_div").css("border-color", "red");--}}
    {{--$("#order_piece").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------cod_amount------}}
    {{--if($("#cod_amount").val()!=""){--}}
    {{--cod_amount=$("#cod_amount").val();--}}
    {{--$("#cod_amount_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#cod_amount_div").css("border-color", "red");--}}
    {{--$("#cod_amount").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------product_detail------}}
    {{--if($("#product_detail").val()!=""){--}}
    {{--product_detail=$("#product_detail").val();--}}
    {{--$("#product_detail_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#product_detail_div").css("border-color", "red");--}}
    {{--$("#product_detail").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------pick_point------}}
    {{--if($("#pick_point").val()!=""){--}}
    {{--pick_point=$("#pick_point").val();--}}
    {{--$("#pick_point_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#pick_point_div").css("border-color", "red");--}}
    {{--$("#pick_point").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------return_shipment------}}
    {{--if($("#return_shipment").val()!=""){--}}
    {{--return_shipment=$("#return_shipment").val();--}}
    {{--$("#return_shipment_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#return_shipment_div").css("border-color", "red");--}}
    {{--$("#return_shipment").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------customer_reference_no------}}
    {{--if($("#customer_reference_no").val()!=""){--}}
    {{--customer_reference_no=$("#customer_reference_no").val();--}}
    {{--$("#customer_reference_no_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#customer_reference_no_div").css("border-color", "red");--}}
    {{--$("#customer_reference_no").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------customer_Name------}}
    {{--if($("#c_name").val()!=""){--}}
    {{--c_name=$("#c_name").val();--}}
    {{--$("#c_name_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#c_name_div").css("border-color", "red");--}}
    {{--$("#c_name").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------customer_Phone------}}
    {{--if($("#c_phone").val()!=""){--}}
    {{--c_phone=$("#c_phone").val();--}}
    {{--$("#c_phone_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#c_phone_div").css("border-color", "red");--}}
    {{--$("#c_phone").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------customer_Email------}}
    {{--if($("#c_email").val()!=""){--}}
    {{--c_email=$("#c_email").val();--}}
    {{--$("#c_email_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#c_email_div").css("border-color", "red");--}}
    {{--$("#c_email").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------customer_Cities------}}
    {{--if($("#d_city").val()!=""){--}}
    {{--d_city=$("#d_city").val();--}}
    {{--$("#d_city_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#d_city_div").css("border-color", "red");--}}
    {{--$("#d_city").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------address------}}
    {{--if($("#c_address").val()!=""){--}}
    {{--c_address=$("#c_address").val();--}}
    {{--$("#c_address_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#c_address_div").css("border-color", "red");--}}
    {{--$("#c_address").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------Remark------}}
    {{--if($("#remark").val()!=""){--}}
    {{--remark=$("#remark").val();--}}
    {{--$("#remark_div").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#remark_div").css("border-color", "red");--}}
    {{--$("#remark").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//---------sp_handling------}}
    {{--if($("#sp_handling").val()!=""){--}}
    {{--sp_handling=$("#sp_handling").val();--}}
    {{--$("#sp_handling").css("border-color", "rgba(0, 0, 0, 0.07)");--}}
    {{--} else {--}}
    {{--$("#sp_handling_div").css("border-color", "red");--}}
    {{--$("#sp_handling").focus();--}}
    {{--check="Fail";--}}
    {{--}--}}
    {{--//--------------------------------End--}}
    {{--//-------Checking Conditions-----------}}
    {{--if(check!="Fail"){--}}
    {{--$("#msg_div").html("<div class='pgn push-on-sidebar-open pgn-bar'><div class='alert alert-info'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>×</span><span class='sr-only'>Close</span></button><strong>Please Wait</strong> We Are Getting Up Things For You.</div></div>");--}}
    {{--var mydata={--}}
    {{--shipment_type           : shipment_type,--}}
    {{--order_date              : order_date,--}}
    {{--order_piece             : order_piece,--}}
    {{--order_weight            : order_weight,--}}
    {{--cod_amount              : cod_amount,--}}
    {{--customer_reference_no   : customer_reference_no,--}}
    {{--product_detail          : product_detail,--}}
    {{--pick_point              : pick_point,--}}
    {{--return_shipment         : return_shipment,--}}
    {{--c_name                  : c_name,--}}
    {{--c_phone                 : c_phone,--}}
    {{--c_email                 : c_email,--}}
    {{--d_city                  : d_city,--}}
    {{--c_address               : c_address,--}}
    {{--remark                  : remark,--}}
    {{--sp_handling             : sp_handling--}}
    {{--};--}}
    {{--$.ajax({--}}
    {{--url: "https://delex.pk/Booking/add_shipment",--}}
    {{--type: "POST",--}}
    {{--data: mydata,--}}
    {{--success: function(data) {--}}
    {{--//var objJSON = $.parseJSON(data);--}}
    {{--//$("#msg_show").html(objJSON.notification);--}}
    {{--$("#msg_div").html(data);--}}
    {{--}--}}
    {{--});--}}
    {{--$("#order_piece").val("");--}}
    {{--$("#order_weight").val("");--}}
    {{--$("#cod_amount").val("");--}}
    {{--$("#customer_reference_no").val("");--}}
    {{--$("#c_name").val("");--}}
    {{--$("#c_phone").val("");--}}
    {{--$("#d_city").val("").trigger('change');--}}
    {{--$("#c_email").val("");--}}
    {{--$("#c_address").val("");--}}
    {{--$("#remark").val("");--}}
    {{--$("#product_detail").val("");--}}
    {{--}--}}
    {{--}--}}
    {{--</script>--}}


    {{--<script src="https://delex.pk/assets/plugins/pace/pace.min.js" type="text/javascript"></script>--}}
    {{--<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->--}}

    {{--<script src="https://delex.pk/assets/jquery.table2excel.min.js" type="text/javascript"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>--}}
    {{--<script src="https://delex.pk/assets/chartjs/Chart.min.js"></script>--}}
    {{--<script src="https://delex.pk/assets/datatables/datatables.min.js"></script>--}}
    {{--<script src="https://delex.pk/assets/datatables/buttons.colVis.min.js"></script>--}}
    {{--<script src="https://delex.pk/assets/datatables/buttons.print.min.js"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/modernizr.custom.js" type="text/javascript"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/popper/umd/popper.min.js" type="text/javascript"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/jquery/jquery-easy.js" type="text/javascript"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/jquery-actual/jquery.actual.min.js"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>--}}
    {{--<script src="https://delex.pk/assets/plugins/select2/js/select2.min.js"></script>--}}
    {{--<!-- END VENDOR JS -->--}}
    {{--<!-- BEGIN CORE TEMPLATE JS -->--}}
    {{--<script src="https://delex.pk/assets/pages/js/pages.min.js" type="text/javascript"></script>--}}
    {{--<!-- END CORE TEMPLATE JS -->--}}
    {{--<!-- BEGIN PAGE LEVEL JS -->--}}
    {{--<!--  <script src="https://delex.pk/assets/plugins/charts.js" type="text/javascript"></script>-->--}}
    {{--<script src="https://delex.pk/assets/js/scripts.js" type="text/javascript"></script>--}}

    <!-- END PAGE LEVEL JS -->
    <!-- Search -->
    <script src="https://delex.pk/assets/search.js"></script>



@stop
