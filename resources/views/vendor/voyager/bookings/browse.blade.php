@extends('voyager::master')

@php  $role_check=App\Booking::first(); @endphp
@can('browse',$role_check)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-bag"></i>
                    Bookings
                </p>

                <a href="{{url('admin/bookings/create')}}" type="button" class="btn btn-success ">
                    <i class="voyager-sun"></i> <span>Add New</span>
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

    </div>
@stop

@section('content')
    <style>
        .progress {
            height: 25px;
            box-shadow: none;
        }.progress {
             margin-bottom: 20px;
             background-color: #d4dbe0;
         }
        .status{
            background: grey;
            width: 74px;
            color: white;
            height: 31px;
            float: left;
            padding-top: 5px;
            text-align: center;
            display: block;
            margin-bottom: 4px;
        }

    </style>

    <div class="page-content browse container-fluid">
        {{--@include('voyager::alerts')--}}
        <div class="row" >
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <div class="panel-body">


                        <div class="table-responsive">
                            <table id="example" class="table table-hover"  >
                                <thead>
                                <tr>

                                    <th >
                                        ID
                                    </th>

                                    <th >
                                       ORDER DATE
                                    </th>

                                    <th >
                                            STATUS
                                    </th>

                                    <th >
                                            SHIPMENT TYPE
                                    </th>


                                    <th >
                                        Created At
                                    </th>

                                    <th >
                                       Updated AT
                                    </th>

                                    <th >
                                       ORDER WEIGHT
                                    </th>

                                    <th >
                                       ORDER PIECE
                                    </th>

                                    <th >
                                       COD AMOUNT
                                    </th>

                                    <th >
                                        CUSTOMER REFERENCE NO
                                    </th>

                                    <th >
                                        PRODUCT DETAIL
                                    </th>

                                    <th >
                                        PICK POINT
                                    </th>

                                    <th >
                                        RETURN SHIPMENT
                                    </th>

                                    <th >
                                        C NAME
                                    </th>

                                    <th >
                                        C PHONE
                                    </th>

                                    <th >
                                        C EMAIL
                                    </th>

                                    <th >
                                        D CITY
                                    </th>

                                    <th >
                                        C ADDRESS
                                    </th>

                                    <th >
                                        REMARK
                                    </th>

                                    <th >
                                        SP HANDLING
                                    </th>

                                    <th >
                                        USER ID
                                    </th>

                                    <th >
                                        CN NUMBER
                                    </th>


                                    {{--<th>--}}
                                        {{--Course Name--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                        {{--Category--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                        {{--Course Price--}}
                                    {{--</th>--}}
                                    {{--<th style="width: 100px">--}}
                                        {{--Status--}}
                                    {{--</th>--}}


                                    {{--<th class="actions text-right" style="width: 120px;">{{ __('voyager::generic.actions') }}</th>--}}
                                </tr>

                                </thead>
                                <tbody>

                                <li class="m-t-5 open active">
                                    <a href="javascript:;">
                                        <span class="title">Booking</span>
                                        <span class="arrow open active"></span>
                                    </a>
                                    <span class="bg-primary icon-thumbnail themebtn"><i class="pg-cupboard"></i></span>
                                    <ul class="sub-menu" style="display: block;">
                                        <li class="">
                                            <a href="https://delex.pk/Booking">Single Booking</a>
                                            <span class="icon-thumbnail">BOK</span>
                                        </li>
                                        <li class="">
                                            <a href="https://delex.pk/Booking/import_booking_view">Import Booking File</a>
                                            <span class="icon-thumbnail">IMP</span>
                                            <div class="card-body">
                                                <h3 class="text-info no-margin">Import Booking</h3>
                                                <br>
                                                <p>Download CSV File.
                                                    <br>
                                                    Insert Data.
                                                    <br>
                                                    Then Upload CSV File
                                                </p>
                                                <br>

                                                <div class="form-group form-group-default" id="event_file_div">
                                                    <label>CSV File</label>
                                                    <input type="file" class="form-control" name="filename" id="file_upload" accept=".csv">
                                                </div>


                                                <div class="clearfix"></div>
                                                <button type="button" onclick="imp_file_upload()" class="btn btn-info pull-right" tablindex="3"><i class="pg-form"></i> Upload File</button>

                                                <div id="error-message"></div>
                                                <a href="https://delex.pk/Booking/error_data" id="eeror" style="display: none;">(Click Here For View Error)</a>
                                                <div id="1-success-message"></div>


                                            </div>
                                        </li>









                                        <li class="">
                                            <a href="https://delex.pk/Shopify">Import From Shopify</a>
                                            <span class="icon-thumbnail">SPY</span>
                                        </li>
                                    </ul>
                                </li>








                                @if(count($booking)>0)
                                    @foreach($booking as $key => $book)



                                        <tr id="myTable">

                                            <td>
                                                <span class="font-weight-bold">{{$book->id}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->order_date}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->status}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book-> shipment_type}}</span>
                                            </td>


                                            <td>
                                                <span class="font-weight-bold">{{$book->created_at}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->updated_at}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->order_weight}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->order_piece}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->cod_amount}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->customer_reference_no}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->product_detail}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->pick_point}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->return_shipment}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->c_name}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->c_phone}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->c_email}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->d_city}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->c_address}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->remark}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->sp_handling}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->user_id}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$book->cn_number}}</span>
                                            </td>


                                            {{--<td>--}}
                                                {{--<span class="font-weight-bold">{{$book->course_name}}</span>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}

                                                {{--<span class="font-weight-bold">{{@$course->cat_course->cat_name}}</span>--}}
                                            {{--</td>--}}

                                            {{--<td>--}}
                                                {{--<span class="font-weight-bold">{{$course->course_price}}</span>--}}
                                            {{--</td>--}}
{{--                                            {{dd($course)}}--}}
                                            {{--<td>--}}
                                                {{--@if($course->publish)--}}
                                                {{--<div class="font-weight-bold status text-uppercase  ">{{$course->publish}}</div><br>--}}
                                                {{--@endif--}}
                                                {{--@if($course->trending)--}}
                                                {{--<div class="font-weight-bold status text-uppercase" style="background: #4dbd74 !important">{{$course->trending}}</div><br>--}}
                                                  {{--@endif--}}
                                                  {{--@if($course->feature)--}}
                                                {{--<span class="font-weight-bold status" style="background: yellowgreen"><span class="text-uppercase">{{$course->feature}}</span></span><br>--}}
                                                  {{--@endif--}}
                                                  {{--@if($course->popular)--}}
                                                {{--<span class="font-weight-bold status text-uppercase" style="background: #20a8d8 !important">{{$course->popular}}</span><br>--}}
                                                  {{--@endif--}}
                                                  {{--@if($course->free)--}}
                                                {{--<span class="font-weight-bold status text-uppercase" style="background: #f39c12">{{$course->free}}</span>--}}
                                                  {{--@endif--}}
                                            {{--</td>--}}

                                            {{--<td class="no-sort no-click text-right" id="bread-actions">--}}
                                                {{--<div class="btn-toolbar">--}}
                                                    {{--<a href='{{url("admin/courses/{$course->id}/edit")}}' class="btn btn-info pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                        {{--<i class="voyager-eye"></i> <span>Edit</span>--}}
                                                    {{--</a>--}}

                                                    {{--<a href='{{url("admin/courses/{$course->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                        {{--<i class="voyager-eye"></i> <span>Read</span>--}}
                                                    {{--</a>--}}
                                                    {{--@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('student'))--}}
                                                        {{--<button type="button" class="btn btn-success pull-right" data-toggle="modal" style="text-decoration: none; font-size: 12px;padding: 5px 7px"--}}
                                                                {{--data-target="#edit"  data-category="{{$course->cat_name}}" data-id="{{$course->id}}">--}}
                                                            {{--<i class="voyager-eye"></i> <span>Register Course</span>--}}
                                                        {{--</button>--}}
{{--                                                    <a href='{{url("admin/registration/{$course->id}")}}' class="btn btn-success pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
{{--                                                        <i class="voyager-eye"></i> <span>Register Course</span>--}}
{{--                                                    </a>--}}
                                                    {{--@endif--}}
                                                {{--</div>--}}
                                            {{--</td>--}}

                                        </tr>


                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                        {{--<div class="modal fade" id="edit" style="display: none;">--}}
                            {{--<div class="modal-dialog">--}}
                                {{--<div class="modal-content">--}}
                                    {{--<div class="modal-header" style="padding-bottom: 0px">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                            {{--<span aria-hidden="true">×</span></button>--}}
                                        {{--<h4 class="modal-title alert alert-warning" style="margin-bottom: 0px">Update Category</h4>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-body">--}}
                                        {{--<form action="{{url('admin/course-categories/update')}}" method="post" enctype="multipart/form-data">--}}
                                            {{--{{csrf_field()}}--}}
                                            {{--{{method_field('put')}}--}}
                                            {{--<input type="hidden" name="id" id="id" value="">--}}
                                            {{--<div class="row">--}}
                                                {{--<div class="col-md-6" style="margin-bottom: 0px">--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<label style="font-weight: bold">Course Name</label>--}}
                                                        {{--<input type="text" class="form-control"  name="cat_name" id="category" >--}}

                                                    {{--</div>--}}

                                                {{--</div>--}}
                                                {{--<div class="col-md-6" style="margin-bottom: 0px;">--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<label style="font-weight: bold">Category Name</label>--}}
                                                        {{--<input type="text" class="form-control"  name="cat_name" id="category" >--}}

                                                    {{--</div>--}}

                                                {{--</div>--}}

                                                {{--<div class="col-md-6" style="margin-bottom: 0px">--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<label style="font-weight: bold">Course Price</label>--}}
                                                        {{--<input type="text" class="form-control"  name="cat_name" id="category" >--}}

                                                    {{--</div>--}}

                                                {{--</div>--}}

                                                {{--<div class="col-md-12" style="margin-bottom: 0px">--}}
                                                    {{--<div class="form-group">--}}
                                                        {{--<label style="font-weight: bold">Category</label>--}}
                                                        {{--<input type="file" class="form-control"  name="cat_name" id="category" >--}}

                                                    {{--</div>--}}

                                                {{--</div>--}}

                                            {{--</div>--}}

                                            {{--<div class="modal-footer">--}}
                                                {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
                                                {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--<!-- /.modal-content -->--}}
                            {{--</div>--}}
                            {{--<!-- /.modal-dialog -->--}}
                        {{--</div>--}}

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
        $('#edit').on('show.bs.modal', function (event) {
            // console.log('model opened');
            var button = $(event.relatedTarget) // Button that triggered the modal
            var category = button.data('category') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes
            console.log(id);

            var modal = $(this)
            modal.find('.modal-title').text('Are You Sure You Want to Subscribe This Course')
            modal.find('.modal-body #category').val(category)
            modal.find('.modal-body #id').val(id)
        });
    </script>

    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "order": false,
                "pageLength": 50
//                "order": [[ 3, "desc" ]]
            } );
        } );
    </script>



@stop
