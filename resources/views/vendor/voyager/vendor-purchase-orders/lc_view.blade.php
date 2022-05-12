<div style=" " class="col-md-9">
    <h3 style="text-align: center">Distribution Detail</h3>

    {{\App\VendorLetterCredit::po_lc_detail($po)}}


    <div class="row">

        <div class="col-md-3">
            <div class="form-group" >
                <label class="font-weight-bold" for="name">P.O Qty Reserve<span class="color">*</span></label>
                <input type="text" style="background: lightgreen" required class="form-control" value="{{$po->lc_sum}}" placeholder="LC Number">
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group" >
                <label class="font-weight-bold" for="name">P.O Qty No Reserved<span class="color">*</span></label>
                <input style="background: lightsalmon" type="text" required class="form-control" value="{{$po->left_qty}}" placeholder="LC Number">
            </div>

        </div>

{{--        {{dd($po->qty , $po->lc_sum,($po->lc_sum +(($po->qty *10)/100) )) }}--}}
            @if($po->qty <= ($po->lc_sum +(($po->qty *10)/100) ) && $po->status == 0)
        <div class="col-md-3">
            <div class="form-group" >
                <label class="font-weight-bold" for="name">Complete P.O<span class="color">*</span></label><br>
               <a href='{{url("admin/vendor-purchase-orders/complete_po/{$po->id}")}}' class="btn btn-success  des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                    <i class="voyager-eye"></i> <span>Complete</span>
                </a>

            </div>

        </div>
        @endif


    </div>

    <div class="table-responsive">
        <table id="example" class="table table-hover"  >
            <thead>
            <tr>



                <th>
                    Purchase Order
                </th>
                <th>
                    LC Number
                </th>
                <th>
                    LC QTY
                </th>
                <th>
                    Status
                </th>
                <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @if(count($po->lcnumber)>0)

                {{\App\VendorLetterCredit::check_gdnumber($po->lcnumber)}}

                @foreach($po->lcnumber as $lc)
                    <tr id="myTable">



                        <td>

                            {{$po->po_number}}

                        </td>
                        <td>{{$lc->lc_number}}</td>
                        <td>{{$lc->lc_qty}}</td>
                        <td>@if($lc->status == "1")
                                <h5 class="text-success">{{$lc->status_message}}</h5>
                            @else
                                <h5 class="text-danger">{{$lc->status_message}}</h5>
                            @endif
                        </td>
                        <td class="no-sort no-click text-right" id="bread-actions">

                            <div class="btn-toolbar">
                                @if(Auth::user()->hasRole('admin'))
                                    <button dataid="{{$lc->id}}" class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                        <i class="voyager-trash"></i> <span>Delete</span>
                                    </button>
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Event ?</h4>
                                                </div>
                                                <div class="modal-footer">

                                                    <form action="{{url('admin/vendor-letter-credits/destroy')}}" method="post">
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
                                @endif
                                <a href='{{url("admin/vendor-letter-credits/{$lc->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                    <i class="voyager-eye"></i> <span>View</span>
                                </a>
                                <a href='{{url("admin/vendor-letter-credits/{$lc->id}/edit")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                    <i class="voyager-edit"></i><span>Edit</span>
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
