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
                            <form action="{{url('admin/load-sheets')}}" method="POST" enctype="multipart/form-data">
                                <!-- PUT Method if we are editing -->
                                <!-- CSRF TOKEN -->
                                {{ csrf_field() }}
                                <div class="panel-body">



                                    <div class="row">



                                        <div class="col-xl-12 col-lg-12">

                                            <!-- START card -->


                                            <div class=" container-fluid   container-fixed-lg bg-white">
                                                <div class="row">
                                                    <div class="col-md-7">

                                                        <div class="card card-transparent">
                                                            <div class="card-body">
                                                                <p>Basic Information</p>
                                                                <div class="form-group-attached">
                                                                    <div class="form-group form-group-default required" aria-required="true" id="shipment_type_div">
                                                                        <label class="fade">Shipment Type</label>
                                                                        <select class="form-control" name="shipment_type" id="shipment_type" tabindex="1" required="" aria-required="true">
                                                                            <option value="1">Cash on Delivery (COD)</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group form-group-default required" aria-required="true" id="order_date_div">
                                                                        <label class="fade">Booking Date</label>
                                                                        <input type="text" class="form-control" name="order_date" id="order_date" tabindex="2" value="2020-02-26 16:15:37" readonly="">
                                                                    </div>
                                                                    <div class="row clearfix">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default required" aria-required="true" id="order_piece_div">
                                                                                <label>Pieces</label>
                                                                                <input type="number" class="form-control" name="order_piece" id="order_piece" tabindex="2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default required" id="order_weight_div">
                                                                                <label>Weight</label>
                                                                                <input type="number" class="form-control" name="order_weight" id="order_weight" tabindex="3">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                    <div class="row clearfix">

                                                                        <div class="col-md-6">
                                                                            <div class="form-group" >
                                                                                <label class="font-weight-bold" for="name">Consignee Destination City<span class="color">*</span></label>
                                                                                <select class="form-control select2" name="d_city" name="category_id">
                                                                                    <option value="">Select Destination City</option>
                                                                                    <option value="1">(42) (LHE) Lahore</option><option value="2">(21) (KHI) Karachi</option><option value="3">(51) (RWP) Rawalpindi</option><option value="4">(511) (ISB) Islamabad</option><option value="5">(41) (FSD) Faisalabad</option><option value="6">(55) (GUJ) Gujranwala</option><option value="7">(61) (MUX) Multan</option><option value="8">(22) (HDD) Hyderabad</option><option value="9">(91) (PEW) Peshawar</option><option value="10">(81) (UET) Quetta</option><option value="13">(48) (SGD) Sargodha</option><option value="14">(524) (SLT) Sialkot</option><option value="15">(62) (BHV) Bahawalpur</option><option value="17">(68) (RYK) Raheemyarkhan</option><option value="18">(54) (ZFW) Zafarwal</option><option value="19">(53) (GJT) Gujrat</option><option value="20">(437) (WZB) Wazirabad</option><option value="21">(546) (MBD) Mandibahauddin</option><option value="22">(40) (SWL) Sahiwal</option><option value="23">(513) (GJK) Gujarkhan</option><option value="24">(544) (SHW) Sohawa</option><option value="25">(436) (CWD) Chawinda</option><option value="28">(4342) (PRR) Pasrur</option><option value="29">(4344) (SGR) Shakargarh</option><option value="30">(542) (NRL) Narowal</option><option value="59">(27) (FRW) Ferozewatwan</option><option value="71">(38) (JRW) Jaranwala</option><option value="73">(50) (JNG) Jhang</option><option value="79">(71) (KMK) Kamoke</option><option value="97">(90) (MDK) Muridke</option><option value="120">(112) (SRA) Sheikhupura</option><option value="165">(158) (SDR) Shahdra</option><option value="166">(159) (KSK) Kalashahkako</option><option value="167">(160) (FQD) Faroqabad</option><option value="168">(161) (KKG) Khankadogran</option><option value="169">(162) (MSD) Mandisafdarabad</option>



                                                                                </select>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-md-6">
                                                                            <div class="form-group form-group-default" id="c_address_div">
                                                                                <label>Consignee Address</label>
                                                                                <input type="text" class="form-control" name="c_address" id="c_address" autocomplete="on">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <div class="row clearfix">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group form-group-default required" aria-required="true" id="sp_handling_div">
                                                                                <label>Is Special Handling? </label>
                                                                                <select class="form-control" name="sp_handling" id="sp_handling">
                                                                                    <option value="No">No</option>
                                                                                    <option value="Yes">Yes (Charges Applied)</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <br>
                                                                <br>
                                                                <button class="btn btn-info" onclick="add_shipment()">Book Shipment</button>
                                                                <button class="btn btn-default"><i class="pg-close"></i> Clear</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END card -->
                                        </div>


                                </form>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button id="submit" type="submit" style="margin-left: 44%;" class="btn btn-primary save">{{ ('Submit') }}</button>
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
