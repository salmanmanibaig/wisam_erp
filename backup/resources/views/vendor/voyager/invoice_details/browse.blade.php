@extends('voyager::master')

@php  $customerset=App\Customer::first(); @endphp
@can('browse',$customerset)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-pages"></i>
                    Invoice Details Reports
                </p>

                {{--                <a href="{{url('admin/crm-call-backs/create')}}" class="btn btn-success btn-add-new">--}}
                {{--                    <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>--}}
                {{--                </a>--}}
            </div>
            <div class="col-md-6" style="margin-bottom: 0px">
                @if ($message = Session::get('info'))
                    <div class="alert alert-success alert-block" style="opacity: 0.7">
                        <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×
                        </button>
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
        <div class="row">
            <div class="col-md-1"></div>


            <div class="panel panel-bordered">
                <div class="panel-body">

                    <style>
                        .dataTables_wrapper .dataTables_filter input {


                        }


                    </style>

                    <div class="col-md-10">
                        <form id="invoice_report_form" action="{{url("admin/invoice_report_generate")}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <table class="table table-striped" id="myTable">
                                <thead>
                                <tr>
                                    <td>
                                        <div class="col-md-6" id="select_items">
                                            <label for="name" class="font-weight-bold">Product Name:</label><span
                                                style="color: red;">*</span>
                                            <select name="product_id[]" select2 required id="namevalue"
                                                    class="namevalue form-control font-weight-bold  ">
                                                <option value="">Select Product</option>
                                                @foreach($products as $key=>$product)
                                                    <option @if($select_product==$product->id) selected
                                                            @endif value="{{$product->id}}"
                                                            class="select_product">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="name" class="font-weight-bold">Fetch Data As</label><span
                                                style="color: red;">*</span>
                                            {{--                                            {{$data_fetch_as}}--}}
                                            @if($data_fetch_as)
                                                <select name="data_fetch_as" select2 required id="data_fetch_as"
                                                        class="data_fetch_as form-control font-weight-bold select2 "
                                                        value="{{$data_fetch_as}}">
                                                    <option value="">Select</option>

                                                    <option class="select_product" @if($data_fetch_as==2) selected
                                                            @endif value="2">Vendor Wise
                                                    </option>
                                                    <option class="select_product" @if($data_fetch_as==1) selected
                                                            @endif value="1">Latest Date Wise
                                                    </option>

                                                </select>
                                            @else
                                                <select name="data_fetch_as" select2 required id="data_fetch_as"
                                                        class="data_fetch_as form-control font-weight-bold select2 ">
                                                    <option value="">Select</option>

                                                    <option class="select_product" value="2">Vendor Wise</option>
                                                    <option class="select_product" value="1">Latest Date Wise</option>

                                                </select>
                                            @endif

                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <button type="submit" id="inv_report_generete" class="btn btn-lg btn-info">
                                                See Details
                                            </button>
                                        </div>

                                    </td>

                                </tr>

                                </thead>
                                <tbody id="acc_table">
                                <tr>

                                </tr>


                                </tbody>
                            </table>
                        </form>

                    </div>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <table id="" class="table table-hover">
                    <thead>
                    <tr>

                        <th>
                            Date
                        </th>
                        <th>
                            Invoice Number
                        </th>
                        <th>
                            Vendor Name
                        </th>
                        <th>
                            Invoice Total
                        </th>
                        <th>Percentage Value</th>

                    </tr>
                    </thead>

                    <tbody>

                    @if(count($output)>0)
                        {{--                        <?php $a=0 ?>--}}
                        {{--                        @for($i=0;$i<count($output);$i++)--}}
                        {{--                            @if(@$output[$i]['vendor_wise'])--}}
                        {{--                            <tr>--}}


                        {{--                            @for($k=0;$k<count($output);$k++)--}}
                        {{--                                <?php $temp=0;?>--}}
                        {{--                                @if(@$output[$k]['vendor_name']===@$output[$i]['vendor_name'])--}}

                        {{--                                    <tr>--}}

                        {{--                                        <td></td>--}}
                        {{--                                        <td></td>--}}

                        {{--                                        <td><h4>{{@$output[$i]['vendor_name']}}</h4></td>--}}


                        {{--                                        <td></td>--}}
                        {{--                                        <td></td>--}}
                        {{--                                    </tr>--}}

                        {{--                                @else--}}

                        {{--                                @endif--}}
                        {{--                            @endfor--}}



                        {{--                            @if(@$output[$i]['vendor_name'] )--}}

                        {{--                                <tr>--}}

                        {{--                                    <td></td>--}}
                        {{--                                    <td></td>--}}

                        {{--                                    <td><h4>{{@$output[$i]['vendor_name']}}</h4></td>--}}


                        {{--                                    <td></td>--}}
                        {{--                                    <td></td>--}}
                        {{--                                </tr>--}}




                        {{--                            @else--}}

                        {{--                            @endif--}}


                        {{--                            <td><h4>{{@$output[$i]['vendor_name']}}</h4></td>--}}

                        {{--                            <td>--}}
                        {{--                                {{@$output[$i]['date']}}--}}
                        {{--                            </td>--}}
                        {{--                            <td>--}}
                        {{--                                {{@$output[$i]['invoiceNumber']}}--}}
                        {{--                                <a id="view_invoice" class="view_invoice"--}}
                        {{--                                   href='{{url("admin/invoice_view/{$output[$i]['id']}")}}'><span id="view"--}}
                        {{--                                                                                                  class=" view glyphicon glyphicon-search"--}}
                        {{--                                                                                                  style="color: blue;size: 20px;margin-left: 8px;"></span></a>--}}
                        {{--                            </td>--}}


                        {{--                            <td>--}}

                        {{--                                {{@$output[$i]['vendor_name']}}--}}

                        {{--                            </td>--}}
                        {{--                            <td>--}}
                        {{--                                {{@$output[$i]['inv_total']}}--}}

                        {{--                            </td>--}}
                        {{--                            <td>--}}
                        {{--                                @if(@$output[$i]['percentage_decrease'])--}}
                        {{--                                    <span class="glyphicon glyphicon-arrow-down" style="color: green;">{{number_format(@$output[$i]['percentage_decrease'],2)}}%</span>--}}

                        {{--                                @else--}}
                        {{--                                @endif--}}
                        {{--                                @if(@$output[$i]['percentage_increase'])--}}
                        {{--                                    <span class="glyphicon glyphicon-arrow-up" style="color: red;">{{number_format(@$output[$i]['percentage_increase'],2)}}%</span>--}}

                        {{--                                @else--}}
                        {{--                                @endif--}}
                        {{--                                @if(!@$output[$i]['percentage_increase'] and !@$output[$i]['percentage_decrease'])--}}
                        {{--                                    <h5 style="color: #00aaff">0%</h5>--}}
                        {{--                                    {{@$output[$i]['percentage']}}--}}
                        {{--                                @else--}}
                        {{--                                @endif--}}

                        {{--                            </td>--}}

                        {{--                            </tr>--}}
                        {{--                            @else--}}
                        {{--                            @endif--}}
                        {{--                            @if(@$output[$i]['date_wise'])--}}
                        {{--                                <tr>--}}

                        {{--                                    <td>--}}
                        {{--                                        {{@$output[$i]['date']}}--}}
                        {{--                                    </td>--}}
                        {{--                                    <td>--}}
                        {{--                                        {{@$output[$i]['invoiceNumber']}}--}}
                        {{--                                        <a id="view_invoice" class="view_invoice"--}}
                        {{--                                           href='{{url("admin/invoice_view/{$output[$i]['id']}")}}'><span id="view"--}}
                        {{--                                                                                                          class=" view glyphicon glyphicon-search"--}}
                        {{--                                                                                                          style="color: blue;size: 20px;margin-left: 8px;"></span></a>--}}
                        {{--                                    </td>--}}


                        {{--                                    <td>--}}
                        {{--                                        {{@$output[$i]['vendor_name']}}--}}

                        {{--                                    </td>--}}
                        {{--                                    <td>--}}
                        {{--                                        {{@$output[$i]['inv_total']}}--}}

                        {{--                                    </td>--}}
                        {{--                                    <td>--}}
                        {{--                                        @if(@$output[$i]['percentage_decrease'])--}}
                        {{--                                            <span class="glyphicon glyphicon-arrow-down" style="color: green;">{{number_format(@$output[$i]['percentage_decrease'],2)}}%</span>--}}

                        {{--                                        @else--}}
                        {{--                                        @endif--}}
                        {{--                                        @if(@$output[$i]['percentage_increase'])--}}
                        {{--                                            <span class="glyphicon glyphicon-arrow-up" style="color: red;">{{number_format(@$output[$i]['percentage_increase'],2)}}%</span>--}}

                        {{--                                        @else--}}
                        {{--                                        @endif--}}
                        {{--                                        @if(!@$output[$i]['percentage_increase'] and !@$output[$i]['percentage_decrease'])--}}
                        {{--                                            <h5 style="color: #00aaff">0%</h5>--}}
                        {{--                                            --}}{{--                                    {{@$output[$i]['percentage']}}--}}
                        {{--                                        @else--}}
                        {{--                                        @endif--}}

                        {{--                                    </td>--}}

                        {{--                                </tr>--}}
                        {{--                            @else--}}
                        {{--                            @endif--}}

                        {{--                        @endfor--}}
{{--                        {{dd($output)}}--}}

                        @foreach($output as $key =>   $dataa)

                                @if(@$dataa['vendor_wise'])
{{--                            <?$a = 0;$temp = array() ?>--}}
{{--                            @for($i=0;$i<count($output);$i++)--}}

