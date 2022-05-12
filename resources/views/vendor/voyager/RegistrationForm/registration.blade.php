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
                            <form action="{{url('admin/bookings')}}" method="POST" enctype="multipart/form-data">
                                <!-- PUT Method if we are editing -->
                                <!-- CSRF TOKEN -->
                                {{ csrf_field() }}
                                <div class="panel-body">

                                    <div class="row">



                                        <div class="col-md-12">
                                            <div class="card m-t-10">
                                                <div class="card-header  separator">
                                                    <div class="card-title">Add Customer View</div>
                                                    <div class="card-controls">
                                                        <ul>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-body">


                                                    <div class=" container-fluid   container-fixed-lg">
                                                        <div class="row row-same-height">
                                                            <div class="col-md-4 b-r b-dashed b-grey ">
                                                                <div class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                                                                    <h2>Your Information is safe with us!</h2>
                                                                    <p>We respect your privacy and protect it with strong encryption, plus strict policies . Two-step verification, which we encourage all our customers to use.</p>
                                                                    <p class="small hint-text">Below is a sample page for your cart , Created using pages design UI Elementes</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="padding-30 sm-padding-5">
                                                                    <form role="form" action="https://delex.pk/ops_delex/Customer/add_customer" method="post">
                                                                        <p>Brand Details</p>
                                                                        <div class="form-group-attached">
                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required">
                                                                                        <label>Name</label>
                                                                                        <input name="brand_name" tabindex="1" class="form-control" id="brand_name" required="" type="text" placeholder="Enter Brand Name">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>CNIC</label>
                                                                                        <input name="brand_cnic" tabindex="2" class="form-control" id="brand_cnic" required="" type="text" placeholder="Enter Brand Name">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required">
                                                                                        <label>Account Type</label>
                                                                                        <select name="account_type" tabindex="3" class="form-control" id="account_type" required="">
                                                                                            <option value="">Select Account Type</option>
                                                                                            <option value="LW">With in City Pickup Points</option>
                                                                                            <option value="NW">Different in City Pickup Points</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required">
                                                                                        <label>Number For Pickups</label>
                                                                                        <input name="pickup_points" tabindex="4" class="form-control" id="pickup_points" type="number" placeholder="Enter Pickup points">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group form-group-default required">
                                                                                <label>URL</label>
                                                                                <input name="brand_url" tabindex="5" class="form-control" id="brand_url" required="" type="text" placeholder="Enter URL">
                                                                            </div>
                                                                            <div class="form-group form-group-default required">
                                                                                <label>NTN</label>
                                                                                <input name="brand_ntn" tabindex="5" class="form-control" id="brand_ntn" required="" type="text" placeholder="Enter NTN">
                                                                            </div>
                                                                            <div class="form-group form-group-default">
                                                                                <label>Product Type</label>
                                                                                <input name="brand_product" tabindex="6" class="form-control" id="brand_product" required="" type="text">
                                                                            </div>
                                                                            <div class="form-group form-group-default">
                                                                                <label>Remark</label>
                                                                                <input name="brand_note" tabindex="6" class="form-control" id="brand_note" required="" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <p>Address Detail</p>
                                                                        <div class="form-group-attached">
                                                                            <div class="form-group form-group-default required">
                                                                                <label>Address</label>
                                                                                <input name="brand_address" tabindex="7" class="form-control" id="brand_address" required="" type="text" placeholder="Current address">
                                                                            </div>
                                                                            <div class="row clearfix">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>City</label>
                                                                                        <select name="brand_city" tabindex="8" class="form-control" id="brand_city">
                                                                                            <option value="">Select City</option>
                                                                                            <option value="1">Lahore</option><option value="2">Karachi</option><option value="3">Rawalpindi</option><option value="4">Islamabad</option><option value="5">Faisalabad</option><option value="6">Gujranwala</option><option value="7">Multan</option><option value="8">Hyderabad</option><option value="9">Peshawar</option><option value="10">Quetta</option><option value="13">Sargodha</option><option value="14">Sialkot</option><option value="15">Bahawalpur</option><option value="17">Raheemyarkhan</option><option value="18">Zafarwal</option><option value="19">Gujrat</option><option value="20">Wazirabad</option><option value="21">Mandibahauddin</option><option value="22">Sahiwal</option><option value="23">Gujarkhan</option><option value="24">Sohawa</option><option value="25">Chawinda</option><option value="28">Pasrur</option><option value="29">Shakargarh</option><option value="30">Narowal</option><option value="59">Ferozewatwan</option><option value="71">Jaranwala</option><option value="73">Jhang</option><option value="97">Muridke</option><option value="165">Shahdra</option><option value="166">Kalashahkako</option><option value="168">Khankadogran</option><option value="169">Mandisafdarabad</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required ">
                                                                                        <label>Country</label>
                                                                                        <select name="Country" class="form-control" id="Country">
                                                                                            <option value="">Pakistan</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row clearfix">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>Email</label>
                                                                                        <input name="brand_email" tabindex="9" class="form-control" id="brand_email" type="email" placeholder="Enter Email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required ">
                                                                                        <label>Phone</label>
                                                                                        <input name="brand_phone" tabindex="10" class="form-control" id="brand_phone" type="text" placeholder="Enter Phone">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <br>
                                                                        <p>Bank Detail</p>
                                                                        <div class="form-group-attached">
                                                                            <div class="form-group form-group-default required">
                                                                                <label>Name</label>
                                                                                <select name="bank_name" tabindex="11" class="form-control" id="bank_name" required="">
                                                                                    <option value="">Select Bank</option>
                                                                                    <option>ADVANCE MICROFINANCE</option>
                                                                                    <option>AL BARAKA BANK LIMITED</option>
                                                                                    <option>ALLIED BANK LIMITED</option>
                                                                                    <option>APNA MICROFINANCE BANK</option>
                                                                                    <option>ASKARI BANK LIMITED</option>
                                                                                    <option>BANK AL HABIB LTD</option>
                                                                                    <option>BANK ALFALAH LIMITED</option>
                                                                                    <option>BANK OF PUNJAB</option>
                                                                                    <option>BANKISLAMI BANK</option>
                                                                                    <option>BURJ BANK LIMITED</option>
                                                                                    <option>CITIBANK</option>
                                                                                    <option>DUBAI ISLAMIC BANK</option>
                                                                                    <option>FAYSAL BANK LIMITED</option>
                                                                                    <option>FINCA MICRO FINANCE BANK LTD</option>
                                                                                    <option>FIRST WOMEN BANK</option>
                                                                                    <option>HABIB BANK LIMITED</option>
                                                                                    <option>HABIB METROPOLITAN BANK LIMITED</option>
                                                                                    <option>INDUSTRIAL COMMERCIAL BANK OF CHINA</option>
                                                                                    <option>JS BANK LIMITED</option>
                                                                                    <option>KASB BANK LIMITED</option>
                                                                                    <option>MCB ISLAMIC BANK LIMITED</option>
                                                                                    <option>MEEZAN BANK LIMITED</option>
                                                                                    <option>MOBILINK MICROFINANCE</option>
                                                                                    <option>MUSLIM COMMERCIAL BANK</option>
                                                                                    <option>NATIONAL BANK OF PAKISTAN</option>
                                                                                    <option>NATIONAL RURAL SUPPORT PROGRAMME</option>
                                                                                    <option>NIB BANK LIMITED</option>
                                                                                    <option>SAMBA</option>
                                                                                    <option>SILK BANK</option>
                                                                                    <option>SINDH BANK</option>
                                                                                    <option>SONERI BANK LIMITED</option>
                                                                                    <option>STANDARD CHARTERED BANK PAKISTAN LTD</option>
                                                                                    <option>SUMMIT BANK</option>
                                                                                    <option>TELENOR MICROFINANCE BANK LTD</option>
                                                                                    <option>U MICROFINANCE</option>
                                                                                    <option>UNITED BANK LIMITED</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="row clearfix">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required">
                                                                                        <label>Account Title</label>
                                                                                        <input name="account_title" tabindex="12" class="form-control" id="account_title" required="" type="text" placeholder="Enter Bank Account Title">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required">
                                                                                        <label>Account Number</label>
                                                                                        <input name="account_no" tabindex="13" class="form-control" id="account_no" required="" type="text" placeholder="Enter Bank Account Number">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group form-group-default required">
                                                                                <label>IBAN</label>
                                                                                <input name="account_iban" tabindex="14" class="form-control" id="account_iban" required="" type="text" placeholder="Enter IBAN">
                                                                            </div>
                                                                        </div>


                                                                        <br>
                                                                        <p>Login Detail</p>
                                                                        <div class="form-group-attached">
                                                                            <div class="form-group form-group-default required">
                                                                                <label>Display Name</label>
                                                                                <input name="display_name" tabindex="15" class="form-control" id="display_name" required="" type="text" placeholder="Account Display Name">
                                                                            </div>
                                                                            <div class="row clearfix">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required" id="user_name_div">
                                                                                        <label>Username</label>
                                                                                        <input name="user_name" tabindex="16" class="form-control" id="user_name" required="" onblur="check_username()" type="text" placeholder="Account User Name">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required">
                                                                                        <label>Password</label>
                                                                                        <input name="user_password" tabindex="17" class="form-control" id="user_password" required="" type="text" placeholder="Account User Password">
                                                                                    </div>
                                                                                </div>

                                                                            </div>


                                                                        </div>







                                                                        <br>
                                                                        <p>Reference Detail</p>
                                                                        <div class="form-group-attached">

                                                                            <div class="row clearfix">

                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required" id="user_name_div">
                                                                                        <label>Reference By</label>
                                                                                        <select name="reference_by" tabindex="17" class="form-control" id="reference_by" required="">
                                                                                            <option value="">Select Reference</option>
                                                                                            <option value="1">Syed Asim Abbas</option><option value="7">Haris Jamshaid</option><option value="2">Raja Saqib</option><option value="3">Khalil Abro</option><option value="4">Syed Nouman</option><option value="6">Abdulrehman</option><option value="8">Osama Imtiaz Awan</option><option value="9">Zaheer Arshad</option><option value="10">Muhammad Saim</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default">
                                                                                        <label>Freelancer Reference By</label>
                                                                                        <select name="secondary_reference_by" tabindex="18" class="form-control" id="secondary_reference_by">
                                                                                            <option value="">Select Freelancer Reference</option>
                                                                                            <option value="5">Madhia</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                            </div>


                                                                        </div>


                                                                        <br>
                                                                        <p>With in City Rate Detail</p>
                                                                        <div class="form-group-attached">
                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="wc_wgt1_div">
                                                                                        <label>WGT1</label>
                                                                                        <input name="wc_wgt1" tabindex="19" class="form-control" id="wc_wgt1" required="" type="text" placeholder="Weight 1">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="wc_rate1_div">
                                                                                        <label>RATE1</label>
                                                                                        <input name="wc_rate1" tabindex="20" class="form-control" id="wc_rate" required="" type="number" placeholder="Rate 1">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="wc_wgt2_div">
                                                                                        <label>WGT2</label>
                                                                                        <input name="wc_wgt2" tabindex="21" class="form-control" id="wc_wgt2" required="" type="text" placeholder="Weight 2">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="wc_rate2_div">
                                                                                        <label>RATE2</label>
                                                                                        <input name="wc_rate2" tabindex="22" class="form-control" id="wc_rate2" required="" type="number" placeholder="Rate 2">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="wc_awgt_div">
                                                                                        <label>AWGT</label>
                                                                                        <input name="wc_awgt" tabindex="23" class="form-control" id="wc_awgt" required="" type="text" placeholder="Addition">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="wc_arate_div">
                                                                                        <label>ARATE</label>
                                                                                        <input name="wc_arate" tabindex="24" class="form-control" id="wc_arate" required="" type="number" placeholder="ADD Rate">
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="wc_gst_div">
                                                                                        <label>Gst Formula</label>
                                                                                        <select name="wc_gst_formula" tabindex="25" class="form-control" id="wc_gst_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="wc_gst_rate_div">
                                                                                        <label>GST Rate</label>
                                                                                        <input name="wc_gst_rate" tabindex="26" class="form-control" id="wc_gst_rate" required="" type="number" placeholder="GST">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="wc_sp_handling_formula_div">
                                                                                        <label>SPH Formula</label>
                                                                                        <select name="wc_sp_handling_formula" tabindex="27" class="form-control" id="wc_sp_handling_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">Fixed</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="wc_sp_handling_rate_div">
                                                                                        <label>SP Handing</label>
                                                                                        <input name="wc_sp_handling_rate" tabindex="28" class="form-control" id="wc_sp_handling_rate" required="" type="number" placeholder="SP Handling">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="wc_return_formula_div">
                                                                                        <label>Re Formula</label>
                                                                                        <select name="wc_return_formula" tabindex="29" class="form-control" id="wc_return_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">Fixed</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="wc_return_rate_div">
                                                                                        <label>Retunn </label>
                                                                                        <input name="wc_return_rate" tabindex="30" class="form-control" id="wc_return_rate" required="" type="number" placeholder="ADD Rate">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="wc_fuel_formula_div">
                                                                                        <label>F Formula</label>
                                                                                        <select name="wc_fuel_formula" tabindex="31" class="form-control" id="wc_fuel_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">Fixed</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="wc_fuel_rate_div">
                                                                                        <label>Fuel Rate</label>
                                                                                        <input name="wc_fuel_rate" tabindex="32" class="form-control" id="wc_fuel_rate" required="" type="number" placeholder="ADD Rate">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <br>
                                                                        <p>Same Zone Rate Detail</p>
                                                                        <div class="form-group-attached">
                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="sz_wgt1_div">
                                                                                        <label>WGT1</label>
                                                                                        <input name="sz_wgt1" tabindex="33" class="form-control" id="sz_wgt1" required="" type="text" placeholder="Weight 1">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="sz_rate1_div">
                                                                                        <label>RATE1</label>
                                                                                        <input name="sz_rate1" tabindex="34" class="form-control" id="sz_rate2" required="" type="number" placeholder="Rate 1">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="sz_wgt2_div">
                                                                                        <label>WGT2</label>
                                                                                        <input name="sz_wgt2" tabindex="35" class="form-control" id="sz_wgt2" required="" type="text" placeholder="Weight 2">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="sz_rate2_div">
                                                                                        <label>RATE2</label>
                                                                                        <input name="sz_rate2" tabindex="36" class="form-control" id="sz_rate2" required="" type="number" placeholder="Rate 2">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="sz_awgt_div">
                                                                                        <label>AWGT</label>
                                                                                        <input name="sz_awgt" tabindex="37" class="form-control" id="sz_awgt" required="" type="text" placeholder="Addition">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="sz_arate_div">
                                                                                        <label>ARATE</label>
                                                                                        <input name="sz_arate" tabindex="38" class="form-control" id="sz_arate" required="" type="number" placeholder="ADD Rate">
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="sz_gst_formula_div">
                                                                                        <label>Gst Formula</label>
                                                                                        <select name="sz_gst_formula" tabindex="39" class="form-control" id="sz_gst_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="sz_gst_rate_div">
                                                                                        <label>GST Rate</label>
                                                                                        <input name="sz_gst_rate" tabindex="40" class="form-control" id="sz_gst_rate" required="" type="number" placeholder="Rate 1">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="sz_sp_handling_formula_div">
                                                                                        <label>SPH Formula</label>
                                                                                        <select name="sz_sp_handling_formula" tabindex="41" class="form-control" id="sz_sp_handling_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">Fixed</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="sz_sp_handling_rate_div">
                                                                                        <label>SP Handing</label>
                                                                                        <input name="sz_sp_handling_rate" tabindex="42" class="form-control" id="sz_sp_handling_rate" required="" type="number" placeholder="Handling">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="sz_return_formula_div">
                                                                                        <label>Re Formula</label>
                                                                                        <select name="sz_return_formula" tabindex="43" class="form-control" id="sz_return_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">Fixed</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="sz_return_rate">
                                                                                        <label>Return </label>
                                                                                        <input name="sz_return_rate" tabindex="44" class="form-control" id="sz_return_rate" required="" type="number" placeholder="return">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="sz_fuel_formula_div">
                                                                                        <label>F Formula</label>
                                                                                        <select name="sz_fuel_formula" tabindex="45" class="form-control" id="sz_fuel_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">Fixed</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="sz_fuel_rate">
                                                                                        <label>Fuel Rate</label>
                                                                                        <input name="sz_fuel_rate" tabindex="46" class="form-control" id="sz_fuel_rate" required="" type="number" placeholder="Fuel">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <br>
                                                                        <p>Different Zone Rate Detail</p>
                                                                        <div class="form-group-attached">
                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="dz_wgt1_div">
                                                                                        <label>WGT1</label>
                                                                                        <input name="dz_wgt1" tabindex="47" class="form-control" id="dz_wgt2" required="" type="text" placeholder="Weight 1">
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="dz_rate1_div">
                                                                                        <label>RATE1</label>
                                                                                        <input name="dz_rate1" tabindex="48" class="form-control" id="dz_rate1" required="" type="number" placeholder="Rate 1">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="dz_wgt2_div">
                                                                                        <label>WGT2</label>
                                                                                        <input name="dz_wgt2" tabindex="49" class="form-control" id="dz_wgt2" required="" type="text" placeholder="Weight 2">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="dz_rate2_div">
                                                                                        <label>RATE2</label>
                                                                                        <input name="dz_rate2" tabindex="50" class="form-control" id="dz_rate2" required="" type="number" placeholder="Rate 2">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="dz_awgt_div">
                                                                                        <label>AWGT</label>
                                                                                        <input name="dz_awgt" tabindex="51" class="form-control" id="dz_awgt" required="" type="text" placeholder="Addition">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-2">
                                                                                    <div class="form-group form-group-default required" id="dz_arate_div">
                                                                                        <label>ARATE</label>
                                                                                        <input name="dz_arate" tabindex="52" class="form-control" id="dz_arate" required="" type="number" placeholder="ADD Rate">
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="dz_gst_formula_div">
                                                                                        <label>Gst Formula</label>
                                                                                        <select name="dz_gst_formula" tabindex="53" class="form-control" id="dz_gst_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="dz_gst_rate_div">
                                                                                        <label>GST Rate</label>
                                                                                        <input name="dz_gst_rate" tabindex="54" class="form-control" id="dz_gst_rate" required="" type="number" placeholder="Rate 1">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="user_name_div">
                                                                                        <label>SPH Formula</label>
                                                                                        <select name="dz_sp_handling_formula" tabindex="55" class="form-control" id="dz_sp_handling_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">Fixed</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="dz_sp_handling_rate_div">
                                                                                        <label>SP Handing</label>
                                                                                        <input name="dz_sp_handling_rate" tabindex="56" class="form-control" id="dz_sp_handling_rate" required="" type="number" placeholder="Handling">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="dz_return_formula_div">
                                                                                        <label>Re Formula</label>
                                                                                        <select name="dz_return_formula" tabindex="57" class="form-control" id="dz_return_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">Fixed</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="dz_return_rate_div">
                                                                                        <label>Return</label>
                                                                                        <input name="dz_return_rate" tabindex="58" class="form-control" id="dz_return_rate" required="" type="number" placeholder="return">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="dz_fuel_formula_div">
                                                                                        <label>F Formula</label>
                                                                                        <select name="dz_fuel_formula" tabindex="59" class="form-control" id="dz_fuel_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">Fixed</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-3">
                                                                                    <div class="form-group form-group-default required" id="dz_fuel_rate_div">
                                                                                        <label>Fuel Rate</label>
                                                                                        <input name="dz_fuel_rate" tabindex="60" class="form-control" id="dz_fuel_rate" required="" type="number" placeholder="Fuel">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <br>
                                                                        <p>Flyar Rate</p>
                                                                        <div class="form-group-attached">
                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-12">
                                                                                    <div class="form-group form-group-default required" id="flyer_rate_div">
                                                                                        <label>Flyer Rate</label>
                                                                                        <input name="flyer_rate" tabindex="61" class="form-control" id="flyer_rate" required="" type="number" placeholder="Flyer Rate">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required" id="cash_handling_rate_div">
                                                                                        <label>Cash Handling Formula</label>
                                                                                        <select name="cash_handling_formula" tabindex="62" class="form-control" id="cash_handling_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">FIXED</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required" id="cash_handling_rate_div">
                                                                                        <label>Cash Handling Rate</label>
                                                                                        <input name="cash_handling_rate" tabindex="62" class="form-control" id="cash_handling_rate" required="" type="number" placeholder="Cash Handling Rate">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row clearfix">
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required" id="reference_formula_div">
                                                                                        <label>Reference Formula</label>
                                                                                        <select name="reference_formula" tabindex="63" class="form-control" id="reference_formula" required="">
                                                                                            <option value="PER">PER</option>
                                                                                            <option value="FIX">FIXED</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-6">
                                                                                    <div class="form-group form-group-default required" id="reference_rate_div">
                                                                                        <label>Reference Rate</label>
                                                                                        <input name="reference_rate" tabindex="64" class="form-control" id="reference_rate" required="" type="number" placeholder="Reference Rate">
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <br>
                                                                        <button class="btn btn-primary pull-right" type="submuit">Open Customer Account</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        <!-- END card -->
                                    </div>

                                </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <button id="submit" type="submit" style="margin-left: 44%;" class="btn btn-primary save">{{ ('Submit') }}</button>
                    </div>




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
