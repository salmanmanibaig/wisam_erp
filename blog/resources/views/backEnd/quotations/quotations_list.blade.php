@extends('backEnd.master')
@section('mainContent')

<?php  
    $generalSetting=App\SmGeneralSettings::where('id',1)->first();
    $currency_symbol = $generalSetting->currency_symbol;

    $modules = [];
    $module_links = [];
    $permissions = App\SmRolePermission::where('role_id', Auth::user()->role_id)->get();

    foreach($permissions as $permission){ @$module_links[] = @$permission->module_link_id; @$modules[] = @$permission->moduleLink->module_id;}

    $modules = array_unique(@$modules);
?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.quotations')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="{{url('quotations')}}" class="active">@lang('lang.quotations')</a> 
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        
        @if(in_array(355, @$module_links) || Auth::user()->role_id == 1)
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{url('quotations/create')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('lang.add')  @lang('lang.new')
                </a>
            </div>
        </div>
        @endif
        
        <div class="row">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">@lang('lang.quotations') </h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        
                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                               @if(session()->has('message-success') != "" ||
                                session()->get('message-danger') != "")
                                <tr>
                                    <td colspan="11">
                                         @if(session()->has('message-success'))
                                          <div class="alert alert-success">
                                              {{ session()->get('message-success') }}
                                          </div>
                                        @elseif(session()->has('message-danger'))
                                          <div class="alert alert-danger">
                                              {{ session()->get('message-danger') }}
                                          </div>
                                        @endif
                                    </td>
                                </tr>
                                 @endif 
                                <tr>
                                    <th>@lang('lang.sl') </th>
                                    <th>@lang('lang.title')</th>
                                    <th>@lang('lang.number')</th>
                                    <th>@lang('lang.reference')</th>
                                    <th>@lang('lang.date')</th>
                                    <th>@lang('lang.customer') @lang('lang.name')</th>
                                    <th>@lang('lang.vendor') @lang('lang.name')</th>
                                    <th>@lang('lang.payment') @lang('lang.status')</th>
                                    <th>@lang('lang.amount') ({{@$currency_symbol}})</th> 
                                    <th>@lang('lang.status')</th>
                                    <th>@lang('lang.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count =1; @endphp
                                @foreach($quotations as $value)
                                <tr>
                                    <td >{{@$count++}}</td>
                                    <td >{{@$value->title}}</td>
                                    <td >{{@$value->number}}</td>
                                    <td >{{@$value->reference}}</td> 
                                    <td >{{date('jS M, Y', strtotime(@$value->date))}}</td>
                                    <td >{{@$value->customer_name}}</td> 
                                    <td >{{@$value->vendor_name}}</td> 
                                    <td >{{@$value->payment_status}}</td>  
                                    <td >{{App\User::NumberToBangladeshiTakaFormat(@$value->amount)}}</td>  
                                    <td> <b>-</b>  </td> 
                                    <td >
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                @lang('lang.select')
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"> 
                                                @if(in_array(359, @$module_links) || Auth::user()->role_id == 1)
                                                <a class="dropdown-item" href="{{url('quotations', [@$value->id])}}">@lang('lang.view')</a>
                                                @endif
                                                @if(in_array(358, @$module_links) || Auth::user()->role_id == 1)
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deletequotations{{@$value->id}}"  href="#">@lang('lang.delete') </a> 
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                  <div class="modal fade admin-query" id="deletequotations{{@$value->id}}" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">@lang('lang.delete') @lang('lang.quotations')</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4>@lang('lang.are_you_sure_to_delete')</h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                        <button type="button" class="primary-btn tr-bg"
                                                                data-dismiss="modal">@lang('lang.cancel')
                                                        </button>

                                                        <a href="{{url('quotations/delete', [$value->id])}}"
                                                           class="primary-btn fix-gr-bg">@lang('lang.delete')</a>

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
</section>
@endsection
