@extends('voyager::master')

@php  $purchase=App\VendorPurchaseOrder::first(); @endphp
@can('browse',$purchase)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-double-right"></i>
                    Delivery Order
                </p>
                @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('lamitech')/*|| Auth::user()->hasRole('supply chain')*/)
                    <a href="{{url('admin/delivery-orders/create')}}" class="btn btn-success btn-add-new">
                        <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
                    </a>
                @endif
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

                <div class="panel panel-bordered " >
                    <div class="panel-body" >

                        <style>
                            .dataTables_wrapper .dataTables_filter input{


                            }
                        </style>

                        <div class="table-responsive">
                            <table id="example" class="table table-hover"   >
                                <thead>
                                <tr>

                                    {{--<th>--}}
                                    {{--<input type="checkbox" class="select_all">--}}
                                    {{--</th>--}}


                                    <th>
                                        Date
                                    </th>


                                    <th>
                                        DO Number
                                    </th>

                                    <th>
                                        PO Number
                                    </th>

                                    <th>
                                        WareHouse
                                    </th>

                                    <th>
                                        Company
                                    </th>

                                    <th>
                                        Truck No
                                    </th>
                                    <th>
                                        qty
                                    </th>



                                    <th>
                                        Status
                                    </th>



                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($do)>0)
                                    @foreach($do as $order)

                                        <tr id="myTable">


                                            <td>
                                                {{
                                                $order->created_at->format('d/m/Y')

                                                }}
                                            </td>

                                            <td>
                                               {{$order->do_number}}
                                            </td>



                                            <td>
                                                {{$order->po_number->po_number}}
                                            </td>
                                            <td>
                                                {{$order->warehouse->name}}
                                            </td>
                                            <td>

                                                {{$order->po_number->company->name}}


                                            </td>

                                            <td>

                                                {{$order->truck_no}}


                                            </td>


                                            <td>

                                                <div class="col-md-12">

                                                    <label style="font-weight: bold">Bridge 1</label>
                                                    <label>{{$order->truck_net_weight1." ".$order->unit1->name}}</label>
                                                </div>
{{--                                                <div class="col-md-12">--}}

{{--                                                </div>--}}
{{--                                                {{$order->truck_net_weight1}}--}}


                                            </td>







                                            <td>

                                                @if(@$order->status == 0)
                                                    <p style="font-weight: bold; color: red">{{"In Processl"}}</p>

                                                @elseif(@$order->status == 1 )
                                                    <p style="font-weight: bold; color: green">{{"Completed"}}</p>
                                                @elseif(@$order->purchase_biocos_outward->b_outward_status == 0)
                                                    <p style="font-weight: bold; color: green    ">{{"Pending for D/O"}}</p>
                                                @elseif(@$order->purchase_biocos_outward->b_outward_status == 1 &&  @$order->purchase_biocos_outward->order->dispatch_status == 0)
                                                    <p style="font-weight: bold; color: #807915    ">{{"IN D/O"}}</p>
                                                @elseif(

                                                        @$order->purchase_biocos_outward->order->delivery_status == 1
                                                        && @$order->purchase_biocos_outward->order->dispatch_status == 1
                                                        && $order->purchase_biocos_outward->order->complete_job == 0
                                                        && !@$order->purchase_biocos_outward->order->delivergatepass->transport


                                                        )

                                                    <p style="font-weight: bold; color: green    ">{{"IN Gatapass"}}</p>
                                                @elseif(!@$order->purchase_biocos_outward->order->delivergatepass->bilty_number && @$order->purchase_biocos_outward->order->delivergatepass->transport == 1 && $order->purchase_biocos_outward->order->complete_job == 0 )
                                                    <p style="font-weight: bold; color: green    ">{{"Waiting For Bilty"}}</p>
                                                @elseif(!@$order->purchase_biocos_outward->order->delivergatepass->bilty_number && @$order->purchase_biocos_outward->order->delivergatepass->transport == 3 && $order->purchase_biocos_outward->order->complete_job == 0 )
                                                    <p style="font-weight: bold; color: #18805e    ">{{"Waiting Proof of Delivery"}}</p>
                                                @else
                                                    <p style="font-weight: bold; color: #800c3a    ">{{"P/O Delivered"}}</p>
                                                @endif

                                            </td>



                                            <td class="no-sort no-click text-right" id="bread-actions">

                                                <div class="btn-toolbar">

                                                    @if(Auth::user()->hasRole('admin'))
                                                        <a href='{{url("admin/delivery-orders/{$order->id}")}}' class="btn btn-success pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                            <i class="voyager-eye"></i> <span>Print </span>
                                                        </a>

                                                        <a href='{{url("admin/delivery-orders/{$order->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                            <i class="voyager-eye"></i> <span>View </span>
                                                        </a>

                                                        <a href='{{url("admin/delivery-orders/{$order->id}/edit")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                            <i class="voyager-edit"></i> <span> &nbsp;Edit &nbsp;</span>
                                                        </a>


                                                        <button dataid="{{$order->id}}"class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                            <i class="voyager-trash"></i> <span>Delete</span>
                                                        </button>
                                                        <div class="modal fade" id="myModal" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Outwards ?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <form action="{{url('admin/delivery-orders/destroy')}}" method="post">
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

                console.log(id);
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });})
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                // "order": false
                "order": [[ 1, "desc" ]],
                "pageLength": 50
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
