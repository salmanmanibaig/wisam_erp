
<div class="text-center">
    <h4>@lang('lang.Are_you_sure_to_detete_this_item')?</h4>
</div>

<div class="mt-40 d-flex justify-content-between">
    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
    <a class="primary-btn fix-gr-bg" href="{{url('delete-staff-document/'.@$id)}}">
    @lang('lang.delete')</a>
</div>
