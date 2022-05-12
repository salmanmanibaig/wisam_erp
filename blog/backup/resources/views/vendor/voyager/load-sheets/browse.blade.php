@extends('voyager::master')

@php  $role_check=App\Booking::first(); @endphp
@can('browse',$role_check)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-bag"></i>
                    Load Sheet
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
        <div class="row">

            <div class="pgn-wrapper" data-position="top" style="top: 48px;" id="msg_div"></div>

            <div class="col-xl-12 col-lg-12 ">


                <div class="card m-t-10">
                    <div class="card-header  separator">
                        <a href="{{url('admin/load-sheets/create')}}" type="button" class="btn btn-success ">
                            <i class="voyager-sun"></i> <span>Add New</span>
                        </a>
                    </div>
                    <div class="card-body">

                        <div class="row clearfix">

                            <div class="col-md-5">

                            </div>
                        </div>
                        <br>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="table-responsive">

                                    <div class="row"><div class="col-md-12"><div class="form-group form-group-default"><label>Find From Table</label><input type="text" data-toggle="tooltip" data-placement="bottom" title="Find" class="form-control"></div></div></div><table class="table table-bordered" id="myTable">
                                        <thead>
                                        <tr>
                                            <th style="color:rgb(9, 17, 62)">Sr</th>
                                            <th style="color:rgb(9, 17, 62)">Load Sheet</th>
                                            <th style="color:rgb(9, 17, 62)">Consignments</th>
                                            <th style="color:rgb(9, 17, 62)">Date</th>
                                            <th style="color:rgb(9, 17, 62)">Load Sheet</th>
                                            <th style="color:rgb(9, 17, 62)">Address Label</th>
                                            <th style="color:rgb(9, 17, 62)">Barcode Label</th>
                                        </tr>
                                        </thead>
                                        <tbody id="resultTable1">
                                        <tr>
                                            <td style="font-size:12px;padding-top:15px"><center>1</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>LS200002156</center></td>
                                            <td style="font-size:10px;padding-top:15px"><center>42020015983</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>2020-02-27 12:43:03</center></td>
                                            <td style="font-size:16px;padding-top:15px">
                                                <a href="https://delex.pk/Booking/print_load_sheet/LS200002156" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_address_label/LS200002156" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_mini_address_label/LS200002156" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>

                                        </tr>
                                        <tr>
                                            <td style="font-size:12px;padding-top:15px"><center>2</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>LS190000051</center></td>
                                            <td style="font-size:10px;padding-top:15px"><center>42019001026</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>2019-11-08 13:35:48</center></td>
                                            <td style="font-size:16px;padding-top:15px">
                                                <a href="https://delex.pk/Booking/print_load_sheet/LS190000051" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_address_label/LS190000051" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_mini_address_label/LS190000051" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>

                                        </tr>
                                        <tr>
                                            <td style="font-size:12px;padding-top:15px"><center>3</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>LS190000028</center></td>
                                            <td style="font-size:10px;padding-top:15px"><center>42019000278</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>2019-10-25 09:13:39</center></td>
                                            <td style="font-size:16px;padding-top:15px">
                                                <a href="https://delex.pk/Booking/print_load_sheet/LS190000028" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_address_label/LS190000028" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_mini_address_label/LS190000028" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>

                                        </tr>
                                        <tr>
                                            <td style="font-size:12px;padding-top:15px"><center>4</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>LS190000019</center></td>
                                            <td style="font-size:10px;padding-top:15px"><center>42019000151, 42019000152, 42019000153</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>2019-10-21 10:02:51</center></td>
                                            <td style="font-size:16px;padding-top:15px">
                                                <a href="https://delex.pk/Booking/print_load_sheet/LS190000019" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_address_label/LS190000019" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_mini_address_label/LS190000019" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>

                                        </tr>
                                        <tr>
                                            <td style="font-size:12px;padding-top:15px"><center>5</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>LS190000016</center></td>
                                            <td style="font-size:10px;padding-top:15px"><center>42019000123</center></td>
                                            <td style="font-size:12px;padding-top:15px"><center>2019-10-19 09:18:14</center></td>
                                            <td style="font-size:16px;padding-top:15px">
                                                <a href="https://delex.pk/Booking/print_load_sheet/LS190000016" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_address_label/LS190000016" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>
                                            <td style="font-size:16px;padding-top:15px"><a href="https://delex.pk/Booking/print_load_sheet_mini_address_label/LS190000016" target="_blank"><button class="btn btn-info btn-sm"><i class="pg-printer"></i></button></a></td>

                                        </tr>

                                        </tbody>
                                    </table>
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
