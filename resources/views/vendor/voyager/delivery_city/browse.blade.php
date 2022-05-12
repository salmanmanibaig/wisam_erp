@extends('voyager::master')

@php  $role_check=App\Booking::first(); @endphp
@can('browse',$role_check)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-bag"></i>
                       Delivery Cities
                </p>

                <a href="{{url('admin/delivery_city/create')}}">
                    <i class="voyager-sun"></i>
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
        <div class="row" >
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <div class="panel-body">

                        <div class="container-fluid container-fixed-lg">
                            <!-- BEGIN PlACE PAGE CONTENT HERE -->

                            <div class="row">



                                <div class="col-xl-12 col-lg-12 ">
                                    <div class="card m-t-10">
                                        <div class="card-header  separator">
                                            <div class="card-title"><h2>Manage Delivery Cities</h2>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <div class="row clearfix">

                                                <div class="col-md-5">

                                                </div>
                                            </div>
                                            <br>


                                            <div class="row">
                                                <div class="col-xl-5 col-lg-6 ">

                                                    <div class="card card-transparent">
                                                        <div class="card-header ">
                                                            <div class="card-title">Cost-Effective Shipping Solutions
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h3>Delivery Expert offers</h3>
                                                            <p></p>
                                                            <p>With the largest retail network in the country, Delivery Expert offers to customers a range of cost-effective shipping solutions within Pakistan.</p>
                                                            <br>
                                                            <div>
                                                                <div class="profile-img-wrapper m-t-5 inline">
                                                                    <img width="35" height="35" src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg">
                                                                    <div class="chat-status available">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="table-responsive">
                                                        <div id="myTable_wrapper" class="dataTables_wrapper no-footer">
                                                            <div class="dt-buttons"><a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="myTable" href="#" title="PDF">
                                                                    <span><i class="fs-14 pg-download"></i> PDF</span></a>
                                                                <a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="myTable" href="#" title="Excel">
                                                                    <span><i class="fs-14 pg-form"></i> Excel</span></a>
                                                                <a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="myTable" href="#" title="Copy">
                                                                    <span><i class="fs-14 pg-note"></i> Copy</span></a>
                                                                <a class="dt-button buttons-print" tabindex="0" aria-controls="myTable" href="#" title="Print">
                                                                    <span><i class="fs-14 pg-ui"></i> Print</span></a></div><div class="dataTables_length" id="myTable_length"><label>Show <select name="myTable_length" aria-controls="myTable" class=""><option value="-1">All</option><option value="10">10</option><option value="25">25</option><option value="50">50</option></select> entries</label></div><div id="myTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="myTable"></label></div><table class="table table-bordered dataTable no-footer" id="myTable" role="grid" aria-describedby="myTable_info">
                                                                <thead>
                                                                <tr style="background-image:linear-gradient(45deg, #00203FFF, #0063B2FF);" role="row">
                                                                    <th style="color: darkcyan; width: 100px;" class="sorting_asc" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Delivery ID: activate to sort column descending">Delivery ID</th>
                                                                    <th style="color: blueviolet; width: 127px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="City: activate to sort column ascending">City</th>
                                                                    <th style="color: brown; width: 124px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Short Code: activate to sort column ascending">Short Code</th>
                                                                    <th style="color: slateblue; width: 70px;" class="sorting" tabindex="0" aria-controls="myTable" rowspan="1" colspan="1" aria-label="Code: activate to sort column ascending">Code</th></tr>
                                                                </thead>
                                                                <tbody id="resultTable">

                                                                <tr role="row" class="odd">
                                                                    <td class="sorting_1">1</td><td>Lahore</td><td>LHE</td><td>42</td></tr><tr role="row" class="even"><td class="sorting_1">2</td><td>Karachi</td><td>KHI</td><td>21</td></tr><tr role="row" class="odd"><td class="sorting_1">3</td><td>Rawalpindi</td><td>RWP</td><td>51</td></tr><tr role="row" class="even"><td class="sorting_1">4</td><td>Islamabad</td><td>ISB</td><td>511</td></tr><tr role="row" class="odd"><td class="sorting_1">5</td><td>Faisalabad</td><td>FSD</td><td>41</td></tr><tr role="row" class="even"><td class="sorting_1">6</td><td>Gujranwala</td><td>GUJ</td><td>55</td></tr><tr role="row" class="odd"><td class="sorting_1">7</td><td>Multan</td><td>MUX</td><td>61</td></tr><tr role="row" class="even"><td class="sorting_1">8</td><td>Hyderabad</td><td>HDD</td><td>22</td></tr><tr role="row" class="odd"><td class="sorting_1">9</td><td>Peshawar</td><td>PEW</td><td>91</td></tr><tr role="row" class="even"><td class="sorting_1">10</td><td>Quetta</td><td>UET</td><td>81</td></tr><tr role="row" class="odd"><td class="sorting_1">11</td><td>Sargodha</td><td>SGD</td><td>48</td></tr><tr role="row" class="even"><td class="sorting_1">12</td><td>Sialkot</td><td>SLT</td><td>524</td></tr><tr role="row" class="odd"><td class="sorting_1">13</td><td>Bahawalpur</td><td>BHV</td><td>62</td></tr><tr role="row" class="even"><td class="sorting_1">14</td><td>Raheemyarkhan</td><td>RYK</td><td>68</td></tr><tr role="row" class="odd"><td class="sorting_1">15</td><td>Zafarwal</td><td>ZFW</td><td>54</td></tr><tr role="row" class="even"><td class="sorting_1">16</td><td>Gujrat</td><td>GJT</td><td>53</td></tr><tr role="row" class="odd"><td class="sorting_1">17</td><td>Wazirabad</td><td>WZB</td><td>437</td></tr><tr role="row" class="even"><td class="sorting_1">18</td><td>Mandibahauddin</td><td>MBD</td><td>546</td></tr><tr role="row" class="odd"><td class="sorting_1">19</td><td>Sahiwal</td><td>SWL</td><td>40</td></tr><tr role="row" class="even"><td class="sorting_1">20</td><td>Gujarkhan</td><td>GJK</td><td>513</td></tr><tr role="row" class="odd"><td class="sorting_1">21</td><td>Sohawa</td><td>SHW</td><td>544</td></tr><tr role="row" class="even"><td class="sorting_1">22</td><td>Chawinda</td><td>CWD</td><td>436</td></tr><tr role="row" class="odd"><td class="sorting_1">23</td><td>Pasrur</td><td>PRR</td><td>4342</td></tr><tr role="row" class="even"><td class="sorting_1">24</td><td>Shakargarh</td><td>SGR</td><td>4344</td></tr><tr role="row" class="odd"><td class="sorting_1">25</td><td>Narowal</td><td>NRL</td><td>542</td></tr><tr role="row" class="even"><td class="sorting_1">26</td><td>Ferozewatwan</td><td>FRW</td><td>27</td></tr><tr role="row" class="odd"><td class="sorting_1">27</td><td>Jaranwala</td><td>JRW</td><td>38</td></tr><tr role="row" class="even"><td class="sorting_1">28</td><td>Jhang</td><td>JNG</td><td>50</td></tr><tr role="row" class="odd"><td class="sorting_1">29</td><td>Muridke</td><td>MDK</td><td>90</td></tr><tr role="row" class="even"><td class="sorting_1">30</td><td>Shahdra</td><td>SDR</td><td>158</td></tr><tr role="row" class="odd"><td class="sorting_1">31</td><td>Kalashahkako</td><td>KSK</td><td>159</td></tr><tr role="row" class="even"><td class="sorting_1">32</td><td>Khankadogran</td><td>KKG</td><td>161</td></tr><tr role="row" class="odd"><td class="sorting_1">33</td><td>Mandisafdarabad</td><td>MSD</td><td>162</td></tr><tr role="row" class="even"><td class="sorting_1">34</td><td>JHANG CITY</td><td>JHG</td><td>477</td></tr><tr role="row" class="odd"><td class="sorting_1">35</td><td>JHANG SADDAR</td><td>JHS</td><td>4777</td></tr><tr role="row" class="even"><td class="sorting_1">36</td><td>SHORKOT CANT</td><td>JHG</td><td>35010</td></tr><tr role="row" class="odd"><td class="sorting_1">37</td><td>SHORKOT CITY</td><td>SHOR</td><td>350100</td></tr><tr role="row" class="even"><td class="sorting_1">38</td><td>JARANWALA</td><td>JAR</td><td>4100</td></tr></tbody>
                                                            </table><div class="dataTables_info" id="myTable_info" role="status" aria-live="polite">Showing 1 to 38 of 38 entries</div>
                                                            <div class="dataTables_paginate paging_simple_numbers" id="myTable_paginate">
                                                                <a class="paginate_button previous disabled" aria-controls="myTable" data-dt-idx="0" tabindex="0" id="myTable_previous">Previous</a>
                                                                <span><a class="paginate_button current" aria-controls="myTable" data-dt-idx="1" tabindex="0">1</a></span>
                                                                <a class="paginate_button next disabled" aria-controls="myTable" data-dt-idx="2" tabindex="0" id="myTable_next">Next</a></div></div>
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








                            <!-- END PLACE PAGE CONTENT HERE -->
                        </div>









                                    {{--<th>--}}
                                    {{--Course Name--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                    {{--Category--}}
                                    {{--</th>--}}
                                    {{--<th>--}}
                                    {{--Course Price--}}
                                    {{--</th>--}}
                                    {{--<th style="width: 100px">--}}
                                    {{--Status--}}
                                    {{--</th>--}}


                                    {{--<th class="actions text-right" style="width: 120px;">{{ __('voyager::generic.actions') }}</th>--}}


                        </div>

                        {{--<div class="modal fade" id="edit" style="display: none;">--}}
                        {{--<div class="modal-dialog">--}}
                        {{--<div class="modal-content">--}}
                        {{--<div class="modal-header" style="padding-bottom: 0px">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">×</span></button>--}}
                        {{--<h4 class="modal-title alert alert-warning" style="margin-bottom: 0px">Update Category</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                        {{--<form action="{{url('admin/course-categories/update')}}" method="post" enctype="multipart/form-data">--}}
                        {{--{{csrf_field()}}--}}
                        {{--{{method_field('put')}}--}}
                        {{--<input type="hidden" name="id" id="id" value="">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-md-6" style="margin-bottom: 0px">--}}
                        {{--<div class="form-group">--}}
                        {{--<label style="font-weight: bold">Course Name</label>--}}
                        {{--<input type="text" class="form-control"  name="cat_name" id="category" >--}}

                        {{--</div>--}}

                        {{--</div>--}}
                        {{--<div class="col-md-6" style="margin-bottom: 0px;">--}}
                        {{--<div class="form-group">--}}
                        {{--<label style="font-weight: bold">Category Name</label>--}}
                        {{--<input type="text" class="form-control"  name="cat_name" id="category" >--}}

                        {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="col-md-6" style="margin-bottom: 0px">--}}
                        {{--<div class="form-group">--}}
                        {{--<label style="font-weight: bold">Course Price</label>--}}
                        {{--<input type="text" class="form-control"  name="cat_name" id="category" >--}}

                        {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="col-md-12" style="margin-bottom: 0px">--}}
                        {{--<div class="form-group">--}}
                        {{--<label style="font-weight: bold">Category</label>--}}
                        {{--<input type="file" class="form-control"  name="cat_name" id="category" >--}}

                        {{--</div>--}}

                        {{--</div>--}}

                        {{--</div>--}}

                        {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>--}}
                        {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}
                        {{--</div>--}}
                        {{--</form>--}}
                        {{--</div>--}}

                        {{--</div>--}}
                        {{--<!-- /.modal-content -->--}}
                        {{--</div>--}}
                        {{--<!-- /.modal-dialog -->--}}
                        {{--</div>--}}

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
