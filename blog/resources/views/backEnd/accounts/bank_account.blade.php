@extends('voyager::master')




@section('page_header')




    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-double-right"></i>
                    Customer Purchase Orders
                </p>
                @if(Auth::user()->hasRole('admin') /*|| Auth::user()->hasRole('supply chain')*/)
                    <a href="{{url('admin/customer-purchase-orders/create')}}" class="btn btn-success btn-add-new">
                        <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
                    </a>
                @endif
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


        {{--@include('voyager::partials.bulk-delete')--}}

        {{--<a href="" class="btn btn-primary">--}}
        {{--<i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>--}}
        {{--</a>--}}

        {{--@include('voyager::multilingual.language-selector')--}}
    </div>
@stop
@section('content')
@php

    @$modules = [];
    @$module_links = [];
    @$permissions = App\SmRolePermission::where('role_id', Auth::user()->role_id)->get();


    foreach($permissions as $permission){ @$module_links[] = @$permission->module_link_id; @$modules[] = @$permission->moduleLink->module_id;}


    @$modules = array_unique(@$modules);



    @$generalSetting=App\SmGeneralSettings::where('id',1)->first();
    @$currency_symbol = @$generalSetting->currency_symbol;

    if(isset($generalSetting->logo)){  @$logo = @$generalSetting->logo;  }
    else{ @$logo = 'public/uploads/settings/logo.png'; }

@endphp


