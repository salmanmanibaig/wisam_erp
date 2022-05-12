@extends('voyager::master')



@section('css')
    <style>
        .form-control {
            border: 1px solid black;
        }

    </style>
@stop



@section('page_header')

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">

            <div class="col-md-6" style="margin-bottom: 0px">
                <a href="{!! URL::previous() !!}" id="butn" class="btn btn-warning customBtn"
                   style="margin-left: 170px;">
                    <span class="glyphicon glyphicon-list"></span>&nbsp;
                    {{ __('voyager::generic.return_to_list') }}
                </a>
                <p class="page-title" style="margin-left: 10%;">
                    <i class="fas fa-user-plus"></i>
                    Edit Product
                </p>


            </div>

        </div>


        @stop

        @section('content')
            <div class="page-content edit-add container-fluid">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">

                        <div class="panel panel-bordered">
                            <!-- form start -->
                            <form action="{{url('admin/products/update/'.$product_data->id)}}" method="POST" enctype="multipart/form-data" id="product_form">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="panel-body">
                                    <table id="product_table">
                                        <thead>


                                        </thead>
                                        <tbody id="product_table_body">

<input type="hidden" name="product_id" value="{{$product_data->id}}">
                                        <tr>
                                            <td>
                                                <div class="col-md-12">
                                                    <button type="button"
                                                            class="btn btn-primary btn-lg float-right add_product">Add
                                                        More+
                                                    </button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold" for="name">PRODUCT
                                                                NAME:<span
                                                                    class="color">*</span></label>
                                                            <input type="text" class="form-control product_name"
                                                                   name="product_name[]"
                                                                   value="{{@$product_data->product_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold" for="name">PRODUCT
                                                                PRICE:<span
                                                                    class="color">*</span></label>
                                                            <input type="text" class="form-control product_price"
                                                                   name="product_price[]"
                                                                   value="{{@$product_data->product_pric}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold" for="name">PRODUCT QUANTITY:<span
                                                                    class="color">*</span></label>
                                                            <input type="text" class="form-control product_qty"
                                                                   name="product_qty[]"
                                                                   value="{{@$product_data->product_qty}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold" for="name">PRODUCT
                                                                IMAGES:<span
                                                                    class="color">*</span></label>
                                                            <input type="file" class="form-control product_image"
                                                                   multiple name="product_image[]" value="">
                                                            @foreach($product_data->product_images as $key1=> $image)
                                                                <div class="col-md-4">

                                                                    <img
                                                                        src="{{ asset('images/product_image/' . $image->image) }}"
                                                                        class="img-responsive"
                                                                        style="width: 30%;max-height:30%"/>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold" for="name">PRODUCT
                                                                DESCRIPTION:<span
                                                                    class="color">*</span></label>
                                                            <textarea type="text"
                                                                      class="form-control product_description"
                                                                      name="product_description[]"
                                                                      value="">{{@$product_data->product_description}}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>

                                    </table>


                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- panel-body -->


                    </div>
                </div>
            </div>
    </div>


    <!-- End Delete File Modal -->
    <script href="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
@stop


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('javascript')

    <script>
        $('#product_table').on('click', '.add_product', function () {
            $('#product_table_body').append('<tr>\n' +
                '                                            <td>\n' +
                '                                                <div class="col-md-12">\n' +
                '                                                    <button type="button" class="btn btn-danger btn-lg float-right delete_product">Delete</button>\n' +
                '                                                </div>\n' +
                '                                                <div class="row">\n' +
                '                                                    <div class="col-md-12">\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label class="font-weight-bold" for="name">PRODUCT NAME:<span\n' +
                '                                                                    class="color">*</span></label>\n' +
                '                                                            <input type="text" class="form-control product_name" name="product_name[]"  required>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                    <div class="col-md-6">\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label class="font-weight-bold" for="name">PRODUCT PRICE:<span\n' +
                '                                                                    class="color">*</span></label>\n' +
                '                                                            <input type="text" class="form-control product_price" name="product_price[]"  required>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                    <div class="col-md-6">\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label class="font-weight-bold" for="name">PRODUCT QUANTITY:<span\n' +
                '                                                                    class="color">*</span></label>\n' +
                '                                                            <input type="text" class="form-control product_qty" name="product_qty[]"  required>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                    <div class="col-md-12">\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label class="font-weight-bold" for="name">PRODUCT IMAGES:<span\n' +
                '                                                                    class="color">*</span></label>\n' +
                '                                                            <input type="file" class="form-control product_image" multiple name="product_image[]"  required>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                    <div class="col-md-12">\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label class="font-weight-bold" for="name">PRODUCT DESCRIPTION:<span\n' +
                '                                                                    class="color">*</span></label>\n' +
                '                                                            <textarea type="text" class="form-control product_description" name="product_description[]"  required></textarea>\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '\n' +
                '                                                </div>\n' +
                '                                            </td>\n' +
                '                                        </tr>')
            $('#product_table').on('click', '.delete_product', function () {
                $(this).closest('tr').remove();
            });
        });
    </script>
@stop
