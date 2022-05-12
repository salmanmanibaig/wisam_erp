@extends('voyager::master')

@php  $customerset=App\Customer::first(); @endphp
@can('browse',$customerset)


@section('page_header')
    <style>
        .color{
            color: red;
        }
        .rejectColor{
            background: red;
        }
        .approveColor{
            background: mediumseagreen;
            color: whitesmoke;
        }
        .fixBody{
            position: absolute;
        }
        .fixPadding{
            padding-right: 0px !important;
        }
        .voyager .nav-tabs, .voyager .nav-tabs>li>a:hover {
            background-color: whitesmoke;
        }
        .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
            color: grey;
            background-color: white;
            border-color: transparent transparent white;
            font-size: 20px;
        }
        .nav-tabs>li.active>a{
            background: white;
            font-weight: bold;
        }
        .nav-tabs>li.hover>a:hover {
            font-weight: bold;
            background-color: red;
        }
        .btn {
            padding: 6px 15px;
            font-size: 12px;}
    </style>
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-12" style="margin-bottom: 0px">
                <form action="{{url('admin/supply-requisitions/create')}}" class="createForm">
                        <p class="page-title">
                            <i class="voyager-basket"></i>
                            Requisitions
                        </p>

                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-add-new">
                        <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
                    </button>



                    <!-- Modal -->
                    <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header approveColor" >
                                    <h3 class="modal-title " id="exampleModalLabel">Select Usage</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="radio-inline">
                                                <label for="factory"><input type="radio" id="factory" name="factory" value="Biotech" checked>Biotech</label>
                                            </div>
                                            <div class="radio-inline">
                                                <label for="lamitech"><input type="radio" id="lamitech" name="factory" value="Lamitech" >Lamitech</label>
                                            </div>
                                            <div class="radio-inline">
                                                <label for="Office"><input type="radio" id="Office" name="factory" value="Office" >Office</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary action pull-left closeModal" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success approveColor">GO</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>


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
        <div class="col-md-12" style="margin-bottom: 30px">

        </div>
        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 20px;">
                        <li class="nav-item">
                            <a class="nav-link active navRequisition" id="requisition-tab" data-toggle="tab" href="#requisition" role="tab" aria-controls="requisition" aria-selected="true">Requisitions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="quotation-tab" data-toggle="tab" href="#quotation" role="tab" aria-controls="quotation" aria-selected="false">Quotations</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="requisition" role="tabpanel" aria-labelledby="requisition-tab">
                            <div class="panel-body">
                                <style>
                                    .dataTables_wrapper .dataTables_filter input{
                                    }
                                </style>
{{--====================================== Requisition View =============================================--}}
                                <div class="table-responsive">
                                    <table id="example"  class="table example table-hover"  >
                                        <thead>
                                        <tr>
                                            <th>
                                                Requisition No
                                            </th>
                                            <th >
                                                Items
                                            </th>
                                            <th>
                                                Factory
                                            </th>
                                            <th>
                                                Remarks
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-weight-bold " id="tableRequisition">

{{--                                                                                {{dd($requisitions )}}--}}
                                        @foreach($requisitions as $kk =>$requisition)
                                            <tr id="myTable">

                                                <td>
                                                    {{sprintf('%04d',$requisition->referenceNumber).date('-Y-m',strtotime($requisition->date))}}
                                                </td>
                                                {{--                                        {{dd($requisition->requisitionDetail)}}--}}
                                                <td>@foreach($requisition->requisitionDetail as $key => $detail)

                                                        {{ \Illuminate\Support\Str::limit($detail->name, 15, $end='...') }}
                                                        @if($key==0)
                                                            @empty($requisition->requisitionDetail[1])
                                                                @break
                                                            @endempty
                                                            ,
                                                        @endif
                                                        @if($key==1)
                                                            , etc...
                                                            @break
                                                        @endif
                                                    @endforeach</td>
                                                <td>{{$requisition->factory}}</td>
                                                <td>
                                                    <a style="text-decoration: none; color: grey;" title="Remarks" data-toggle="popover" data-trigger="hover" data-content="{{$requisition->remarks}}">
                                                        {{ \Illuminate\Support\Str::limit($requisition->remarks, 15, $end='...') }}</a>
                                                    {{--                                            <a href="#" title="Remarks" data-toggle="popover" style="" data-content="{{$requisition->remarks}}"></a>{{$requisition->remarks}}--}}
                                                </td>
                                                @if($requisition->approvalStatus == 0)
                                                    <td style="color: orange"> Pending </td>
                                                @elseif($requisition->approvalStatus == 2)
                                                    <td class="color"> Rejected </td>
                                                @else
                                                    <td class="text-success">Approved</td>
                                                @endif
                                                <td>
                                                    {{date('m-d-y',strtotime($requisition->date))}}
                                                </td>


                                                <td class="no-sort no-click text-right" id="bread-actions">


                                                    <div class="btn-toolbar">

                                                        @if($requisition->approvalStatus == 0)
                                                            <div class="inline-block" >

