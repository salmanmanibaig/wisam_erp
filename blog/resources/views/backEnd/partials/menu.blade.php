@php
    $modules = [];
    $module_links = [];
    $permissions = App\SmRolePermission::where('role_id', Auth::user()->role_id)->get();
    foreach($permissions as $permission){ @$module_links[] = @$permission->module_link_id; @$modules[] = @$permission->moduleLink->module_id;}


    $modules = array_unique(@$modules);


    $generalSetting=App\SmGeneralSettings::where('id',1)->first();
    if(isset($generalSetting->logo)){  @$logo = @$generalSetting->logo;  }
    else{ @$logo = 'public/uploads/settings/logo.png'; }

    $sm_staff= App\SmStaff::where('user_id',Auth::user()->id)->first();
    if(!empty(@$sm_staff)){
        $profile_image = @$sm_staff->staff_photo;
        if(empty(@$profile_image)){
            @$profile_image ='public/uploads/staff/staff1.png';
        }
    }
        $notification=\App\SmNotification::where('received_id',Auth::user()->id)->where('is_read',0)->latest()->get();

@endphp

<nav class="navbar navbar-expand-lg up_navbar">
    <div class="container-fluid">
        <div class='up_dash_menu w-100'>
            <button type="button" id="sidebarCollapse" class="btn d-lg-none nav_icon">
                    <i class="ti-more"></i>
                </button> 

                <button class="btn btn-dark d-inline-block d-lg-none ml-auto nav_icon" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="ti-menu"></i>
                </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
          
                <ul class="nav navbar-nav nav-setting  flex-sm-row d-none d-lg-block">
                    
                        @if (@Auth::user()->role_id == 1)
                        <li class="nav-item"> 
                            <select class="niceSelect languageChange" name="languageChange" id="languageChange"> 
                                <option data-display="Select Language" value="0">@lang('lang.select') @lang('lang.language')</option>
                                @php  
                                    $languages=DB::table('sm_languages')->get(); 
                                @endphp
                                @foreach($languages as $lang)
                                    <option data-display="{{@$lang->native}}" value="{{ @$lang->language_universal}}" {{@$lang->active_status == 1? 'selected':''}}>{{@$lang->native}}</option>
                                @endforeach 
                            </select> 
                        </li> 
                        @endif




                </ul>

                    @if (@Auth::user()->role_id == 1)
                        <ul class="nav navbar-nav mr-auto nav-setting flex-sm-row d-none d-lg-block colortheme">
                            <li class="nav-item active">
                                <select class="niceSelect infix_theme_rtl" id="infix_theme_rtl">
                                    <option data-display="Select Alignment" value="0">Select Alignment</option>
                                    @php 
                                    $config = App\SmGeneralSettings::find(1);
                                    $is_rtl = $config->ttl_rtl;

                                    @endphp 
                                        <option value="2" {{@$is_rtl==2?'selected':''}}>LTL</option> 
                                        <option value="1" {{@$is_rtl==1?'selected':''}}>RTL</option> 
                                </select>
                            </li>
                        </ul>
                        @endif


                <!-- Start Right Navbar -->
                <ul class="nav navbar-nav right-navbar"> 
                    <li class="nav-item notification-area   d-none d-lg-block">
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown">

                                <span class="badge">{{ count(@$notification)}}</span>
                                <span class="flaticon-notification"></span>
                            </button>
                            <div class="dropdown-menu">
                                <div class="white-box">
                                    <div class="p-h-20">
                                        <p class="notification">@lang('lang.you_have') <span>{{count(@$notification)}} @lang('lang.new')</span>
                                            @lang('lang.notification')</p>
                                    </div>
                                    @foreach(@$notification as $data)
                                <a class="dropdown-item pos-re linkk" href="{{ @$data->link}}" name="tabs" data-id="{{ @$data->id }}">
                                    <div class="single-message single-notifi">
                                        <div class="d-flex">
                                            <span class="ti-bell"></span>
                                            <div class="d-flex align-items-center ml-10">
                                                <div class="mr-60">
                                                    <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="{{@$data->message}}">
                                                    <p class="message">{{@$data->message}}</p>
                                                    </span>
                                                </div>
                                            <div class="mr-10 text-right bell_time">
                                                <p class="time pl-2"><small>{{@$data->created_at->diffForHumans()}}</small></p>
                                            {{--  <p class="date">{{date('jS M', strtotime($data->date))}}</p> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                    @endforeach

                                    <a href="{{url('view/all/notification/'.Auth()->user()->id)}}" class="primary-btn text-center text-uppercase mark-all-as-read">
                                        @lang('lang.mark_all_as_read')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item setting-area">
                        <div class="dropdown">
                            <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                                {{-- <img class="rounded-circle" src="{{asset($profile_image)}}" alt=""> --}}
                                <img class="rounded-circle" src="{{ file_exists(@$profile_image) ? asset($profile_image) : asset('public/uploads/staff/demo/staff.png') }}" alt="">
                            </button>
                            <style>
                            .user_profile{
                                width: 40px !important;
                                height: 40px !important;
                                border-radius: 50% !important;
                            }
                            </style>
                            <div class="dropdown-menu profile-box">
                                <div class="white-box">
                                    <a class="dropdown-item" href="#">
                                        <div class="">
                                            <div class="d-flex align-items-center">
                                                 @if (file_exists(@$profile_image))
                                                    <img class="client_img user_profile" src="{{ file_exists(@$profile_image) ? asset($profile_image) : asset('public/uploads/staff/demo/staff.jpg') }}" alt="">
                                                 @else
                                                    <img class="client_img user_profile" src="{{ asset('/') }}public/uploads/staff/demo/staff.jpg" alt="">
                                                @endif
                                                <div class="d-flex ml-10">
                                                    <div class="">
                                                        <h5 class="name text-uppercase">{{Auth::user()->full_name}}</h5>
                                                        <p class="message">{{Auth::user()->email}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                    <ul class="list-unstyled">
                                        <li>
                                        @if (Auth::user()->role_id == 7)
                                        <a href="{{route('ticket.view_profile', Auth::user()->staff->id)}}">
                                                <span class="ti-user"></span>
                                                @lang('lang.view_profile')
                                            </a>
                                        @else
                                            <a href="{{route('viewStaff', Auth::user()->staff->id)}}">
                                                <span class="ti-user"></span>
                                                @lang('lang.view_profile')
                                            </a>
                                            @endif
                                        </li>

                                        <li>
                                            <a href="{{url('change-password')}}">
                                                <span class="ti-key"></span>
                                                @lang('lang.password')
                                            </a>
                                        </li>
                                        <li>

                                            <a href="{{ route('logout')}}" onclick="event.preventDefault();

                                                        document.getElementById('logout-form').submit();">
                                                <span class="ti-unlock"></span>
                                                logout
                                            </a>
                                            @if (Auth::user()->role_id ==7)
                                            <form id="logout-form" action="{{ route('ticket.logout') }}" method="POST" class="d-none">

                                                    @csrf
                                                </form>
                                            @else
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                                @csrf
                                            </form>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- End Right Navbar -->
            </div>
        </div>
    </div>
</nav>


@section('script')


@endsection
