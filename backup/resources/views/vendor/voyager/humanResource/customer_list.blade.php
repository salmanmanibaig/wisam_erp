@extends('backEnd.master')
@section('mainContent')
@php

$modules = [];
    $module_links = [];
    $permissions = App\SmRolePermission::where('role_id', Auth::user()->role_id)->get();

 
    foreach($permissions as $permission){ @$module_links[] = @$permission->module_link_id; @$modules[] = @$permission->moduleLink->module_id;}

 
    $modules = array_unique(@$modules);

@endphp
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.customer_list')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.human_resource')</a>
                <a href="#">@lang('lang.customer_list')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6"> 
            </div>
            @if(in_array(144, @$module_links) || Auth::user()->role_id == 1)
            <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                <a href="{{url('add-customer')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('lang.add_customer')
                </a>
            </div>
            @endif
        </div> 
        <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0">@lang('lang.customer_list')</h3>
                            </div>
                        </div>
                    </div>

                 <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="display school-table pl-2" cellspacing="0" width="100%">
                                <thead>
                                    @if(session()->has('message-success'))
                                    <tr>
                                        <td colspan="9"> 
                                            <div class="alert alert-success">{{ session()->get('message-success') }}</div>
                                              @elseif(session()->has('message-danger'))
                                              <div class="alert alert-danger">
                                                  {{ session()->get('message-danger') }}
                                              </div>
                                        </td>
                                    </tr>                  
                                    @endif
                                    <tr>
                                        <th>@lang('lang.sl') @lang('lang.no')</th>
                                        <th>@lang('lang.photo')</th>
                                        <th>@lang('lang.name')</th>  
                                        <th>@lang('lang.mobile')</th>
                                        <th>@lang('lang.email')</th>
                                        <th>@lang('lang.current_address')</th>
                                        <th>@lang('lang.bank_details')</th>
                                        <th>@lang('lang.online_payment_details')</th>
                                        <th>@lang('lang.action')</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $serialcount=1; @endphp
                                    @foreach($staffs as $value)
                                    <tr>
                                        <td>{{@$serialcount++}}</td>
                                        <td>

                                            <img height="100" width="100" src="{{ file_exists(@$value->staff_photo) ? asset($value->staff_photo) : asset('public/uploads/staff/demo/staff.png') }}" alt="">
                                        </td>
                                        <td>
                                            <b>{{@$value->first_name}}&nbsp;{{@$value->last_name}}</b><br>
                                            {{$value->designations !=""?@$value->designations->title.',':""}}<br>
                                            Dept. of {{@$value->departments !=""?@$value->departments->name.',':""}}<br>
                                            {{@$value->company_name !=""?@$value->company_name:""}}<br>

                                        </td>  
                                        <td>
                                            {{@$value->mobile}}<br>
                                            {{@$value->emergency_mobile}} 
                                            

                                        </td>
                                        <td>{{@$value->email}}</td>
                                        <td>{{@$value->current_address}}</td>
                                        <td>
                                            @if(!empty(@$value->bank_account_name))
                                            <b>Bank Ac Name:   </b> {{@$value->bank_account_name}} <br> 
                                            @endif
                                            @if(!empty(@$value->bank_account_no))
                                            <b>Bank Ac No:     </b> {{@$value->bank_account_no}} <br> 
                                            @endif
                                            @if(!empty(@$value->bank_name))
                                            <b>Bank Name:  </b> {{@$value->bank_name}} <br> 
                                            @endif
                                            @if(!empty(@$value->bank_brach))
                                            <b>Bank Branch:    </b> {{@$value->bank_brach}} <br> 
                                            @endif

                                        </td>
 


                                        <td>
                                            @if(!empty(@$value->paypal_account))
                                            <b>PayPal :  </b> {{@$value->paypal_account}} <br> 
                                            @endif
                                            @if(!empty($value->payoneer_account))
                                            <b>Payoneer :</b>   {{@$value->payoneer_account}} <br> 
                                            @endif
                                            @if(!empty($value->skrill_account))
                                            <b>Skrill :  </b> {{@$value->skrill_account}} <br> 
                                            @endif

                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                    @lang('lang.select')
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @if(in_array(147, @$module_links) || Auth::user()->role_id == 1)
                                                    <a class="dropdown-item" href="{{url('view-customer')}}/{{@$value->id}}">@lang('lang.view')</a>
                                                    @endif
                                                    @if(in_array(145, @$module_links) || Auth::user()->role_id == 1)

                                                    <a class="dropdown-item" href="{{url('customer-edit', $value->id)}}">@lang('lang.edit')</a>
                                                    @endif
                                                    @if(in_array(146, @$module_links) || Auth::user()->role_id == 1)

                                                    <a class="dropdown-item" data-toggle="modal" data-target="#deleteClassModal{{@$value->id}}"  href="">@lang('lang.delete')</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade admin-query" id="deleteClassModal{{@$value->id}}" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">@lang('lang.delete') @lang('lang.customer')</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4>@lang('lang.are_you_sure_to_delete')</h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                                                    <a href="{{url('delete/customer', [@$value->id])}}" class="text-light">
                                                    <button class="primary-btn fix-gr-bg" type="submit">@lang('lang.delete')</button>
                                                     </a>
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
