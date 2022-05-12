@extends('backEnd.master')
@section('mainContent')
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1>@lang('lang.subcategory') @lang('lang.list')</h1>
            <div class="bc-pages">
                <a href="{{url('dashboard')}}">@lang('lang.dashboard')</a>
                <a href="#">@lang('lang.inventory')</a>
                <a href="#">@lang('lang.subcategory') @lang('lang.list')</a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area">
    <div class="container-fluid p-0">
       @if(isset($editData))
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="{{url('create-sub-category',@$selectedCategory->id)}}" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    @lang('lang.add')
                </a>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30">@if(isset($editData))
                                    @lang('lang.edit')
                                @else
                                    @lang('lang.add')
                                @endif
                                @lang('lang.subcategory')
                            </h3>
                        </div>
                        @if(isset($editData))
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'update-item-sub-category', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        <input type="hidden" name="id" value="{{@$editData->id}}">
                        @else
                        {{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'store-item-sub-category',
                        'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        @endif
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    @if(session()->has('message-success'))
                                    <div class="alert alert-success mb-20">
                                        {{ session()->get('message-success') }}
                                    </div>
                                    @elseif(session()->has('message-danger'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('message-danger') }}
                                    </div>
                                    @endif 

                                    <input type="hidden" name="url" id="url" value="{{URL::to('/')}}">

                                </div>





                                <div class="row mt-40">
                                    <div class="col-lg-12 mb-20">

                                        <select class="w-100 bb niceSelect form-control {{ $errors->has('category') ? ' is-invalid' : '' }}" id="category" name="category">
                                            <option data-display="@lang('lang.select') @lang('lang.category') *" value="">@lang('lang.select') @lang('lang.category')  *</option>
                                            @foreach($itemCategories as $row) 
                                             <option value="{{@$row->id}}">{{@$row->category_name}}</option> 
                                            @endforeach
                                        </select>
                                        @if ($errors->has('category'))
                                        <span class="invalid-feedback invalid-select" role="alert">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>



                                <div class="row mt-40">
                                    <div class="col-lg-12 mb-20">
                                        <div class="input-effect">
                                            <input class="primary-input form-control{{ $errors->has('sub_category_name') ? ' is-invalid' : '' }}"
                                            type="text" name="sub_category_name" autocomplete="off" value="{{isset($editData)? @$editData->sub_category_name : '' }}">
                                            <label>@lang('lang.sub') @lang('lang.category') @lang('lang.name') <span>*</span> </label>
                                            <span class="focus-border"></span>
                                            @if ($errors->has('sub_category_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sub_category_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>
                                </div>




                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                            @if(isset($editData))
                                                @lang('lang.update')
                                            @else
                                                @lang('lang.save')
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                
          <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"> @lang('lang.subcategory')  @lang('lang.list')</h3>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                    <thead>
                        @if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != "")
                                <tr>
                                    <td colspan="2">
                                         @if(session()->has('message-success-delete'))
                                          <div class="alert alert-success">
                                              {{ session()->get('message-success-delete') }}
                                          </div>
                                        @elseif(session()->has('message-danger-delete'))
                                          <div class="alert alert-danger">
                                              {{ session()->get('message-danger-delete') }}
                                          </div>
                                        @endif
                                    </td>
                                </tr>
                                 @endif
                        <tr>
                            <th> @lang('lang.subcategory')  @lang('lang.name')</th>
                            <th> @lang('lang.action')</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(isset($subCategories))
                        @foreach($subCategories as $value)
                        <tr>

                            <td>{{@$value->sub_category_name}}</td>
                            <td>

                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        @lang('lang.select')
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right"> 

                                        <a class="dropdown-item" href="{{url('edit-sub-category/'.$value->id)}}"> @lang('lang.edit')</a>

                                        <a class="deleteUrl dropdown-item" data-modal-size="modal-md" title="Delete Sub Category" href="{{url('delete-sub-category-view/'.@$value->id)}}"> @lang('lang.delete')</a>

                                    </div>
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
</section>
@endsection
