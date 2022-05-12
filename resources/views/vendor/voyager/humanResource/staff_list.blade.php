@extends('backEnd.master')
@section('mainContent')
<link rel="stylesheet" href="{{ asset('/public/css/staff_list.css') }}">
@php
    $generalSetting=App\SmGeneralSettings::where('id',1)->first();
    $currency_symbol = @$generalSetting->currency_symbol; 


    $modules = [];
    $module_links = [];
    $permissions = App\SmRolePermission::where('role_id', Auth::user()->role_id)->get();

 
    foreach($permissions as $permission){ @$module_links[] = @$permission->module_link_id; @$modules[] = @$permission->moduleLink->module_id;}

 
    $modules = array_unique(@$modules);

@endphp
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.staff_list')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.human_resource')</a>
                <a href="#">@lang('lang.staff_list')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30">@lang('lang.select_criteria') </h3>
                </div>
            </div>
            @if(in_array(86, @$module_links) ||  Auth::user()->role_id == 1)
            <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg">
                <a href="{{route('addStaff')}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('lang.add_staff')
                </a>
            </div>
            @endif

        </div>
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
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'searchStaff', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        <div class="row">
                            <div class="col-lg-4">
                              <select class="niceSelect w-100 bb form-control" name="role_id" id="role_id">
                                    <option data-display="Role" value=""> @lang('lang.select') </option>
                                    @foreach($roles as $key=>$value)
                                    <option value="{{@$value->id}}">{{@$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-4 mt-30-md">
                               <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input" type="text" placeholder=" @lang('lang.search_by_staff_id')" name="staff_no">
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                           </div>
                            <div class="col-lg-4 mt-30-md">
                               <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input" type="text" placeholder="@lang('lang.search_by_name')" name="staff_name">
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                           </div>
                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search pr-2"></span>
                                @lang('lang.search')
                            </button>
                        </div>
                    </div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
 <div class="row mt-40">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-0">@lang('lang.staff_list')</h3>
                    </div>
                </div>
            </div>

         <div class="row">
                <div class="col-lg-12">
                    <table id="table_id" class="display school-table pl-2" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>@lang('lang.staff') @lang('lang.no')</th>
                                <th>@lang('lang.name')</th>
                                <th>@lang('lang.role')</th>
                                <th>@lang('lang.department')</th>
                                <th>@lang('lang.description')</th>
                                <th>@lang('lang.mobile')</th>
                                <th>@lang('lang.email')</th>
                                <th>@lang('lang.status')</th>
                                <th>@lang('lang.action')</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($staffs as $value)
                            <tr id="{{$value->id}}">
                                <td>{{ __('wisam') }}{{sprintf("%03d", @$value->staff_no)}} </td>
                                <td>{{@$value->first_name}}&nbsp;{{@$value->last_name}}</td>
                                <td>{{!empty(@$value->roles->name)?@$value->roles->name:''}}</td>
                                <td>{{@$value->departments !=""?@$value->departments->name:""}}</td>
                                <td>{{@$value->designations !=""?@$value->designations->title:""}}</td>
                                <td>{{@$value->mobile}}</td>
                                <td>{{@$value->email}}</td>

                                <td>
                                            <label class="switch">
                                              <input type="checkbox" class="switch-input" {{@$value->active_status == 0? '':'checked'}}>
                                              <span class="slider round"></span>
                                            </label>
                                        </td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            @lang('lang.select')
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @if(in_array(332, @$module_links) ||  Auth::user()->role_id == 1)
                                            <a class="dropdown-item" href="{{route('viewStaff', @$value->id)}}">@lang('lang.view')</a>
                                            @endif 
                                            @if(in_array(87, @$module_links) ||  Auth::user()->role_id == 1)
                                            <a class="dropdown-item" href="{{route('editStaff', @$value->id)}}">@lang('lang.edit')</a>
                                            @endif 
                                            @if($value->id != 1)
                                            @if(in_array(88, @$module_links) ||  Auth::user()->role_id == 1)
                                            <a class="dropdown-item modalLink" title="Delete Staff" data-modal-size="modal-md" href="{{route('deleteStaffView', @$value->id)}}">@lang('lang.delete')</a>

                                            @endif 
                                            @endif 
                                        </div>
                                    </div>
                                </td>
                            </tr>
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
