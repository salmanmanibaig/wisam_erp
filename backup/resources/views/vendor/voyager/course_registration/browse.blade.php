@extends('voyager::master')

@php  $role_check=App\Registration::first(); @endphp
@can('browse',$role_check)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-bag"></i>
                    Registered Courses
                </p>

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
                                    <th>
                                        Course Name
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Course Price
                                    </th>
                                    <th style="width: 100px">
                                        Course Duration
                                    </th>


                                    <th class="actions text-right" style="width: 120px;">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($course_registrations)>0)
                                    @foreach($course_registrations as $key => $course_registration)



                                        <tr id="myTable">

                                            <td>
                                                <span class="font-weight-bold">REG-{{sprintf('%03d',$course_registration->id)}}-{{date('m',strtotime($course_registration->created_at))}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$course_registration->reg_course->course_name}}</span>
                                            </td>
                                            <td>

                                                <span class="font-weight-bold">{{@$course_registration->reg_course->cat_course->cat_name}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$course_registration->reg_course->course_price}}</span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$course_registration->course_duration}} Days</span>
                                            </td>

                                            <td class="no-sort no-click text-right" id="bread-actions">
                                                <div class="btn-toolbar">
                                                    <a href='{{url("admin/courses/{$course_registration->id}/edit")}}' class="btn btn-info pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-eye"></i> <span>Edit</span>
                                                    </a>

                                                    <a href='{{url("admin/courses/{$course_registration->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-eye"></i> <span>Read</span>
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
