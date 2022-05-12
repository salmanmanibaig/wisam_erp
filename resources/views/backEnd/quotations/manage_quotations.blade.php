@extends('backEnd.master')
@section('mainContent')
@php
    $modules = [];
    $module_links = [];
    $permissions = App\SmRolePermission::where('role_id', Auth::user()->role_id)->get();
    foreach($permissions as $permission){ @$module_links[] = @$permission->module_link_id; @$modules[] = @$permission->moduleLink->module_id;}
    $modules = array_unique(@$modules);
    $generalSetting=App\SmGeneralSettings::where('id',1)->first();
    $currency_symbol = @$generalSetting->currency_symbol;
    if(isset($generalSetting->logo)){  @$logo = @$generalSetting->logo;  }
    else{ $logo = 'public/uploads/settings/logo.png'; }
    $sm_staff= App\SmStaff::where('user_id',Auth::user()->id)->first();
    if(!empty(@$sm_staff)){
        @$profile_image = @$sm_staff->staff_photo;
        if(empty(@$profile_image)){
            @$profile_image ='public/uploads/staff/staff1.jpg';
        }
    }
@endphp
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>  @lang('lang.quotations')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="{{url('tender')}}">@lang('lang.quotations')</a>
                <a href="{{url('tender/create')}}" class="active">@lang('lang.create') @lang('lang.quotations')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">@if(isset($edit))
                                    @lang('lang.edit')
                                @else
                                    @lang('lang.add')
                                @endif
                                @lang('lang.quotations')
                            </h3>
                        </div>
                        @if(isset($edit))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => '/quotations/'.$edit->id, 'method' => 'PUT', 'id'=>'tender-create-form']) }}
                        @else
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'quotations', 'method' => 'POST', 'id'=>'tender-create-form']) }}
                        @endif
                        <input type="hidden" name="id" value="{{isset($edit)? $edit->id :''}}">
                        <div class="white-box">

                            <div class="col-lg-12 text-right">
                               @if(session()->has('message-success') != "" ||
                                session()->get('message-danger') != "")
                                         @if(session()->has('message-success'))
                                          <p class="text-success">
                                              {{ session()->get('message-success') }}
                                          </p>
                                        @elseif(session()->has('message-danger'))
                                          <p class="text-danger">
                                              {{ session()->get('message-danger') }}
                                          </p>
                                        @endif
                                 @endif
                             </div>

                            <div class="add-visitor">
                                <div class="row ">
                                    <div class="col-lg-3">
                                        <div class="invoice-details-left">
                                            <div class="mb-20">
                                                <img src="{{asset($logo)}}" class="tender-create-logo" >
                                            </div>

                                            <div class="business-info">
                                                <h3>{{@$generalSetting->company_name}}</h3>
                                                <p class="textWrap">{{@$generalSetting->address}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="offset-lg-3 col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6 mt-20 mb-10">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title" autocomplete="off" id="title" value="{{isset($edit)? !empty(@$edit->title)? @$edit->title : old('title'): old('title')}}">
                                                    <label>@lang('lang.quotation') @lang('lang.title')<span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    @if ($errors->has('title'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('title') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-20 mb-10">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" type="text" name="number" autocomplete="off" id="number" value="{{isset($edit)? !empty(@$edit->number)? @$edit->number : old('number'): Auth::user()->id.''.time()}}">
                                                    <label>@lang('lang.quotation') @lang('lang.number')<span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    @if ($errors->has('number'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('number') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-20 mb-10">
                                                <div class="no-gutters input-right-icon">
                                                    <div class="col">
                                                        <div class="input-effect">
                                                            @php
                                                            $value = date('m/d/Y');
                                                            if(isset($edit) && !empty($edit->date) ){  @$value = date('m/d/Y', strtotime(@$edit->date));   }
                                                            else{ if(!empty(old('date'))){ @$value = old('date');   }else{  @$value = date('m/d/Y');   } }
                                                            @endphp
                                                            <input class="primary-input date" id="date" type="text" name="date" value="{{@$value}}">
                                                            <label>@lang('lang.quotation') @lang('lang.date')</label>
                                                            <span class="focus-border"></span>
                                                            @if ($errors->has('date'))
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $errors->first('date') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="" type="button">
                                                            <i class="ti-calendar" id="end-date-icon"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-20 mb-10">
                                                <div class="input-effect">
                                                    <input class="primary-input form-control{{ $errors->has('reference') ? ' is-invalid' : '' }}" type="text" name="reference" autocomplete="off"     value="{{isset($edit)? !empty(@$edit->reference)? @$edit->reference : old('reference'): old('reference')}}" id="reference">
                                                    <label>@lang('lang.reference') <span>*</span></label>
                                                    <span class="focus-border"></span>
                                                    @if ($errors->has('reference'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('reference') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- vendors --}}
                                            <div class="col-lg-6 mt-20 mb-10">
                                                <select class="niceSelect w-100 bb form-control{{ $errors->has('fees_type') ? ' is-invalid' : '' }}" name="vendors" id="vendors">
                                                    <option data-display="@lang('lang.select') @lang('lang.vendors')" value="">@lang('lang.select') @lang('lang.vendors')</option>
                                                    @foreach($vendors as $value)
                                                         <option value="{{@$value->id}}" {{isset($edit)? !empty($edit->vendor_id)? @$edit->vendor_id==@$value->id ? 'selected':'':'':''}}>{{@$value->company_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('vendors'))
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong>{{ $errors->first('vendors') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            {{-- customer --}}
                                            <div class="col-lg-6 mt-20 mb-10">
                                                <select class="niceSelect w-100 bb form-control{{ $errors->has('fees_type') ? ' is-invalid' : '' }}" name="customer" id="customer">
                                                    <option data-display="@lang('lang.select') @lang('lang.customer') *" value="" >@lang('lang.select') @lang('lang.customer') *</option>
                                                    @foreach($customers as $value)
                                                         <option value="{{@$value->id}}" {{@$value->id}}" {{isset($edit)? !empty(@$edit->customer_id)? @$edit->customer_id==@$value->id ? 'selected':'':'':''}} >{{@$value->full_name}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('customer'))
                                                <span class="invalid-feedback invalid-select" role="alert">
                                                    <strong>{{ $errors->first('customer') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="offset-lg-6 col-lg-6 mt-20 mb-10">
                                                <input type="hidden" name="quotation_type" value="equipment">
                                               
                                            </div>


                                        </div>
                                    </div>

                                </div>


                                <div class="row mt-25">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4" name="description">{{isset($edit)? !empty(@$edit->description)?@$edit->description:'':old('description')}}</textarea>
                                                <label>@lang('lang.description') <span></span></label>
                                            <span class="focus-border textarea"></span>
                                        </div>
                                    </div>
                                </div>



                        {{-- ************************************************************* --}}
                            @if(isset($edit))
                                <div class="row mt-25">
                                    <div class="col-lg-12 text-right">
                                        <button type="button" class="primary-btn small fix-gr-bg" id="{{@$edit->quotation_type=="equipment"? 'addRowEquipment':'addRowProduct'}}">
                                        <span class="ti-plus pr-2"></span>
                                        @lang('lang.add') @lang('lang.item')
                                    </button>
                                    </div>
                                </div>

                                <table class="display school-table school-table-style" cellspacing="0" width="100%" id="{{@$edit->quotation_type=="equipment"? 'equipment-table':'product-table'}}">
                                    <thead>
                                        <tr>
                                            <th>@lang('lang.product') @lang('lang.name')</th>
                                                    @if($edit->quotation_type=="equipment")
                                                        <th class="primary-color text-center">@lang('lang.model') @lang('lang.number')</th>
                                                    @else
                                                        <th class="primary-color text-center">@lang('lang.part_number') </th>
                                                        <th class="primary-color text-center">@lang('lang.new') @lang('lang.part_number') </th>
                                                    @endif
                                            <th>@lang('lang.denomination')</th>
                                            <th>@lang('lang.quantity')</th>
                                            <th>@lang('lang.unit') @lang('lang.price')</th>
                                            <th>@lang('lang.total') @lang('lang.price')</th>
                                            <th>@lang('lang.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 0; $total = 0; $total_price = 0; @endphp
                                        @foreach($edit->quotationProducts as $quotationProduct)
                                        @php

                                            $productDetail = App\SmQuotation::productDetail(@$quotationProduct->product_id,$edit->id);
                                        $i++;


                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="input-effect">
                                                <select class="niceSelect w-100 bb form-control" name="{{@$edit->quotation_type == 'equipment'? 'Eproducts[]':'products[]'}}" id="{{@$edit->quotation_type == 'equipment'? 'Ereceived_product':'received_product'}}">
                                                    <option data-display="Select product *" value="">Select product *</option>
                                                    @foreach($items as $key=>$value)
                                                    <option value="{{@$value->id}}" {{@$quotationProduct->product_id == @$value->id? 'selected':''}}>{{@$value->item_name}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="focus-border"></span>
                                            </div>
                                            </td>


                                                    @if(@$edit->quotation_type=="equipment")
                                                <td>
                                                    <div class="input-effect">
                                                    <input class="primary-input form-control"
                                                    type="text" id="Epart_number" name="Eproduct_model[]" autocomplete="off" value="{{@$quotationProduct->product_model}}">
                                                    <span class="focus-border"></span>
                                                </div>
                                                </td>
                                                    @else

                                            <td>
                                                <div class="input-effect">
                                                    <input class="primary-input form-control"
                                                    type="text" id="part_number" name="part_number[]" autocomplete="off" readonly="" value="{{@$productDetail->part_number}}">
                                                    <span class="focus-border"></span>
                                                </div>
                                            </td>
                                            <td>
                                               <div class="input-effect">
                                                    <input class="primary-input form-control"
                                                    type="text" id="new_part_number" name="new_part_number[]" autocomplete="off" readonly="" value="{{@$productDetail->new_part_number}}">
                                                    <span class="focus-border"></span>
                                                </div>
                                            </td>
                                                    @endif
                                            <td>
                                                <div class="input-effect">
                                                <input class="primary-input form-control"
                                                type="text" id="denomination" name="denomination[]" autocomplete="off" readonly="" value="{{@$productDetail->denomination}}">
                                                <span class="focus-border"></span>
                                            </div>
                                            </td>
                                            <td>
                                                <div class="input-effect">
                                                    <input class="primary-input form-control"
                                                    type="number" step="any" id="{{@$edit->quotation_type == 'equipment'? 'Equantity':'quantity'}}" name="{{@$edit->quotation_type == 'equipment'? 'Equantity[]':'quantity[]'}}" autocomplete="off" value="{{@$quotationProduct->qnt}}">
                                                    <span class="focus-border"></span>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-effect">
                                                    <input class="primary-input form-control"
                                                    type="number" step="any" id="{{@$edit->quotation_type == 'equipment'? 'Eunit_price':'unit_price'}}" name="{{@$edit->quotation_type == 'equipment'? 'Eunit_price[]':'unit_price[]'}}" autocomplete="off" value="{{@$quotationProduct->unit_price}}">
                                                    <span class="focus-border"></span>
                                                </div>
                                            </td>

                                            @php
                                                $total_price = @$quotationProduct->unit_price * @$quotationProduct->qnt;
                                                $total = @$total + @$total_price;
                                                $product_in_stock = App\SmItem::getProductNo(@$value->id);

                                            @endphp

                                            <input type="hidden" name="{{@$edit->quotation_type == 'equipment'? 'Eproduct_quantity':'product_quantity'}}" id="{{@$edit->quotation_type == 'equipment'? 'Eproduct_quantity':'product_quantity'}}" value="{{@$product_in_stock}}">

                                            <input type="hidden" name="{{@$edit->quotation_type == 'equipment'? 'Eproduct_quantity':'product_quantity'}}" id="{{@$edit->quotation_type == 'equipment'? 'Eproduct_quantity':'product_quantity'}}" value="">
                                            <td>
                                                <div class="input-effect">
                                                    <input class="primary-input form-control"
                                                    type="number" step="any" id="{{@$edit->quotation_type == 'equipment'? 'Etotal_price':'total_price'}}" name="{{@$edit->quotation_type == 'equipment'? 'Etotal_price[]':'total_price[]'}}" value="{{@$total_price}}" readonly="" autocomplete="off">
                                                    <span class="focus-border"></span>
                                                </div>
                                            </td>
                                            <td>
                                                @if($i != 1)
                                                <button class="primary-btn icon-only fix-gr-bg" type="button"  id="delete-tender-product">
                                                     <span class="ti-trash"></span>
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                                        @if($edit->quotation_type=="equipment")
                                                        <td></td>
                                                        @else
                                                        <td></td>
                                                        <td></td>
                                                        @endif
                                            <td></td>
                                            <td></td>
                                            <td>Total:</td>
                                            <td><input class="primary-input form-control"
                                                    type="number" step="any" id="total" name="total" autocomplete="off" readonly="true" value="{{@$total}}"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            @if(@$edit->quotation_type=="equipment")
                                            <td></td>
                                            @else
                                            <td></td>
                                            <td></td>
                                            @endif
                                            <td></td>
                                            <td></td>
                                            <td>@lang('lang.discount'):</td>
                                            <td>
                                                <input class="primary-input form-control"
                                                    type="number" step="any" id="discount" name="{{isset($edit)? (@$edit->quotation_type == 'equipment'? 'Ediscount':'discount'):''}}" autocomplete="off" value="{{@$edit->discount_amount}}"></td>
                                            <td>
                                                <div class="d-flex radio-btn-flex ml-40">
                                            <div class="mr-30">
                                                <input type="radio" name="{{@$edit->quotation_type == 'equipment'? 'Ediscount_type':'discount_type'}}" id="relationFather" value="P" class="common-radio relationButton" {{@$edit->discount_type == 'P'? 'checked':'' }}>
                                                <label for="relationFather">%</label>
                                            </div>
                                            <div class="mr-30">
                                                <input type="radio" name="{{@$edit->quotation_type == 'equipment'? 'Ediscount_type':'discount_type'}}" id="relationMother" value="A" class="common-radio relationButton"  {{@$edit->discount_type == 'A'? 'checked':'' }}>
                                                <label for="relationMother">@lang('lang.fixed')</label>
                                            </div>
                                        </div></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            @if(@$edit->quotation_type=="equipment")
                                            <td></td>
                                            @else
                                            <td></td>
                                            <td></td>
                                            @endif
                                            <td></td>
                                            <td></td>
                                            <td>@lang('lang.bid') @lang('lang.amount'):</td>
                                            @php
                                                $bid_amount = App\SmQuotation::bid_amount(@$total, @$edit->discount_amount, @$edit->discount_type);

                                            @endphp
                                            <td><input class="primary-input form-control" type="number" step="any" id="bid_amount" name="{{@$edit->quotation_type == 'equipment'? 'Ebid_amount':'bid_amount'}}" autocomplete="off" readonly="true" value="{{@$bid_amount}}"></td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            @else
                        {{-- ************************************************************* --}}



                                <!-- ***************** equipment-table ************************ ******** -->
                                <div class="equipment comon-status row mt-25 d-block">
                                    <div class="col-lg-12 text-right">
                                        <button type="button" class="primary-btn small fix-gr-bg" id="addRowEquipment">
                                            <span class="ti-plus pr-2"></span>
                                            @lang('lang.add') @lang('lang.item')
                                        </button>
                                    </div>
                                    <table class="display school-table school-table-style without-box-shadow" cellspacing="0" width="100%" id="equipment-table">
                                        <thead>
                                            <tr>
                                                <th class="item_name">@lang('lang.product_name')</th>
                                                <th>@lang('lang.model') @lang('lang.number')</th>
                                                <th>@lang('lang.denomination')</th>
                                                <th>@lang('lang.quantity')</th>
                                                <th>@lang('lang.sale') @lang('lang.price') ({{@$currency_symbol}})</th>
                                                <th>@lang('lang.total') @lang('lang.price') ({{@$currency_symbol}})</th>
                                                <th>@lang('lang.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="input-effect">
                                                    <select class="niceSelect w-100 bb form-control" name="Eproducts[]" id="Ereceived_product">
                                                        <option data-display="Select product *" value="none">@lang('lang.select') @lang('lang.product') *</option>
                                                        @foreach($items as $key=>$value)
                                                        <option value="{{@$value->id}}">{{@$value->item_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="focus-border"></span>
                                                </div>
                                                </td>
                                                <td>
                                                    <div class="input-effect">
                                                    <input class="primary-input form-control"
                                                    type="text" id="Epart_number" name="Eproduct_model[]" autocomplete="off" >
                                                    <span class="focus-border"></span>
                                                </div>
                                                </td>
                                                <td>
                                                    <div class="input-effect">
                                                    <input class="primary-input form-control"
                                                    type="text" id="Edenomination" name="Edenomination[]" autocomplete="off" readonly="">
                                                    <span class="focus-border"></span>
                                                </div>
                                                </td>
                                                <td>
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control"
                                                        type="number" step="any" id="Equantity" name="Equantity[]" autocomplete="off">
                                                        <span class="focus-border"></span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control"
                                                        type="number" step="any" id="Eunit_price" name="Eunit_price[]" autocomplete="off">
                                                        <span class="focus-border"></span>
                                                    </div>
                                                </td>
                                                <input type="hidden" name="Eproduct_quantity" id="Eproduct_quantity">
                                                <td>
                                                    <div class="input-effect">
                                                        <input class="primary-input form-control"
                                                        type="number" step="any" id="Etotal_price" name="Etotal_price[]" autocomplete="off" readonly="">
                                                        <span class="focus-border"></span>
                                                    </div>
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>@lang('lang.total'):</td>
                                                <td><input class="primary-input form-control"
                                                        type="number" step="any" id="Etotal" name="Etotal" autocomplete="off" readonly="true"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>@lang('lang.discount'):</td>
                                                <td>
                                                    <input class="primary-input form-control"
                                                        type="number" step="any" id="Ediscount" name="Ediscount" autocomplete="off" value="0"></td>
                                                <td><div class="d-flex radio-btn-flex ml-40">
                                                <div class="mr-30">
                                                    <input type="radio" name="Ediscount_type" id="ErelationFather" value="P" class="common-radio relationButton">
                                                    <label for="ErelationFather" class="pl-4">%</label>
                                                </div>
                                                <div class="mr-30">
                                                    <input type="radio" name="Ediscount_type" id="ErelationMother" value="A" class="common-radio relationButton" checked="checked">
                                                    <label for="ErelationMother" class="pl-4">@lang('lang.fixed')</label>
                                                </div>
                                            </div></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">


                                                </td>
                                                <td>@lang('lang.bid_amount'):</td>
                                                <td>
                                                    <input class="primary-input form-control" type="number" step="any" id="Ebid_amount" name="Ebid_amount" autocomplete="off" readonly="true">

                                                </td>
                                                <td></td>
                                            </tr>

                                        </tfoot>
                                    </table>

                                </div>
                                <!-- ****** ********** spareparts-table *********** ***************************************** -->
                            @endif




                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <textarea class="primary-input form-control" cols="0" rows="4" name="note">{{isset($edit)? !empty(@$edit->note)?@$edit->note:'':old('description')}}</textarea>
                                                <label>@lang('lang.note') <span></span></label>
                                                <span class="focus-border textarea"></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt-40">
                                    <div class="col-lg-12 text-right">
                                        <button type="submit" class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                            @if(isset($edit))
                                                @lang('lang.update')
                                            @else
                                                @lang('lang.save')
                                            @endif
                                            @lang('lang.quotation')

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
