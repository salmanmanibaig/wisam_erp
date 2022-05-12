@extends('voyager::master')

@php  $prod=App\Product::first(); @endphp
@can('read',$prod)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class=""></i>
                    View {{$product[0]->product_name}}
                </p>


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
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="panel panel-bordered">
                        <div class="panel-body">

                            <style>
                                .dataTables_wrapper .dataTables_filter input{


                                }
                            </style>

                          <div class="col-md-12">

                              <div class="col-md-3">
                                  <div class="form-group" >
                                      <form id="frm_details" method="post" name="frm_details">
                                      <label class="font-weight-bold" style=" font-weight: bold" for="name">Dozen In cart<span class="color">*</span></label>
                                      <input type="text" required name="do" class="form-control" value={{$product[0]->doz_cart}} name="ponumber" placeholder="Enter Item Name">
                                      <input type="hidden" required name="pid" class="form-control" value={{$product[0]->id}} name="ponumber" placeholder="Enter Item Name">

                                          <button type="submit" style="margin-left: 44%;" class="btn btn-primary save">{{ ('Submit') }}</button>

                                          {{--<input  id="email" name="email" placeholder="Your Email id" type="text" />--}}
                                      </form>

                                  </div>
                              </div>
                          </div>

                            <di>

                                <br>
                            </di>

                          <div class="col-md-12">
                              <div class="table-responsive">
                                  <table id="example" class="table table-hover"  >
                                      <thead>
                                      <tr>

                                          <th>
                                              <input type="checkbox" class="select_all">
                                          </th>

                                          <th>
                                              Category
                                          </th>
                                          <th>
                                              Item Name
                                          </th>

                                          <th>
                                              Qty/Dozen
                                          </th>

                                          <th>
                                              UOM
                                          </th>


                                      </tr>
                                      </thead>
                                      <tbody>

                                      @foreach($product[0]->invitems  as $key => $items)
                                          {{--{{dd($user)}}--}}
                                          <tr id="myTable">

                                              <td>
                                                  <input type="checkbox" name="row_id" id="checkbox" value="">
                                              </td>

                                              <td>
                                                  {{strtoupper($items->category_item)}}
                                              </td>



                                              <td>
                                                  {{$items->item_name}}
                                              </td>



                                              <td>
                                                  {{strtoupper($product[0]->proinv[$key]->raw_qty)}}
                                              </td>


                                              <td>
                                                  {{strtoupper($items->uom)}}
                                              </td>


                                          </tr>
                                      @endforeach

                                      </tbody>
                                  </table>
                              </div>
                          </div>



                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>

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

@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan

@section('javascript')

<script>
  $(function(){
    $("#frm_details").on("submit", function(event) {
    event.preventDefault();

    var formData = {
    'id': $('input[name=pid]').val(), //for get email
    'doz': $('input[name=do]').val() //for get email
    };
        toastr.success('Product updated');

    console.log(formData);

    $.ajax({
    url: "/admin/dozen_update",
    type: "post",
    data: formData,
    success: function(d) {


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
                "pageLength": 25
                // "order": [[ 1, "asc" ]]
            } );
        } );
    </script>


@stop
