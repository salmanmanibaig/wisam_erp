@extends('voyager::master')

{{--@php  $customerset=App\Customer::first(); @endphp--}}
{{--@can('browse',$customerset)--}}

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-people"></i>
                    Vendor Report
                </p>

                <a href="{{url('admin/reports_create')}}" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>{{ __('New Report') }}</span>
                </a>
            </div>
            <div class="col-md-6" style="margin-bottom: 0px">
                @if ($message = Session::get('info'))
                    <div class="alert alert-success alert-block" style="opacity: 0.7">
                        <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×
                        </button>
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
{{--        {{dd($vendors_amount)}}--}}
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <h3><i class="glyphicon glyphicon-list-alt" style="color: green;margin-right: 10px;"></i>Vendor Name: {{$vendor_name}}</h3>
                        </div>
                        <div class="col-md-4">

                            <h3>From: <span>{{ Carbon\Carbon::parse($start_date)->format('d-m-Y') }}</span></h3>
                        </div>
                        <div class="col-md-4">
                            <h3> <span class="">To: {{ Carbon\Carbon::parse($end_date)->format('d-m-Y') }}</span></h3>
                        </div>

                    </div>
                    <div class="panel-body">


                        <div class="table-responsive">
                            <table id="example" class="table table-hover">
                                <thead>
                                <tr>

                                    <th>
                                        <input type="checkbox" class="select_all">
                                    </th>

                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Narration
                                    </th>
                                    <th>
                                        Payments Amount
                                    </th>
                                    <th>
                                        Invoice Amount
                                    </th>

                                    <th>
                                        Balance
                                    </th>


                                    {{--                                                                        <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>--}}
                                </tr>
                                </thead>

                                <tbody>
{{--                                {{$data->total}}--}}

                                @foreach($data as $key =>   $amount)
{{--{{dd($data)}}--}}
{{--                                    {{dd()}}--}}
                                    {{--                                @if(count($vendors_amount)>0)--}}


                                    <tr id="myTable">

                                        <td>
                                            <input type="checkbox" name="row_id" id="checkbox" value="">
                                        </td>
                                        <td>
                                            @if(@$amount['inv_amount'] )
                                                {{--                                            {{$amount['total']}}--}}
                                                {{ Carbon\Carbon::parse($amount['created_at'])->format('d-m-Y') }}
{{--                                                {{$amount['created_at']->format('d-m-Y')}}--}}
                                            @else
{{--                                                {{$amount['created_at']->format('d-m-Y')}}--}}
                                                {{ Carbon\Carbon::parse($amount['created_at'])->format('d-m-Y') }}
                                            @endif

                                        </td>
                                        <td>
                                            @if(@$amount['amount'] )
                                                {{--                                            {{$amount['total']}}--}}
                                                {{$amount['narration']}}
                                            @else

                                            @endif
                                                @if(@$amount['inv_amount'] )
                                                    {{--                                            {{$amount['total']}}--}}
                                                    {{$amount['narration']}}
                                                @else

                                                @endif
                                        </td>


                                        <td>
                                              @if(@$amount['amount'] )
{{--                                            {{$amount['total']}}--}}

                                                <span class="glyphicon glyphicon-arrow-up" style="color: green;">{{$amount['amount']}}</span>

                                            @else

                                            @endif

                                        </td>
                                        <td>
                                            @if(@$amount['inv_amount'] )
{{--                                                <input type="hidden" class="" value="{{$amount['id']}}">--}}
                                                <span class="glyphicon glyphicon-arrow-down" style="color: red;">{{$amount['inv_amount']}}</span>
{{--                                                <a id="view_invoice" class="view_invoice" href="{{url('admin/invoice_view/'.$amount['id'])}}"><span id="view" class=" view glyphicon glyphicon-search" style="color: blue;size: 20px;margin-left: 8px;"></span></a>--}}
                                            @else

                                            @endif
                                        </td>


                                        <td>
                                            @if(@$amount['balance'] )
                                                {{--                                            {{$amount['total']}}--}}
                                                {{$amount['balance']}}
                                            @else
                                                {{$amount['balance']}}
                                            @endif
                                        </td>

                                    </tr>


                                    {{--                                @endif--}}


                                </tbody>
                                @endforeach
                                <tr class="brought_forward_tr">
                                    <td></td>
                                    <td></td>
                                    <td>Brought Forward=<p class="brought_forward_amount">{{$temp1}}</p></td>
                                    <td></td>
                                    <td></td>


                                </tr>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

{{--@else--}}
{{--    @include('vendor.voyager.errors.authenticate_error')--}}

{{--@endcan--}}
@section('javascript')

    <script>
        isItANumber();
        $(document).ready(function () {
            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
                isItANumber();
            })
        });
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    // <script>
    //     $(document).ready(function () {
    //         $('#example').DataTable({
    //             // "order": false
    //             "order": [[1, "desc"]],
    //             "pageLength": 25,
    //             // "order": [[ 1, "asc" ]]
    //
    //         })
    //
    //     });
    //  </script>


    <!-- DataTables -->
    {{--@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))--}}
    {{--<script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>--}}
    {{--@endif--}}
    {{--<script>--}}
    <script>
        $(document).ready(function(){
            // $brought_forward= $('.brought_forward_tr').closest('.brought_forward_amount').text();

            var $brought_forward = $('.brought_forward_amount').text();
            // alert($brought_forward);

            if($brought_forward==0) {
                $(".brought_forward_tr").hide();
            }
            else{
                $(".brought_forward_tr").show();
            }
        });
     </script>

@stop