{{--                                @for($j=$i+1;$j<count($output);$j++)--}}
{{--                                    @if(@$output[$i]['vendor_name']==@$output[$j]['vendor_name'])--}}

{{--                                        {{@$output[$i]['vendor_name']}}--}}


{{--                                        @if($dataa['vendor_name'])--}}

{{--                                            <tr>--}}
{{--                                                <td></td>--}}
{{--                                                <td></td>--}}

{{--                                                <td>--}}
{{--                                                    <h4 style="color: black; font-weight: bold;">{{@$output['vendor_name']}}</h4>--}}
{{--                                                </td>--}}
{{--                                                <td></td>--}}
{{--                                                <td></td>--}}

{{--                                            </tr>--}}
{{--                                            @break--}}

{{--                                        @else--}}
{{--                                        {{@$output[$i]['vendor_name']}}--}}

{{--                                        @break--}}
{{--                                        @endif--}}
{{--                                        @endfor--}}
{{--                                        @endfor--}}
                                        {{--                                {{dd(@$output[$j]['vendor_name'])}}--}}
                                        <tr>

                                            <td>
                                                {{$dataa['date']}}
                                            </td>
                                            <td>
                                                {{@$dataa['invoiceNumber']}}
                                                <a id="view_invoice" class="view_invoice"
                                                   href='{{url("admin/invoice_view/{$dataa['id']}")}}'><span id="view"
                                                                                                             class=" view glyphicon glyphicon-search"
                                                                                                             style="color: blue;size: 20px;margin-left: 8px;"></span></a>
                                            </td>


                                            <td>

                                                {{@$dataa['vendor_name']}}

                                            </td>
                                            <td>
                                                {{@$dataa['inv_total']}}

                                            </td>
                                            <td>
                                                @if(@$dataa['percentage_decrease'])
                                                    <span class="glyphicon glyphicon-arrow-down" style="color: green;">{{number_format(@$dataa['percentage_decrease'],2)}}%</span>

                                                @else
                                                @endif
                                                @if(@$dataa['percentage_increase'])
                                                    <span class="glyphicon glyphicon-arrow-up" style="color: red;">{{number_format(@$dataa['percentage_increase'],2)}}%</span>

                                                @else
                                                @endif
                                                @if(!@$dataa['percentage_increase'] and !@$dataa['percentage_decrease'])
                                                    <h5 style="color: #00aaff">0%</h5>

                                                @else
                                                @endif

                                            </td>

                                        </tr>
                                    @else
                                    @endif
                                    @if(@$dataa['date_wise'])
                                        <tr id="myTable">

                                            <td>
                                                {{@$dataa['date']}}
                                            </td>
                                            <td>
                                                {{@$dataa['invoiceNumber']}}
                                                <a id="view_invoice" class="view_invoice"
                                                   href='{{url("admin/invoice_view/{$dataa['id']}")}}'><span id="view"
                                                                                                             class=" view glyphicon glyphicon-search"
                                                                                                             style="color: blue;size: 20px;margin-left: 8px;"></span></a>
                                            </td>


                                            <td>
                                                {{@$dataa['vendor_name']}}

                                            </td>
                                            <td>
                                                {{@$dataa['inv_total']}}

                                            </td>
                                            <td>
                                                @if(@$dataa['percentage_decrease'])
                                                    <span class="glyphicon glyphicon-arrow-down" style="color: green;">{{number_format(@$dataa['percentage_decrease'],2)}}%</span>

                                                @else
                                                @endif
                                                @if(@$dataa['percentage_increase'])
                                                    <span class="glyphicon glyphicon-arrow-up" style="color: red;">{{number_format(@$dataa['percentage_increase'],2)}}%</span>

                                                @else
                                                @endif
                                                @if(!@$dataa['percentage_increase'] and !@$dataa['percentage_decrease'])
                                                    <h5 style="color: #00aaff">0%</h5>

                                                @else
                                                @endif

                                            </td>


                                        </tr>
                                    @else
                                    @endif



                                    @endforeach
                                    @else
                                    @endif

                    </tbody>


                </table>
            </div>

        </div>
    </div>



@stop

@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                // "order": false
                "order": [[1, "desc"]],
                "pageLength": 25
                // "order": [[ 1, "asc" ]]
            })
        });
    </script>
    <script>

        $(document).ready(function () {
            $('#myTable').on('change', '.namevalue', function () {
                var id = $(this).val();
                // alert(id);
                // $.ajax({
                //     url:"/admin/invoice_report_generate"+id,
                //     method:"GET",
                //     dataType:"JSON",
                //     success:function (data){
                //              console.log(data);
                //     }
                //
                // });

            })
        })
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

@stop
