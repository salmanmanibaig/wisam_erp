<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
<head>
    <title>@yield('page_title', setting('admin.title') . " - " . setting('admin.description'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="assets-path" content="{{ route('voyager.voyager_assets') }}"/>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>





    <!-- Favicon -->
    <?php use Illuminate\Support\Facades\Auth;$admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    @if($admin_favicon == '')
        <link rel="shortcut icon" href="{{ voyager_asset('images/logo-icon.png') }}" type="image/png">
    @else
        <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
    @endif

<!-- App CSS -->
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">

    @yield('css')
    @if(__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif

<!-- Few Dynamic Styles -->
    <style type="text/css">
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .voyager .side-menu .navbar-header {
            background:{{ config('voyager.primary_color','#22A7F0') }};
            border-color:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .widget .btn-primary{
            border-color:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .widget .btn-primary:focus, .widget .btn-primary:hover, .widget .btn-primary:active, .widget .btn-primary.active, .widget .btn-primary:active:focus{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }
        .voyager .breadcrumb a{
            color:{{ config('voyager.primary_color','#22A7F0') }};
        }

        element.style {
        }
        #voyager-loader img {
            width: 100px;
            height: 100px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -50px;
            margin-right: -50px;
            -webkit-animation: spin 1s linear infinite;
            animation: spin 1s linear infinite;
        }
        img {
            vertical-align: middle;
        }
        img {
            border: 0;
        }
        * {
            outline: none;
        }
        *, :after, :before {
            box-sizing: border-box;
        }


        #voyager-loader img {
            width: 200px;
            height: 201px;
            position: absolute;
            top: 35%;
            left: 50%;
            margin-left: -50px;
            margin-right: -50px;
            -webkit-animation: spin 1s linear infinite;
            animation: none;
        }
        .resetPadding{
            padding-right: 0px !important;
        }
    </style>

    @if(!empty(config('voyager.additional_css')))<!-- Additional CSS -->
    @foreach(config('voyager.additional_css') as $css)<link rel="stylesheet" type="text/css" href="{{ asset($css) }}">@endforeach
    @endif

    @yield('head')
</head>

<body class="voyager" style="padding-right: 0px !important; ">

<div id="voyager-loader">
    <?php $admin_loader_img = Voyager::setting('admin.loader', ''); ?>
    @if($admin_loader_img == '')
        <img src="{{ voyager_asset('images/logo3.gif') }}" alt="Voyager Loader">
    @else
        <img src="{{ Voyager::image($admin_loader_img) }}" alt="Voyager Loader">
    @endif
</div>

<?php
//if (\Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'http://') || \Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'https://')) {
////    $user_avatar = Auth::user()->avatar;
//} else {
//    $user_avatar = Voyager::image(Auth::user()->avatar);
//}
?>

<div class="app-container">
    <div class="fadetoblack visible-xs"></div>
    <div class="row content-container">
        @include('voyager::dashboard.navbar')
        @include('voyager::dashboard.sidebar')
        <script>
            (function(){
                var appContainer = document.querySelector('.app-container'),
                    sidebar = appContainer.querySelector('.side-menu'),
                    navbar = appContainer.querySelector('nav.navbar.navbar-top'),
                    loader = document.getElementById('voyager-loader'),
                    hamburgerMenu = document.querySelector('.hamburger'),
                    sidebarTransition = sidebar.style.transition,
                    navbarTransition = navbar.style.transition,
                    containerTransition = appContainer.style.transition;

                sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition =
                    appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =
                        navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = 'none';

                if (window.innerWidth > 768 && window.localStorage && window.localStorage['voyager.stickySidebar'] == 'true') {
                    appContainer.className += ' expanded no-animation';
                    loader.style.left = (sidebar.clientWidth/2)+'px';
                    hamburgerMenu.className += ' is-active no-animation';
                }

                navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = navbarTransition;
                sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition = sidebarTransition;
                appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition = containerTransition;
            })();
        </script>
        <!-- Main Content -->
        <div class="container-fluid">
            <div class="side-body padding-top">
                @yield('page_header')
                <div id="voyager-notifications"></div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('voyager::partials.app-footer')

<!-- Javascript Libs -->


<script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script>

<script>
    @if(Session::has('alerts'))
    let alerts = {!! json_encode(Session::get('alerts')) !!};
    helpers.displayAlerts(alerts, toastr);
    @endif

    @if(Session::has('message'))

    // TODO: change Controllers to use AlertsMessages trait... then remove this
    var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
    var alertMessage = {!! json_encode(Session::get('message')) !!};
    var alerter = toastr[alertType];

    if (alerter) {
        alerter(alertMessage);
    } else {
        toastr.error("toastr alert-type " + alertType + " is unknown");
    }
    @endif
    $('.closeModal').on('click',function (){
        $('.voyager').addClass('resetPadding');
    })
    $(document).ready(function (){
        $('#accTable').on('wheel','.price',function (){
            $(this).blur()
        })
        $('#acc_table').on('wheel','.price',function (){
            $(this).blur()
        })
    })

</script>
@include('voyager::media.manager')
@yield('javascript')
@stack('javascript')
@if(!empty(config('voyager.additional_js')))<!-- Additional Javascript -->
@foreach(config('voyager.additional_js') as $js)<script type="text/javascript" src="{{ asset($js) }}"></script>@endforeach
@endif

</body>
</html>
