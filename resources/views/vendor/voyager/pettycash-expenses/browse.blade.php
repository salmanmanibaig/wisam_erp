@extends('voyager::master')

@php  $product=App\PettycashExpense::first(); @endphp
@can('browse',$product)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-dollar"></i>
                   PETTY CASH EXPENSES
                </p>

                <a href="{{url('admin/pettycash-expenses/create')}}" class="btn btn-success btn-add-new">
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


                 @if ($message = Session::get('danger'))
                        <div class="alert alert-danger alert-block" style="opacity: 0.7">
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
                                        ID
                                    </th>
                                    <th>
                                       Name
                                    </th>
                                    <th>
                                        Account Name
                                    </th>
                                    <th>
                                        Amount
                                    </th>


                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($pettycash_data)>0)
                                    @foreach($pettycash_data as $petycash)

                                        <tr id="myTable">

                                            <td>
                                                <input type="checkbox" name="row_id" id="checkbox" value="">
                                            </td>

                                            <td>
                                                <span class="label label-info">
                                                {{$petycash->id}}
                                                </span>
                                                <span class="badge badge-lg" style=""></span>
                                                <div class="readmore"></div>
                                                <div class="readmore"></div>
                                                <a href="">
                                                </a>
                                                <br/>
                                                <a href="" target="_blank">
                                                </a>
                                                <div class="readmore"></div>



                                            </td>
                                            <td>
                                                <span class="font-weight-bold">{{$petycash->pettycash->name}}</span>
                                            </td>
                                            <td>
                                                {{@$petycash->pettycash_account->account_title}}
                                            </td>
                                            <td>
                                                {{$petycash->amount}}
                                            </td>
                                            <td class="no-sort no-click text-right" id="bread-actions">
                                                <div class="btn-toolbar">

                                                    <button dataid="{{$petycash->id}}" class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-trash"></i> <span>Delete</span>
                                                    </button>
                                                    <div class="modal fade" id="myModal" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this ?</h4>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form action="{{url('admin/pettycash-expenses/destroy')}}" method="post">
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
                                                    <a href='{{url("admin/pettycash-expenses/{$petycash->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-eye"></i> <span>View</span>
                                                    </a>
                                                    <a href='{{url("admin/pettycash-expenses/{$petycash->id}/edit")}}' class="btn btn-info pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-edit"></i> <span>Edit</span>
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
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });})

//        $('#myModal').on('show.bs.modal', function (event) {
//            var button = $(event.relatedTarget) // Button that triggered the modal
//            var productname = button.data('productname') // Extract info from data-* attributes
//            console.log(productname);
//
//            var modal = $(this)
//            modal.find('.modal-body #item_name').val(productname)
//        })
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                 "order": false,
//                "order": [[ 1, "desc" ]],
                "pageLength": 25
                // "order": [[ 1, "asc" ]]
            } );
        } );
    </script>


@stop
