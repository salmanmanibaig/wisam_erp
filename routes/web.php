<?php

use App\Http\Controllers\AccountBalanceController;
use App\Http\Controllers\CustomerInvoice\CustomerInvoiceController;
use App\Http\Controllers\CustomerPaymentReportsController;
use App\Http\Controllers\CustomerPurchase\CustomerPaymentController;
use App\Http\Controllers\employee\EmployeeController;
use App\Http\Controllers\PaymentReportsController;
use App\Http\Controllers\pettycash_expense\PettyCashExpenseController;
use App\Http\Controllers\pettycash_payment\PettyCashPaymentController;
use App\Http\Controllers\VendorPurchase\VendorLetterCreditController;
use App\Http\Controllers\VendorPurchase\VendorPaymentController;
use App\VendorLetterCredit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Auth.login
//Route::get('/auth1/redirect/{provider}', 'SocialController@redirect');
//Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
//Route::get('/callback/{provider}', 'SocialController@callback');
Route::group(['prefix' => 'admin'], function () {

//    Route::get('sendbasicemail','MailController@basic_email');

    //petty cash payment routes start
//    route::get('/petty_cash_payment',[PettyCashPaymentController::class,'index']);
//    route::get('/petty_cash_payment/create',[PettyCashPaymentController::class,'create']);


    //pettycash expenses start


//    route::delete('/pettycash-expenses/destroy',[PettyCashExpenseController::class,'destroy']);
    //employee salary start

//    route::get('/employee-salaries',[EmployeeController::class,'index']);







    //account_balance start

        route::get('/account_balance',[AccountBalanceController::class,'index']);
//account_balance end
    route::get('/ref_no',[VendorPaymentController::class,'refNo']);
    route::get('/ref_no1',[CustomerPaymentController::class,'refNo']);
    route::get('vendor-purchase-orders/view_detail/{id}','VendorPurchase\VendorPurchaseOrderController@view');
    route::get('vendor-purchase-orders/complete_po/{id}','VendorPurchase\VendorPurchaseOrderController@complete');
//    Route::resource('bank-account', 'SmBankAccountController');

    route::get('/reports_create',[PaymentReportsController::class,'create']);
    route::post('/reports_post', [PaymentReportsController::class,'store']);

//    customer payments reports
    route::get('/customer_reports_create',[CustomerPaymentReportsController::class,'create']);
    route::post('/customer_reports_post', [CustomerPaymentReportsController::class,'store']);
    //vendor payments
    route::get('/product',[VendorPaymentController::class,'index']);
    route::get('/payment_create',[VendorPaymentController::class,'create']);
    route::post('/thirdpartycheck',[VendorPaymentController::class,'addThirdPartyChk']);

    route::get('/Third_part_check',[VendorPaymentController::class,'Third_part_check']);
    route::post('/payment_data_enter',[VendorPaymentController::class,'store']);
    route::get('/payments_show/{id}',[VendorPaymentController::class,'show']);


    route::get('/ref_no',[VendorPaymentController::class,'refNo']);
    route::delete('/vendor_payments/destroy',[VendorPaymentController::class,'destroy']);
//    route::get('/Third_part_check',[VendorPaymentController::class,'Third_part_check']);
    route::get('/Third_part_check_online',[VendorPaymentController::class,'Third_part_check_online']);
    route::get('/exist_check_details/{id}',[VendorPaymentController::class,'exist_check_details']);
    route::get('/exist_online_check_details/{id}',[VendorPaymentController::class,'exist_online_check_details']);
    route::get('/vendor-payments/checks_exist/{id}',[VendorPaymentController::class,'checks_exist_or_not']);
    route::get('/ref_no1',[CustomerPaymentController::class,'refNo']);


    //    ====================================== Customer Invoice ===========================================
    route::get('/customer-invoice', [CustomerInvoiceController::class,'index']);
    route::get('/customer-invoice/create',[CustomerInvoiceController::class,'create']);
    route::post('/customer-invoice/store',[CustomerInvoiceController::class,'store']);
    route::get('/customer-invoice/show/{id}',[CustomerInvoiceController::class,'show']);
    route::get('/customer-invoice/edit/{id}',[CustomerInvoiceController::class,'edit']);
    route::get('/customer-invoice/print/{id}',[CustomerInvoiceController::class,'prints']);
    route::post('/customer-invoice/update/{id}',[CustomerInvoiceController::class,'update']);
    route::delete('/customer-invoice/destroy/',[CustomerInvoiceController::class,'destroy']);
    route::get('/customer-invoice-product/{id}',[CustomerInvoiceController::class,'invoiceProduct']);
    route::get('/customer-invoice/customer-details/{id}',[CustomerInvoiceController::class,'customer_details']);
    route::get('/customer-invoice/customer-purchase-order-details/{id}',[CustomerInvoiceController::class,'customer_purchase_order_details']);

//customer payment
    route::get('/customer_payment',[CustomerPaymentController::class,'index']);
    route::get('/customer_payment_create',[CustomerPaymentController::class,'create']);
    route::post('/customer_thirdpartycheck',[CustomerPaymentController::class,'addThirdPartyChk']);


    route::post('/customer_payment_data_enter',[CustomerPaymentController::class,'store']);
    route::get('/customer_payments_show/{id}',[CustomerPaymentController::class,'show']);
    route::delete('/customer_payments/destroy',[CustomerPaymentController::class,'destroy']);
    route::get('/customer_today_check',[CustomerPaymentController::class,'today_check']);
    route::get('/customer_after_today_check',[CustomerPaymentController::class,'after_today_check']);
    route::get('/customer_expire_check',[CustomerPaymentController::class,'expired_check']);
    route::get('/customer_total_check',[CustomerPaymentController::class,'total_check']);



    //vendor letter credit
    route::get('/vendor-letter-credits/create/{id}',[VendorLetterCreditController::class,'create']);


//    route::get('/reports',[PaymentReportsController::class,'create']);
//    route::get('/reports_create',[PaymentReportsController::class,'create']);
//    route::post('/reports_post', [PaymentReportsController::class,'store']);
    Voyager::routes();

});
