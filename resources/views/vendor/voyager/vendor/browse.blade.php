@extends('voyager::master')

{{--@php  $customerset=App\Customer::first(); @endphp--}}
{{--@can('browse',$customerset)--}}

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-people"></i>
                    Vendors
                </p>

                <a href="{{url('admin/vendors/create')}}" class="btn btn-success btn-add-new">
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
                        {{--@if ($isServerSide)--}}
                        {{--<form method="get" class="form-search">--}}
                        {{--<div id="search-input">--}}
                        {{--<select id="search_key" name="key">--}}
                        {{--@foreach($searchable as $key)--}}
                        {{--<option value=""></option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<select id="filter" name="filter">--}}
                        {{--<option value="contains" >contains</option>--}}
                        {{--<option value="equals" >=</option>--}}
                        {{--</select>--}}
                        {{--<div class="input-group col-md-12">--}}
                        {{--<input type="text" class="form-control" placeholder="" name="s" value="">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-info btn-lg" type="submit">--}}
                        {{--<i class="voyager-search"></i>--}}
                        {{--</button>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</form>--}}
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
                                        Supplier Name
                                    </th>
{{--                                    <th>--}}
{{--                                        Category--}}
{{--                                    </th>--}}
                                    <th>
                                        Company Name
                                    </th>
                                    <th>
                                        Phone No
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        City
                                    </th>
                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($vendors)>0)
                                    @foreach($vendors as $vendor)
                                        <tr id="myTable">
                                            <td>  <input type="checkbox" name="row_id" id="checkbox" value=""></td>
                                            <td>
                                                <span class="font-weight-bold">{{$vendor->id}} </span>
                                            </td>

                                            <td>
                                                <span class="font-weight-bold">{{$vendor->f_name}} </span>
                                            </td>
{{--                                            <td>--}}
{{--                                                @php   $categories=$vendor->vendor_category   @endphp--}}

{{--                                                @foreach((array)json_decode($categories) as $key2=> $category)--}}

{{--                                                    {{\App\CategoryName::where('id',$category)->value('name')}},--}}
{{--                                                @endforeach--}}
{{--                                            </td>--}}

                                            <td>
                                                <span class="font-weight-bold">{{$vendor->vendor_company}} </span>
                                            </td>
                                            <td>


                                                <span class="font-weight-bold">{{$vendor->mobile_no}} </span>

                                            </td>
                                            <td>
                                                <span class="font-weight-bold">{{$vendor->email}} </span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold">{{$vendor->city}} </span>
                                            </td>

                                            <td class="no-sort no-click text-right" id="bread-actions">
                                                <div class="btn-toolbar">
                                                    @if(Auth::user()->hasRole('admin'))
                                                        <button dataid="{{$vendor->id}}"
                                                                class="btn btn-danger pull-right customBtn deleteCustom"
                                                                style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                            <i class="voyager-trash"></i> <span>Delete</span>
                                                        </button>
                                                        <div class="modal fade" id="myModal" role="dialog">
                                                            <div class="modal-dialog">

                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                         style="background-color:#FA2A00;color:#fff;">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal">&times;
                                                                        </button>
                                                                        <h4 class="modal-title"
                                                                            style="text-align: left"><i
                                                                                class="voyager-trash"></i>&nbsp;Are you
                                                                            sure you want to delete this Vendor ?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <form
                                                                            action="{{url('admin/vendors/destroy')}}"
                                                                            method="post">
                                                                            {{csrf_field()}}
                                                                            {{method_field('DELETE')}}
                                                                            <input type="hidden" name="deleteid"
                                                                                   id="deleteid">
                                                                            <button type="submit"
                                                                                    class="btn btn-default pull-right"
                                                                                    style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">
                                                                                Yes, Delete it!
                                                                            </button>
                                                                            <button type="button"
                                                                                    class="btn btn-default pull-right"
                                                                                    data-dismiss="modal">Close
                                                                            </button>

                                                                        </form>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endif
                                                        <a href='{{url("admin/vendors/{$vendor->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                            <i class="voyager-eye"></i> <span>view </span>
                                                        </a>
                                                    <a href='{{url("admin/vendors/{$vendor->id}/edit")}}'
                                                       class="btn btn-primary pull-right des"
                                                       style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-edit"></i> <span>Edit </span>
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

    {{-- Single delete modal --}}
    {{--<div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">--}}
    {{--<div class="modal-dialog">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-header">--}}
    {{--<button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>--}}
    {{--<h4 class="modal-title"><i class="voyager-trash"></i> ?</h4>--}}
    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<form action="#" id="delete_form" method="POST">--}}
    {{--{{ method_field('DELETE') }}--}}
    {{--{{ csrf_field() }}--}}
    {{--<input type="submit" class="btn btn-danger pull-right delete-confirm" value="">--}}
    {{--</form>--}}
    {{--<button type="button" class="btn btn-default pull-right" data-dismiss="modal"></button>--}}
    {{--</div>--}}
    {{--</div><!-- /.modal-content -->--}}
    {{--</div><!-- /.modal-dialog -->--}}
    {{--</div><!-- /.modal -->--}}
@stop

{{--@else--}}
{{--    @include('vendor.voyager.errors.authenticate_error')--}}

{{--@endcan--}}

@section('javascript')


    <script>
        $(document).ready(function () {
            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });
        })
    </script>
    <script>
        $(document).ready(function () {
            $('.approveCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#approveid').val(id);
                $('#myModalapp').modal('show');
            });
        })
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "order": false,
                "pageLength": 25
//                "order": [[ 3, "desc" ]]
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            })
        });

    </script>


@stop