{{--                ===============================Approve Reject Rquisiton================================--}}

{{--                                                                <button class="btn btn-success approve" dataid="{{$requisition->id}}" data-toggle="modal" data-target="#approvalAction"  style="margin-right: 5px;" ><i class="voyager-check-circle"></i>Approve</button>--}}
{{--                                                                <button class="btn btn-danger reject" dataid="{{$requisition->id}}" data-toggle="modal" data-target="#approvalAction"  ><i class="voyager-down-circled"></i> Reject</button>--}}
                                                                <div class="modal fade" id="approvalAction" tabindex="-1" role="dialog" aria-labelledby="approvalActionLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header approveModal bg-danger text-white" style="text-align: initial; color: white;">
                                                                                <h1 class="modal-title" id="approvalActionLabel">Please Confirm</h1>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body" style="text-align: initial;">
                                                                                <h3>Are you sure you want to Perform this action?</h3>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">No</button>
                                                                                <form action="{{url('admin/approve-requisition')}}" method="post">
                                                                                    @csrf
                                                                                    <input type="hidden" id="status" name="status" class="status">
                                                                                    <input type="hidden" id="actionId" value="10" name="actionId" class="actionId">
                                                                                    <button type="submit" class="btn approveModal" style="color: whitesmoke; float: right">Yes</button>
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            @if(Auth::user()->hasRole('admin'))

                                                                <button dataid="{{$requisition->id}}" class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-trash"></i>
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

                                                                                <form action="{{url('admin/supply-requisitions/destroy')}}" method="post">
                                                                                    {{csrf_field()}}
                                                                                    {{method_field('DELETE')}}
                                                                                    <input type="hidden" name="deleteid" id="deleteid">
                                                                                    <input type="hidden" name="status" id="status">
                                                                                    <button type="submit" class="btn btn-default pull-right" style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">Yes, Delete it!</button>
                                                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" >Close</button>

                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <a href='{{url("admin/supply-requisitions/$requisition->id")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px; margin: 5px;">
                                                                <i class="voyager-eye"></i>
                                                            </a>
                                                            <a href='{{url("admin/supply-requisitions/$requisition->id/edit")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                <i class="voyager-edit"></i>
                                                            </a>
                                                        </div>

                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="quotation" role="tabpanel" aria-labelledby="quotation-tab">
                            <div class="panel-body">
                                <style>
                                    .dataTables_wrapper .dataTables_filter input{
                                    }
                                </style>
                                <div class="table-responsive"   >


                                    {{--====================================== Quotation View =============================================--}}
                                    <table id="example" class="table example table-hover">
                                        <thead>
                                        <tr>
                                            <th>
                                                Quotation No
                                            </th>
                                            <th style="width: 100px;">
                                                Items
                                            </th>
                                            <th>
                                                Factory
                                            </th>
                                            <th>
                                                Remarks
                                            </th>
                                            <th>
                                                Current Status
                                            </th>
                                            <th>
                                                Total Price
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-weight-bold " id="tableQuotation">

                                        {{--                                        {{dd($requisitions )}}--}}
                                        @foreach($quotations as $key =>$quotation)
                                            <tr id="myTable">

                                                <td>
                                                    {{sprintf('%04d',$quotation->referenceNo).date('-Y-m',strtotime($quotation->date))}}
                                                </td>
                                                {{--                                        {{dd($requisition->requisitionDetail)}}--}}
                                                <td>@foreach($quotation->quotationDetails as $key => $detail)

                                                        {{ \Illuminate\Support\Str::limit($detail->name, 15, $end='...') }}
                                                        @if($key==0)
                                                            @empty($quotation->quotationDetails[1])
                                                                @break
                                                            @endempty
                                                            ,
                                                        @endif
                                                        @if($key==1)
                                                            , etc...
                                                            @break
                                                        @endif
                                                    @endforeach</td>
                                                <td>{{$quotation->factory}}</td>
                                                <td>
                                                    <a style="text-decoration: none; color: grey;" title="Remarks"
                                                       data-toggle="popover" data-trigger="hover"
                                                       data-content="{{$requisition->remarks}}">
                                                        {{ \Illuminate\Support\Str::limit($quotation->remarks, 15, $end='...') }}</a>
                                                    {{--                                            <a href="#" title="Remarks" data-toggle="popover" style="" data-content="{{$requisition->remarks}}"></a>{{$requisition->remarks}}--}}
                                                </td>
                                                @if($quotation->approvalStatus == 0)
                                                    <td style="color: orange"> Pending</td>
                                                @elseif($quotation->approvalStatus == 2)
                                                    <td class="color"> Rejected</td>
                                                @else
                                                    <td class="text-success">Approved</td>
                                                @endif
                                                <td>
                                                    {{$quotation->totalPrice}}
                                                </td>
                                                <td>
                                                    {{$quotation->status}}
                                                </td>
                                                <td>
                                                    {{date('m-d-y',strtotime($quotation->date))}}
                                                </td>


                                                <td class="no-sort no-click text-right" id="bread-actions">


                                                    <div class="btn-toolbar">

                                                        @if($quotation->approvalStatus == 0)

