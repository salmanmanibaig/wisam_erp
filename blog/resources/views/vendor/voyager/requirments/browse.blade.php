@extends('voyager::master')

@php  $role_check=App\Requirment::first(); @endphp
@can('browse',$role_check)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-bag"></i>
                   Hospital Requirments
                </p>

                <a href="{{url('admin/requirments/create')}}" type="button" class="btn btn-success ">
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
                                        Requirment ticket
                                    </th>
                                    <th>
                                        Hospital
                                    </th>
                                    <th>
                                        department
                                    </th>
                                    <th>
                                        Requirment Text
                                    </th>

                                    <th>
                                        Number Of Meals
                                    </th>

                                    <th>
                                        Req On Date
                                    </th>


                                    <th>
                                        Status
                                    </th>


                                    <th>
                                        Donator Name
                                    </th>


                                    <th>
                                        Donator Detail
                                    </th>






                                    <th class="actions text-right" style="width: 120px;">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($requirments)>0)
                                    @foreach($requirments as $key => $requirment)



                                        <tr id="myTable">

                                            <td >

                                            <span class="font-weight-bold">    REQ-{{sprintf("%03d",$requirment->id)}}-{{ date('m',strtotime($requirment->created_at)) }}
                                                </span>

                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$requirment->hospital->name}}</span>
                                            </td>
                                            <td>

                                                <span class="font-weight-bold">{{@$requirment->department}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$requirment->requirment_text}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$requirment->number_of_meals}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$requirment->req_on_date}}</span>
                                            </td>



                                            <td >
                                                @if($requirment->status == 0)
{{--                                                    <div class="font-weight-bold status text-uppercase  ">{{"New Requirment"}}</div>--}}
                                                    <span style="font-weight: bold;color:#0086ff">{{'New Requirment'}}</span>

                                                @elseif($requirment->status == 1)
                                                    <span style="font-weight: bold;color:#a19c1b">{{'In Process'}}</span>
                                                @elseif($requirment->status == 2)
                                                    <span style="font-weight: bold;color:#0f7c0e">{{'Complete'}}</span>
                                                @endif


                                            </td>


                                            <td>
{{--                                                {{dd()}}--}}
                                                <span class="font-weight-bold">{{@$requirment->donator->name}}</span>


                                            </td>

                                            <td>

                                                @if(@$requirment->donator->id)
                                                    <a href="{{url('admin/donators/'.$requirment->donator->id)}}" class="btn btn-success btn-add-new">
                                                        <i class="voyager-plus"></i> <span>{{ __('Detail') }}</span>
                                                    </a>
                                                @endif
{{--                                                <span class="font-weight-bold">{{@$requirment->donator->name}}</span>--}}


                                            </td>
{{--                                            {{dd($requirment)}}--}}


                                            <td class="no-sort no-click text-right" id="bread-actions">


                                                <div class="btn-toolbar">

                                                    @if($requirment->status == 0)
                                                    <button dataid="{{$requirment->id}}"class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-trash"></i> <span>Delete</span>
                                                    </button>

                                                    @endif
                                                        @if($requirment->status != 2 || Auth::user()->hasRole('admin') || Auth::user()->hasRole('super_admin'))
                                                    <a href='{{url("admin/requirments/{$requirment->id}/edit")}}' class="btn btn-info pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-eye"></i> <span>Edit</span>
                                                    </a>

                                                        @endif

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
                                    <div class="modal-header" style="padding-bottom: 0px">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title alert alert-warning" style="margin-bottom: 0px">Update Category</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('admin/course-categories/update')}}" method="post" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('put')}}
                                            <input type="hidden" name="id" id="id" value="">
                                            <div class="row">
                                                <div class="col-md-6" style="margin-bottom: 0px">
                                                    <div class="form-group">
                                                        <label style="font-weight: bold">Course Name</label>
                                                        <input type="text" class="form-control"  name="cat_name" id="category" >

                                                    </div>

                                                </div>
                                                <div class="col-md-6" style="margin-bottom: 0px;">
                                                    <div class="form-group">
                                                        <label style="font-weight: bold">Category Name</label>
                                                        <input type="text" class="form-control"  name="cat_name" id="category" >

                                                    </div>

                                                </div>

                                                <div class="col-md-6" style="margin-bottom: 0px">
                                                    <div class="form-group">
                                                        <label style="font-weight: bold">Course Price</label>
                                                        <input type="text" class="form-control"  name="cat_name" id="category" >

                                                    </div>

                                                </div>

                                                <div class="col-md-12" style="margin-bottom: 0px">
                                                    <div class="form-group">
                                                        <label style="font-weight: bold">Category</label>
                                                        <input type="file" class="form-control"  name="cat_name" id="category" >

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
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Requirment ?</h4>
                </div>
                <div class="modal-footer">

                    <form action="{{url('admin/requirments/destroy')}}" method="post">
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
