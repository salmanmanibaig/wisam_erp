<div class="text-center">
    <h4>@lang('lang.cancel_the_record')</h4>
</div>

<div class="mt-40 d-flex justify-content-between">
    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.none')</button>
    <a href="{{url('cancel-item-receive/'.@$id)}}" class="text-light">
    <button class="primary-btn fix-gr-bg" type="submit">@lang('lang.yes')</button>
     </a>
</div>
