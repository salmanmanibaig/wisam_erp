@extends('voyager::master')

@php  $stockinhand=App\StockInHand::first(); @endphp
@can('read',$stockinhand)

@section('page_header')
    <style>
        @media print {
            @page{margin: 0px;height: 0px  }
            html,body{
                width: 210mm;
                /*height: 0mm;*/
                /*height: 282mm;*/
                margin: 0px;
                padding: 0px;
                font-size: 12px;
                background: #FFF;
                overflow:visible;
            }
            #bodyprint{
                display: none;
                position: absolute;
                height: 0px;
            }
            .dataTables_filter, .dataTables_info,.dataTables_length,.dataTables_paginate{ display: none; }
            /*#butn{*/
            /*display: none;*/
            /*position: absolute;*/
            /*}*/
            /*#butna1{*/
            /*display: none;*/
            /*position: absolute;*/
            /*}*/

            .voyager .app-footer {
                opacity: .7;
                color: #353d47;
                width: 100%;
                text-align: right;
                padding: 10px 0;
                background: #fff;
                left: 0;
                display: none;
            }
            #page-title1 {
                padding-top: 0px;
                height: 0px;
                display: none;
                margin-top: 0px;
            }
            #page-title2 {
                /*padding-top: 0px;*/
                height: 0px;
                /*margin-top: 0px;*/
            }

        }

    </style>
    <div class="container-fluid" id="bodyprint">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title" id="page-title1">
                    <i class="voyager-truck"></i>
                    Stock In Hands
                </p>

                <button href="#" onclick="myFunction()" id="butn" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>Print</span>
                </button>
                <script>
                    function myFunction() {
                        window.print();
                    }
                </script>
            </div>
            <div class="col-md-6" style="margin-bottom: 0px">
                @if ($message = Session::get('info'))
                    <div class="alert alert-success alert-block" style="opacity: 0.7">
                        <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
        </div>


    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        {{--@include('voyager::alerts')--}}
        <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-8" >
               @if(Auth::user()->hasRole('admin'))
                <div class="dropdown flo_right ">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="voyager-settings"></span></button>
{{--                    <form action="{{url('admin/factory_wise')}}" method="post">--}}
{{--                        {{csrf_field()}}--}}
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><div class="checkbox">
                                <label><input type="radio" name="factory" id="all" checked onchange="javascript:handleSelect1(this)" class="chek" > All</label>
                            </div></li>
                        <li><div class="checkbox">
                                <label><input type="radio" @if(@$factory_id == 2) checked  @endif name="factory" id="lamitech" onchange="javascript:handleSelect(this)" class="chek" value="2"> Lamitech</label>
                            </div></li>
                        <li><div class="checkbox">
                                <label><input type="radio" @if(@$factory_id == 1) checked  @endif id="biotech" name="factory" onchange="javascript:handleSelect(this)" class="chek" value="1"> Biotech</label>
                            </div></li>

                    </ul>
{{--                    </form>--}}
                </div>
                @endif
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <h1 style="text-align: center">
                            @if(Auth::user()->hasRole('admin')) @if(@$factory_id == 1) {{"Biotech"}} @elseif(@$factory_id == 2) {{'Lamitech'}}
                            @else {{'Combined'}} @endif
                            @elseif(Auth::user()->hasRole('lamitech')) {{"Lamitech"}} @elseif(Auth::user()->hasRole('supply chain')) {{"Biotech"}}
                            @endif
                                Raw Material</h1>

                        <style>
                            .dataTables_wrapper .dataTables_filter input{


                            }.flo_right{
                                 padding-left: 95%;
                            }
                        </style>

                        <div class="table-responsive" >
                            <table id="example" class="table table-hover"  >
                                <thead>
                                <tr>

                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Item Name
                                    </th>
                                    <th>
                                        Qty in Hand
                                    </th>
                                    <th>
                                        UOM
                                    </th>


                                </tr>
                                </thead>
                                <tbody>
                                {{--@if(count($data)>0)--}}
                                @foreach($items as $key => $value )

{{--                                    {{dd($value)}}--}}
                                    @if($value->stock_in_hand <= $value->stock_reminder )
                                        <tr id="myTable" style="color: white; font-weight: bold; background-color: red ">
                                    @else
                                        <tr id="myTable" >
                                            @endif


                                            <td>
                                                {{$value->id}}
                                            </td>
                                            <td>
                                                {{$value->category_item}}
                                            </td>
                                            <td>
                                                {{$value->item_name}}
                                            </td>

                                            <td>
                                                {{@$value->stock_in_hand}}
                                            </td>

                                            <td>
                                                {{strtoupper($value->uom)}}
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
    </div>

@stop

@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan

@section('javascript')
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
        function handleSelect(elm)
        {

            window.location.replace("http://127.0.0.1:8000/admin/consume_invent_stock_in_hand/factory_wise/"+elm.value);
            //  document.domain("/public/admin/hrm-holidays/month/"+elm.value);
        }
        function handleSelect1(elm)
        {

            window.location.replace("http://127.0.0.1:8000/admin/consume_invent_stock_in_hand");
            //  document.domain("/public/admin/hrm-holidays/month/"+elm.value);
        }
        $(document).ready(function() {
            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });})

        // $(document).ready(function() {
        //     $('#example').DataTable( {
        //          "order": false,
        //         // "order": [[ 1, "desc" ]],
        //         "pageLength": 50
        //         // "order": [[ 1, "asc" ]]
        //     } );
        // } );
    </script>


    <!-- DataTables -->
    {{--@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))--}}
    {{--<script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>--}}
    {{--@endif--}}
    {{--<script>--}}
    {{--$(document).ready(function () {--}}

    {{--var table = $('#dataTable').DataTable({!! json_encode(--}}
    {{--array_merge([--}}
    {{--"order" => $orderColumn,--}}
    {{--"language" => __('voyager::datatable'),--}}
    {{--"columnDefs" => [['targets' => -1, 'searchable' =>  false, 'orderable' => false]],--}}
    {{--],--}}
    {{--config('voyager.dashboard.data_tables', []))--}}
    {{--, true) !!});--}}

    {{--$('#search-input select').select2({--}}
    {{--minimumResultsForSearch: Infinity--}}
    {{--});--}}



    {{--$('.side-body').multilingual();--}}
    {{--//Reinitialise the multilingual features when they change tab--}}
    {{--$('#dataTable').on('draw.dt', function(){--}}
    {{--$('.side-body').data('multilingual').init();--}}
    {{--})--}}

    {{--$('.select_all').on('click', function(e) {--}}
    {{--$('input[name="row_id"]').prop('checked', $(this).prop('checked'));--}}
    {{--});--}}
    {{--});--}}


    {{--var deleteFormAction;--}}
    {{--$('td').on('click', '.delete', function (e) {--}}
    {{--$('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__id']) }}'.replace('__id', $(this).data('id'));--}}
    {{--$('#delete_modal').modal('show');--}}
    {{--});--}}
    {{--</script>--}}
@stop
