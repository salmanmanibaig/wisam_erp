@extends('voyager::master')
@php  $generalorder=App\Requirment::first(); @endphp
@can('add',$generalorder)
@section('css')

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
        } .mr_13{
            margin-right: 13px;
        }
    </style>
@stop



@section('page_header')

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title" style="margin-left: 20%;">
                    <i class=""></i>
                    Add Requirment
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
                            <form action="{{url('admin/requirments')}}" method="POST" enctype="multipart/form-data">
                                <!-- PUT Method if we are editing -->
                                <!-- CSRF TOKEN -->
                                {{ csrf_field() }}
                                <div class="panel-body">


                                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin'))
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Hospitals<span class="color">*</span></label>
                                            <select class="form-control select2" name="hospital_id">
                                                <option>Select Hospitals</option>
                                                @foreach($hospitals as $hospital)
                                                <option value="{{$hospital->id}}">{{$hospital->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    @endif
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group" >--}}
{{--                                            <label class="font-weight-bold" for="name">Category<span class="color">*</span></label>--}}
{{--                                            <select class="form-control select2" name="category_id">--}}
{{--                                                <option>Select Category</option>--}}
{{--                                                @foreach($categories as $category)--}}
{{--                                                    <option value="{{$category->id}}">{{$category->cat_name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Department<span class="color">*</span></label>
                                            <input type="text" required  class="form-control" name="department" placeholder="Department">
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Note<span class="color">*</span></label>
                                            <textarea type="text" rows="6" required  class="form-control" name="requirment_text" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Number of meals<span class="color">*</span></label>
                                            <input type="number" rows="6" required  class="form-control" name="number_of_meals" placeholder="ie.150"></input>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Date<span class="color">*</span></label>
                                            <input type="date" required  class="form-control" name="req_on_date" placeholder="Enter Category">
                                        </div>
                                    </div>

{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group" >--}}
{{--                                            <label class="font-weight-bold" for="name">End Date<span class="color">*</span></label>--}}
{{--                                            <input type="date" required  class="form-control" name="course_end_date" placeholder="Enter Category">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


{{--                                    <div class="col-md-8">--}}
{{--                                        <div class="form-group">--}}
{{--                                    <div class="form-check-inline">--}}
{{--                                        <label class="form-check-label mr_13">--}}
{{--                                            <input type="checkbox" class="form-check-input"  name="publish" value="publish"><span style="font-weight: bold">Publish</span>--}}
{{--                                        </label>--}}
{{--                                        <label class="form-check-label mr_13">--}}
{{--                                            <input type="checkbox" class="form-check-input" id="check2" name="trending" value="trending"><span style="font-weight: bold">Trending</span>--}}
{{--                                        </label>--}}
{{--                                        <label class="form-check-label mr_13">--}}
{{--                                            <input type="checkbox" class="form-check-input" id="check2" name="feature" value="feature"><span style="font-weight: bold">Feature</span>--}}
{{--                                        </label>--}}
{{--                                        <label class="form-check-label mr_13">--}}
{{--                                            <input type="checkbox" class="form-check-input" id="check2" name="popular" value="popular"><span style="font-weight: bold">Popular</span>--}}
{{--                                        </label>--}}
{{--                                        <label class="form-check-label mr_13">--}}
{{--                                            <input type="checkbox" class="form-check-input" id="check2" name="free" value="free"><span style="font-weight: bold">Free</span>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="form-group" >--}}
{{--                                            <label class="font-weight-bold" for="name">Course Image<span class="color">*</span></label>--}}
{{--                                            <input type="file" required  class="form-control" name="course_image" placeholder="Enter Category">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

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
        @else
            @include('vendor.voyager.errors.authenticate_error')

        @endcan
@section('javascript')





@stop
