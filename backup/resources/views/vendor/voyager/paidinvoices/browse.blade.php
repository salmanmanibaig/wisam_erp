@extends('voyager::master')

@php  $role_check=App\Booking::first(); @endphp
@can('browse',$role_check)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-bag"></i>
                    Paid Invoices
                </p>

                <a href="{{url('admin/paidinvoices/create')}}" type="button" class="btn btn-success ">
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
            <div class="row">



                <div class="col-xl-12 col-lg-12 ">
                    <div class="card m-t-10">
                        <div class="card-header  separator">
                            <div class="card-title"><h2>Paid Invoices</h2>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row clearfix">

                                <div class="col-md-5">

                                </div>
                            </div>
                            <br>


                            <div class="row">

                                <div class="col-xl-12 col-lg-12">
                                    <div class="table-responsive">
                                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer"><div class="dt-buttons"><a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="myTable" href="#" title="PDF"><span><i class="fs-14 pg-download"></i> PDF</span></a><a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="myTable" href="#" title="Excel"><span><i class="fs-14 pg-form"></i> Excel</span></a><a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="myTable" href="#" title="Copy"><span><i class="fs-14 pg-note"></i> Copy</span></a><a class="dt-button buttons-print" tabindex="0" aria-controls="myTable" href="#" title="Print"><span><i class="fs-14 pg-ui"></i> Print</span></a></div><div class="dataTables_length" id="myTable_length"><label>Show <select name="myTable_length" aria-controls="myTable" class=""><option value="-1">All</option><option value="10">10</option><option value="25">25</option><option value="50">50</option></select> entries</label></div><div id="myTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="myTable"></label></div><table class="table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                                                <thead>
                                                <tr style="background-image:linear-gradient(45deg, #1f3953, #795548);" role="row"><th style="color: white; border-color: rgb(31, 57, 83); width: 15px;" class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sr #: activate to sort column descending">Sr #</th><th style="color: white; border-color: rgb(31, 57, 83); width: 77px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Invoice Code: activate to sort column ascending">Invoice Code</th><th style="color: white; border-color: rgb(31, 57, 83); width: 68px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Invoice Date: activate to sort column ascending">Invoice Date</th><th style="color: white; border-color: rgb(31, 57, 83); width: 28px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="COD: activate to sort column ascending">COD</th><th style="color: white; border-color: rgb(31, 57, 83); width: 67px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Service Charges: activate to sort column ascending">Service Charges</th><th style="color: white; border-color: rgb(31, 57, 83); width: 61px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="SP Handling: activate to sort column ascending">SP Handling</th><th style="color: white; border-color: rgb(121, 85, 72); width: 68px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Cash Handling: activate to sort column ascending">Cash Handling</th><th style="color: white; border-color: rgb(121, 85, 72); width: 26px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Fuel: activate to sort column ascending">Fuel</th><th style="color: white; border-color: rgb(121, 85, 72); width: 31px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Flyer: activate to sort column ascending">Flyer</th><th style="color: white; border-color: rgb(121, 85, 72); width: 27px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="OSA: activate to sort column ascending">OSA</th><th style="color: white; border-color: rgb(121, 85, 72); width: 36px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Other: activate to sort column ascending">Other</th><th style="color: white; border-color: rgb(121, 85, 72); width: 25px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="GST: activate to sort column ascending">GST</th><th style="color: white; border-color: rgb(121, 85, 72); width: 23px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Net: activate to sort column ascending">Net</th><th style="color: white; border-color: rgb(121, 85, 72); width: 91px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Invoice_Action: activate to sort column ascending">Invoice_Action</th></tr>
                                                </thead>
                                                <tbody id="resultTable">

                                                <tr role="row" class="odd"><td class="sorting_1"><center>1</center></td><td><center>INV191100011  <span class="label font-montserrat fs-11">1</span></center></td><td><center>2019-11-05 14:03:08</center></td><td><center>1,490</center></td><td><center>170</center></td><td><center>0</center></td><td><center>0</center></td><td><center>0</center></td><td><center>450</center></td><td><center>0</center></td><td><center>0</center></td><td><center>27</center></td><td><center>843</center></td><td><center><a href="https://delex.pk/Invoice/invoice_detail/6" class="btn btn-xs btn-info">View</a> <a href="https://delex.pk/Invoice/export_invoice_detail/6" class="btn btn-xs btn-info">EXPORT</a></center></td></tr><tr role="row" class="even"><td class="sorting_1"><center>2</center></td><td><center>INV191000006  <span class="label font-montserrat fs-11">4</span></center></td><td><center>2019-10-29 15:35:19</center></td><td><center>5,560</center></td><td><center>390</center></td><td><center>0</center></td><td><center>0</center></td><td><center>0</center></td><td><center>0</center></td><td><center>0</center></td><td><center>0</center></td><td><center>62</center></td><td><center>5,108</center></td><td><center><a href="https://delex.pk/Invoice/invoice_detail/4" class="btn btn-xs btn-info">View</a> <a href="https://delex.pk/Invoice/export_invoice_detail/4" class="btn btn-xs btn-info">EXPORT</a></center></td></tr></tbody>
                                            </table><div class="dataTables_info" id="myTable_info" role="status" aria-live="polite">Showing 1 to 2 of 2 entries</div><div class="dataTables_paginate paging_simple_numbers" id="myTable_paginate"><a class="paginate_button previous disabled" aria-controls="myTable" data-dt-idx="0" tabindex="0" id="myTable_previous">Previous</a><span><a class="paginate_button current" aria-controls="myTable" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="myTable" data-dt-idx="2" tabindex="0" id="myTable_next">Next</a></div></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="card-header  separator">
                            <div class="card-title" name="1-success-message" id="1-success-message">
                            </div>
                        </div>
                    </div>
                    <!-- END card -->
                </div>



            </div>





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
