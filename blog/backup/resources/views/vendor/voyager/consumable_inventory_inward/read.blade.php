@extends('voyager::master')

@php  $prod=App\ConsumableInventoryTransaction::first(); @endphp
@can('read',$prod)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title butn">
                    <i class=""></i>
                    View {{--{{$product[0]->product_name}}--}}
                </p>

                <button class="btn btn-success butn" onclick="myFunction()" >Print</button>
                <script>
                    function myFunction() {
                        window.print();
                    }
                </script>
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
    <div class="page-content browse container-fluid">
        {{--@include('voyager::alerts')--}}
        <div class="row" >
            <div class="col-md-12">

                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-bordered">
                        <div class="panel-body">

                            <style>
                                .dataTables_wrapper .dataTables_filter input{


                                }

                                input[type=number]::-webkit-inner-spin-button,
                                input[type=number]::-webkit-outer-spin-button {
                                    -webkit-appearance: none;
                                    margin: 0;
                                }

                            </style>
                            <style>
                                .form-control1 {
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 11px);
                                    padding: 9px 1px 1px 14px;
                                    /*padding: .375rem .75rem;*/
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    /*color: #495057;*/
                                    background-color: white;
                                    /*background-color:  rgb(240, 240, 240)!important;-webkit-print-color-adjust: exact;*/
                                    background-clip: padding-box;
                                    border: 2px solid;
                                    border-bottom: 0px;
                                    border-right: 0px;
                                    /*border-radius: .25rem;*/
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                }

                                .form-control1a {
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 11px);
                                    padding: 9px 1px 1px 14px;
                                    /*padding: .375rem .75rem;*/
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    /*color: #495057;*/
                                    background-color: white;
                                    /*background-color:  rgb(240, 240, 240)!important;-webkit-print-color-adjust: exact;*/
                                    background-clip: padding-box;
                                    border: 2px solid;
                                    /*border-bottom: 0px;*/
                                    border-right: 0px;
                                    /*border-radius: .25rem;*/
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                }
                                .form-control2 {
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 11px);
                                    padding: 5px 1px 1px 14px;
                                    /*padding: .375rem .75rem;*/
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    /*color: #495057;*/
                                    background-color: #fff;
                                    background-clip: padding-box;
                                    border: 2px solid;
                                    border-bottom: 0px;
                                    border-right: 0px;
                                    /*border-radius: .25rem;*/
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                }
                                .order_detail{
                                    margin-top: -4px;
                                    text-align: center;
                                    font-weight: bold;
                                }
                                .form-controlchk {
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 11px);
                                    padding: 3px 1px 1px 4px;
                                    /*padding: .375rem .75rem;*/
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    /*color: #495057;*/
                                    background-color: #fff;
                                    background-clip: padding-box;
                                    border: 2px solid;
                                    border-bottom: 0px;
                                    border-right: 0px;
                                    /*border-radius: .25rem;*/
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                }
                                .form-control-fullcol {
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 11px);
                                    padding: 9px 1px 1px 3px;
                                    /*padding: .375rem .75rem;*/
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    /*color: #495057;*/
                                    background-color: #fff;
                                    background-clip: padding-box;
                                    border: 2px solid;
                                    border-bottom: 0px;
                                    /*border-right: 0px;*/
                                    /*border-radius: .25rem;*/
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                }
                                .form-control-last {
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 11px);
                                    padding: 9px 1px 1px 14px;
                                    /*padding: .375rem .75rem;*/
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    /*color: #495057;*/
                                    background-color: #fff;
                                    background-clip: padding-box;
                                    border: 2px solid;
                                    border-bottom: 0px;
                                    /*border-radius: .25rem;*/
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                }
                                .form-control-last1 {
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 11px);
                                    padding: 5px 1px 1px 14px;
                                    /*padding: .375rem .75rem;*/
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    /*color: #495057;*/
                                    background-color: #fff;
                                    background-clip: padding-box;
                                    border: 2px solid;
                                    border-bottom: 0px;
                                    /*border-radius: .25rem;*/
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                }
                                .form-control-bottom{
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 11px);
                                    padding: 5px 1px 1px 12px;
                                    /*padding: .375rem .75rem;*/
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    /*color: #495057;*/
                                    background-color: #fff;
                                    background-clip: padding-box;
                                    border: 2px solid;
                                    /*border-bottom: 0px;*/
                                    /*border-radius: .25rem;*/
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                }
                                .textfont{
                                    font-size: 15px;
                                    margin: 0px;
                                    font-weight: 700;
                                }
                                .textfontchk{
                                    font-size: 9px;
                                    margin: 0px;
                                    font-weight: 700;
                                }
                                .textfontremark{
                                    padding: 9px 5px 2px 3px;
                                    font-size: 11px;
                                    margin: 0px;
                                    font-weight: 700;
                                }
                                .textfontremarknew{
                                    padding: 0px;
                                    font-size: 11px;
                                    margin: 0px;
                                    font-weight: 700;
                                }
                                .simplefont{
                                    font-weight: bold;
                                }
                                .textfontchk1{
                                    font-size: 18px;
                                    font-weight: 600;

                                }
                                .textcustomer{
                                    font-size: 11px;
                                    margin: 0px;
                                    font-weight: 700;
                                }
                                .form_customer {
                                    display: block;
                                    width: 100%;
                                    height: calc(2.25rem + 11px);
                                    padding: 5px 1px 1px 14px;
                                    /* padding: .375rem .75rem; */
                                    font-size: 1rem;
                                    line-height: 1.5;
                                    /*color: #495057;*/
                                    background-color: white;
                                    background-clip: padding-box;
                                    border: 2px solid;
                                    border-bottom: 0px;
                                    border-right: 0px;
                                    /* border-radius: .25rem; */
                                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                                }
                            </style>
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
                                .all0tc{

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
                                    .butn{
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
                            <div class="row " style="text-align: center">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 0px">
                                    <p style="font-size: 25px;font-weight: bolder;margin-bottom: 10px;">Purchase No #

                                        {{sprintf('%04d',$consumable_inv_transaction->purchase_ref_no)}}{{'-'}}{{date('Y-m', strtotime($consumable_inv_transaction->transaction_date))}}
                                    </p>
                                </div>

                            </div>
                            <div class="row" style="text-align: center">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px">
                                    @php


                                        echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG(sprintf("%04d",$consumable_inv_transaction->purchase_ref_no)."-".date('Y-m', strtotime($consumable_inv_transaction->transaction_date))  , "C128",2,50) . '" alt="barcode"   />';
                                    @endphp
                                </div>
                            </div>

                            {{--                            <div class="row">--}}
                            <div style="padding: 0px ;margin-bottom: 0px;" class="col-md-3 col-sm-3 col-xs-3"><div style="margin: 0px;background-color:  rgb(240, 240, 240)!important;-webkit-print-color-adjust: exact;" class="form-control1"><p class="simplefont">PURCHASE NUMBER</p></div></div>
                            <div style="padding: 0px ;margin-bottom: 0px;" class="col-md-3 col-sm-3 col-xs-3"><div style="margin: 0px;" class="form-control1">


                                    <p style="font-weight: bold">{{sprintf('%04d',$consumable_inv_transaction->purchase_ref_no)}}{{'-'}}{{date('Y-m', strtotime($consumable_inv_transaction->transaction_date))}}</p>

                                </div></div>
                            <div style="padding: 0px ;margin-bottom: 0px;" class="col-md-3 col-sm-3 col-xs-3"><div style="margin: 0px; background-color:  rgb(240, 240, 240)!important;-webkit-print-color-adjust: exact;" class="form-control1"><p class="simplefont">DATE</p></div></div>
                            <div style="padding: 0px ;margin-bottom: 0px;" class="col-md-3 col-sm-3 col-xs-3"><div style="margin: 0px;" class="form-control-last"><p class="textfont">{{date('d-m-Y', strtotime($consumable_inv_transaction->transaction_date))}}</p></div></div>
                            {{--                            </div>--}}


                            {{--                            <div class="row">--}}
                            <div style="padding: 0px ;margin-bottom: 0px;" class="col-md-3 col-sm-3 col-xs-3"><div style="margin: 0px;background-color:  rgb(240, 240, 240)!important;-webkit-print-color-adjust: exact;" class="form-control1a"><p class="simplefont">VENDOR INVOICE NO</p></div></div>

                            <div style="padding: 0px ;margin-bottom: 0px;" class="col-md-3 col-sm-3 col-xs-3"><div style="margin: 0px;border-right: 0px" class="form-control-bottom"><p class="textfontchk1">{{@$consumable_inv_transaction->vendor_invoice_no}}</p></div></div>
                            <div style="padding: 0px ;margin-bottom: 0px;" class="col-md-3 col-sm-3 col-xs-3"><div style="margin: 0px;background-color:  rgb(240, 240, 240)!important;-webkit-print-color-adjust: exact;" class="form-control1a"><p class="simplefont">Factory</p></div></div>
                            <div style="padding: 0px ;margin-bottom: 0px;" class="col-md-3 col-sm-3 col-xs-3"><div style="margin: 0px;" class="form-control-bottom"><p class="textfontchk1">{{@$consumable_inv_transaction->factory->name}}</p></div></div>

                            {{--                            </div>--}}


                            <div class="col-md-12 col-sm-12 col-xs-12 all0">

                                {{--Discriptoin--}}
                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-1 allok" style="border-right: 0px" >
                                <p style="font-size: 14px;font-weight: bold;padding-top: 6px">Sr#</p>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5 allok" style="border-right: 0px" >
                                <p style="font-size: 14px;font-weight: bold;padding-top: 6px">Description</p>
                            </div>

                                <div class="col-md-3 col-sm-3 col-xs-3 allok" style="border-right: 0px" value="Total Cartons">
                                    <p style="font-size: 14px;font-weight: bold;padding-top: 6px">Quantity</p>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-3  allok" value="Total Quantity">
                                    <p style="font-size: 14px;font-weight: bold;padding-top: 6px">UOM </p>
                                </div>



                            <div class="col-md-12 col-sm-12 col-xs-12 all0">
                            </div>







                            @foreach($consumable_inv_transaction->invent_transaction_ope  as $key => $transaction)

                                @if($key==0)


                                    <div class="col-md-1 col-sm-1 col-xs-1 bt0" style="border-right: 0px">
                                        <p style="text-align: center;font-size:14px;font-weight: bold;">{{$key + 1 }}</p>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 bt0" style="border-right: 0px">

                                        <P style="font-weight: bold; font-size: 16px">
                                            {{($transaction->inv_item->item_name)}}</P>





                                    </div>





                                        <div class="col-md-3 col-sm-3 col-xs-3 bt0" style="border-right: 0px">




                                            <p style="text-align: center;font-size:16px;font-weight: bold;">{{ (number_format($transaction->quantity,1)) }} </p>




                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-3 bt0">

                                                <p style="text-align: center;font-size:16px;font-weight: bold;text-transform: uppercase">{{ ($transaction->inv_item->uom)}}</p>




                                        </div>





                                    <div class="col-md-1 col-sm-1 col-xs-1 bttp0" style="border-right: 0px">

                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 bttp0" style="border-right: 0px">




                                    </div>



                                        <div class="col-md-3 col-sm-3 col-xs-3 bttp0" style="border-right: 0px">

                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-3 bttp0">

                                        </div>



                                @else



                                    <div class="col-md-1 col-sm-1 col-xs-1 bt" style="border-right: 0px">
                                        <p style="text-align: center;font-size:14px;font-weight: bold;">{{$key+1 }}</p>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 bt" style="border-right: 0px">

                                        <P style="font-weight: bold; font-size: 16px">
                                            {{($transaction->inv_item->item_name)}}  </P>





                                    </div>




                                        <div class="col-md-3 col-sm-3 col-xs-3 bt" style="border-right: 0px">

                                            <p style="text-align: center;font-size:16px;font-weight: bold;">{{ (number_format($transaction->quantity,1))}} </p>




                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-3 bt">


                                                <p style="text-align: center;font-size:16px;font-weight: bold;text-transform: uppercase">{{ ($transaction->inv_item->uom)}}</p>



                                        </div>




                                    <div class="col-md-1 col-sm-1 col-xs-1 bttp0" style="border-right: 0px">

                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 bttp0" style="border-right: 0px">

                                    </div>




                                        <div class="col-md-3 col-sm-3 col-xs-3 bttp0" style="border-right: 0px">

                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-3 bttp0">

                                        </div>




                                @endif







                            @endforeach






                            <div class="col-md-1 col-sm-1 col-xs-1 bttp0" style="border-right: 0px">

                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5 bttp0" style="border-right: 0px">

                            </div>



                                <div class="col-md-3 col-sm-3 col-xs-3 bttp0" style="border-right: 0px">

                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-3 bttp0">

                                </div>





                            <div class="col-md-1 col-sm-1 col-xs-1 tp0" style="border-right: 0px">

                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5 tp0" style="border-right: 0px">

                            </div>


                                <div class="col-md-3 col-sm-3 col-xs-3 tp0" style="border-right: 0px">

                                </div>


                                <div class="col-md-3 col-sm-3 col-xs-3 tp0">
                                </div>






                            <div class="col-md-12 col-sm-12 col-xs-12 all0">
                            </div>


                            <div class="col-md-1 col-sm-1 col-xs-1 allok" style="border-right: 0px" >
                                <p style="font-size: 14px;font-weight: bold;padding-top: 6px"></p>
                            </div>
                            <div class="col-md-5 col-sm-5 col-xs-5 allok" style="border-right: 0px" >
                                <p style="font-size:16px;font-weight: bold;">Total</p>
                            </div>
                            <?php
                            $totalqty=0;
                            foreach($consumable_inv_transaction->invent_transaction_ope  as $key => $transaction)
                            {
                                $totalqty=$totalqty+$transaction->quantity;
                            }

                            ?>



                                <div class="col-md-3 col-sm-3 col-xs-3 allok" style="border-right: 0px" value="Total Cartons">
                                    <p style="text-align: center;font-size:16px;font-weight: bold;">{{number_format($totalqty,2)}} </p>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-3  allok" value="Total Quantity">
                                    <p style="text-align: center;font-size:16px;font-weight: bold;"></p>
                                </div>









                            <div class="modal body" id="edit" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Update Entry</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{url('admin/consumable-inventory-transactions/update')}}" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                {{method_field('put')}}

                                                <input type="hidden" name="id" id="id" value="">
                                                <div class="row">
                                                    <div class="col-md-12">


                                                        <div class="form-group">
                                                            <label style="font-weight: bold">Quantity/Length: (meter)</label>
                                                            <input type="number" step="any" required class="form-control" name="qty" id="qty" >
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">


                                                        <div class="form-group">
                                                            <label style="font-weight: bold">Weight: (kg)</label>
                                                            <input type="number" step="any" required class="form-control " name="weight" id="weight" >
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>

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
            var button = $(event.relatedTarget) // Button that triggered the modal

            var id = button.data('id') // Extract info from data-* attributes
            var qty = button.data('qty') // Extract info from data-* attributes

            var weight = button.data('weight') // Extract info from data-* attributes
            // alert(plate)

            var modal = $(this)
            modal.find('.modal-title').text('Are you sure you want to update this ');
            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #qty').val(qty)
            modal.find('.modal-body #weight').val(weight)
        })




    </script>

    <script>
        document.addEventListener("mousewheel", function(event){
            if(document.activeElement.type === "number"){
                document.activeElement.blur();
            }
        });
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
            // $('#example').DataTable( {
            //     // "order": false
            //     "order": [[ 1, "desc" ]],
            //     "pageLength": 25
            //     // "order": [[ 1, "asc" ]]
            // } );
        } );
        jQuery('form').submit(function(){
            $(this).find(':submit').attr( 'disabled','disabled' );
        });
    </script>


@stop
