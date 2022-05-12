@extends('voyager::master')

@php  $inv_transaction=App\ConsumeInventoryTransactionOpe::first(); @endphp
@can('browse',$inv_transaction)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-12" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-archive"></i>
                    Raw Inventory Consumable Outward
                </p>
               <form action="{{url('admin/consume-inventory-outwards/create_by_factory')}}" method="post" style="display: inline-block">
                   {{csrf_field()}}
{{--                <a href="{{url('admin/consumable-inventory-transactions-outwards/create')}}" class="btn btn-success ">--}}
{{--                    <i class="voyager-plus"></i> <span>{{'Outward' }}</span>--}}
{{--                </a>--}}
                   @if(Auth::user()->hasRole('supply chain'))
                   <input type="hidden" name="factory_id" value="1">
                       <button type="submit" class="btn btn-success">
                           <i class="voyager-plus"></i> <span>{{'Outward' }}</span>
                       </button>

                   @elseif(Auth::user()->hasRole('lamitech'))
                   <input type="hidden" name="factory_id" value="2">
                       <button type="submit" class="btn btn-success">
                           <i class="voyager-plus"></i> <span>{{'Outward' }}</span>
                       </button>

                   @elseif(Auth::user()->hasRole('admin') )
                       <button type="button" id="save" class="btn btn-success " data-toggle="modal"
                               data-target="#closeform" >
                           <i class="voyager-plus"></i> <span>{{'Outward' }}</span>
                       </button>
                       <div class="modal fade" id="closeform" style="display: none;">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true"></span></button>
                                       <h4 class="modal-title alert alert-warning" style="text-align: center;margin-bottom: 0px">

                                           <strong style="font-weight: bold">Note!</strong> Select Factory.<br>

                                       </h4>
                                   </div>
                                   <div class="modal-body" style="padding-top:0px; ">
                                       <div class="row">


                                           <div class="col-md-12" style="margin-bottom: 3px;">
                                               <div class="form-group" >
                                                   <p style="font-weight: bold">Select Factory:</p>
                                                   @foreach($factories as $factory)
                                                       <label class="radio-inline" style="font-size: 15px"><input type="radio" required value="{{$factory->id}}" name="factory_id" ><b>{{$factory->name}}</b></label>
                                                       @endforeach
                                               </div>
                                           </div>

                                       </div>
                                   </div>

                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                       <button type="submit" class="btn btn-primary">Yes I'm Sure!</button>
                                   </div>

                               </div>
                               <!-- /.modal-content -->
                           </div>
                           <!-- /.modal-dialog -->
                       </div>

                   @endif
{{--                   @endif--}}
               </form>
            </div>

        </div>

    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        {{--@include('voyager::alerts')--}}
        <div class="row" >
            <div class="col-md-12">
                @if(Auth::user()->hasRole('admin'))
                    <div class="dropdown flo_right">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="voyager-settings"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><div class="checkbox">
                                     <label><input type="radio" name="factory" checked id="all" class="chek" value=""> All</label>
                                </div></li>
                            <li><div class="checkbox">
                                    <label><input type="radio" name="factory" id="lamitech" class="chek" value=""> Lamitech</label>
                                </div></li>
                            <li><div class="checkbox">
                                    <label><input type="radio" id="biotech" name="factory" class="chek" value=""> Biotech</label>
                                </div></li>

                        </ul>
                    </div>
                @endif
                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <style>
                            .dataTables_wrapper .dataTables_filter input{


                            }  input[type=number]::-webkit-inner-spin-button,
                               input[type=number]::-webkit-outer-spin-button {
                                   -webkit-appearance: none;
                                   margin: 0;
                               }.flo_right{
                                    padding-left: 95%;
                                }
                        </style>

                        <div class="table-responsive">
                            <table id="example" class="table table-hover"  >
                                <thead>
                                <tr>

                                    <th>
                                        Outward No

                                    </th>
                                    <th>
                                        Product Name
                                    </th>
{{--                                    <th>--}}
{{--                                        Vendor Invoice No--}}
{{--                                    </th>--}}
                                    <th>
                                        Store
                                    </th>

                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Remarks
                                    </th>


                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($raw_inventories)>0)
                                    @foreach($raw_inventories as $raw_inventory)

                                        <tr id="myTable">

                                            <td>
                                                {{sprintf('%04d',$raw_inventory->out_ref_no)}}{{date('-Y-m',strtotime($raw_inventory->transaction_date))}}
                                            </td>


                                            <td>
                                                <span class="font-weight-bold">   {{$raw_inventory->raw_inv_name}}</span>
                                            </td>

