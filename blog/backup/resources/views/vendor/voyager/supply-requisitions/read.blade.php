@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('read',$customerset)


@section('page_header')
    <style>
        .blk{
            color:black;
        }

    </style>
    <h1 class="page-title">
        <i class=""></i> {{ __('voyager::generic.viewing') }} Requisition

            <a href="{{url('admin/supply-requisitions/'.$requisitions->id.'/edit')}}" class="btn btn-info customBtn">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                {{ __('voyager::generic.edit') }}
            </a>


            {{--<a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger customBtn" data-id="" id="">--}}
                {{--<i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>--}}
            {{--</a>--}}


        <a href="{{url('admin/supply-requisitions')}}" class="btn btn-warning customBtn">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </h1>

@stop

@section('content')
    <div class="page-content read container-fluid ">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form action="{{url('admin/approve-requisition/')}}/{{$requisitions->id}}" method="post">

                    <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
{{--                        {{ csrf_field() }}--}}


                                @if($requisitions->approvalStatus ==0)<div class="panel-heading" style="background: #f4a52a;" ><legend class="font-weight-bold" style="text-align: center; border-bottom: none; margin-bottom: 0px;margin-top: 0px;color: white;">PENDING</legend></div>
                                @elseif($requisitions->approvalStatus ==2)<div class="panel-heading" style="background: #F32013;" ><legend class="font-weight-bold" style="text-align: center; border-bottom: none; margin-bottom: 0px;margin-top: 0px;color: white;">REJECTED</legend></div>
                                @elseif($requisitions->approvalStatus ==3)<div class="panel-heading" style="background: #4BB543 ;" ><legend class="font-weight-bold" style="text-align: center; border-bottom: none; margin-bottom: 0px;margin-top: 0px;color: white;">APPROVED AS QUOTATION</legend></div>
                                @elseif($requisitions->approvalStatus ==1)<div class="panel-heading" style="background: #4BB543 ;" ><legend class="font-weight-bold" style="text-align: center; border-bottom: none; margin-bottom: 0px;margin-top: 0px;color: white;">APPROVED AS LOCAL PURCHASE ORDER</legend></div>@endif


{{--                        <legend class="" style="">--}}
{{--                            @if($requisitions->approvalStatus ==0)<legend class="font-weight-bold" style="text-align: center; border-bottom: none; margin-bottom: 0px;margin-top: 0px;color: #f4a52a;">PENDING</legend>--}}
{{--                            @elseif($requisitions->approvalStatus ==2)<legend class="font-weight-bold" style="text-align: center; border-bottom: none; margin-bottom: 0px;margin-top: 0px;color: red;">REJECTED</legend>--}}
{{--                            @elseif($requisitions->approvalStatus ==3)<legend class="font-weight-bold" style="text-align: center; border-bottom: none; margin-bottom: 0px;margin-top: 0px;color: green;">APPROVED AS QUOTATION</legend>--}}
{{--                            @elseif($requisitions->approvalStatus ==1)<legend class="font-weight-bold" style="text-align: center; border-bottom: none; margin-bottom: 0px;margin-top: 0px;color: green;">APPROVED AS LOCAL PURCHASE ORDER</legend>@endif--}}
{{--                        </legend>--}}
                        <div class="panel-body">
                        {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                        {{--<li></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        <!-- Adding / Editing -->
                            <!-- GET THE DISPLAY OPTIONS -->

                            <div class="row">
                                <div class="col-md-8">
                                    <label for="number" class="font-weight-bold">Requisition No: <span class="color"></span></label>
                                    <h4>{{sprintf("%04d",$requisitionNo).date('-y-m',strtotime($requisitions->date))}}</h4>
                                    <br>
{{--                                    <label for="" class="font-weight-bold">00</label>--}}
                                    <input type="hidden" name="referenceNumber" value="">
                                </div>
                            </div>
                            <input type="hidden" name="requisition_id" value="{{$requisitions->id}}">
                            <div class="row">
                                <div class="col-md-4">
                                        <label for="date" class="font-weight-bold">Date : <span class="color">*</span></label>
                                        <input type="date" name="date" value="{{date('yy-m-d', strtotime($requisitions->date))}}" readonly class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="factory" class="font-weight-bold">Usage : <span class="color">*</span></label>
                                    <input type="text" name="factory" value="{{$requisitions->factory}}" readonly class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="Remarks" class="font-weight-bold">Remarks : <span class="color">*</span></label>
                                    <input type="text" name="Remarks" value="{{$requisitions->remarks}}" readonly class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="table table-responsive">
                                    <table class="table table-striped " id="myTable">
                                        <thead>
                                        <tr>
                                            <th>
                                                ITEM
                                            </th>
                                            <th>
                                                ITEM CATEGORY
                                            </th>
                                            <th>
                                                ITEM UOM
                                            </th>
                                            <th>
                                                ITEM QUANTITY
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="accTable">
                                        @foreach($requisitions->requisitionDetail as $detail)
                                        <tr>
                                            <input type="hidden" name="item-id[]" value="{{$detail->item_id}}">
                                            <td>
                                                <input name="item_name[]" readonly value="{{$detail->name}}"  id="" class="form-control  item_id">
                                            </td>
                                            <td>
                                                <input name="category[]" id="" value="{{$detail->category}}" class="form-control category" readonly>
                                            </td>
                                            <td>
                                                <input name="uom[]" id=""  value="{{$detail->uom}}" class="form-control uom" readonly>
                                            </td>
                                            <td>
                                                <input type="number" readonly name="quantity[]" value="{{$detail->quantity}}" id="" class="form-control">
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>





                            {{--<div class="row">--}}

                        </div><!-- panel-body -->
                        @if($requisitions->approvalStatus ==0)
                    <div class="panel-footer" style="height: 150px;">

                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <div class="action">
                                    @csrf
                                    <label for="approve"  class="font-weight-bold">Approve Requisition: <span
                                            class="color">*</span></label>
                                    <select name="approve" id="selectApprove" required class="form-control">
                                        <option value="">Select One</option>
                                        <option value="1">Local Purchase Order</option>
                                        <option value="3">Quotation</option>
                                        <option value="2">Reject</option>
                                    </select>

                                {{--                            <button class="btn btn-success"><i class="voyager-check-circle"></i> Approve Quotation</button>--}}
                                {{--                            <button class="btn btn-primary action pull-right"><i class="voyager-check-circle"></i>Approve Local Purchase Order</button>--}}
                            <div class="col-md-3"></div>
                            <div class="col-md-6" style="margin-top: 10px;">
                                <button type="submit" id="btnApprove" class="btn btn-success"  data-toggle="modal" data-target="#exampleModalLong">Approve</button>

                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" id="modal-header">

                                            </div>
                                            <div class="modal-body" id="modal-body">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary action pull-left closeModal" data-dismiss="modal" >Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                    </div>
                            @endif
                    </form>

                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.side-body').multilingual();

            $('#btnApprove').on('click',function(e){
                e.preventDefault()

                if($('#selectApprove').val() == 1)
                {
                    $('#modal-body').find('#desc').remove()
                    $('#modal-header').find('#descHead').remove()
                    $('#modal-header').append('<div id="descHead" style="color: dodgerblue"> \n' +
                        '                                                    <h2>Lpo Description</h2>\n' +
                        '                                                </div>')
                    $('#modal-body').append(' <div id="desc">\n' +
                        '                                                    <textarea class="form-control" id="descriptionLpo" required rows="3" name="descriptionLpo" ></textarea>\n' +
                        '                                                </div>')
                } else if($('#selectApprove').val() == 2){

                    $('#modal-header').find('#descHead').remove()
                    $('#modal-header').append('<div id="descHead" style="color: red;"> \n' +
                        '                                                    <h1>Are you Sure You want to Reject this?</h1>\n' +
                        '                                                </div>')
                }else if($('#selectApprove').val()==3){
                    $('#modal-header').find('#descHead').remove()
                    $('#modal-header').append('<div id="descHead" style="color: dodgerblue;"> \n' +
                        '                                                    <h1>Are you Sure You want to Approve Quotation?</h1>\n' +
                        '                                                </div>')
                }else {
                    $('#modal-header').find('#descHead').remove()
                    $('#modal-header').append('<div id="descHead" style="color: dodgerblue;"> \n' +
                        '                                                    <h1>Please Chose an Option</h1>\n' +
                        '                                                </div>')
                }
            })
        });
        $('#selectApprove').on('change',function (){

        })

        $('.closeModal').on('click',function (){
            $('#modal-body').find('#desc').remove()
            $('#modal-header').find('#descHead').remove()
        })
    </script>
    <script src="{{ voyager_asset('js/multilingual.js') }}"></script>

@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')


    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

    </script>
@stop
