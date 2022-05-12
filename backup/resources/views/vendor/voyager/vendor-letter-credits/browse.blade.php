@extends('voyager::master')

@php  $customerset=\App\VendorPurchaseOrder::first(); @endphp
@can('browse',$customerset)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-people"></i>
                    Letter Credits
                </p>

                <a href="{{url('admin/vendor-letter-credits/create')}}" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
                </a>
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
            <div class="col-md-1">

            </div>
            <div class="col-md-10">

                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <style>
                            .dataTables_wrapper .dataTables_filter input{


                            }
                        </style>

                        <div class="table-responsive">
                            <table id="example" class="table table-hover"  >
                                <thead>
                                <tr>



                                        <th>
                                           Purchase Order
                                        </th>
                                    <th>
                                       LC Number
                                    </th>
                                    <th>
                                       LC QTY
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($letter_credit)>0)
                                    @foreach($letter_credit as $lc)
                                    <tr id="myTable">



                                            <td>

                                                    {{$lc->vendorpo->po_number}}

                                            </td>
                                      <td>{{$lc->lc_number}}</td>
                                        <td>{{$lc->lc_qty}}</td>
                                        <td>@if($lc->status == "1")
                                                <h5 class="text-success">{{$lc->status_message}}</h5>
                                            @else
                                                <h5 class="text-danger">{{$lc->status_message}}</h5>
                                            @endif
                                        </td>
                                        <td class="no-sort no-click text-right" id="bread-actions">

                                                <div class="btn-toolbar">
                                                    @if(Auth::user()->hasRole('admin'))
                                                    <button dataid="{{$lc->id}}" class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-trash"></i> <span>Delete</span>
                                                    </button>
                                                    <div class="modal fade" id="myModal" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Event ?</h4>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form action="{{url('admin/vendor-letter-credits/destroy')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        {{method_field('DELETE')}}
                                                                        <input type="hidden" name="deleteid" id="deleteid">
                                                                        <button type="submit" class="btn btn-default pull-right" style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">Yes, Delete it!</button>
                                                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" >Close</button>

                                                                    </form>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    @endif
                                            <a href='{{url("admin/vendor-letter-credits/{$lc->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-eye"></i> <span>View</span>
                                            </a>
                                            <a href='{{url("admin/vendor-letter-credits/{$lc->id}/edit")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-edit"></i><span>Edit</span>
                                            </a>
                                                </div>

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
        // $(document).ready(function(){
        //     $("#myInput").on("keyup", function() {
        //         var value = $(this).val().toLowerCase();
        //         $("#myTable tr").filter(function() {
        //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //         });
        //     });
        // });
        $(document).ready(function() {
            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });})
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                // "order": false
                "order": false,
                "pageLength": 25
                // "order": [[ 1, "asc" ]]
            } );
        } );
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
