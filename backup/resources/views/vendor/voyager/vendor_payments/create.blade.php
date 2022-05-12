@extends('voyager::master')

@php  $role_check=App\Supplier::first(); @endphp

{{--@can('read',$role_check)--}}

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">


            <div class="col-md-12" style="margin-bottom: 0px">
                <div class="col-md-6">
                    <p class="page-title">
                        <i class="fas fa-info-circle"></i>
                        Payment Detail
                    </p>

                </div>


            </div>



            <div class="col-md-6" style="margin-bottom: 0px">
                @if ($message = Session::get('info'))
                    <div class="alert alert-success alert-block" style="opacity: 0.7">
                        <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger alert-block" style="opacity: 0.7">
                        <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
        </div>


    </div>

    <style>
        .color{
            color: red;
        }.row>[class*=col-] {
             margin-bottom: 2px;
         }

    </style>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        {{--@include('voyager::alerts')--}}
        <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="panel panel-bordered">
                    <div class="panel-body">


                        <form action="{{url('admin/payment_data_enter')}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{--<input type="hidden" id="id" name="id" value="{{$del->id}}">--}}
                            <div class="col-md-12">

                                <div class="col-md-5">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Select Vendor<span class="color">*</span></label>
                                        <select class="form-control select2" required name="vendor_id">
                                            <option value="">Select One</option>
                                            @foreach($vendors as $vendor)
                                                <option value="{{$vendor->id}}">{{$vendor->f_name}}</option>
{{--                                           {{dd($vendor->id)}}--}}
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-7">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Payment Type:<span class="color"></span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label" for="cash">
                                                <input type="radio" class="form-check-input" required id="cash" name="payment_type" value="cash"> <b>Cash</b>&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>


                                            <label class="form-check-label" for="check">
                                                <input type="radio" class="form-check-input" id="check" name="payment_type" value="account"> <b>Bank Account</b>&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>

                                            <label class="form-check-label" for="thirdparty">
                                                <input type="radio" class="form-check-input" id="thirdparty" name="payment_type" value="thirdparty"> <b>Third Party Payment</b>&nbsp;&nbsp;&nbsp;&nbsp;
                                            </label>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr style="margin-top: 0px">
                                </div>

                                <div class="col-md-12" id="cashDiv" style="display: none;">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Enter Amount<span class="color"></span></label>
                                        <input type="number" id="cashinput"   class="form-control" name="amount">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name"> Date<span class="color">*</span></label>
                                            <input type="date"  class="form-control " id="cash_amount_date" name="date" placeholder="Enter Check Date">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" id="accountDiv" style="display: none;">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Select Account<span class="color">*</span></label>
                                        <select id="account" required class="form-control select2" name="account_id">
                                            <option>Select One</option>
                                            @foreach($accounts as $account)
                                                <option class="export_option" value="{{$account->id}}">{{$account->account_title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12" id="accountpaymenttypeDiv" style="display: none;">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Payment Type<span class="color">*</span></label>
                                        <select id="accountpaymenttype"  class="form-control select2" name="account_payment_type">
                                            <option value="">Select One</option>
                                            <option value="accountcheck">Check</option>
                                            <option value="accountonline">Online Transfer</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="accountchkDiv" style="display: none">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Select Check Book Number<span class="color">*</span></label>
                                            <select id="checks"  class="form-control select2 accountchkDiv_ed" name="checkbook_no_id">
                                                <option value="">Select One</option>
{{--                                                <option value="">745643</option>--}}

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Select Check Number<span class="color">*</span></label>
                                            <select id="check_details"  class="form-control select2 accountchkDiv_ed" name="checkdetail_no_id">
                                                @foreach($third_party_check_no as $check)
                                                <option value="">Select One</option>
                                                <option value="">{{$check->checkbook_no}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Check Amount<span class="color">*</span></label>
                                            <input type="number"  class="form-control accountchkDiv_ed" placeholder="Enter Check Amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Check Date<span class="color">*</span></label>
                                            <input type="date"  class="form-control accountchkDiv_ed" name="date" placeholder="Enter Check Date">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Attach Proof<span class="color"></span></label>
                                            <input type="file" accept="image/jpeg,image/jpg" class="form-control accountchkDiv_ed" name="proof">
                                        </div>
                                    </div>
                                </div>


                                <div id="accountonlineDiv" style="display: none">
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Vendor Account Number<span class="color">*</span></label>
                                           <input type="text"  class="form-control accountonlineDiv_ed" placeholder="Enter Vendor Account Number" name="vendor_account_number">
                                        </div>
                                    </div> <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Amount<span class="color">*</span></label>
                                            <input type="number"  class="form-control accountonlineDiv_ed" placeholder="Enter Amount" name="amount">
                                        </div>
                                    </div> <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Date<span class="color">*</span></label>
                                            <input type="date"  class="form-control accountonlineDiv_ed" name="date" placeholder="Enter Transaction Date">
                                        </div>
                                    </div> <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Attach Proof<span class="color">*</span></label>
                                            <input type="file"  accept="image/jpeg,image/jpg" class="form-control accountonlineDiv_ed" name="proof">
                                        </div>
                                    </div>
                                </div>

                                <div id="thirdpartyDiv"  style="display: none;">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="font-weight-bold" for="name">Select Third Party Payment Type:<span class="color"></span></label>
                                        <select id="thirdpartychktype" class="form-control select2 third_party_payment_type" name="third_party_payment_type">
                                            <option>Select One</option>
                                              <option value="check">{{'Check'}}</option>
                                              <option value="online">{{'Online Transfer'}}</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>

                               <div id="thirdpartychkDiv" style="display: none">
                                <div class="col-md-12" >
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Select Third Party Check:<span class="color"></span></label>
                                        <select id="accountinput"  class="form-control select2 thirdpartychkDiv_ed" name="third_party_id">
                                            <option value="">Select One</option>
                                            <option value="secondoption">Add Third Party Check</option>
{{--                                            @foreach($thirdpartychks as $thirdpartychk)--}}
{{--                                                <option value="{{$thirdpartychk->id}}">{{$thirdpartychk->check_no}}</option>--}}
{{--                                                @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                               </div>


                                <div id="thirdpartyonlinetransferDiv" style="display: none">
                                <div class="col-md-12" >
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Online Transfer:<span class="color"></span></label>
                                        <select id="onlinetransfer"  class="form-control select2 thirdpartyonlinetransferDiv_ed" name="third_party_id">
                                            <option value="">Select One</option>
                                            <option value="secondoptiononline">Add Online Transfer Detail</option>
{{--                                            @foreach($onlinetransfers as $onlinetransfer)--}}
{{--                                                <option value="{{$onlinetransfer->id}}">{{$onlinetransfer->check_no}}</option>--}}
{{--                                            @endforeach--}}
                                        </select>
                                    </div>
                                </div>
                               </div>



                                <div class="col-md-12">
                                    <div class="form-group" >

{{--                                        @foreach($payment->payment_image as $image)--}}

{{--                                            <img height="100" width="80" id="1" data-toggle="modal" data-target="#myModal" src='{{$image->image_url}}' alt='Text dollar code part one.' />--}}
{{--                                        @endforeach--}}
{{--                                        <div id="myModal" class="modal fade" role="dialog">--}}
{{--                                            <div class="modal-dialog">--}}
{{--                                                <div class="modal-content">--}}
{{--                                                    <div class="modal-body">--}}
{{--                                                        <img class="img-responsive" src="" />--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-footer">--}}
{{--                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}


                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>

{{--==========================================modal check start==============================================        --}}
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Enter Third Party Check</h4>
                                    </div>
                                    <form action="{{url('admin/thirdpartycheck')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="thirdpartyPaymentType" value="check">
                                                        <label class="font-weight-bold">Select Vendor<span>*</span></label>
                                                        <select class="form-control select2" name="vendor_id">
                                                            <option value="">Select One</option>
                                                            @foreach($vendors as $vendor)
                                                                <option value="{{$vendor->id}}">{{$vendor->f_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Enter Check No<span class="color">*</span></label>
                                                        <input type="text"  class="form-control" name="check_no" placeholder="Enter Check Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Check type<span class="color">*</span></label>
                                                        <select class="form-control select2" name="check_type" required>
                                                            <option>Select One</option>
                                                            <option value="cross">Cross</option>
                                                            <option value="cash">Cash</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Enter Bank Name<span class="color">*</span></label>
                                                        <input type="text"  class="form-control" name="bank_name" placeholder="Enter Bank Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Enter Amount<span class="color">*</span></label>
                                                        <input type="number"  class="form-control" name="amount" placeholder="Enter Amount">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Select Date<span class="color">*</span></label>
                                                        <input type="date"  class="form-control" name="date" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Enter Branch Code<span class="color">*</span></label>
                                                        <input type="number"  class="form-control" name="branch_code" placeholder="Enter Branch Code">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Enter Bank Address<span></span></label>
                                                        <input type="text" class="form-control" name="bank_address" placeholder="Enter Bank Address">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Enter Check Image<span class="color"></span></label>
                                                        <input type="file"  class="form-control" accept="image/jpeg,image/jpg" name="chk_image">
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
{{--===================================================moadl end=========================================--}}
                        {{--==========================================modal online transfer start==============================================        --}}
                        <div class="modal fade" id="myModalonline" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Enter Online Transfer Detail</h4>
                                    </div>
                                    <form action="{{url('admin/thirdpartycheck')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="thirdpartyPaymentType" value="online">
                                                        <label class="font-weight-bold">Payment From<span>*</span></label>
                                                        <select class="form-control select2" required name="vendor_id">
                                                            <option value="">Select One</option>
                                                            @foreach($vendors as $vendor)
                                                                <option value="{{$vendor->id}}">{{$vendor->f_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Select Vendor<span class="color">*</span></label>
                                                        <input type="text"  class="form-control" name="vendor_account_no" placeholder="Enter Vendor Account Number">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Enter Account Title<span class="color">*</span></label>
                                                        <input type="text"  class="form-control" name="vendor_account_title" placeholder="Enter Vendor Account Title">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Enter Amount<span class="color">*</span></label>
                                                        <input type="number"  class="form-control" name="amount" placeholder="Enter Amount">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Select Date<span class="color">*</span></label>
                                                        <input type="date"  class="form-control" name="date" >
                                                    </div>
                                                </div>



                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Attach Document<span class="color"></span></label>
                                                        <input type="file"  class="form-control" accept="image/jpeg,image/jpg" name="chk_image">
                                                    </div>
                                                </div>



                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
{{--===================================================moadl end=========================================--}}

                    </div>
                </div>
            </div>
        </div>
    </div>

{{--@stop--}}
@endsection

{{--@else--}}
{{--    @include('vendor.voyager.errors.authenticate_error')--}}

{{--@endcan--}}

@section('javascript')


    <script>
        $('#payment').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var number = button.data('number') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes

            var modal = $(this)
            modal.find('.modal-title').text('Are you sure you want to Approve this Payment#  ' + number + '')
            modal.find('.modal-body #payment_id').val(id)
        })


    </script>
    <script>

        $(document).ready(function () {
            $('#myModal').on('show.bs.modal', function (e) {
                var image = $(e.relatedTarget).attr('src');
                $(".img-responsive").attr("src", image);
            });
        });


        $('#payment_disapprove').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var number = button.data('number') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes

            var modal = $(this)
            modal.find('.modal-title').text('Are you sure you want to DisApprove this Payment#  ' + number + '')
            modal.find('.modal-body #payment_id').val(id)
        })


    </script>
    <script>
        $(document). ready(function(){
            $("input[name='payment_type']"). click(function() {
                var radioValue = $("input[name='payment_type']:checked").val();
                if (radioValue == 'cash') {
                    $('#cashDiv').show();
                    $('#cashinput').prop('disabled',false);
                    $('#cash_amount_date').prop('disabled',false);

                    $('#accountDiv').hide();
                    $('#thirdpartyDiv').hide();
                    $('#thirdpartychkDiv').hide();
                    $('#thirdpartyonlinetransferDiv').hide();
                    $('#accountpaymenttypeDiv').hide();
                    $('#accountonlineDiv').hide();
                    $('#accountchkDiv').hide();
                    $('#account').prop('disabled',true);
                    $('.thirdpartyonlinetransferDiv_ed').prop('disabled',true);
                    $('.accountonlineDiv_ed').prop('disabled',true);
                    $('.accountchkDiv_ed').prop('disabled',true);
                    $('.thirdpartychkDiv_ed').prop('disabled',true);
                    $('.third_party_payment_type').prop('disabled',true);
                    $('#accountinput').prop('disabled',true);
                    $('#proofinput').prop('disabled',true);
                }else if(radioValue == 'account')
                {
                    $('#accountDiv').show();
                    $('#account').prop('disabled',false);
                    //
                    $('#cashDiv').hide();
                    $('#thirdpartyDiv').hide();
                    $('#thirdpartychkDiv').hide();
                    $('#thirdpartyonlinetransferDiv').hide();
                    $('#cashinput').prop('disabled',true);
                    $('#accountinput').prop('disabled',true);
                    $('.third_party_payment_type').prop('disabled',true);
                    $('#proofinput').prop('disabled',true);
                }else if(radioValue == 'thirdparty')
                {
                    $('#thirdpartyDiv').show();
                    $('#accountinput').prop('disabled',false);
                    $('#proofinput').prop('disabled',false);
                    $('#proofinput').prop('disabled',false);
                    //
                    $('#accountDiv').hide();
                    $('#accountpaymenttypeDiv').hide();
                    $('#cashDiv').hide();
                    $('#accountchkDiv').hide();
                    $('#account').prop('disabled',true);
                    $('#cashinput').prop('disabled',true);
                    $('.third_party_payment_type').prop('disabled',false);
                    $('.accountchkDiv_ed').prop('disabled',true);
                    $('.accountonlineDiv_ed').prop('disabled',true);
                }
            });
            });

        $('#accountinput').on("change",function() {
            var opval = $(this).val();
            if(opval=="secondoption"){
                $('#myModal').modal("show");
            }
        });
        $('#onlinetransfer').on("change",function() {
            var opval = $(this).val();
            if(opval=="secondoptiononline"){
                $('#myModalonline').modal("show");
            }
        });



        $('#thirdpartychktype').on("change",function() {
            var opval = $(this).val();
            if(opval=="check"){
                $('#thirdpartychkDiv').show();
                $('.thirdpartychkDiv_ed').prop('disabled',false);
                $('#thirdpartyonlinetransferDiv').hide();
                $('.thirdpartyonlinetransferDiv_ed').prop('disabled',true);
            }else if(opval=="online") {
                $('#thirdpartychkDiv').hide();
                $('.thirdpartychkDiv_ed').prop('disabled',true);
                $('#thirdpartyonlinetransferDiv').show();
                $('.thirdpartyonlinetransferDiv_ed').prop('disabled',false);
            }else
            {
                $('#thirdpartychkDiv').hide();
                $('#thirdpartyonlinetransferDiv').hide();
            }
        });


        $('#account').on("change",function() {
            var opval = $(this).val();
            if(opval) {
                $('#accountpaymenttypeDiv').show();
                // $('.thirdpartychkDiv_ed').prop('disabled',false);
                // $('#thirdpartyonlinetransferDiv').hide();
                // $('.thirdpartyonlinetransferDiv_ed').prop('disabled',true);
            }
        });

        $('#accountpaymenttype').on("change",function() {
            var opval = $(this).val();
            if(opval == 'accountcheck') {
                $('#accountchkDiv').show();
                $('#accountonlineDiv').hide();
                $('.thirdpartychkDiv_ed').prop('disabled',true);
                $('.accountchkDiv_ed').prop('disabled',false);
                $('.accountonlineDiv_ed').prop('disabled',true);
                $('.thirdpartyonlinetransferDiv_ed').prop('disabled',true);
            }else if(opval == 'accountonline')
            {
                $('#accountonlineDiv').show();
                $('#accountchkDiv').hide();
                $('.thirdpartychkDiv_ed').prop('disabled',true);
                $('.accountchkDiv_ed').prop('disabled',true);
                $('.accountonlineDiv_ed').prop('disabled',false);
                $('.thirdpartyonlinetransferDiv_ed').prop('disabled',true);
            }
        });
        $('#account').on("change ",function() {

            var account_id = $("#account").val();
            // console.log(account_id)
            $.ajax({



                url:'/admin/vendor-payments/checks/'+account_id,
                type: "GET",
                dataType: "json",
                success: function(data){

                    console.log(data)

                    // var opts = $.parseJSON(data);
                    $("#checks option").remove();
                    $("#check_details option").remove();
                    $('#checks').append('<option value="">Select here</option>');
                    // $.each(data, function(i, d) {
                    for (var i=0; i<data.length; i++) {
                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                        //        alert(d);
                        $('#checks').append('<option value="' + data[i].id + '">CheckBook-' + data[i].checkbook_num + '</option>');

                    }
                    // });
                    // for (var i=0; i<data.length; i++) {
                    //     sel.append('<option value="' + data[i].id + '">' + data[i].desc + '</option>');
                    // }

                }


            });

        });

        $('#checks').on("change ",function() {

            var checkbook_id = $("#checks").val();
            console.log(checkbook_id)
            $.ajax({



                url:'/admin/vendor-payments/check_details/'+checkbook_id,
                type: "GET",
                dataType: "json",
                success: function(data){

                    console.log(data)

                    // var opts = $.parseJSON(data);
                    $("#check_details option").remove();
                    $('#check_details').append('<option value="">Select here</option>');
                    // $.each(data, function(i, d) {
                    for (var i=0; i<data.length; i++) {
                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                        //        alert(d);
                        $('#check_details').append('<option value="' + data[i].id + '">'+ data[i].check_prefix +'-' + data[i].checkbook_no + '</option>');

                    }
                    // });
                    // for (var i=0; i<data.length; i++) {
                    //     sel.append('<option value="' + data[i].id + '">' + data[i].desc + '</option>');
                    // }

                }


            });

        });
    </script>
@stop
