@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('read',$customerset)


@section('page_header')
    <style>
        .blk{
            color:black;
        }
        .form-control {
            color: black;
            background-color: #fff;
            background-image: none;
            border: 1px solid #e0dcdc;
        }
        .form-control[disabled], .form-control[readonly], .fieldset[disabled] .form-control {
            background-color: #fff;
            opacity: 1;
        }
    </style>
    <h1 class="page-title">
        <i class=""></i> {{ __('voyager::generic.viewing') }}

        <a href="{{url('admin/edit-quotation/'.$lpo->id)}}" class="btn btn-info customBtn">
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
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <!-- PUT Method if we are editing -->
                    <!-- CSRF TOKEN -->
                    {{ csrf_field() }}
                    <div class="panel-body">
                    {{--<div class="alert alert-danger">--}}
                    {{--<ul>--}}
                    {{--<li></li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    <!-- Adding / Editing -->
                        <!-- GET THE DISPLAY OPTIONS -->
                        <legend class="" style="">Local Purchase Order</legend>
                        <div class="row">
                            <div class="col-md-8">

                                <label for="number" class="font-weight-bold">Quotation No: <span class="color"></span></label>
                                <h4>{{sprintf("%04d",$referenceNo).date('-y-m',strtotime($lpo->date))}}</h4>
                                <br>
                                {{--                                    <label for="" class="font-weight-bold">00</label>--}}
                                <input type="hidden" name="referenceNumber" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="date" class="font-weight-bold">Date : <span class="color">*</span></label>
                                <input type="date" name="date" value="{{date('yy-m-d', strtotime($lpo->date))}}" readonly class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="factory" class="font-weight-bold">Usage : <span class="color">*</span></label>
                                <input type="text" name="factory" value="{{$lpo->factory}}" readonly class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="Remarks" class="font-weight-bold">Remarks : <span class="color">*</span></label>
                                <input type="text" name="Remarks" value="{{$lpo->remarks}}" readonly class="form-control">
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
                                        <th>ITEM PRICE</th>
                                    </tr>
                                    </thead>
                                    <tbody id="accTable">
                                    @foreach($lpo->purchaseOrderDetails as $detail)
                                        <tr>
                                            <td>
                                                <input name="item_id[]" readonly value="{{$detail->name}}"  id="" class="form-control  item_id">
                                            </td>
                                            <td>
                                                <input name="category[]" id="" value="{{$detail->category}}" class="form-control category" readonly>
                                            </td>
                                            <td>
                                                <input name="uom[]" id=""  value="{{$detail->uomName}}" class="form-control uom" readonly>
                                            </td>
                                            <td>
                                                <input type="number" readonly name="quantity[]" value="{{$detail->quantity}}" id="" class="form-control">
                                            </td>
                                            <td>
                                                <input type="number"  value="{{$detail->price}}" readonly id="" class="form-control">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{--                                    <div class="col-md-3" style="border: none; margin-top: 20px; float: right; padding-left: 20px;">--}}


                                {{--                                    </div>--}}
                            </div>
                        </div>





                        {{--<div class="row">--}}

                    </div><!-- panel-body -->

                    <div class="panel-footer" style="height: 100px;">
                        <div class="input-group" style="float: right">
                            <label for="totalPrice" class="font-weight-bold"> Total Price:</label><br>
                            <input type="number"  value="{{$lpo->totalPrice}}" readonly id="" class="form-control col-md-2" >
                        </div>
                    </div>
                    {{--<iframe id="form_target" name="form_target" style="display:none"></iframe>--}}
                    {{--<form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"--}}
                    {{--enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">--}}
                    {{--<input name="image" id="upload_file" type="file"--}}
                    {{--onchange="$('#my_form').submit();this.value='';">--}}
                    {{--<input type="hidden" name="type_slug" id="type_slug" value="">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--</form>--}}


{{--                    <a href="{{url('admin/approve-quotation')}}/{{$lpo->id}}">--}}
{{--                        <div class="panel-footer">--}}
{{--                            <button class="btn btn-success"><i class="voyager-check-circle"></i>Request for Approve </button>--}}
{{--                        </div>--}}
{{--                    </a>--}}


                </div>


            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} ">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')

    <script>
        $(document).ready(function () {
            $('.side-body').multilingual();
        });
    </script>
    <script src="{{ voyager_asset('js/multilingual.js') }}"></script>

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