{{--                           ==============================Approve rejct quotation============================--}}
{{--                                                            <div class="inline-block">--}}
{{--                                                                <a href="{{url('admin/edit-quotation')}}/{{$quotation->id}}">--}}
{{--                                                                    <button class="btn btn-success "--}}
{{--                                                                            dataid="" data-toggle=""--}}
{{--                                                                            data-target="#approvalAction1" style=""><i--}}
{{--                                                                            class="voyager-check-circle"></i> Approve--}}
{{--                                                                    </button>--}}
{{--                                                                </a>--}}
{{--                                                                <button class="btn btn-success approve1"--}}
{{--                                                                        dataid="" data-toggle="modal"--}}
{{--                                                                        data-target="#approvalAction1"><i--}}
{{--                                                                        class="voyager-angle-up"></i> Approve Request--}}
{{--                                                                </button>--}}

{{--                                                                <button class="btn btn-danger reject1"--}}
{{--                                                                        style="margin-left: 4px;"--}}
{{--                                                                        dataid="{{$quotation->id}}" data-toggle="modal"--}}
{{--                                                                        data-target="#approvalAction1"><i--}}
{{--                                                                        class="voyager-down-circled"></i> Reject--}}
{{--                                                                </button>--}}
                                                                <div class="modal fade" id="approvalAction1"
                                                                     tabindex="-1" role="dialog"
                                                                     aria-labelledby="approvalActionLabel1"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div
                                                                                class="modal-header approveModal1 bg-danger text-white"
                                                                                style="text-align: initial; color: white;">
                                                                                <h1 class="modal-title"
                                                                                    id="approvalActionLabel1">Please
                                                                                    Confirm</h1>
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body"
                                                                                 style="text-align: initial;">
                                                                                <h3>Are you sure you want to Perform
                                                                                    this action?</h3>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                        class="btn btn-secondary closeModal"
                                                                                        data-dismiss="modal">No
                                                                                </button>
                                                                                <form
                                                                                    action="{{url('admin/approve-quotation')}}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <input type="hidden" id="status1"
                                                                                           name="status1" class="status1">
                                                                                    <input type="hidden" id="actionId1"
                                                                                           value="10" name="actionId1"
                                                                                           class="actionId1">
                                                                                    <button type="submit"
                                                                                            class="btn approveModal1"
                                                                                            style="color: whitesmoke; float: right">
                                                                                        Yes
                                                                                    </button>
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div>
                                                            @if(Auth::user()->hasRole('admin'))

                                                                <button data-id="{{$quotation->id}}"
                                                                        class="btn btn-danger pull-right deleteQuotation"
                                                                        style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-trash"></i>
                                                                </button>
                                                                <div class="modal fade" id="modalQuotation" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header"
                                                                                 style="background-color:#FA2A00;color:#fff;">
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal">&times;
                                                                                </button>
                                                                                <h4 class="modal-title"
                                                                                    style="text-align: left"><i
                                                                                        class="voyager-trash"></i>&nbsp;Are
                                                                                    you sure you want to delete this
                                                                                    Event ?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <form
                                                                                    action="{{url('admin/destroy-quotation')}}"
                                                                                    method="post">
                                                                                    {{csrf_field()}}
{{--                                                                                    {{method_field('DELETE')}}--}}
                                                                                    <input type="hidden" name="deleteidQuotation"
                                                                                           id="deleteidQuotation">
                                                                                    <input type="hidden" name="status"
                                                                                           id="status">
                                                                                    <button type="submit"
                                                                                            class="btn btn-default pull-right"
                                                                                            style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">
                                                                                        Yes, Delete it!
                                                                                    </button>
                                                                                    <button type="button"
                                                                                            class="btn btn-default pull-right"
                                                                                            data-dismiss="modal">Close
                                                                                    </button>

                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <a href='{{url("admin/show-quotation/$quotation->id")}}'
                                                               class="btn btn-warning pull-right des"
                                                               style="text-decoration: none; font-size: 12px;padding: 5px 7px; margin: 5px;">
                                                                <i class="voyager-eye"></i>
                                                            </a>
                                                            <a href='{{url("admin/edit-quotation/$quotation->id")}}'
                                                               class="btn btn-primary pull-right des"
                                                               style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                <i class="voyager-edit"></i>
                                                            </a>
                                                        </div>

                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{--                    <div class="topnav">--}}
{{--                        <a class="active navRequisition" href="#navRequisition">Requisition</a>--}}
{{--                        <a class="navQuotation" href="#navQuotation">Quotation</a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>





    <script>

        $(document).ready(function() {

            $('.deleteQuotation').click(function (){
                var id = $(this).attr('dataid')
                $('#deleteidQuotation').val(id);
                $('#modalQuotation').modal('show');
            })

            $('#tableRequisition').on('click','.deleteCustom',function (){
                var id = $(this).attr('dataid')
                $('#deleteid').val(id);
            })
            $('.navRequisition').trigger('click');

            $('.closeModal').click(function (){
                $('.voyager').addClass('fixPadding');
            })
// Requisition
            $('.reject').click(function (){

                var id =  $(this).attr('dataid')
                $('.approveModal').removeClass('approveColor');
                $('.approveModal').addClass('rejectColor');
                $('.actionId').val(id);
                $('.status').val(2);
            })

            $('.approve').click(function (){
                $('.approveModal').removeClass('rejectColor');
                $('.approveModal').addClass('approveColor');
               var id =  $(this).attr('dataid')
                $('.actionId').val(id);
                $('.status').val(1);
            })

            //Quatation
            $('.reject1').click(function (){

                var id =  $(this).attr('dataid')
                $('.approveModal1').removeClass('approveColor');
                $('.approveModal1').addClass('rejectColor');
                $('.actionId1').val(id);
                $('.status1').val(2);
            })

            $('.approve1').click(function (){
                $('.approveModal1').removeClass('rejectColor');
                $('.approveModal1').addClass('approveColor');
                var id =  $(this).attr('dataid')
                $('.actionId1').val(id);
                $('.status1').val(1);
            })

            // $('.approve').click(function (e){
            //     $(this).closest('tr').find('.approveRequest').remove();
            //     var id = $('.approveId').val();
            //     $.ajax({
            //         url: '/admin/approve-requisition/'+ id,
            //         type: 'post',
            //         success: function (response){
            //             console.log(response)
            //         }
            //     })
            //
            // })

            $('[data-toggle="popover"]').popover();

            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });})
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.example').DataTable( {
                // "order": false
                // "order": [[ 1, "desc" ]],
                "pageLength": 25
                // "order": [[ 1, "asc" ]]
            } );
        } );
    </script>




@stop

@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan

@section('javascript')


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
