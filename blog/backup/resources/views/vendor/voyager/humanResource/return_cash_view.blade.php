
<div class="text-center">
          <h4>@lang('lang.Are_to_return_this_amount')?</h4>
            </div>
	<div class="mt-40 d-flex justify-content-between">
       <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
           <a href="{{url('return-cash/'.@$id)}}" class="text-light">
             <button class="primary-btn fix-gr-bg" type="submit">@lang('lang.return')</button>
           </a>
     </div>

