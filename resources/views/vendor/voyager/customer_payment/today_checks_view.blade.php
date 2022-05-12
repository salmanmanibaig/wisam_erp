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

    </style>
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="fab fa-cc-mastercard"></i>
                   Viewing Today Checks
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


                {{--                    <div class="col-md-4"style="margin-top: 15px;">--}}

                {{--                            <a href="http://www.jquery2dotnet.com" class="list-group-item visitor">--}}


                {{--                                <p class="list-group-item-text"  id="total_transaction" >--}}
                {{--                                    Total Third_Party Check and Transactions<span><h3 >--}}
                {{--                                    {{$toal_check}}--}}
                {{--                                </h3></span></p>--}}
                {{--                            </a>--}}
                {{--                    </div>--}}
{{--                <div class="col-md-4" style="margin-top: 15px;">--}}
{{--                    <a href="http://www.jquery2dotnet.com" class="list-group-item visitor">--}}


{{--                        <p class="list-group-item-text">--}}
{{--                            Total Third_Party Existing Check<span><h3 >--}}
{{--                                    {{$total_check}}--}}
{{--                                </h3></span></p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin-top: 15px;">--}}
{{--                    <a href="http://www.jquery2dotnet.com" class="list-group-item visitor">--}}


{{--                        <p class="list-group-item-text">--}}
{{--                            Checks Which Have Today Last date <span><h3 >--}}
{{--                                {{$third_part_exist_check}}--}}
{{--                                </h3></span></p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-md-4" style="margin-top: 15px;">--}}
{{--                    <a href="http://www.jquery2dotnet.com" class="list-group-item visitor">--}}


{{--                        <p class="list-group-item-text">--}}
{{--                            Checks Which Have to Issued After Today  <span><h3 >--}}
{{--                                {{$third_party_before_current_date_check}}--}}
{{--                                </h3></span></p>--}}
{{--                    </a>--}}
{{--                </div>--}}

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
                                        Date
                                    </th>
                                    <th>
                                        Reference Number
                                    </th>
                                    <th>
                                        Vendor Name
                                    </th>

                                    <th>
                                        Payment_Type
                                    </th>
                                    <th>
                                        Third_Party_Payment_Type
                                    </th>
                                    <th>
                                        Ammount
                                    </th>
                                    {{--                                    <th>--}}
                                    {{--                                        Status--}}
                                    {{--                                    </th>--}}

                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                {{dd($third_party_current_date_check)}}--}}
                                @if(count((array)$third_party_current_date_check)>0)
                                    @foreach(@$third_party_current_date_check as $payments)
                                        {{--                                                                                {{dd($product)}}--}}
                                        <tr id="myTable">



                                            <td>
                                                <span class="label label-info">
                                                <span class="font-weight-bold">  {{date('d-m-Y',strtotime($payments->date))}}</span>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold"> {{sprintf('%04d',$payments->reference_number).date('-Y-m',strtotime($payments->date))}}</span>
                                            </td>
                                            {{--                                            @if($payments->vendor_id==$vendors->id)--}}
                                            <td>
                                                {{--                                                <option @if($invoice->product_id==$product->id) selected @endif value="{{$product->id}}" class="select_product">{{$product->name}}</option>--}}
                                                <span class="font-weight-bold"> {{$payments->payment->f_name}}</span>
                                            </td>
                                            {{--                                            @endif--}}
                                            <td>
                                                <span class="font-weight-bold"> {{$payments->payment_type}}</span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold"> {{$payments->third_party_payment_type}}</span>
                                            </td>


                                            <td>
                                                <span class="font-weight-bold"> Rs. {{number_format($payments->amount,2)}}</span>
                                            </td>

                                            {{--                                            <td>--}}
                                            {{--                                                @if($payments->payment_approval == 1)--}}
                                            {{--                                                    <span style="color: green;font-weight: bold">{{'Approved'}}</span>--}}
                                            {{--                                                @elseif($payments->payment_approval == 2)--}}
                                            {{--                                                    <span style="color: red;font-weight: bold">{{'Rejected'}}</span>--}}
                                            {{--                                                @elseif($payments->payment_approval == 0)--}}
                                            {{--                                                    <span style="color: orange;font-weight: bold">{{'Approval Pending'}}</span>--}}
                                            {{--                                                @endif--}}



                                            {{--                                            </td>--}}

                                            <td class="no-sort no-click text-right" id="bread-actions">
                                                {{--                                                                                                    {{dd($product->invitems[0]->item_name)}}--}}
                                                {{--                                                @foreach($product->invitems as $item_name)--}}
                                                {{--                                                                                                    {{dd($item_name->item_name)}}--}}
                                                {{--                                                @endforeach--}}
                                                <div class="btn-toolbar">
{{--                                                    <button dataid="{{$payments->id}}" class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
{{--                                                        <i class="voyager-trash"></i> <span>Delete</span>--}}
{{--                                                    </button>--}}
                                                    <div class="modal fade" id="myModal" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this ?</h4>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form action="{{url('admin/vendor_payments/destroy')}}" method="post">
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
                                                    {{--                                                    href='{{url("admin/payments_show/{$payments->id}")}}'--}}
                                                    <a href="{{url("admin/payments_show/{$payments->id}")}}"  class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-eye"></i> <span>View</span>
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

@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan

@section('javascript')
    <script>


        function commaSeparateNumber(val) {
            while (/(\d+)(\d{3})/.test(val.toString())) {
                val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            }
            return val;
        }

        $(document).ready(function() {
            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            })
        });

    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "order": false,
//                "order": [[ 1, "desc" ]],
                "pageLength": 25
                // "order": [[ 1, "asc" ]]
            } );
        } );
    </script>



@stop

