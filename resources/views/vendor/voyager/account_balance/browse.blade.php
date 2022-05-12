@extends('voyager::master')

@php  $SupplyRequisition=App\VendorPurchaseOrder::first(); @endphp
@can('browse',$SupplyRequisition)

@section('page_header')
    <style>
        @import url("http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css");
        body { margin-top:20px; }
        .fa { font-size: 50px;text-align: right;position: absolute;top: 7px;right: 27px;outline: none; }
        a { transition: all .3s ease;-webkit-transition: all .3s ease;-moz-transition: all .3s ease;-o-transition: all .3s ease; }
        /* Visitor */
        a.visitor i,.visitor h4.list-group-item-heading { color:#E48A07; }
        a.visitor:hover { background-color:#E48A07; }
        a.visitor:hover * { color:#FFF; }
        /* Facebook */
        a.facebook-like i,.facebook-like h4.list-group-item-heading { color:#3b5998; }
        a.facebook-like:hover { background-color:#3b5998; }
        a.facebook-like:hover * { color:#FFF; }
        /* Google */
        a.google-plus i,.google-plus h4.list-group-item-heading { color:#dd4b39; }
        a.google-plus:hover { background-color:#dd4b39; }
        a.google-plus:hover * { color:#FFF; }
        /* Twitter */
        a.twitter i,.twitter h4.list-group-item-heading { color:#00acee; }
        a.twitter:hover { background-color:#00acee; }
        a.twitter:hover * { color:#FFF; }
        /* Linkedin */
        a.linkedin i,.linkedin h4.list-group-item-heading { color:#0e76a8; }
        a.linkedin:hover { background-color:#0e76a8; }
        a.linkedin:hover * { color:#FFF; }
        /* Tumblr */
        a.tumblr i,.tumblr h4.list-group-item-heading { color:#34526f; }
        a.tumblr:hover { background-color:#34526f; }
        a.tumblr:hover * { color:#FFF; }
        /* Youtube */
        a.youtube i,.youtube h4.list-group-item-heading { color:#c4302b; }
        a.youtube:hover { background-color:#c4302b; }
        a.youtube:hover * { color:#FFF; }
        /* Vimeo */
        a.vimeo i,.vimeo h4.list-group-item-heading { color:#44bbff; }
        a.vimeo:hover { background-color:#44bbff; }
        a.vimeo:hover * { color:#FFF; }
        #first_widgets
        {
            background-color: darkorange;
            color: white;
        }
        #first_widgets:hover
        {
            background-color: orange;
            color: white;
        }
        #second_widgets
        {
            background-color: red;
            color: white;
        }
        #second_widgets:hover
        {
            background-color:#880e4f;
            color: white;
        }
        #third_widgets
        {
            background-color: blue;
            color: white;
        }
        #third_widgets:hover
        {
            background-color:#2995E3;
            color: white;
        }
        #fourth_widgets
        {
            background-color: #0f0f0f;
            color: white;
        }
        #fourth_widgets:hover
        {
            background-color:#4b515d;
            color: white;
        }
    </style>
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="fab fa-cc-mastercard"></i>
                   ACCOUNT BALANCE
                </p>
{{--                <a href="{{url('admin/payment_create')}}" class="btn btn-success">--}}
{{--                    <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>--}}
{{--                </a>--}}

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
    <div class="page-content browse container-fluid">
        {{--@include('voyager::alerts')--}}
        <div class="row" >
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <style>
                            .dataTables_wrapper .dataTables_filter input{


                            }
                        </style>

                        <div class="table-responsive">
                            <table id="example" class="table table-hover">
                                <thead>
                                <tr>

                                    <th>
                                        Account Name
                                    </th>
                                    <th>
                                        Company Name
                                    </th>
                                    <th>
                                        Existing Check
                                    </th>

                                    <th>
                                        Existing Check Amount
                                    </th>
                                    <th>
                                        Balance
                                    </th>


{{--                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($accounts)>0)
                                    @foreach($accounts as $account)

                                        {{--                                                                                {{dd($product)}}--}}
                                        <tr id="myTable">
                                            <td>{{$account->account_title}}</td>
                                            <td>{{$account->company->name}}</td>
                                            <td>{{$account->existCheck}}</td>
                                            <td>{{$account->clearing_amount}}</td>
                                            <td>
                                              {{$account->balance}}
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan


