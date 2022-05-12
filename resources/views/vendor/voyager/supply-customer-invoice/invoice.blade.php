@extends('voyager::master')

@php  $daTA=App\CustomerPurchaseOrder::first(); @endphp
@can('read',$daTA)




@section('page_header')

    <div class="col-md-8">
        <h1 class="page-title" id="page-title1">
            {{--<i class=""></i> {{ __('voyager::generic.viewing') }}--}}

            <a href="{{URL::previous()}}" id="butn" class="btn btn-warning customBtn">
                <span class="glyphicon glyphicon-list"></span>&nbsp;
                {{ __('voyager::generic.return_to_list') }}
            </a>
        </h1>
        <button class="btn btn-success" id="butna1" onclick="myFunction()">Print</button>


{{--            @if((Auth::user()->hasRole('admin') || Auth::user()->hasRole('ceo')))--}}

{{--                @if($invoice->status == "complete"  )--}}

{{--                   --}}
{{--                        <button id="recheckappr" type="button" class="btn btn-danger" data-id="{{$invoice->id}}"--}}
{{--                                data-show_id="Inv# {{sprintf('%03d',$invoice->id)}}-{{date('m',strtotime(@$invoice->created_at))}}"--}}
{{--                                data-toggle="modal" data-target="#recheck">--}}
{{--                            <i class="voyager-plus"></i> <span>{{('Proceed') }}</span>--}}
{{--                        </button>--}}
{{--                    --}}
{{--                   @endif--}}




{{--        <div class="modal fade" id="recheck" style="display: none;">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                            <span aria-hidden="true"></span></button>--}}
{{--                        <h4 class="modal-title alert alert-danger" style="text-align: center;margin-bottom: 0px">--}}
{{--                        </h4>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <form action="{{url('admin/invoices/invoice_delivery')}}" id="myform" method="post" enctype="multipart/form-data">--}}
{{--                            {{csrf_field()}}--}}
{{--                            {{method_field('Patch')}}--}}

{{--                            <input type="hidden" name="inv_id" id="inv_id" value="">--}}

{{--                            <label style="font-weight: bold">Remarks</label>--}}
{{--                            <textarea class="form-control" rows="5" required  name="approval_remarks">{{'Thanks For Your Business'}}</textarea>--}}
{{--                            <div class="modal-footer">--}}
{{--                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
{{--                                <button type="submit" id="submits" class="btn btn-danger">Yes I'm Sure!</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <!-- /.modal-content -->--}}
{{--            </div>--}}
{{--            <!-- /.modal-dialog -->--}}
{{--        </div>--}}

    </div>
    <div class="col-md-4" style="margin-bottom: 0px">
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger alert-block" style="opacity: 0.7">
                <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
    </div>
    <script>
        function myFunction() {
            window.print();
        }
    </script>

    <style>
        .inv_proceed{
            font-weight: 500!important;
            background: red;
            color: white;
            padding: 16px 23px;
            border-radius: 5px;
        }
        .bt{
            border-bottom: 0px!important;
            border-top: 0px!important;
            border: 2px solid;
            height: 40px;
            margin-bottom: 0px!important;
        }
        .bt0{
            border-bottom: 0px!important;

            border: 2px solid;
            height: 40px;
            margin-bottom: 0px!important;
        }

        .bttp0{
            border-bottom: 0px!important;
            border-top: 0px!important;
            border: 2px solid;
            height: 40px;
            margin-bottom: 0px!important;
        }
        .tp0{

            border-top: 0px!important;
            border: 2px solid;
            height: 40px;
            margin-bottom: 0px!important;
        }
        .all0{

            border: 0px!important;
            border: 2px solid;
            height: 5px;
            margin-bottom: 0px!important;
        }
        .allok{
            border: 2px solid;
            height: 40px;
            margin-bottom: 0px!important;
        }
        @media print {
            @page{margin: 0px  }
            html,body{/*margin: 1.6cm;*/
                width: 235mm;
                height: 297mm;
                /*height: 282mm;*/
                /*font-size: 12px;*/
                background: #FFF;
                overflow:visible;
            }
            #bodyprint{
                width: 100% ;
                height: auto;
                margin-top: 0px;


            }
            #butn{
                display: none;
                position: absolute;
            }
            #butna1{
                display: none;
                position: absolute;
            }
            #butna2{
                display: none;
                position: absolute;
            }
            #butna3{
                display: none;
                position: absolute;
            }
            #butna4{
                display: none;
                position: absolute;
            }
            #butna5{
                display: none;
                position: absolute;
            }
            #butna6{
                display: none;
                position: absolute;
            }
            .voyager .app-footer {
                opacity: .7;
                color: #353d47;
                width: 100%;
                text-align: right;
                padding: 10px 0;
                background: #fff;
                left: 0;
                display: none;
            }
            #page-title1 {
                padding-top: 0px;
                height: 0px;
                margin-top: 0px;
                display: none;
                position: absolute;
            }

        }
    </style>
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-2 col-sm-2 col-xs-2"></div>


                    <div class="col-md-8 col-sm-8 col-xs-8" id="bodyprint" >
                        <div class="col-md-8 col-sm-8 col-xs-8 bt0" style="border-right: 0px!important; ">
                            <P style="font-weight: bold;padding: 6px;font-size: 20px"></P>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 bt0">
                            <P style="text-align: center;font-weight: bold;padding: 6px;font-size: 20px">Sales Tax Invoice</P>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 bttp0" style="border-right: 0px!important; ">
                            <P style="font-weight: bold;padding-left:20px;padding-top: 6px;margin-left: 35px"> <span style="font-weight: lighter"> Buyer's Name :</span> {{$invoice->customer->name}} </P>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 bttp0">
                            <P style="text-align: center;font-weight: bold;padding-top: 6px">Inv# {{sprintf('%03d',$invoice->id)}}-{{date('m',strtotime(@$invoice->created_at))}}</P>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 bttp0" style="border-right: 0px!important; ">
                            <P style="font-weight: 500;padding-left:20px;padding-top: 6px;margin-left: 35px">s</P>
                            <P style="font-weight: 500;padding-left:20px;padding-top: 6px;margin-left: 35px">s</P>
                            <P style="font-weight: 500;padding-left:20px;padding-top: 6px;margin-left: 35px">s</P>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 bttp0">
                            <P style="text-align: center;font-weight: bold;padding-top: 6px">Invoice Date :{{date('d-M-Y',strtotime(@$invoice->created_at))}}</P>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 bttp0" style="border-right: 0px!important; ">
                            <P style="font-weight: 500;padding-left:20px;padding-top: 6px;margin-left: 35px"> </P>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 bttp0">

                            <P style="text-align: center;font-weight: bold;padding-top: 6px">PO# {{ $invoice->invoice_details[0]->delivery_order->po_number->po_number }}  </P>



                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8 tp0" style="border-right: 0px!important; ">
                            {{--                            <P style="font-weight: 500;padding-left:20px;padding-top: 6px;margin-left: 35px">Deliver to {{strtoupper($del->city ) }}</P>--}}

                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-4 tp0">
                            <P style="text-align: center;font-weight: bold;padding-top: 6px">Page No.1 of 1</P>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 all0">

                            {{--Discriptoin--}}
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1 allok" style="border-right: 0px" >
                            <p style="font-size: 14px;font-weight: bold;padding-top: 6px">D/O#</p>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 allok" style="border-right: 0px" >
                            <p style="font-size: 14px;font-weight: bold;padding-top: 6px">Description</p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 allok" style="border-right: 0px" value="Total Cartons">
                            <p style="font-size: 14px;font-weight: bold;padding-top: 6px">QTY</p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 allok" style="border-right: 0px" value="Total Cartons">
                            <p style="font-size: 14px;font-weight: bold;padding-top: 6px">Unit Price</p>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 allok" value="Total Quantity">
                            <p style="font-size: 12px;font-weight: bold;padding-top: 6px">Line Total </p>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 all0">
                        </div>







{{--                        @foreach( ($invoice->inv_details) as $key => $orders)--}}

{{--                            @if($key==0)--}}


{{--                                <div class="col-md-1 col-sm-1 col-xs-1 bt0" style="border-right: 0px">--}}
{{--                                    <p style="text-align: center;font-size:14px;font-weight: bold;">{{$orders->do_id + 12350 }}</p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-5 col-sm-5 col-xs-5 bt0" style="border-right: 0px">--}}

{{--                                    <P style="font-weight: bold; font-size: 16px">--}}

{{--                                        @foreach(($orders->product) as $product_name)--}}
{{--                                            {{str_limit($product_name->product_name,25) }}--}}
{{--                                        @endforeach--}}
{{--                                    </P>--}}


{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bt0" style="border-right: 0px">--}}




{{--                                    <p style="text-align: center;font-size:16px;font-weight: bold;">{{ (($orders->qty)) }} doz</p>--}}




{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bt0" style="border-right: 0px">--}}


{{--                                    <p style="text-align: center;font-size:16px;font-weight: bold;">{{ $orders->unit_price}}</p>--}}


{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bt0">--}}

{{--                                    <p style="text-align: center;font-size:16px;font-weight: bold;">{{ number_format($orders->product_price)}}</p>--}}


{{--                                </div>--}}




{{--                                <div class="col-md-1 col-sm-1 col-xs-1 bttp0" style="border-right: 0px">--}}

{{--                                </div>--}}
{{--                                <div class="col-md-5 col-sm-5 col-xs-5 bttp0" style="border-right: 0px">--}}



{{--                                    <p style="font-size:11px;font-weight: 600;margin-left:15px ">--}}


{{--                                        ({{round(($orders->qty)/@$orders->product[0]->doz_cart)}} Cartoons <span style="font-weight: bold;">x</span> {{@$orders->product[0]->doz_cart}} doz.) &nbsp;--}}
{{--                                        @if(@$orders->doz)--}}
{{--                                            ,&nbsp; ({{1}} Cartoons <span style="font-weight: bold;">x</span> {{@$orders->doz}} doz.)&nbsp--}}
{{--                                        @endif--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bttp0" style="border-right: 0px">--}}

{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bttp0" style="border-right: 0px">--}}

{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bttp0">--}}

{{--                                </div>--}}
{{--                            @else--}}



{{--                                <div class="col-md-1 col-sm-1 col-xs-1 bt" style="border-right: 0px">--}}
{{--                                    <p style="text-align: center;font-size:14px;font-weight: bold;">{{$orders->do_id + 12350 }}</p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-5 col-sm-5 col-xs-5 bt" style="border-right: 0px">--}}

{{--                                    <P style="font-weight: bold; font-size: 16px">--}}

{{--                                        @foreach(($orders->product) as $product_name)--}}
{{--                                            {{str_limit($product_name->product_name,25) }}--}}
{{--                                        @endforeach--}}
{{--                                    </P>--}}


{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bt" style="border-right: 0px">--}}

{{--                                    <p style="text-align: center;font-size:16px;font-weight: bold;">{{ (($orders->qty))}} doz</p>--}}




{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bt" style="border-right: 0px">--}}


{{--                                    <p style="text-align: center;font-size:16px;font-weight: bold;">{{ $orders->unit_price}}</p>--}}


{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bt">--}}

{{--                                    <p style="text-align: center;font-size:16px;font-weight: bold;">{{ number_format($orders->product_price)}}</p>--}}


{{--                                </div>--}}




{{--                                <div class="col-md-1 col-sm-1 col-xs-1 bttp0" style="border-right: 0px">--}}

{{--                                </div>--}}
{{--                                <div class="col-md-5 col-sm-5 col-xs-5 bttp0" style="border-right: 0px">--}}



{{--                                    <p style="font-size:11px;font-weight: 600;margin-left:15px ">--}}


{{--                                        ({{round((@$orders->qty)/$orders->product[0]->doz_cart)}} Cartoons <span style="font-weight: bold;">x</span> {{@$orders->product[0]->doz_cart}} doz.) &nbsp;--}}
{{--                                        @if(@$orders->doz)--}}
{{--                                            ,&nbsp; ({{1}} Cartoons <span style="font-weight: bold;">x</span> {{@$orders->doz}} doz.)&nbsp--}}
{{--                                        @endif--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bttp0" style="border-right: 0px">--}}

{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bttp0" style="border-right: 0px">--}}

{{--                                </div>--}}
{{--                                <div class="col-md-2 col-sm-2 col-xs-2 bttp0">--}}

{{--                                </div>--}}

{{--                            @endif--}}







{{--                        @endforeach--}}




                        {{--number6--}}

                        <div class="col-md-1 col-sm-1 col-xs-1 bttp0" style="border-right: 0px">
                            {{--@if($report->report->qty_actual_f)--}}
                            {{--<p style="text-align: center;font-size:18px;font-weight: bold;">{{6}}</p>--}}
                            {{--@endif--}}
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 bttp0" style="border-right: 0px">
                            {{--@if($report->report->qty_actual_f)--}}
                            {{--<p style="font-weight: bold;font-size: 18px">{{@$report->combi_ups_f_remarks}}</p>--}}
                            {{--@endif--}}
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 bttp0" style="border-right: 0px">
                            {{--@php--}}
                            {{--$combitcf=$report->report->f_tc_1+$report->report->f_tc_2+$report->report->f_tc_3;--}}
                            {{--@endphp--}}
                            {{--@if($combitcf)--}}
                            {{--<p style="text-align: center;font-size:18px;font-weight: bold;">{{$combitcf}}</p>--}}
                            {{--@endif--}}
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 bttp0" style="border-right: 0px">
                            {{--@php--}}
                            {{--$combitcf=$report->report->f_tc_1+$report->report->f_tc_2+$report->report->f_tc_3;--}}
                            {{--@endphp--}}
                            {{--@if($combitcf)--}}
                            {{--<p style="text-align: center;font-size:18px;font-weight: bold;">{{$combitcf}}</p>--}}
                            {{--@endif--}}
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 bttp0">
                            {{--@if($report->report->qty_actual_f)--}}
                            {{--<p style="text-align: center;font-size:18px;font-weight: bold;">{{@$report->report->qty_actual_f}}</p>--}}
                            {{--@endif--}}

                        </div>


                        <div class="col-md-1 col-sm-1 col-xs-1 tp0" style="border-right: 0px">

                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-5 tp0" style="border-right: 0px">
                            {{--@if($report->report->qty_actual_f)--}}
                            {{--<p style="font-size:11px;font-weight: 600;margin-left:15px ">--}}
                            {{--({{@$report->report->f_tc_1}} Cartoons <span style="font-weight: bold;">x</span> {{@$report->report->f_upc_1}} Pcs) &nbsp--}}
                            {{--@if($report->report->f_tc_2)--}}
                            {{--,&nbsp ({{@$report->report->f_tc_2}} Cartoons <span style="font-weight: bold;">x</span> {{@$report->report->f_upc_2}} Pcs)&nbsp--}}
                            {{--@endif--}}
                            {{--@if($report->report->f_tc_3)--}}
                            {{--,&nbsp ({{@$report->report->f_tc_3}} Cartoons <span style="font-weight: bold;">x</span> {{@$report->report->f_upc_3}} Pcs) </p>--}}
                            {{--@endif--}}
                            {{--@endif--}}
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 tp0" style="border-right: 0px">

                        </div>  <div class="col-md-2 col-sm-2 col-xs-2 tp0" style="border-right: 0px">

                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-2 tp0">
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 all0">
                        </div>
                        {{--Total --}}

                        <div class="col-md-10 col-sm-10 col-xs-10 allok" style="border-right: 0px" value="Discription">
                            <p style="font-size: 23px;font-weight: bold;">Total </p>
                        </div>

                        <div class="col-md-2 col-sm-2 col-xs-2 allok" value="Total Quantity">
                            <p style="text-align: center;font-size:16px;font-weight: bold;">  {{number_format($invoice->inv_total)}}</p>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 all0">
                        </div>



                    </div>




                </div>
            </div>
        </div>
    </div>
    {{-- Single delete modal --}}

@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')

    <script>
        $(document).keypress(
            function(event){
                if (event.which == '13') {
                    event.preventDefault();
                }
            });

    </script>
    <script>
        $('#recheck').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var number = button.data('number') // Extract info from data-* attributes
            var id = button.data('id') // Extract info from data-* attributes
            var show_id = button.data('show_id') // Extract info from data-* attributes

            var modal = $(this)
            modal.find('.modal-title').text('Are you sure you want to Proceed this Invoice '+ show_id +' for Biocos')
            modal.find('.modal-body #inv_id').val(id)
        })


    </script>

@stop
