@extends('backEnd.master')
@section('mainContent')
@php
    $modules = [];
    $module_links = [];
    $permissions = App\SmRolePermission::where('role_id', Auth::user()->role_id)->get();


    foreach($permissions as $permission){ $module_links[] = $permission->module_link_id; $modules[] = @$permission->moduleLink->module_id;}


    $modules = array_unique($modules);
@endphp
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.general_settings')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.system_settings')</a>
                <a href="#">@lang('lang.general_settings')</a>
            </div>
        </div>
    </div>
</section>
<section class="student-details">
    <div class="container-fluid p-0">
        @include('backEnd.partials.alertMessage')
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">@lang('lang.change_logo')</h3>
                        </div>

                        @if(in_array(183, @$module_links) || Auth::user()->role_id == 1)


                        
                        @if(Illuminate\Support\Facades\Config::get('app.app_sync'))
            {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data']) }}
        @else
        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'update-school-logo', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }} @endif
                        
                       




                        @endif

                        <div class="white-box">
                            <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                            <div class="text-center">
                            @if(isset($editData->logo) && !empty(@$editData->logo))                            
                                <img class="img-fluid Img-100" src="{{@$editData->logo}}" alt="" >
                            @else
                                <img class="img-fluid" src="{{asset('public/uploads/settings/logo.png')}}" alt="">
                            @endif
                            </div>

                            <div class="mt-40">
                                <div class="text-center">
                                    <label class="primary-btn small fix-gr-bg" for="upload_logo">@lang('lang.upload')</label>
                                    <input type="file" class="d-none form-control" name="main_school_logo" id="upload_logo">
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">

                                @if(Illuminate\Support\Facades\Config::get('app.app_sync'))
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" disabled> @lang('lang.change_logo')</button></span>
                            @else
                            <button class="primary-btn fix-gr-bg  "    >
                                <span class="ti-check"></span>
                                @lang('lang.change_logo')
                            </button>
                            @endif 

                           
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>


                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="main-title">

                            <h3 class="mb-30">@lang('lang.change_fav') </h3>
                        </div>

                        @if(in_array(184, @$module_links) || Auth::user()->role_id == 1)



@if(Illuminate\Support\Facades\Config::get('app.app_sync'))
            {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'admin-dashboard', 'method' => 'GET', 'enctype' => 'multipart/form-data']) }}
        @else
         
        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'update-school-logo', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
        @endif


  @endif

                        <div class="white-box">
                            <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">
                            <div class="text-center">
                            @if(isset($editData->favicon) && !empty(@$editData->favicon))                            
                                <img class="img-fluid Img-50" src="{{@$editData->favicon}}" alt="" >
                            @else
                                <img class="img-fluid" src="{{asset('public/uploads/settings/favicon.png')}}" alt="">
                            @endif
                            </div>

                            <div class="mt-40">
                                <div class="text-center">
                                    <label class="primary-btn small fix-gr-bg" for="upload_favicon">@lang('lang.upload')</label>
                                    <input type="file" class="d-none form-control" name="main_school_favicon" id="upload_favicon">
                                </div>
                            </div>
                            <div class="text-center gs_button">




                                @if(Illuminate\Support\Facades\Config::get('app.app_sync'))
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled For Demo "> <button class="primary-btn small fix-gr-bg  demo_view" style="pointer-events: none;" type="button" disabled>  @lang('lang.change_fav') </button></span>
                            @else
                            <button class="primary-btn fix-gr-bg">
                                <span class="ti-check"></span>
                                @lang('lang.change_fav') 
                            </button>
                            @endif 
                                
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
                            <h3 class="mb-30">@lang('lang.general_settings') @lang('lang.view')</h3>
                        </div>
                    </div>
                    @if(in_array(186, @$module_links) || Auth::user()->role_id == 1)
                    <div class="offset-lg-6 col-lg-2 text-right col-md-6">
                        <a href="{{url('update-general-settings')}}" class="primary-btn small fix-gr-bg"> <span class="ti-pencil-alt"></span> @lang('lang.edit')
                        </a>
                    </div>
                    @endif

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <div class="student-meta-box">
                                
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.school_name')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->company_name}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.site_title')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->site_title}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.address')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->address}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.phone') @lang('lang.no')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->phone}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.email') @lang('lang.address')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->email}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.language')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">

                                                @if(isset($editData))

                                                {{@$editData->languages != ""? @$editData->languages->language_name:""}}

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.date_format')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">

                                                @if(isset($editData)) 
                                                {{@$editData->dateFormats != ""? @$editData->dateFormats->normal_view:""}}

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.time_zone')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">

                                                @if(isset($editData)) 
                                                {{@$editData->dateFormats != ""? @$editData->timeZone->time_zone:""}}

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.currency')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->currency}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.currency') @lang('lang.symbol')
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{@$editData->currency_symbol}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="single-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="name">
                                                @lang('lang.copyright_text') 
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="value text-left">
                                                @if(isset($editData))
                                                {{ @$editData->copyright_text }}
                                                @endif
                                            </div>
                                        </div>
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
