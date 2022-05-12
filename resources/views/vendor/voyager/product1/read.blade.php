@extends('voyager::master')
@php  $products_data=App\Product::first(); @endphp
@can('read',@$products_data)


@section('page_header')
    <h1 class="page-title">
        <i class=""></i> {{ __('voyager::generic.viewing') }}

        <a href="{{url('admin/products/'.$product_data->id.'/edit')}}" class="btn btn-info customBtn">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp;
            {{ __('voyager::generic.edit') }}
        </a>


        {{--<a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger customBtn" data-id="" id="">--}}
        {{--<i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>--}}
        {{--</a>--}}


        <a href="{!! URL::previous() !!}" class="btn btn-warning customBtn">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </h1>

@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:0px;">
                    <!-- form start -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">
                            Product Name
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$product_data->product_name}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                    <hr style="margin:0;">
                </div>
                <div class="panel panel-bordered" style="padding-bottom:0px;">
                    <!-- form start -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">
                            Product Price
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$product_data->product_pric}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                    <hr style="margin:0;">
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Product Quntity
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$product_data->product_qty}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Product Description
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$product_data->product_description}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Product Image
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        @foreach($product_data->product_images as $key1=> $image)
                            <div class="col-md-4">

                                <img
                                    src="{{ asset('images/product_image/' . $image->image) }}"
                                    class="img-responsive"
                                    style="width: 30%;max-height:30%"/>
                            </div>
                        @endforeach
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
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
@section('page_header')
    <h1 class="page-title">
        <i class=""></i> {{ __('voyager::generic.viewing') }}

        <a href="{{url('admin/products/'.$product_data->id.'/edit')}}" class="btn btn-info customBtn">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp;
            {{ __('voyager::generic.edit') }}
        </a>


        {{--<a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger customBtn" data-id="" id="">--}}
        {{--<i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>--}}
        {{--</a>--}}


        <a href="{!! URL::previous() !!}" class="btn btn-warning customBtn">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </h1>

@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:0px;">
                    <!-- form start -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">
                            Product Name
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$product_data->product_name}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                    <hr style="margin:0;">
                </div>
                <div class="panel panel-bordered" style="padding-bottom:0px;">
                    <!-- form start -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">
                            Product Price
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$product_data->product_pric}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                    <hr style="margin:0;">
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Product Quntity
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$product_data->product_qty}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Product Description
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$product_data->product_description}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Product Image
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        @foreach($product_data->product_images as $key1=> $image)
                            <div class="col-md-4">

                                <img
                                    src="{{ asset('images/product_image/' . $image->image) }}"
                                    class="img-responsive"
                                    style="width: 30%;max-height:30%"/>
                            </div>
                        @endforeach
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
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

@endcan
@section('javascript')


@stop
