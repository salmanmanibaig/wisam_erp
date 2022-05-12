<?php

    use App\SmStyle;
    use App\SmGeneralSettings;
    $styles = SmStyle::where('active_status', 1)->get(); 


    if(!Schema::hasTable('users')){
        header('location:' . url('/install'));
        exit();
    }

$dashboard_background = App\SmBackgroundSetting::where([['is_default',1],['title','Dashboard Background']])->first();
 
if(empty(@$dashboard_background)){
    $css = "background: url('/public/backEnd/img/body-bg.jpg')  no-repeat center; background-size: cover; ";
}else{
    if(!empty(@$dashboard_background->image)){
        $css = "background: url('". url(@$dashboard_background->image) ."')  no-repeat center; background-size: cover; ";
    }else{
        $css = "background:".@$dashboard_background->color;
    }
}



$setting = App\SmGeneralSettings::find(1);


if(isset($setting->favicon)){ @$fav = @$setting->favicon; }else{ @$fav = 'public/backEnd/img/favicon.png'; }
if(isset($setting->site_title)){ @$site_title = @$setting->site_title; }else{ @$site_title = 'Infix Business ERP'; }
if(isset($setting->company_name)){ @$company_name = @$setting->company_name; }else{ @$company_name = 'Business ERP'; }




$ROLE_ID=Auth::user()->role_id;

                
    if($ROLE_ID != 1 && $ROLE_ID != 3 && $ROLE_ID != 10){
        $notifications = App\SmNotification::notifications();
    }else{
        $notifications = [];
    } 
    $profile = 'public/backEnd/img/admin/message-thumb.png';
    $generalSetting = @$config = SmGeneralSettings::find(1);
    $ttl_rtl = isset($config->ttl_rtl) ? @$config->ttl_rtl : 2;
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"   @if(isset ($ttl_rtl ) && @@$ttl_rtl ==1) dir="rtl" class="rtl" @endif >
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link rel="icon" href="{{url('/')}}/{{isset($fav)?$fav:''}}" type="image/png"/>
    <title>{{@$company_name}} | {{@$site_title}} </title>
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/jquery-ui.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/jquery.data-tables.css">
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/responsive.dataTables.min.css">

    @if(isset ($ttl_rtl ) && $ttl_rtl ==1)
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/rtl/bootstrap.min.css"/> 
    @else
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap.css"/> 
    @endif
     
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/themify-icons.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/flaticon.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/nice-select.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/magnific-popup.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/fastselect.min.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/software.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/toastr.min.css"/>

    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/js/select2/select2.css"/>
    <link rel="stylesheet" href="{{asset('public/backEnd/')}}/vendors/css/fullcalendar.min.css">

    <link rel="stylesheet" media="print" href="{{asset('public/backEnd/')}}/vendors/css/fullcalendar.print.css">
    <!-- main css -->



    @if(isset ($ttl_rtl ) && $ttl_rtl ==1)
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/rtl/style.css"/>
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/rtl/infix.css"/>
    @else
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/style.css"/>
        <link rel="stylesheet" href="{{asset('public/backEnd/')}}/css/infix.css"/>
    @endif


    @stack('css')
</head>
<style>

</style>
<body class="admin" style="{{$css}}">
<div class="main-wrapper">
    <!-- Sidebar  -->
@include('backEnd.partials.sidebar')

<!-- Page Content  -->
    <div id="main-content">
        
@include('backEnd.partials.menu')
