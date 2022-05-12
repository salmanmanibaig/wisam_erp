@extends('voyager::master')

{{--@php  $role_check=App\Customer::all(); @endphp--}}

{{--@can('add',$role_check)--}}

@section('css')

    <style>
        .form-control {
            border: #000;
        }
        .input{
            border: black solid;
        }
        .box {
            color: #fff;
            padding: 20px;
            display: none;
            margin-top: 20px;
        }

        .red {
            background: #ff0000;
        }

        .green {
            background: #228B22;
        }

        .blue {
            background: #00bfa5;
        }

        .violet {
            background: #ff4500;
        }

        .grey {
            background: #ffab00;
        }

        .color {
            color: red;
        }

        .mb_7 {
            margin-bottom: 7px;
        }

        .pl_4 {
            padding-left: 4px;
        }

        .pl_0 {
            padding-left: 0px;
        }

        .pr_4 {
            padding-right: 4px;
        }

        .pr_0 {
            padding-right: 0px;
        }

        .form-control {
            border: 1px solid #ccc;
        }
    </style>
@stop



@section('page_header')

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title" style="margin-left: 10%;">
                    <i class="fas fa-user-plus"></i>
                    Add Vendor
                </p>


            </div>
            <div class="col-md-6" style="margin-bottom: 0px">


                @if ($message = Session::get('info'))
                    @foreach($message as $ids)
                        <div class="alert alert-danger alert-block" style="opacity: 0.7">
                            <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">
                                ×
                            </button>
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
                            <form action="{{url('admin/vendors')}}" method="POST" enctype="multipart/form-data">
                                <!-- PUT Method if we are editing -->
                                <!-- CSRF TOKEN -->
                                {{ csrf_field() }}
                                <div class="panel-body">
                                    <input type="hidden" name="supplier_id" value="">
{{--                                    {{dd($role_check)}}--}}
                                    <div class="row">
                                        <div class="col-md-6 pr_0">
                                            <div class="col-md-12 pr_4">
                                                <div class="form-group ">
                                                    <label class="font-weight-bold" for="name">First Name<span
                                                            class="color">*</span></label>

                                                    <input type="text" required class="form-control" name="f_name"
                                                           placeholder="Enter First Name">
                                                    <input type="hidden" name="vendor_type" value="{{'standard'}}">
                                                </div>
                                            </div>

                                            <div class="col-md-12 pr_4">
                                                <div class="form-group ">
                                                    <label class="font-weight-bold" for="name">Last Name<span
                                                            class="color">*</span></label>
                                                    <input type="text" required class="form-control" name="l_name"
                                                           placeholder="Enter Last Name">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Company<span
                                                            class="color">*</span></label>
                                                    <input type="text" required class="form-control"
                                                           name="vendor_company" placeholder="Enter Company Name">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group mb_7">
                                                    <label class="font-weight-bold" for="name">Address<span
                                                            class="color">*</span></label>
                                                    <textarea type="text" required class="form-control" name="street"
                                                              placeholder="Enter Street"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr_4">
                                                <div class="form-group mb_7">

                                                    <input type="text" required class="form-control" name="city"
                                                           placeholder="City/Town">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl_4">
                                                <div class="form-group mb_7">

                                                    <input type="text" required class="form-control" name="state"
                                                           placeholder="State/Province">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr_4">
                                                <div class="form-group mb_7">

                                                    <input type="text" required class="form-control" name="postal_name"
                                                           placeholder="Postal Code">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl_4">
                                                <div class="form-group mb_7">

                                                    <input type="text" required class="form-control" name="country"
                                                           placeholder="Country">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Note</label>
                                                    <textarea type="text" class="form-control" rows="4"
                                                              name="note"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Attachment<span
                                                            class="color">*</span></label>
                                                    <input type="file" required class="form-control" name="attachment">
                                                </div>
                                            </div>


                                        </div>


                                        {{--=======================================================Second half==============================================--}}
                                        <div class="col-md-6 pl_0">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Email</label>
                                                    <input type="email" class="form-control" name="email"
                                                           placeholder="Enter Email">
                                                </div>
                                            </div>

                                            <div class="col-md-4 pr_4">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Phone</label>
                                                    <input type="number" class="form-control" name="phone_no"
                                                           placeholder="Enter Phone No">
                                                </div>
                                            </div>

                                            <div class="col-md-4 pl_4 pr_4">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Mobile<span
                                                            class="color">*</span></label>
                                                    <input type="number" required class="form-control" name="mobile_no"
                                                           placeholder="Enter Mobile No">
                                                </div>
                                            </div>


                                            <div class="col-md-4 pl_4">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Fax</label>
                                                    <input type="number" name="fax_no" class="form-control"
                                                           placeholder="Enter Fax No">
                                                </div>
                                            </div>

                                            <div class="col-md-4 pr_4">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Other</label>
                                                    <input type="text" name="others" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-8 pl_4">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Website</label>
                                                    <input type="text" name="web_link" class="form-control">
                                                </div>
                                            </div>


                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Terms</label>
                                                    <input type="text" name="terms" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr_4">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Opening balance<span
                                                            class="color">*</span></label>
                                                    <input type="number" required name="opening_balance"
                                                           class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-5 pl_4">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">as of<span class="color">*</span></label>
                                                    <input type="date" name="as_of" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Account no.<span
                                                            class="color">*</span></label>
                                                    <input type="number" name="account_no" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="font-weight-bold" for="name">Business ID No.<span
                                                            class="color">*</span></label>
                                                    <input type="number" name="business_id" class="form-control">
                                                </div>
                                            </div>



                                        </div>

