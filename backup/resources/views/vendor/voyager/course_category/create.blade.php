@extends('voyager::master')
{{--@php  $generalorder=App\GeneralOrder::first(); @endphp--}}
{{--@can('add',$generalorder)--}}
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>

        .form-control{
            border: 1px solid #ccc !important;
        }
        .panel-body .select2-selection {
            border: 1px solid #6a6767;
        }
        hr {
            margin-bottom: 20px;
            border-top: 1px solid #6a6767;
        }
        .color{
            color: red;
        }
    </style>
@stop



@section('page_header')

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title" style="margin-left: 20%;">
                    <i class=""></i>
                    Add Category
                </p>


            </div>
            <div class="col-md-6" style="margin-bottom: 0px">


                @if ($message = Session::get('info'))
                    @foreach($message as $ids)
                        <div class="alert alert-danger alert-block" style="opacity: 0.7">
                            <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                            <strong>{{ $ids->product_name }} is UnSufficient for this transaction </strong>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>






        @stop

        @section('content')
            <div class="page-content edit-add container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <div class="panel panel-bordered">
                            <!-- form start -->
                            <form action="{{url('admin/course-categories')}}" method="POST" enctype="multipart/form-data">
                                <!-- PUT Method if we are editing -->
                                <!-- CSRF TOKEN -->
                                {{ csrf_field() }}
                                <div class="panel-body">



                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Category<span class="color">*</span></label>
                                            <input type="text" required  class="form-control" name="cat_name" placeholder="Enter Category">
                                        </div>
                                    </div>






                                <div class="panel-footer">
                                    <button id="submit" type="submit" style="margin-left: 44%;" class="btn btn-primary save">{{ ('Submit') }}</button>
                                </div>




                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>
            <?php

            $simple = 'demo text string';

            $complexArray = array('demo', 'text', array('foo', 'bar'));

            ?>

        <!-- End Delete File Modal -->
            <script href="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        @stop
{{--        @else--}}
{{--            @include('vendor.voyager.errors.authenticate_error')--}}

{{--        @endcan--}}
        @section('javascript')





@stop
