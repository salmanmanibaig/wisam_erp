@extends('voyager::master')

@php  $role_check=App\CourseCategory::first(); @endphp
@can('browse',$role_check)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-truck"></i>
                    Course Category
                </p>

                <button type="button" class="btn btn-success " data-toggle="modal" data-target="#add">
                            <i class="voyager-sun"></i> <span>Add New</span>
                </button>
            </div>

            <div class="modal fade" id="add" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span></button>
                            <h4 class="modal-title alert alert-warning" style="text-align: center;margin-bottom: 0px">

                                <strong style="font-weight: bold">Note!</strong> Add Categroy

                            </h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('admin/course-categories')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold">Category</label>
                                        <input type="text" required class="form-control" name="cat_name">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Yes I'm Sure!</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
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
                                    <th>
                                        Category Name
                                    </th>


                                    <th class="actions text-right" style="width: 120px;">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($categories)>0)
                                    @foreach($categories as $key => $category)



                                            <tr id="myTable">

                                                <td>
                                                    <span class="font-weight-bold">{{$category->id}}</span>
                                                </td>

                                                <td>
                                                    <span class="font-weight-bold">{{$category->cat_name}}</span>
                                                </td>
                                                <td class="no-sort no-click text-right" id="bread-actions">
                                                    <div class="btn-toolbar">
    {{--                                                        <button type="button" data-category="{{$category->cat_name}}" data-sid="{{$category->id}}" data-toggle="modal" data-target="#edit" class="btn btn-info pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px" >--}}
    {{--                                                            <i class="voyager-edit"></i>  <span>Edit</span>--}}
    {{--                                                        </button>--}}
                                                        <button type="button" class="btn btn-warning pull-right" data-toggle="modal" style="text-decoration: none; font-size: 12px;padding: 5px 7px"
                                                                data-target="#edit"  data-category="{{$category->cat_name}}" data-id="{{$category->id}}">
                                                            <i class="voyager-edit"></i> <span>Edit</span>
                                                        </button>


                                                    </div>
                                                </td>

                                            </tr>


                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>




                <div class="modal fade" id="edit" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Update Category</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('admin/course-categories/update')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('put')}}
                                    <input type="hidden" name="id" id="id" value="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="font-weight: bold">Category</label>
                                                <input type="text" class="form-control"  name="cat_name" id="category" >

                                            </div>

                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
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
        $('#edit').on('show.bs.modal', function (event) {
            // console.log('model opened');
            var button = $(event.relatedTarget) // Button that triggered the modal
            var category = button.data('category') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes
            console.log(id);

            var modal = $(this)
            modal.find('.modal-title').text('Update Amount')
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