{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group">--}}

{{--                                                <label class="font-weight-bold" for="name">CATEGORY<span--}}
{{--                                                        class="color">*</span></label>--}}
{{--                                                <select  multiple data-live-search="true"  required class="form-control select2" name="category[]">--}}
{{--                                                    @foreach($category_name as $category)--}}
{{--                                                        <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
{{--                                    <div class="row">--}}
{{--                                        <label style="text:center;"><h4>Payment Mode</h4></label>--}}
{{--                                        <div class="col-md-12">--}}

{{--                                                <div class="col-md-4">--}}
{{--                                                    <label><input type="checkbox" class="cashCheckbox" name="cashCheckbox" value="red"> {{$mode[0]->name}}<br></label>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-4">--}}
{{--                                                    <label><input type="checkbox" class="onlineCheckbox" name="onlineCheckbox" value="green">{{$mode[1]->name}}</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-md-4">--}}
{{--                                                    <label><input type="checkbox" class="checkCheckbox" name="checkCheckbox" value="blue">--}}
{{--                                                        {{$mode[2]->name}}</label>--}}

{{--                                                </div>--}}


{{--                                        </div>--}}
{{--                                        <div id="red" class="red box col-md-3">--}}

{{--                                            <label><h4>Cash Amount</h4></label>--}}
{{--                                            <input type="integer" name="cash_amount" class=" cash_amount form-control"--}}
{{--                                                   placeholder="Enter Cash Amount">--}}

{{--                                        </div>--}}
{{--                                        <div id="green" class="green box col-md-3">--}}
{{--                                            <label><h4>Online Amount</h4></label>--}}
{{--                                            <input type="integer" name="online_amount" class="online_amount form-control"--}}
{{--                                                   placeholder="Enter Amount">--}}
{{--                                            <label><h4>Account Number:</h4></label>--}}
{{--                                            <input type="integer" name="account_number" class=" account_number form-control"--}}
{{--                                                   placeholder="Enter Account Number">--}}

{{--                                        </div>--}}
{{--                                        <div id="blue" class="blue box">--}}
{{--                                            <input type="checkbox" class="cross_Checkbox" name="cross_Checkbox" value="grey"> Cross--}}
{{--                                            Check<br><br><br>--}}
{{--                                            <input type="checkbox" class="cash_check_Checkbox" name="cash_check_Checkbox" value="violet"> Cash Check--}}
{{--                                        </div>--}}
{{--                                        <div class="violet box col-md-12">--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Amount</label>--}}
{{--                                                <input type="integer" name="cash_check_amount" class="cash_check_amount form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Due Date</label>--}}
{{--                                                <input type="date" name="cash_check_date" class=" cash_check_date form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Check Number</label>--}}
{{--                                                <input type="text" name="cash_check_number" class="cash_check_number form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Bank Name</label>--}}
{{--                                                <input type="text" name="cash_check_bank" class="cash_check_bank form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <label>Bank Branch Name</label>--}}
{{--                                                <input type="text" name="cash_check_branch" class="cash_check_branch form-control">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div id="message" class="grey box col-md-12">--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Amount</label>--}}
{{--                                                <input type="integer" name="cross_check_amount" class="cross_check_amount form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Check Name</label>--}}
{{--                                                <input type="integer" name="cross_check_name" class="cross_check_name form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Due Date</label>--}}
{{--                                                <input type="date" name="cross_check_date" class="cross_check_date form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Check Number</label>--}}
{{--                                                <input type="text" name="cross_check_number" class="cross_check_number form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Bank Name</label>--}}
{{--                                                <input type="text" name="cross_check_bank" class="cross_check_bank form-control">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <label>Bank Branch Name</label>--}}
{{--                                                <input type="text" name="cross_check_branch" class="cross_check_branch form-control">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
                                    {{-- <h2>Accommodation</h2> --}}
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- panel-body -->


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
{{--@else--}}
{{--                @include('vendor.voyager.errors.authenticate_error')--}}

{{--@endcan--}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('input[type="checkbox"]').click(function () {
            var inputValue = $(this).attr("value");
            $("." + inputValue).toggle();
        });
        $(".cashCheckbox").click(function(){
            if($(this).prop("checked") == true){

                // $('.cash_amount').prop("disabled", false);

                $('.onlineCheckbox').prop("disabled", true);
                $('.checkCheckbox').attr("disabled", true);
                $('.online_amount').attr("disabled", true);
                $('.account_number').attr("disabled", true);
                $('.cross_Checkbox').attr("disabled", true);
                $('.cash_check_Checkbox').attr("disabled", true);
                $('.cash_check_amount').attr("disabled", true);
                $('.cash_check_date').attr("disabled", true);
                $('.cash_check_number').attr("disabled", true);
                $('.cash_check_bank').attr("disabled", true);
                $('.cash_check_branch').attr("disabled", true);
                $('.cross_check_amount').attr("disabled", true);
                $('.cross_check_name').attr("disabled", true);
                $('.cross_check_date').attr("disabled", true);
                $('.cross_check_number').attr("disabled", true);
                $('.cross_check_bank').attr("disabled", true);
                $('.cross_check_branch').attr("disabled", true);





            }else {
                $('.onlineCheckbox').prop("disabled", false);
                $('.checkCheckbox').attr("disabled", false);
                $('.online_amount').attr("disabled", false);
                $('.account_number').attr("disabled", false);
                $('.cross_Checkbox').attr("disabled", false);
                $('.cash_check_Checkbox').attr("disabled", false);
                $('.cash_check_amount').attr("disabled", false);
                $('.cash_check_date').attr("disabled", false);
                $('.cash_check_number').attr("disabled", false);
                $('.cash_check_bank').attr("disabled", false);
                $('.cash_check_branch').attr("disabled", false);
                $('.cross_check_amount').attr("disabled", false);
                $('.cross_check_name').attr("disabled", false);
                $('.cross_check_date').attr("disabled", false);
                $('.cross_check_number').attr("disabled", false);
                $('.cross_check_bank').attr("disabled", false);
                $('.cross_check_branch').attr("disabled", false);
            }

        });
        $(".onlineCheckbox").click(function(){
            if($(this).prop("checked") == true){
                $('.cash_amount').prop("disabled", true);
                // $('.onlineCheckbox').prop("disabled", true);
                $('.checkCheckbox').attr("disabled", true);
                // $('.online_amount').attr("disabled", true);
                // $('.account_number').attr("disabled", true);
                $('.cross_Checkbox').attr("disabled", true);
                $('.cash_check_Checkbox').attr("disabled", true);
                $('.cash_check_amount').attr("disabled", true);
                $('.cash_check_date').attr("disabled", true);
                $('.cash_check_number').attr("disabled", true);
                $('.cash_check_bank').attr("disabled", true);
                $('.cash_check_branch').attr("disabled", true);
                $('.cross_check_amount').attr("disabled", true);
                $('.cross_check_name').attr("disabled", true);
                $('.cross_check_date').attr("disabled", true);
                $('.cross_check_number').attr("disabled", true);
                $('.cross_check_bank').attr("disabled", true);
                $('.cross_check_branch').attr("disabled", true);
                $('.cashCheckbox').prop("disabled", true);
                $('.checkCheckbox').attr("disabled", true);

            }else{
                $('.cash_amount').prop("disabled", false);
                $('.cashCheckbox').prop("disabled", false);
                $('.checkCheckbox').attr("disabled", false);
                $('.onlineCheckbox').prop("disabled", false);
                $('.checkCheckbox').attr("disabled", false);
                // $('.online_amount').attr("disabled", false);
                // $('.account_number').attr("disabled", false);
                $('.cross_Checkbox').attr("disabled", false);
                $('.cash_check_Checkbox').attr("disabled", false);
                $('.cash_check_amount').attr("disabled", false);
                $('.cash_check_date').attr("disabled", false);
                $('.cash_check_number').attr("disabled", false);
                $('.cash_check_bank').attr("disabled", false);
                $('.cash_check_branch').attr("disabled", false);
                $('.cross_check_amount').attr("disabled", false);
                $('.cross_check_name').attr("disabled", false);
                $('.cross_check_date').attr("disabled", false);
                $('.cross_check_number').attr("disabled", false);
                $('.cross_check_bank').attr("disabled", false);
                $('.cross_check_branch').attr("disabled", false);
            }

        });
        $(".checkCheckbox").click(function(){
            if($(this).prop("checked") == true){
                $('.cashCheckbox').prop("disabled", true);
                $('.onlineCheckbox').attr("disabled", true);
                $('.cash_amount').prop("disabled", true);

                // $('.checkCheckbox').attr("disabled", true);
                $('.online_amount').attr("disabled", true);
                $('.account_number').attr("disabled", true);
                // $('.cross_Checkbox').attr("disabled", true);
                // $('.cash_check_Checkbox').attr("disabled", true);
                $('.cash_check_amount').attr("disabled", true);
                $('.cash_check_date').attr("disabled", true);
                $('.cash_check_number').attr("disabled", true);
                $('.cash_check_bank').attr("disabled", true);
                $('.cash_check_branch').attr("disabled", true);
                $('.cross_check_amount').attr("disabled", true);
                $('.cross_check_name').attr("disabled", true);
                $('.cross_check_date').attr("disabled", true);
                $('.cross_check_number').attr("disabled", true);
                $('.cross_check_bank').attr("disabled", true);
                $('.cross_check_branch').attr("disabled", true);


            }else{
                $('.cashCheckbox').prop("disabled", false);
                $('.onlineCheckbox').attr("disabled", false);
                // $('.cashCheckbox').prop("disabled", true);
                // $('.onlineCheckbox').attr("disabled", true);
                $('.cash_amount').prop("disabled", false);

                // $('.checkCheckbox').attr("disabled", true);
                $('.online_amount').attr("disabled", false);
                $('.account_number').attr("disabled", false);
                // $('.cross_Checkbox').attr("disabled", true);
                // $('.cash_check_Checkbox').attr("disabled", true);
                $('.cash_check_amount').attr("disabled", false);
                $('.cash_check_date').attr("disabled", false);
                $('.cash_check_number').attr("disabled", false);
                $('.cash_check_bank').attr("disabled", false);
                $('.cash_check_branch').attr("disabled", false);
                $('.cross_check_amount').attr("disabled", false);
                $('.cross_check_name').attr("disabled", false);
                $('.cross_check_date').attr("disabled", false);
                $('.cross_check_number').attr("disabled", false);
                $('.cross_check_bank').attr("disabled", false);
                $('.cross_check_branch').attr("disabled", false);
            }

        });
        $(".cash_check_Checkbox").click(function(){
            if($(this).prop("checked") == true){
                $('.cashCheckbox').prop("disabled", true);
                $('.onlineCheckbox').attr("disabled", true);
                $('.cross_Checkbox').attr('disabled',true);
                $('.cash_amount').prop("disabled", true);
                // $('.onlineCheckbox').prop("disabled", true);
                // $('.checkCheckbox').attr("disabled", true);
                $('.online_amount').attr("disabled", true);
                $('.account_number').attr("disabled", true);
                // $('.cross_Checkbox').attr("disabled", true);
                $('.cash_check_Checkbox').attr("disabled", false);
                $('.cash_check_amount').attr("disabled", false);
                $('.cash_check_date').attr("disabled", false);
                $('.cash_check_number').attr("disabled", false);
                $('.cash_check_bank').attr("disabled", false);
                $('.cash_check_branch').attr("disabled", false);
                $('.cross_check_amount').attr("disabled", true);
                $('.cross_check_name').attr("disabled", true);
                $('.cross_check_date').attr("disabled", true);
                $('.cross_check_number').attr("disabled", true);
                $('.cross_check_bank').attr("disabled", true);
                $('.cross_check_branch').attr("disabled", true);


            }else{
                $('.cashCheckbox').prop("disabled", true);
                $('.onlineCheckbox').attr("disabled", true);
                $('.cross_Checkbox').attr('disabled',false);
                // $('.cashCheckbox').prop("disabled", true);
                // $('.onlineCheckbox').attr("disabled", true);
                // $('.cross_Checkbox').attr('disabled',true);
                $('.cash_amount').prop("disabled", true);
                // $('.onlineCheckbox').prop("disabled", true);
                // $('.checkCheckbox').attr("disabled", true);
                $('.online_amount').attr("disabled", true);
                $('.account_number').attr("disabled", true);
                // $('.cross_Checkbox').attr("disabled", true);
                $('.cash_check_Checkbox').attr("disabled", false);
                $('.cash_check_amount').attr("disabled", false);
                $('.cash_check_date').attr("disabled", false);
                $('.cash_check_number').attr("disabled", false);
                $('.cash_check_bank').attr("disabled", false);
                $('.cash_check_branch').attr("disabled", false);
                $('.cross_check_amount').attr("disabled", false);
                $('.cross_check_name').attr("disabled", false);
                $('.cross_check_date').attr("disabled", false);
                $('.cross_check_number').attr("disabled", false);
                $('.cross_check_bank').attr("disabled", false);
                $('.cross_check_branch').attr("disabled", false);

            }

        });
        $(".cross_Checkbox").click(function(){
            if($(this).prop("checked") == true){
                $('.cashCheckbox').prop("disabled", true);
                $('.onlineCheckbox').attr("disabled", true);
                // $('.cash_check_Checkbox').attr('disabled',true);
                // $('.cashCheckbox').prop("disabled", true);
                // $('.onlineCheckbox').attr("disabled", true);
                $('.cross_Checkbox').attr('disabled',false);
                $('.cash_amount').prop("disabled", true);
                // $('.onlineCheckbox').prop("disabled", true);
                // $('.checkCheckbox').attr("disabled", true);
                $('.online_amount').attr("disabled", true);
                $('.account_number').attr("disabled", true);
                // $('.cross_Checkbox').attr("disabled", true);
                $('.cash_check_Checkbox').attr("disabled", true);
                $('.cash_check_amount').attr("disabled", true);
                $('.cash_check_date').attr("disabled", true);
                $('.cash_check_number').attr("disabled", true);
                $('.cash_check_bank').attr("disabled", true);
                $('.cash_check_branch').attr("disabled", true);
                $('.cross_check_amount').attr("disabled", false);
                $('.cross_check_name').attr("disabled", false);
                $('.cross_check_date').attr("disabled", false);
                $('.cross_check_number').attr("disabled", false);
                $('.cross_check_bank').attr("disabled", false);
                $('.cross_check_branch').attr("disabled", false);

            }else{
                $('.cashCheckbox').prop("disabled", true);
                $('.onlineCheckbox').attr("disabled", true);
                $('.cash_check_Checkbox').attr('disabled',false);
                // $('.cashCheckbox').prop("disabled", true);
                // $('.onlineCheckbox').attr("disabled", true);
                // $('.cash_check_Checkbox').attr('disabled',true);
                // $('.cashCheckbox').prop("disabled", true);
                // $('.onlineCheckbox').attr("disabled", true);
                $('.cross_Checkbox').attr('disabled',false);
                $('.cash_amount').prop("disabled", true);
                // $('.onlineCheckbox').prop("disabled", true);
                // $('.checkCheckbox').attr("disabled", true);
                $('.online_amount').attr("disabled", true);
                $('.account_number').attr("disabled", true);
                // $('.cross_Checkbox').attr("disabled", true);
                // $('.cash_check_Checkbox').attr("disabled", true);
                $('.cash_check_amount').attr("disabled", false);
                $('.cash_check_date').attr("disabled", false);
                $('.cash_check_number').attr("disabled", false);
                $('.cash_check_bank').attr("disabled", false);
                $('.cash_check_branch').attr("disabled", false);
                $('.cross_check_amount').attr("disabled", false);
                $('.cross_check_name').attr("disabled", false);
                $('.cross_check_date').attr("disabled", false);
                $('.cross_check_number').attr("disabled", false);
                $('.cross_check_bank').attr("disabled", false);
                $('.cross_check_branch').attr("disabled", false);
            }

        });
    });
</script>
@section('javascript')








@stop
