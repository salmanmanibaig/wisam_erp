@extends('voyager::master')

@php  $role_check=App\PurchaseOrder::first(); @endphp
@can('edit',$role_check)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">


            <div class="col-md-12" style="margin-bottom: 0px">
             <div class="col-md-6">
                 <p class="page-title">
                     <i class=""></i>
                     Purchase Order Detail
                 </p>
                  @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('ceo') || Auth::user()->hasRole('lamitech') || Auth::user()->hasRole('supply chain'))
                    @if($del->approval_status != 1)
                
                    <button id="approve" type="button" class="btn btn-warning" data-id="{{$del->id}}" data-number="PO-{{  sprintf("%03d",$del->po_number)  }}" data-toggle="modal" data-target="#complete">
                        <i class="voyager-plus"></i> <span>{{('Approve') }}</span>
                    </button>

                     @else
                         <b class="text-success" style="    font-size: 18px;">P/O Approved</b>
               
                @endif
                @endif
             </div>
           

            </div>


            <div class="modal fade" id="complete" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span></button>
                            <h4 class="modal-title alert alert-warning" style="text-align: center;margin-bottom: 0px">
                            </h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('admin/purchase-orders/approve')}}" id="myform" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('Patch')}}

                                <input type="hidden" name="completeid" id="completeid" value="">
                                <input type="hidden" name="status" value="1">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" id="submits" class="btn btn-primary">Yes I'm Sure!</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
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
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="panel panel-bordered">
                    <div class="panel-body">


                        <form id="frm_details" method="post" name="frm_details">
                            <input type="hidden" id="id" name="id" value="{{$del->id}}">
                            <div class="col-md-12">

                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Order Number<span class="color">*</span></label>
                                        <input type="text" readonly required value="PO-{{  sprintf("%03d", $del->id)  }}-{{ date('m',strtotime($del->created_at)) }}" class="form-control" name="gonumber" placeholder="Enter Item Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">UNIT OF MEASURE:<span class="color">*</span></label>
                                        <input type="text" required class="form-control" VALUE="PCS" disabled >
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">City<span class="color">*</span></label>
                                        <!--<select class="form-control select2" required name="city" id="target2">-->
                                            <!--<option value="">Select One</option>-->
                                            <!--<option @if($del->city == 'faislalabad') selected @endif value="faislalabad">Faislalabad's</option>-->
                                            <!--<option @if($del->city == 'hyderabad') selected @endif value="hyderabad">Hyderabad's</option>-->
                                            <!--<option @if($del->city == 'karachi') selected @endif value="karachi">Karachi's</option>-->
                                            <!--<option @if($del->city == 'lahore') selected @endif value="lahore">Lahore's</option>-->
                                            <!--<option @if($del->city == 'multan') selected @endif value="multan">Multan's</option>-->
                                            <!--<option @if($del->city == 'peshawar') selected @endif value="peshawar">Peshawar's</option>-->
                                            <!--<option @if($del->city == 'quetta') selected @endif value="quetta">Quetta's</option>-->
                                            <!--<option @if($del->city == 'rawalpindi') selected @endif value="rawalpindi">Rawalpindi's</option>-->
                                            <!--<option @if($del->city == 'sukkur') selected @endif value="sukkur">Sukkur's</option>-->

                                    <input type="text" readonly  value="{{ $del->city}}" required class="form-control" name="city" placeholder="Enter Item city">


                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">PO Type <span class="color">*</span></label>
                                        <input type="text" disabled  value="{{ $del->type}}"  required class="form-control" name="ponumber" placeholder="Enter Item Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">PO Number<span class="color">*</span></label>
                                        <input type="text"  value="{{ $del->po_number}}" required class="form-control" name="ponumber" placeholder="Enter Item Name">
                                    </div>
                                </div>







                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label class="font-weight-bold" for="name">Remarks <span class="color">*</span></label>
                                        <input type="text"  value="{{ $del->remarks}}" required class="form-control" id="remarks" name="remarks">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group" >
                                        <!--<button type="submit" style="    display: flex;margin: 0 auto;" class="btn btn-primary save">{{ ('Update') }}</button>-->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                            </div>

                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                        </form>





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

                     @if($del->type == 'finished')
                            <div class="col-md-12" >
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover"  >
                                        <thead>
                                        <tr>

                                            {{--<th>--}}
                                            {{--<input type="checkbox" class="select_all">--}}
                                            {{--</th>--}}


                                            <th>
                                                Date
                                            </th>


                                            <th style="width: 300px;">
                                                Product Name
                                            </th>

                                            <th>
                                                @if($del->type == "raw") qty @else Cartoon qty @endif
                                            </th>
                                            @if($del->type != "raw")
                                                <th>
                                                    Dozen
                                                </th>
                                            @endif
                                            <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($items)>0)
                                            @foreach($items as $item)

                                                <tr id="myTable">

                                                    {{--<td>--}}
                                                    {{--<input type="checkbox" name="row_id" id="checkbox" value="">--}}
                                                    {{--</td>--}}

                                                    {{--<td>--}}
                                                    {{--<span class="label label-info">--}}
                                                    {{--                                                {{$user->id}}--}}
                                                    {{--</span>--}}
                                                    {{--<span class="badge badge-lg" style=""></span>--}}

                                                    {{--<div class="readmore"></div>--}}
                                                    {{--<div class="readmore"></div>--}}
                                                    {{--<a href="">--}}
                                                    {{--</a>--}}
                                                    {{--<br/>--}}
                                                    {{--<a href="" target="_blank">--}}
                                                    {{--</a>--}}
                                                    {{--<div class="readmore"></div>--}}



                                                    {{--</td>--}}

                                                    <td>
                                                        {{
                                                        $item->created_at->format('d/m/Y')

                                                        }}
                                                    </td>


                                                    <td style="font-weight: bold;">
                                                        {{$item->product_name}}
                                                    </td>

                                                    <td>
                                                        {{$item->cart_qty}}
                                                    </td>
                                                    @if($del->type != "raw")
                                                        <td>
                                                            {{$item->doz}}
                                                        </td>
                                                    @endif


                                                    <td class="no-sort no-click text-right" id="bread-actions">

                                                        <div class="btn-toolbar">
                                                            @if(Auth::user()->hasRole('admin'))

                                                                <button dataid="{{$item->id}}"class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-trash"></i> <span></span>
                                                                </button>
                                                                <div class="modal fade" id="myModal" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Outwards ?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <form action="{{url('admin/purchase-orders/dest/'.$item->id)}}" method="post">
                                                                                    {{csrf_field()}}
                                                                                    {{method_field('DELETE')}}
                                                                                    <input type="hidden" name="deleteid" id="deleteid">
                                                                                    <input type="hidden" name="deltype" value="0" >
                                                                                    <button type="submit" class="btn btn-default pull-right" style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">Yes, Delete it!</button>
                                                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" >Close</button>

                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                {{--<a href='{{url("admin/customers/{->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                                {{--<i class="voyager-eye"></i> <span>View</span>--}}
                                                                {{--</a>--}}
                                                                {{--<a href='{{url("admin/biocos-outward/{$item->id}/edit")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                                {{--<i class="voyager-edit"></i><span></span>--}}
                                                                {{--</a>--}}
                                                                <button type="button" class="btn pull-right btn-primary" data-id="{{$item->id}}" data-product_name="{{$item->product_name}}" data-cart_qty="{{$item->cart_qty}}" data-doz="{{$item->doz}}" data-toggle="modal" data-target="#edit" data-whatever="@mdo" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-edit"></i><span></span>
                                                                </button>
                                                            @endif
                                                            @if(Auth::user()->hasRole('ceo'))
                                                                <button dataid="{{$item->id}}"class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-trash"></i> <span></span>
                                                                </button>
                                                                <div class="modal fade" id="myModal" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Outwards ?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <form action="{{url('admin/purchase-orders/dest')}}" method="post">
                                                                                    {{csrf_field()}}
                                                                                    {{method_field('DELETE')}}
                                                                                    <input type="hidden"  name="deleteid" id="deleteid">
                                                                                    <button type="submit" class="btn btn-default pull-right" style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">Yes, Delete it!</button>
                                                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" >Close</button>

                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                {{--<a href='{{url("admin/customers/{->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                                {{--<i class="voyager-eye"></i> <span>View</span>--}}
                                                                {{--</a>--}}
                                                                {{--<a href='{{url("admin/biocos-outward/{$item->id}/edit")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                                {{--<i class="voyager-edit"></i><span></span>--}}
                                                                {{--</a>--}}
                                                            @endif
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @elseif($del->type == 'raw')
                            <div class="col-md-12" >
                                <div class="table-responsive">
                                    <table id="example" class="table table-hover"  >
                                        <thead>
                                        <tr>

                                            {{--<th>--}}
                                            {{--<input type="checkbox" class="select_all">--}}
                                            {{--</th>--}}


                                            <th>
                                                Date
                                            </th>


                                            <th style="width: 300px;">
                                                Product Name
                                            </th>

                                            <th>
                                               qty
                                            </th>

                                            <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($items)>0)
                                            @foreach($items as $item)

                                                <tr id="myTable">


                                                    <td>
                                                        {{
                                                        $item->created_at->format('d/m/Y')
                                                        }}
                                                    </td>


                                                    <td style="font-weight: bold;">
                                                        {{$item->product_name}}
                                                    </td>

                                                    <td>
                                                        {{$item->cart_qty}}
                                                    </td>



                                                    <td class="no-sort no-click text-right" id="bread-actions">

                                                        <div class="btn-toolbar">
                                                            @if(Auth::user()->hasRole('admin'))

                                                                <button dataid="{{$item->id}}"class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-trash"></i> <span></span>
                                                                </button>
                                                                <div class="modal fade" id="myModal" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Outwards ?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <form action="{{url('admin/purchase-orders/dest/'.$item->id)}}" method="post">
                                                                                    {{csrf_field()}}
                                                                                    {{method_field('DELETE')}}
                                                                                    <input type="hidden" name="deleteid" id="deleteid">
                                                                                    <input type="hidden" name="deltype" value="0" >
                                                                                    <button type="submit" class="btn btn-default pull-right" style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">Yes, Delete it!</button>
                                                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" >Close</button>

                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                {{--<a href='{{url("admin/customers/{->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                                {{--<i class="voyager-eye"></i> <span>View</span>--}}
                                                                {{--</a>--}}
                                                                {{--<a href='{{url("admin/biocos-outward/{$item->id}/edit")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                                {{--<i class="voyager-edit"></i><span></span>--}}
                                                                {{--</a>--}}
                                                                <button type="button" class="btn pull-right btn-primary" data-id="{{$item->id}}" data-product_name="{{$item->product_name}}" data-cart_qty="{{$item->cart_qty}}" data-doz="{{$item->doz}}" data-toggle="modal" data-target="#edit" data-whatever="@mdo" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-edit"></i><span></span>
                                                                </button>

                                                                <button type="button" class="btn pull-right btn-success" data-id="{{$item->id}}" data-product_name="{{$item->product_name}}" data-cart_qty="{{$item->cart_qty}}" data-doz="{{$item->doz}}" data-toggle="modal" data-target="#attach_job" data-whatever="@mdo" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-edit"></i><span>Attach</span>
                                                                </button>
                                                            @endif
                                                            @if(Auth::user()->hasRole('ceo'))
                                                                <button dataid="{{$item->id}}"class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-trash"></i> <span></span>
                                                                </button>
                                                                <div class="modal fade" id="myModal" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Outwards ?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <form action="{{url('admin/purchase-orders/dest')}}" method="post">
                                                                                    {{csrf_field()}}
                                                                                    {{method_field('DELETE')}}
                                                                                    <input type="hidden"  name="deleteid" id="deleteid">
                                                                                    <button type="submit" class="btn btn-default pull-right" style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">Yes, Delete it!</button>
                                                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" >Close</button>

                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                {{--<a href='{{url("admin/customers/{->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                                {{--<i class="voyager-eye"></i> <span>View</span>--}}
                                                                {{--</a>--}}
                                                                {{--<a href='{{url("admin/biocos-outward/{$item->id}/edit")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
                                                                {{--<i class="voyager-edit"></i><span></span>--}}
                                                                {{--</a>--}}
                                                            @endif
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif






                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('admin/purchase-orders/update')}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('put')}}
                                            <input type="hidden"  name="id" id="id">



                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" readonly name="product_name" class="form-control"  id="product_name">
                                                {{--<select class="form-control select2" required name="id" id="product_names">--}}

                                                    {{--@foreach($product as $data)--}}
                                                        {{--<option value="{{$data->id}}">{{$data->product_name }}--}}
                                                        {{--</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}


                                            </div>
                                            <div class="form-group">
                                                <label>Cartoon Qty</label>
                                                <input type="number" class="form-control" name="cart_qty" id="cart_qty">
                                            </div>
                                            <div class="form-group">
                                                <label>Dozen</label>
                                                <input type="number" class="form-control" name="doz" id="doz">
                                            </div>



                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn pull-right btn-primary">Update</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="attach_job" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Order</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{url('admin/purchase-orders/update')}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('put')}}
                                            <input type="hidden"  name="id" id="id">



                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" readonly name="product_name" class="form-control"  id="product_name">
                                                {{--<select class="form-control select2" required name="id" id="product_names">--}}

                                                {{--@foreach($product as $data)--}}
                                                {{--<option value="{{$data->id}}">{{$data->product_name }}--}}
                                                {{--</option>--}}
                                                {{--@endforeach--}}
                                                {{--</select>--}}


                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Jobcard<span class="color">*</span></label>
                                                    <select class="form-control select2" required name="jobcard_id" id="jobcard_id">
                                                        <option value="">Select one</option>
                                                        @foreach($jobcard as $card)
                                                        <option value="{{$card->id}}">{{$card->id." | ".$card->job_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group" >
                                                    <label class="font-weight-bold" for="name">Item Detail<span class="color">*</span></label>
                                                    <select disabled class="form-control select2" required name="item_id" id="item_id">
                                                        <option value="">Select one</option>
                                                        @foreach($jobcard_items as $items)
                                                        <option jobcard_id="{{$items->job_card_id}}" value="{{$items->id}}">{{$items->item_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn pull-right btn-primary">Update</button>
                                            </div>
                                        </form>

                                    </div>

                                </div>
                            </div>
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


        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });


        $(function(){
            $("#frm_details").on("submit", function(event) {
                event.preventDefault();

                var formData = {
                    'id': $('input[name=id]').val(), //for get email
                    'po_number': $('input[name=ponumber]').val(), //for get email
                    'city': $('select[name=city]').val(), //for get email
                    'remarks': $('input[name=remarks]').val(), //for get email
                    '_token': $('meta[name="csrf-token"]').attr('content')
                };




                console.log(formData);

                $.ajax({
                    url: "/admin/purchase_order_update",
                    type: "POST",
                    data: formData,
                    success: function(d) {

                        toastr.success('Order updated');
                    }
                });
            });
        })
    </script>


    <script>
        // $(document).ready(function(){
        //     $("#myInput").on("keyup", function() {
        //         var value = $(this).val().toLowerCase();
        //         $("#myTable tr").filter(function() {
        //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //         });
        //     });
        // });
        $('#edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var product_name = button.data('product_name') // Extract info from data-* attributes
            var cart_qty = button.data('cart_qty') // Extract info from data-* attributes
            var doz = button.data('doz') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes




            var modal = $(this)
            modal.find('.modal-body #product_name').val(product_name)
            modal.find('.modal-body #product_names').val(id)
            modal.find('.modal-body #cart_qty').val(cart_qty)
            modal.find('.modal-body #doz').val(doz)
            modal.find('.modal-body #id').val(id)


        })




        $('#attach_job').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var product_name = button.data('product_name') // Extract info from data-* attributes
            var cart_qty = button.data('cart_qty') // Extract info from data-* attributes
            var doz = button.data('doz') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes




            var modal = $(this)
            modal.find('.modal-body #product_name').val(product_name)
            modal.find('.modal-body #product_names').val(id)
            modal.find('.modal-body #cart_qty').val(cart_qty)
            modal.find('.modal-body #doz').val(doz)
            modal.find('.modal-body #id').val(id)


        })
        $(document).ready(function() {
            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });})
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                // "order": false
                "order": [[ 1, "desc" ]],
                "pageLength": 50
                // "order": [[ 1, "asc" ]]
            } );
        } );
    </script>

    <script>
        $('#complete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var number = button.data('number') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes

            var modal = $(this)
            modal.find('.modal-title').text('Are you sure you want to Approve this PO#  ' + number + '')
            modal.find('.modal-body #completeid').val(id)
        })


    </script>
    <!-- DataTables -->
    {{--@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))--}}
    {{--<script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>--}}
    {{--@endif--}}
    {{--<script>--}}
    {{--$(document).ready(function () {--}}

    {{--var table = $('#dataTable').DataTable({!! json_encode(--}}
    {{--array_merge([--}}
    {{--"order" => $orderColumn,--}}
    {{--"language" => __('voyager::datatable'),--}}
    {{--"columnDefs" => [['targets' => -1, 'searchable' =>  false, 'orderable' => false]],--}}
    {{--],--}}
    {{--config('voyager.dashboard.data_tables', []))--}}
    {{--, true) !!});--}}

    {{--$('#search-input select').select2({--}}
    {{--minimumResultsForSearch: Infinity--}}
    {{--});--}}



    {{--$('.side-body').multilingual();--}}
    {{--//Reinitialise the multilingual features when they change tab--}}
    {{--$('#dataTable').on('draw.dt', function(){--}}
    {{--$('.side-body').data('multilingual').init();--}}
    {{--})--}}

    {{--$('.select_all').on('click', function(e) {--}}
    {{--$('input[name="row_id"]').prop('checked', $(this).prop('checked'));--}}
    {{--});--}}
    {{--});--}}


    {{--var deleteFormAction;--}}
    {{--$('td').on('click', '.delete', function (e) {--}}
    {{--$('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__id']) }}'.replace('__id', $(this).data('id'));--}}
    {{--$('#delete_modal').modal('show');--}}
    {{--});--}}
    {{--</script>--}}
@stop