{{--                                            <td>--}}
{{--                                                <span class="font-weight-bold"> Inv# {{($raw_inventory->vendor_invoice_no)}}</span>--}}
{{--                                            </td>--}}
                                            <td>
                                                <span class="font-weight-bold">
                                                    @if($raw_inventory->factory->name == "Biotech")
                                                        {{'Biotech'}}
                                                        <input type="hidden" class="factory_status"  value="Biotech">
                                                    @else
                                                        <input type="hidden" class="factory_status"  value="Lamitech">
                                                        {{('Lamitech')}}
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold">  {{date('d-m-Y',strtotime($raw_inventory->transaction_date))}}</span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold">
                                                    <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="{{@$raw_inventory->remarks}}" style="text-decoration: none">
                                                    {{str_limit(@$raw_inventory->remarks,30)}}
                                                </a>
                                                </span>
                                            </td>

                                            <td class="no-sort no-click text-right" id="bread-actions">

                                                <div class="btn-toolbar">
                                                    @if(Auth::user()->hasRole('admin'))
{{--                                                        <button dataid="{{$raw_inventory->id}}" class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
{{--                                                            <i class="voyager-trash"></i> <span>Delete</span>--}}
{{--                                                        </button>--}}
                                                    @endif
                                                    <div class="modal fade" id="myModal" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this ?</h4>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form action="{{url('admin/consumable-inventory-transactions-outwards/destroy')}}" method="post">
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
                                                    <a href='{{url("admin/consume-inventory-outwards/{$raw_inventory->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-eye"></i> <span>View</span>
                                                    </a>
                                                    @if(Auth::user()->hasRole('admin'))
                                                        <a href='{{url("admin/consume-inventory-outwards/{$raw_inventory->id}/edit")}}' class="btn btn-info pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                            <i class="voyager-eye"></i> <span>Edit</span>
                                                        </a>
                                                    @endif
                                                    <a href="#gardenImage" data-id="{{asset('images/consumable_raw_inventory_out/'.$raw_inventory->vendor_invoice)}}" class="openImageDialog thumbnail pull-right btn btn-success" style="text-decoration: none;padding: 5px 2px 5px 3px;font-size: 12px;" data-toggle="modal">
                                                        <span>View Attachment</span>
                                                    </a>



                                                    <div class="modal fade" id="gardenImage" tabindex="-1" role="dialog" aria-labelledby="gardenImageLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content" style="width: 70%;margin-left: 16%;">
                                                                <div class="modal-body">
                                                                    <img id="myImage" class="img-responsive" src="" alt="" style="width: auto;height: 387px;">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger center-block" data-dismiss="modal">close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
        document.addEventListener("mousewheel", function(event){
            if(document.activeElement.type === "number"){
                document.activeElement.blur();
            }
        });

        $(document).on("click", ".openImageDialog", function () {
            var myImageId = $(this).data('id');
            $(".modal-body #myImage").attr("src", myImageId);
        });
        $(document).ready(function() {
            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });})

        $('#lamitech').on('click',function() {
            if ($("#lamitech").prop("checked") == true) {
                $('tr').each(function () {
                    var status = $(this).find('.factory_status').val();
                    // alert(status);
                    if (status == "Biotech") {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                    // i++;
                });
            }
        });
        $('#all').on('click',function() {
            if ($("#all").prop("checked") == true) {
                $('tr').each(function () {
                    var status = $(this).find('.factory_status').val();
                    // alert(status);
                    if (status == "Biotech") {
                        $(this).show();
                    } else {
                        $(this).show();
                    }
                    // i++;
                });
            }
        });

        $('#biotech').on('click',function() {
            if ($("#biotech").prop("checked") == true) {
                $('tr').each(function () {
                    var status = $(this).find('.factory_status').val();
                    // alert(status);
                    if (status == "Lamitech") {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            }
        });
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#example').DataTable({
                "order": false,
//                "order": [[ 1, "desc" ]],
                "pageLength": 50
                // "order": [[ 1, "asc" ]]
            });
        });
        jQuery('form').submit(function(){
            $(this).find(':submit').attr( 'disabled','disabled' );
        });
    </script>

@stop
