@php
    $modules = [];
    $module_links = [];
    $permissions = App\SmRolePermission::where('role_id', Auth::user()->role_id)->get();
    foreach($permissions as $permission){ @$module_links[] = @$permission->module_link_id; @$modules[] = @$permission->moduleLink->module_id;}
    $modules = array_unique(@$modules); 
    $generalSetting=App\SmGeneralSettings::where('id',1)->first();
    if(isset($generalSetting->logo)){  @$logo = @$generalSetting->logo;  }
    else{ @$logo = 'public/uploads/settings/logo.png'; }
@endphp
<input type="hidden" name="url" id="url" value="{{url('/')}}">
<nav id="sidebar">
    <div class="sidebar-header update_sidebar">
        <a href="{{url('/admin-dashboard')}}"> <img  src="{{asset(@$logo)}}" alt=""> </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>
    </div>
    <ul class="list-unstyled components">
        <li>
            @if (Auth::user()->role_id == 3)
                <a href="{{route('user.dashboard')}}" id="admin-dashboard">
                    <span class="flaticon-speedometer"></span>
                    @lang('lang.dashboard')
                </a>
            @else
                <a href="{{url('/admin-dashboard')}}" id="admin-dashboard">
                    <span class="flaticon-speedometer"></span>
                    @lang('lang.dashboard')
                </a>
            @endif 
        </li> 
        
        {{-- customers  --}}        
        @if(in_array(8, @$modules) ||  Auth::user()->role_id == 1)
            <li>
                <a href="#subMenuCustomer" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-inventory"></span> @lang('lang.customers')</a>
                <ul class="collapse list-unstyled" id="subMenuCustomer">
                    @if(in_array(143, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('add-customer')}}">@lang('lang.add') @lang('lang.customer')</a></li>
                    @endif 
                    @if(in_array(143, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('customers')}}">@lang('lang.manage') @lang('lang.customers')</a></li>
                    @endif 
                </ul>
            </li>
        @endif

        



        {{-- vendors --}}
        {{-- @if(in_array(8, @$modules) ||  Auth::user()->role_id == 1)
            <li>
                <a href="#subMenuSupplier" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-inventory"></span> @lang('lang.supplier')
                </a>
                <ul class="collapse list-unstyled" id="subMenuSupplier">
                    @if(in_array(143, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('enlisted-suppliers')}}">@lang('lang.add') @lang('lang.supplier')</a></li>
                    @endif
                    @if(in_array(269, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('enlisted-suppliers')}}">@lang('lang.manage') @lang('lang.supplier')</a></li>
                    @endif
                </ul>
            </li>
        @endif --}}

        
 

        {{-- purchase --}}
        @if(in_array(9, @$modules) ||  Auth::user()->role_id == 1)
            <li>
                <a href="#subMenuInventory" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-inventory"></span> @lang('lang.purchase') </a>
                <ul class="collapse list-unstyled" id="subMenuInventory">
                    @if(in_array(149, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('item-category')}}">@lang('lang.category')</a></li>                
                    @endif
                    
                    @if(in_array(149, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('create-sub-category')}}">@lang('lang.sub') @lang('lang.category')</a></li>                
                    @endif

                    @if(in_array(153, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('item-list')}}">@lang('lang.item_list')</a></li>                
                        @endif
                    @if(in_array(157, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('item-store')}}">@lang('lang.stock')</a></li>                
                    @endif
                    @if(in_array(161, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('suppliers')}}">@lang('lang.supplier')</a></li>                
                    @endif
                    @if(in_array(165, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('item-receive')}}">@lang('lang.add') @lang('lang.purchase')</a> </li>  
                    @endif 
                    @if(in_array(165, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('item-receive-list')}}">@lang('lang.product_receive_list')</a> </li>  
                    @endif 
                    @if(in_array(173, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('item-issue')}}">@lang('lang.item_issue')</a></li>                    
                    @endif
                </ul>
            </li>
        @endif
        



        @if(in_array(3, @$modules) ||  Auth::user()->role_id == 1)
            <li>
                <a href="#subMenuAccount" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-accounting"></span> @lang('lang.accounts') </a>
                <ul class="collapse list-unstyled" id="subMenuAccount"> 

                    @if(in_array(67, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{url('bank-account')}}">@lang('lang.bank_account')</a></li>@endif


                    @if(in_array(63, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{route('payment_method')}}">@lang('lang.payment_method')</a>
                        </li>                @endif


                    @if(in_array(55, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{url('chart-of-account')}}">@lang('lang.chart_of_account')</a></li>@endif
 
                    @if(in_array(237, @$module_links) || Auth::user()->role_id == 1)
                    <li><a href="{{url('sub-account')}}">@lang('lang.accounts')</a></li>
                    @endif

                    @if(in_array(59, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{url('cost-center')}}">@lang('lang.cost_center')</a></li>@endif
                    

                    @if(in_array(228, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{url('daily-expense')}}">daily @lang('lang.expense')</a>
                        </li>                @endif
                    @if(in_array(50, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{url('add-expense')}}">@lang('lang.expense')</a></li>                @endif
                    @if(in_array(46, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{route('add_income')}}">@lang('lang.income')</a></li>                @endif


                    @if(in_array(71, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{url('debit-credit-voucher')}}">debit credit voucher</a></li>@endif


                    @if(in_array(247, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{url('investment-report')}}">@lang('lang.investment')</a></li>@endif

                    @if(in_array(243, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{url('transfer')}}">@lang('lang.transfer')</a></li>@endif
                </ul>
            </li>
        @endif

        @if(in_array(12, @$modules) || Auth::user()->role_id == 1)
            <li>
                <a href="#subMenuInfixInvoice" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-accounting"></span> Invoice </a>
                <ul class="collapse list-unstyled" id="subMenuInfixInvoice">
                    @if(in_array(254, @$module_links) || Auth::user()->role_id == 1)
                    <li><a href="{{url('infix/invoice-create')}}">@lang('lang.invoice') @lang('lang.create')</a></li>
                    @endif
                    @if(in_array(255, @$module_links) || Auth::user()->role_id == 1)
                    <li><a href="{{url('infix/invoice-list')}}">@lang('lang.invoice') @lang('lang.list')</a></li> 
                    @endif
                    @if(in_array(260, @$module_links) || Auth::user()->role_id == 1)
                    <li><a href="{{url('infix/invoice-setting')}}">@lang('lang.invoice') @lang('lang.setting')</a></li>
                    @endif

                </ul>
            </li>

        @endif




        @if(in_array(15, @$modules) ||  Auth::user()->role_id == 1)
            <li>
                <a href="#subMenuQuotation" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-accounting"></span> @lang('lang.quotations') </a>
                <ul class="collapse list-unstyled" id="subMenuQuotation">
                    @if(in_array(356, $module_links) ||  Auth::user()->role_id == 1)
                    <li><a href="{{url('quotations/create')}}">@lang('lang.add') @lang('lang.quotations')</a></li>
                    @endif
                    @if(in_array(355, @$module_links) ||  Auth::user()->role_id == 1)
                    <li><a href="{{url('quotations')}}">@lang('lang.quotations') @lang('lang.list')</a></li>
                    @endif

                </ul>
            </li>
        @endif
        @if(Module::has('Project'))
                <li>
                <a href="#p" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> 
                    <span class="flaticon-analytics"></span> @lang('lang.projects')
                </a>
                <ul class="collapse list-unstyled" id="p">  
                     <li> <a href="{{ route('InfixMyTaskList') }}">@lang('lang.my') @lang('lang.task')</a> </li> 
                @if(Auth::user()->role_id == 1)
                     <li> <a href="{{ route('InfixProjectList') }}">@lang('lang.projects') </a> </li>   
                     <li> <a href="{{ route('InfixProjectCategoryList') }}">@lang('lang.project') @lang('lang.category')</a> </li>   
                     <li> <a href="{{ route('InfixTeamList') }}">@lang('lang.teams')</a> </li> 
                 @endif
                @if(Auth::user()->role_id == 3)
                     <li> <a href="{{ route('InfixMyProjectList') }}">@lang('lang.projects') </a> </li> 
                 @endif
                     
                    
                   
                    
                </ul>
            </li>
            @endif
         



        @if(in_array(5, @$modules) ||  Auth::user()->role_id == 1)
            <li>
                <a href="#subMenuHumanResource" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-consultation"></span> @lang('lang.human_resource') </a>
                <ul class="collapse list-unstyled" id="subMenuHumanResource">
                    @if(in_array(85, $module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{route('staff_directory')}}">@lang('lang.staff_directory')</a>
                        </li>               
                         @endif
                    @if(in_array(89, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{route('staff_attendance')}}">@lang('lang.staff_attendance')</a>
                        </li>                @endif
                    @if(in_array(93, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{route('staff_attendance_report')}}">@lang('lang.staff_attendance_report')</a>
                        </li>           @endif
                    @if(in_array(94, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('payroll')}}">@lang('lang.payroll')</a></li>            @endif
                    @if(in_array(102, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('payroll-report')}}">@lang('lang.payroll_report')</a></li>@endif
                    @if(in_array(104, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('designation')}}">@lang('lang.designation')</a></li>@endif
                    @if(in_array(108, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('department')}}">@lang('lang.department')</a></li>@endif
                    @if(in_array(291, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('cash-issue')}}">@lang('lang.cash_issue')</a></li>
                    @endif
                </ul>
            </li>
        @endif



        @if(in_array(6, @$modules) ||  Auth::user()->role_id == 1)
            <li>
                <a href="#subMenuLeaveManagement" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-slumber"></span> @lang('lang.leave') </a>
                <ul class="collapse list-unstyled" id="subMenuLeaveManagement">
                    @if(in_array(117, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('apply-leave')}}">@lang('lang.apply_leave')</a></li>                @endif
                    @if(in_array(113, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('approve-leave')}}">@lang('lang.approve_leave_request')</a>
                        </li>                @endif
                    @if(in_array(121, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('leave-define')}}">@lang('lang.leave_define')</a></li>
                        @endif
                    @if(in_array(125, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('leave-type')}}">@lang('lang.leave_type')</a></li>
                        @endif
                </ul>
            </li>
        @endif




        @if(in_array(7, @$modules) ||  Auth::user()->role_id == 1)
            <li>
                <a href="#subMenuCommunicate" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-email"></span> @lang('lang.communicate') </a>
                <ul class="collapse list-unstyled" id="subMenuCommunicate">
                    @if(in_array(130, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('notice-list')}}">@lang('lang.notice_board')</a></li>                @endif
                    @if(in_array(135, $module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('send-email-sms-view')}}">@lang('lang.send_email')</a>
                        </li>                @endif
                    @if(in_array(137, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('email-sms-log')}}">@lang('lang.email_sms_log')</a>
                        </li>                @endif
                    @if(in_array(138, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('event')}}">@lang('lang.event')</a></li>@endif
                </ul>
            </li>
        @endif




 



        @if(in_array(14, @$modules) ||  Auth::user()->role_id ==1)

                    <li>
                        <a href="#Ticket" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <span class="flaticon-settings"></span>
                            @lang('lang.ticket_system')
                        </a>
                        <ul class="collapse list-unstyled" id="Ticket">
                            @if(in_array(277, @$modules) ||  Auth::user()->role_id ==1)
                                <li><a href="{{ route('ticket.category') }}"> @lang('lang.ticket_category')</a></li>      
                            @endif

                            @if(in_array(281, @$modules) || Auth::user()->role_id ==1)
                                <li><a href="{{ route('ticket.priority') }}">@lang('lang.ticket_priority')</a></li> 
                            @endif

                            @if(in_array(285, $modules) ||  Auth::user()->role_id ==1)
                                <li><a href="{{ route('admin.ticket_list') }}">@lang('lang.ticket_list')</a>
                                </li>                
                            @endif
                            @if (Auth::user()->role_id ==3)
                                <li><a href="{{ route('user.ticket') }}">@lang('lang.ticket_list')</a></li>
                            @endif
                        </ul>
                    </li>
                @endif


        @if(in_array(10, @$modules) ||  Auth::user()->role_id == 1)

            <li>
                <a href="#subMenusystemReports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-analysis"></span>
                    @lang('lang.reports')
                </a>
                 <ul class="collapse list-unstyled" id="subMenusystemReports">  
                    @if(in_array(42, @$module_links) || Auth::user()->role_id == 1)<li><a href="{{route('profit')}}">@lang('lang.profit') @lang('lang.report')</a></li>@endif


                    @if(in_array(180, @$module_links) ||  Auth::user()->role_id == 1)<li><a href="{{route('user_log')}}">@lang('lang.user_log')</a></li>@endif
                    @if(in_array(273, @$module_links) ||  Auth::user()->role_id == 1)
                    <li><a href="{{url('cost-center-reports')}}">@lang('lang.cost_center') @lang('lang.report')</a></li>
                    @endif

                    @if(in_array(54, @$module_links) || Auth::user()->role_id == 1)
                        <li><a href="{{route('search_account')}}">@lang('lang.details_report')</a>
                        </li>                @endif

                    @if(in_array(274, @$module_links) || Auth::user()->role_id == 1)<li><a href="{{url('income-statement')}}">@lang('lang.income') @lang('lang.statement')</a></li>                @endif 

                    @if(in_array(236, @$module_links) || Auth::user()->role_id == 1)<li><a href="{{url('ledger-report')}}">@lang('lang.ledger') @lang('lang.report')</a></li>                @endif
                    @if(Auth::user()->role_id == 1)
                        <li><a href="{{url('bank-ledger')}}">@lang('lang.bank') @lang('lang.ledger')</a></li>@endif
                    @if(in_array(295, @$module_links) || Auth::user()->role_id == 1)<li><a href="{{url('bank-book')}}">@lang('lang.bank') @lang('lang.book')</a></li>                @endif
                    @if(in_array(296, @$module_links) || Auth::user()->role_id == 1)<li><a href="{{url('purchase-report')}}">@lang('lang.purchase') @lang('lang.report')</a></li>                @endif
                    @if(in_array(275, @$module_links) || Auth::user()->role_id == 1)<li><a href="{{url('sales-report')}}">@lang('lang.sales') @lang('lang.report')</a></li>                @endif
                </ul>
            </li>
        @endif




        @if(in_array(11, @$modules) ||  Auth::user()->role_id == 1)

            <li>
                <a href="#subMenusystemSettings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-settings"></span>
                    @lang('lang.system_settings')
                </a>
                <ul class="collapse list-unstyled" id="subMenusystemSettings">
                    @if(in_array(182, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('general-settings')}}"> @lang('lang.general_settings')</a></li>      
                    @endif 
                    @if(Module::has('Currency'))
                        
                    <li>
                        <a href="{{url('currency/manage-currency')}}">@lang('lang.manage_currency')</a>
                    </li>

                    @endif 
                    @if( Auth::user()->role_id == 1)
                        <li><a href="{{url('background-setting')}}">@lang('lang.background_settings')</a></li> 
                    @endif 
                    @if(in_array(191, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{route('role')}}">@lang('lang.role')</a></li>   
                    @endif
                    @if(in_array(200, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{route('base_setup')}}">@lang('lang.base_setup')</a> </li>                                 
                    @endif
                    @if(in_array(200, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{ url('payment-method-settings')}}">@lang('lang.payment_method_settings')</a> </li>                                 
                    @endif
                    @if(in_array(204, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('holiday')}}">@lang('lang.holiday')</a></li>   
                    @endif
                    
                    <li>
                        <a href="{{url('email-settings')}}">@lang('lang.email_settings')</a>
                    </li>

                    @if(in_array(208, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('sms-settings')}}">@lang('lang.sms_settings')</a></li>   
                    @endif
                    @if(in_array(210, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('weekend')}}">@lang('lang.weekend')</a></li>    
                        @endif
                    @if(in_array(214, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('language-settings')}}">@lang('lang.language_settings')</a> </li>                
                    @endif
                    @if(in_array(219, @$module_links) ||  Auth::user()->role_id == 1)
                        <li><a href="{{url('backup-settings')}}">@lang('lang.backup_settings')</a> </li>                
                    @endif


                </ul>
            </li>
        @endif
       
        @if(Auth::user()->role_id == 7)

            <li>
                <a href="#CreateTicket" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="flaticon-settings"></span>
                    @lang('lang.ticket_system')
                </a>
                <ul class="collapse list-unstyled" id="CreateTicket">
                    @if(Auth::user()->role_id == 7)
                        <li><a href="{{ route('user.ticket') }}">@lang('lang.ticket_list')</a>  </li>                
                    @endif
                </ul>
            </li>
        @endif 


    </ul>
</nav>
