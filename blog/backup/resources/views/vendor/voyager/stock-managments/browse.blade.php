@extends('voyager::master')

@php  $stockinhand=App\VendorPurchaseOrder::first(); @endphp
@can('browse',$stockinhand)

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
            <div class="col-md-2"></div>
            <div class="col-md-8" >

                <div class="panel panel-bordered">
                    <div class="panel-body">
                         <h1 style="text-align: center">Coal Stock</h1>


                        <style>
                            .dataTables_wrapper .dataTables_filter input{


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
                                        Port
                                    </th>
                                    <th>
                                        Product
                                    </th>

                                    <th>
                                      Stock In Hand
                                    </th>

                                    <th >
                                        UOM
                                    </th>


                                    {{--<th class="actions text-right">{{ __('voyager::generic.actions') }}</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                               {{--@if(count($data)>0)--}}
                                    @foreach($warehouse as $key => $value )





                                    @foreach($value->product as $stock)
                                            <tr id="myTable" >


                                                <td>
                                                                                                    {{$stock->id}}
                                                </td>
                                                <td>
                                                    {{ucwords($value->name)}}
                                                </td>

                                                <td >
                                                    {{ucwords($stock->name)}}
                                                </td>


                                                <td>
                                                                                                    {{$stock->stock_in_hand}}
                                                </td>
                                                <td>
                                                    {{"MT"}}
                                                </td>







                                            </tr>

                                        @endforeach
                                        @endforeach
                                        {{--@endif--}}
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    {{--<div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">--}}
    {{--<div class="modal-dialog">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-header">--}}
    {{--<button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>--}}
    {{--<h4 class="modal-title"><i class="voyager-trash"></i> ?</h4>--}}
    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<form action="#" id="delete_form" method="POST">--}}
    {{--{{ method_field('DELETE') }}--}}
    {{--{{ csrf_field() }}--}}
    {{--<input type="submit" class="btn btn-danger pull-right delete-confirm" value="">--}}
    {{--</form>--}}
    {{--<button type="button" class="btn btn-default pull-right" data-dismiss="modal"></button>--}}
    {{--</div>--}}
    {{--</div><!-- /.modal-content -->--}}
    {{--</div><!-- /.modal-dialog -->--}}
    {{--</div><!-- /.modal -->--}}
@stop

@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan

@section('javascript')
    <script>

        $(document).ready(function() {
            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });})
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
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
