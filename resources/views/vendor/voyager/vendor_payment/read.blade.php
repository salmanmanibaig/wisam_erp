@extends('voyager::master')
@php  $SupplyRequisition=App\VendorPurchaseOrder::first(); @endphp

@can('read',$SupplyRequisition)


@section('page_header')
    <h1 class="page-title">
        <i class=""></i> {{ __('voyager::generic.viewing') }}

{{--        <a href="{{url('admin/customers/'.$customer->id.'/edit')}}" class="btn btn-info customBtn">--}}
{{--            <span class="glyphicon glyphicon-pencil"></span>&nbsp;--}}
{{--            {{ __('voyager::generic.edit') }}--}}
{{--        </a>--}}


        {{--<a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger customBtn" data-id="" id="">--}}
        {{--<i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>--}}
        {{--</a>--}}


        <a href="{{url('admin/product')}}" class="btn btn-warning customBtn">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </h1>

@stop
{{--{{dd($vendor->vendor)}}--}}
@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:0px;">
                    <!-- form start -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">
                            Vendor First Name
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{@$vendor->vendor->f_name}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                    <hr style="margin:0;">
                </div>
                <div class="panel panel-bordered" style="padding-bottom:0px;">
                    <!-- form start -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">
                            Vendor Last Name
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{@$vendor->vendor->l_name}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                    <hr style="margin:0;">
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Vendor Phone NO
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{@$vendor->vendor->phone_no}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Amount
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{@$vendor->amount}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                @if(@$vendor->third_party_payment_type)
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                           Third Party Payment
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{@$vendor->third_party_payment_type}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                @endif
                @if(@$vendor->payment_type)
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                          Payment Type
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{@$vendor->payment_type}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                @endif
                @if(@$vendor->checkbook_no_id)
                    <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                        <!--form start -->
                        <div class="panel-heading" style="border-bottom: 0">
                            <h3 class="panel-title">
                                CheckBook Number
                            </h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            {{@$vendor->checkbook_no_id}}
                            <br/>
                            <p></p>
                        </div><!-- panel-body -->
                    </div>
                @endif
                @if(@$vendor->checkdetail_no_id)
                    <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                        <!--form start -->
                        <div class="panel-heading" style="border-bottom: 0">
                            <h3 class="panel-title">
                                Check Number
                            </h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            {{@$vendor->checkdetail_no_id}}
                            <br/>
                            <p></p>
                        </div><!-- panel-body -->
                    </div>
                @endif
                @if(@$vendor->vendor_account_no)
                    <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                        <!--form start -->
                        <div class="panel-heading" style="border-bottom: 0">
                            <h3 class="panel-title">
                                Account Number
                            </h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            {{@$vendor->vendor_account_no}}
                            <br/>
                            <p></p>
                        </div><!-- panel-body -->
                    </div>
                @endif
                @if(@$vendor->vendor_account_title)
                    <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                        <!--form start -->
                        <div class="panel-heading" style="border-bottom: 0">
                            <h3 class="panel-title">
                                Account Title
                            </h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            {{@$vendor->vendor_account_title}}
                            <br/>
                            <p></p>
                        </div><!-- panel-body -->
                    </div>
                @endif
                @if(@$vendor->bank_name)
                    <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                        <!--form start -->
                        <div class="panel-heading" style="border-bottom: 0">
                            <h3 class="panel-title">
                                Bank Name
                            </h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            {{@$vendor->bank_name}}
                            <br/>
                            <p></p>
                        </div><!-- panel-body -->
                    </div>
                @endif
                @if(@$vendor->branch_code)
                    <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                        <!--form start -->
                        <div class="panel-heading" style="border-bottom: 0">
                            <h3 class="panel-title">
                                Branch Code
                            </h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            {{@$vendor->branch_code}}
                            <br/>
                            <p></p>
                        </div><!-- panel-body -->
                    </div>
                @endif
                @if(@$vendor->bank_address)
                    <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                        <!--form start -->
                        <div class="panel-heading" style="border-bottom: 0">
                            <h3 class="panel-title">
                                Bank Address
                            </h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                            {{@$vendor->bank_address}}
                            <br/>
                            <p></p>
                        </div><!-- panel-body -->
                    </div>
                @endif
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                           Proof
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <img src="{{ asset('images/onlinetransfer/'.$vendor->proof) }}" class="img-responsive" style="width:15%;height: auto;" alt="This Data Not Contain Image" />
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Country
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{@$vendor->payment->country}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} ">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan

@section('javascript')

    <script>
        $(document).ready(function () {
            $('.side-body').multilingual();
        });
    </script>
    <script src="{{ voyager_asset('js/multilingual.js') }}"></script>

    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

    </script>
@stop