<section class="admin-visitor-area">
    <div class="page-content edit-add container-fluid">
        <div class="row">

            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="panel panel-bordered">
                    <div class="container-fluid p-0">
                        @if(in_array(68, @$module_links) || Auth::user()->role_id == 1)
                            @if(isset($bank_account))
                                <div class="row">
                                    <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                                        <a href="{{url('bank-account')}}" class="primary-btn small fix-gr-bg">
                                            <span class="ti-plus pr-2"></span>
                                            @lang('lang.add')
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endif
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="main-title">
                                            <h3 class="mb-30">@if(isset($bank_account))
                                                    @lang('lang.edit')
                                                @else
                                                    @lang('lang.add')
                                                @endif
                                                @lang('lang.bank_account')
                                            </h3>
                                        </div>
                                        @if(isset($bank_account))
                                            {{ Form::open(['class' => 'form-horizontal', 'files' => true,  'url' => 'bank-account/'.@$bank_account->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
                                        @else
                                            @if(in_array(68, @$module_links) || Auth::user()->role_id == 1)
                                                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'bank-account',
                                                'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                            @endif
                                        @endif
                                        <div class="white-box">
                                            <div class="add-visitor">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        @if(session()->has('message-success'))
                                                            <div class="alert alert-success">
                                                                {{ session()->get('message-success') }}
                                                            </div>
                                                        @elseif(session()->has('message-danger'))
                                                            <div class="alert alert-danger">
                                                                {{ session()->get('message-danger') }}
                                                            </div>
                                                        @endif
                                                        <div class="input-effect">
                                                            <input class="primary-input form-control{{ @$errors->has('account_name') ? ' is-invalid' : '' }}"
                                                                   type="text" name="account_name" autocomplete="off" value="{{isset($bank_account)? @$bank_account->account_name:''}}">
                                                            <input type="hidden" name="id" value="{{isset($add_income)? @$add_income->id: ''}}">
                                                            <label>@lang('lang.account_name') <span>*</span></label>
                                                            <span class="focus-border"></span>
                                                            @if (@$errors->has('account_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('account_name') }}</strong>
                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row  mt-40">
                                                    <div class="col-lg-12">

                                                        <div class="input-effect">
                                                            <input class="primary-input form-control{{ @$errors->has('account_no') ? ' is-invalid' : '' }}"
                                                                   type="text" name="account_no" autocomplete="off" value="{{isset($bank_account)? @$bank_account->account_no:''}}">
                                                            <label>  @lang('lang.account') @lang('lang.no_')<span></span></label>
                                                            <span class="focus-border"></span>
                                                            @if (@$errors->has('account_no'))
                                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('account_no') }}</strong>
                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row  mt-40">
                                                    <div class="col-lg-12">

                                                        <div class="input-effect">
                                                            <input class="primary-input form-control{{ @$errors->has('bank_name') ? ' is-invalid' : '' }}"
                                                                   type="text" name="bank_name" autocomplete="off" value="{{isset($bank_account)? @$bank_account->bank_name:''}}">
                                                            <label>@lang('lang.bank') @lang('lang.name')<span></span></label>
                                                            <span class="focus-border"></span>
                                                            @if (@$errors->has('bank_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('bank_name') }}</strong>
                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row  mt-40">
                                                    <div class="col-lg-12">

                                                        <div class="input-effect">
                                                            <input class="primary-input form-control{{ @$errors->has('opening_balance') ? ' is-invalid' : '' }}"
                                                                   type="number" name="opening_balance" autocomplete="off" value="{{isset($bank_account)? @$bank_account->opening_balance:''}}">
                                                            <label>@lang('lang.opening_balance')<span>*</span></label>
                                                            <span class="focus-border"></span>
                                                            @if (@$errors->has('opening_balance'))
                                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ @$errors->first('opening_balance') }}</strong>
                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-40">
                                                    <div class="col-lg-12">
                                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4"
                                                      name="note">{{isset($bank_account)? @$bank_account->note: ''}}</textarea>
                                                            <label>@lang('lang.note') <span></span></label>
                                                            <span class="focus-border textarea"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $tooltip = "";
                                                     if(in_array(68, @$module_links) ||  Auth::user()->role_id == 1){
                                                          $tooltip = "";
                                                      }else{
                                                          $tooltip = "You have no permission to add";
                                                      }
                                                @endphp
                                                <div class="row mt-40">
                                                    <div class="col-lg-12 text-center">
                                                        <button class="primary-btn fix-gr-bg" data-toggle="tooltip" title="{{@$tooltip}}">
                                                            <span class="ti-check"></span>
                                                            @if(isset($bank_account))
                                                                @lang('lang.update')
                                                            @else
                                                                @lang('lang.save')
                                                            @endif
                                                            @lang('lang.account')
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-4 no-gutters">
                                        <div class="main-title">
                                            <h3 class="mb-0">@lang('lang.account') @lang('lang.list')</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">

                                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                                            <thead>
                                            @if(session()->has('message-success-delete') != "" ||
                                            session()->get('message-danger-delete') != "")
                                                <tr>
                                                    <td colspan="6">
                                                        @if(session()->has('message-success-delete'))
                                                            <div class="alert alert-success">
                                                                {{ session()->get('message-success-delete') }}
                                                            </div>
                                                        @elseif(session()->has('message-danger-delete'))
                                                            <div class="alert alert-danger">
                                                                {{ session()->get('message-danger-delete') }}
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>@lang('lang.account_name')</th>
                                                <th>@lang('lang.account') @lang('lang.no')</th>
                                                <th>@lang('lang.bank_name')</th>
                                                <th>@lang('lang.balance') ({{@$currency_symbol}})</th>
                                                <th>@lang('lang.note')</th>
                                                <th>@lang('lang.action')</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @foreach($bank_accounts as $bank_account)

                                                <tr>
                                                    <td>{{@$bank_account->account_name}}</td>
                                                    <td>{{@$bank_account->account_no}}</td>
                                                    <td>{{@$bank_account->bank_name}}</td>
                                                    <td>
                                                        @php

                                                            @$balance = App\SmBankAccount::bankBalance(@$bank_account->id);


                                                        @endphp


                                                        {{App\User::NumberToBangladeshiTakaFormat(@$balance)}}

                                                    </td>
                                                    <td>{{@$bank_account->note}}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                                @lang('lang.select')
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                @if(in_array(69, @$module_links) || Auth::user()->role_id == 1)
                                                                    <a class="dropdown-item" href="{{url('bank-account', [@$bank_account->id])}}">@lang('lang.edit')</a>
                                                                @endif
                                                                <a class="dropdown-item" href="{{url('petty-cash-view', [@$bank_account->id])}}">@lang('lang.view')</a>
                                                                @if(in_array(70, @$module_links) || Auth::user()->role_id == 1)

                                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteBankAccountModal{{@$bank_account->id}}"
                                                                       href="#">@lang('lang.delete')</a>

                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div class="modal fade admin-query" id="deleteBankAccountModal{{@$bank_account->id}}" >
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">@lang('lang.delete') @lang('lang.bank_account')</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                    <h4>@lang('lang.are_you_sure_to_delete')</h4>
                                                                </div>

                                                                <div class="mt-40 d-flex justify-content-between">
                                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                                                                    {{ Form::open(['url' => 'bank-account/'.@$bank_account->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) }}
                                                                    <button class="primary-btn fix-gr-bg" type="submit">@lang('lang.delete')</button>
                                                                    {{ Form::close() }}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
                </div>
                </div>



</section>
@endsection
