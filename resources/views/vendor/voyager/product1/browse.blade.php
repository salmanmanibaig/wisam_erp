
@extends('voyager::master')

@php  $customerset=App\Product::first(); @endphp

@can('browse',$customerset)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="fa fa-star"></i>
                   Add Product
                </p>

                <a href="{{url('admin/products/create')}}" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
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


        {{--@include('voyager::partials.bulk-delete')--}}

        {{--<a href="" class="btn btn-primary">--}}
        {{--<i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>--}}
        {{--</a>--}}

        {{--@include('voyager::multilingual.language-selector')--}}
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        {{--@include('voyager::alerts')--}}
        <div class="row" >

            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <style>
                            .dataTables_wrapper .dataTables_filter input{


                            }
                        </style>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover"  >
                                <thead>
                                <tr>

                                    <th>
                                        <input type="checkbox" class="select_all">
                                    </th>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Product Description
                                    </th>
                                    <th>
                                        Product Price
                                    </th>
                                    <th>
                                        Product Quantity
                                    </th>
                                    <th>Image</th>

                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_data as $key=>$product)
                                    <tr>
                                        <td><input type="checkbox" class="select_all"></td>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->product_description}}</td>
                                        <td>{{$product->product_pric}}</td>
                                        <td>{{$product->product_qty}}</td>
                                        <td>
                                            @foreach($product->product_images as $key1=> $image)
                                                @if($key1==0)

                                                    <img src="{{ asset('images/product_image/' . $image->image) }}" class="img-responsive" style="width: 10%;max-height:10%" />

                                            @else
                                            @endif
                                            @endforeach

                                        </td>
                                        <td>

                                            <a href="{{url('admin/products/destroy/'.$product->id)}}"
                                                class="btn btn-danger pull-right des"
                                                style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-trash"></i><span>Delete</span>
                                            </a>
                                            <a href="{{url('admin/products/edit/'.$product->id)}}"  class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-edit"></i><span>Edit</span>
                                            </a>
                                            <a href="{{url('admin/products/view/'.$product->id)}}"  class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-eye"></i> <span>View</span>
                                            </a>


                                        </td>

                                    </tr>
                                @endforeach
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

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="fa fa-star"></i>
                    Add Product
                </p>

                <a href="{{url('admin/products/create')}}" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
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


        {{--@include('voyager::partials.bulk-delete')--}}

        {{--<a href="" class="btn btn-primary">--}}
        {{--<i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>--}}
        {{--</a>--}}

        {{--@include('voyager::multilingual.language-selector')--}}
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        {{--@include('voyager::alerts')--}}
        <div class="row" >

            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <style>
                            .dataTables_wrapper .dataTables_filter input{


                            }
                        </style>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover"  >
                                <thead>
                                <tr>

                                    <th>
                                        <input type="checkbox" class="select_all">
                                    </th>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Product Description
                                    </th>
                                    <th>
                                        Product Price
                                    </th>
                                    <th>
                                        Product Quantity
                                    </th>
                                    <th>Image</th>

                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_data as $key=>$product)
                                    <tr>
                                        <td><input type="checkbox" class="select_all"></td>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->product_description}}</td>
                                        <td>{{$product->product_pric}}</td>
                                        <td>{{$product->product_qty}}</td>
                                        <td>
                                            @foreach($product->product_images as $key1=> $image)
                                                @if($key1==0)

                                                    <img src="{{ asset('images/product_image/' . $image->image) }}" class="img-responsive img-rounded" style="width: 80px;height: 7%;" />

                                                @else
                                                @endif
                                            @endforeach

                                        </td>
                                        <td>

                                            <a href="{{url('admin/products/destroy/'.$product->id)}}"
                                               class="btn btn-danger pull-right des"
                                               style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-trash"></i><span>Delete</span>
                                            </a>
                                            <a href="{{url('admin/products/edit/'.$product->id)}}"  class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-edit"></i><span>Edit</span>
                                            </a>
                                            <a href="{{url('admin/products/view/'.$product->id)}}"  class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-eye"></i> <span>View</span>
                                            </a>


                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@endcan

@section('javascript')

@stop

