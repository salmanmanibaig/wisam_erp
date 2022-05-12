@extends('voyager::master')
{{--@php  $role_check=App\Vendor::first(); @endphp--}}
{{--@can('read',$role_check)--}}
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }
        .mb_7{
            margin-bottom: 7px;
        }
        .pl_4{
            padding-left: 4px;
        }
        .pl_0{
            padding-left: 0px;
        }
        .pr_4{
            padding-right: 4px;
        }
        .pr_0{
            padding-right: 0px;
        }
        .form-control{
            border: 1px solid #ccc;
        }
    </style>
@stop



@section('page_header')

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title" style="margin-left: 10%;">
                    <i class="voyager-eye"></i>
                    View Vendor
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

                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-6 pr_0">
                                            <div class="col-md-6 pr_4">
                                                <div class="form-group " >
                                                    <label class="font-weight-bold" for="name">First Name<span class="color">*</span></label>
{{--                                                    {{dd($vendor)}}--}}
                                                    <input type="text" readonly required class="form-control" value="{{$vendor->f_name}}" name="f_name" placeholder="Enter First Name">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl_4">
                                                <div class="form-group " >
                                                    <label class="font-weight-bold" for="name">Last Name<span class="color">*</span></label>
                                                    <input type="text" readonly required class="form-control" value="{{$vendor->l_name}}" name="l_name" placeholder="Enter Last Name">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Company<span class="color">*</span></label>
                                                    <input type="text" readonly required class="form-control" value="{{$vendor->vendor_company}}" name="vendor_company" placeholder="Enter Company Name">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group mb_7" >
                                                    <label class="font-weight-bold" for="name">Address<span class="color">*</span></label>
                                                    <textarea type="text" readonly required class="form-control" name="street" placeholder="Enter Street">{{$vendor->street}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr_4">
                                                <div class="form-group mb_7" >

                                                    <input type="text" readonly required class="form-control" value="{{$vendor->city}}" name="city" placeholder="City/Town">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl_4">
                                                <div class="form-group mb_7" >

                                                    <input type="text" readonly required class="form-control" name="state" value="{{$vendor->state}}" placeholder="State/Province">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr_4">
                                                <div class="form-group mb_7" >

                                                    <input type="text" readonly required class="form-control" name="postal_name" value="{{$vendor->postal_name}}" placeholder="Postal Code">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pl_4">
                                                <div class="form-group mb_7" >

                                                    <input type="text" readonly required class="form-control" name="country" value="{{$vendor->country}}" placeholder="Country">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Note</label>
                                                    <textarea type="text" readonly class="form-control" rows="4" name="note">{{$vendor->note}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Attachment<span class="color">*</span></label>
                                                     <img class="img-responsive" src="{{asset('images/vendor_profile/'.$vendor->attachment)}}" style="width:150px;">
                                                </div>
                                            </div>



                                        </div>


                                        {{--=======================================================Second half==============================================--}}
                                        <div class="col-md-6 pl_0">

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Email</label>
                                                    <input type="email" readonly  class="form-control" name="email" value="{{$vendor->email}}" placeholder="Enter Email">
                                                </div>
                                            </div>

                                            <div class="col-md-4 pr_4">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Phone</label>
                                                    <input type="number" readonly class="form-control"  name="phone_no" value="{{$vendor->phone_no}}" placeholder="Enter Phone No">
                                                </div>
                                            </div>

                                            <div class="col-md-4 pl_4 pr_4">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Mobile<span class="color">*</span></label>
                                                    <input type="number" readonly required class="form-control" name="mobile_no" value="{{$vendor->mobile_no}}" placeholder="Enter Mobile No">
                                                </div>
                                            </div>


                                            <div class="col-md-4 pl_4">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Fax</label>
                                                    <input type="number" readonly name="fax_no" value="{{$vendor->fax_no}}" class="form-control" placeholder="Enter Fax No">
                                                </div>
                                            </div>

                                            <div class="col-md-4 pr_4">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Other</label>
                                                    <input type="text" readonly name="others" value="{{$vendor->others}}" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="col-md-8 pl_4">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Website</label>
                                                    <input type="text" readonly name="web_link" value="{{$vendor->web_link}}" class="form-control" >
                                                </div>
                                            </div>


                                            <div class="col-md-8">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Terms</label>
                                                    <input type="text" readonly name="terms" class="form-control" value="{{$vendor->terms}}" >
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr_4">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Opening balance<span class="color">*</span></label>
                                                    <input type="number" readonly required name="opening_balance" value="{{$vendor->opening_balance}}" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="col-md-5 pl_4">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">as of<span class="color">*</span></label>
                                                    <input type="date" readonly name="as_of" class="form-control" value="{{$vendor->as_of}}" >
                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Account no.<span class="color">*</span></label>
                                                    <input type="number" readonly name="account_no" value="{{$vendor->account_no}}" class="form-control" >
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Business ID No.<span class="color">*</span></label>
                                                    <input type="number" readonly name="business_id" value="{{$vendor->business_id}}" class="form-control" >
                                                </div>
                                            </div>




                                        </div>









                                    </div>
                                    {{-- <h2>Accommodation</h2> --}}
                                </div><!-- panel-body -->



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
{{--                @else--}}
{{--                    @include('vendor.voyager.errors.authenticate_error')--}}

{{--                @endcan--}}
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





@stop
