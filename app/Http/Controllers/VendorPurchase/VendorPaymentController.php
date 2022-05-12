<?php

namespace App\Http\Controllers\VendorPurchase;

use App\Account;
use App\Bank_Transactions;
use App\Invoice;
use App\Mode;
use App\CheckBook;
use App\CheckbookDetail;
use App\Customer;
use App\Http\Controllers\Controller;

//use App\VendorManagement\Vendor;
//use App\VendorManagement\PaymentTrans;
use App\PaymentTrans;
use App\Payment;
use App\Vendor;
use App\Payment_image;
use App\Supplier;
use App\ThirdPartyChk;
use DateTime;
use DB;
use App\VendorManagement\VendorPurchaseInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class VendorPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $current_date = new DateTime();
        $current_date=$current_date->format('Y-m-d H:i:s');

        $payment = PaymentTrans::with('vendor')->where('object_type','vendor')->orderBy('id', 'desc')->get();
        $third_party_before_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '>', $current_date)->get();
        $third_party_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '=', $current_date)->get();
        $third_party_expire_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '<', $current_date)->get();
        $third_party_before_current_date_check= count($third_party_before_current_date_check);
        $third_part_exist_check= count($third_party_current_date_check);
        $third_party_expire_check1= count($third_party_expire_check);
        $total_check=$third_party_before_current_date_check+$third_part_exist_check+$third_party_expire_check1;

        $third_part_online_check = PaymentTrans::where('third_party_payment_type','online' )->where('exist_check',0)->get();
        $third_part_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->get();
//                dd($payment->payment->f_name);
        $vendors = Vendor::all();
//        dd($current_date,$third_part_online);
        $payments = Payment::all();
        $supplier = Vendor::all();
        return view('vendor.voyager.vendor_payment.browse', compact('third_party_expire_check1','third_party_expire_check','third_part_exist_check','third_party_before_current_date_check','third_part_check','third_part_online_check','total_check','vendors', 'supplier', 'payment', 'payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $vendors = Vendor::where('vendor_type', 'standard')->get();
        $accounts = Account::all();
        $customers = Customer::all();
        $payment_ref_number = PaymentTrans::max('reference_number');
//        $third_party_check_no=ThirdPartyChk::all();
        $third_party_check_no = CheckBook::all();
        $third_part_check = PaymentTrans::where('third_party_payment_type','online')->where('third_party_payment_type','check')->get();

//        $thirdpartychks = ThirdPartyChk::where('chk_status', '0')->where('thirdpartyPaymentType', 'check')->get();
//        $onlinetransfers = ThirdPartyChk::where('chk_status', '0')->where('thirdpartyPaymentType', 'online')->get();
//        $checks=CheckBook::where('account_id',2)->get();
        $vendors = Vendor::all();

        return view('vendor.voyager.vendor_payment.create', compact('third_part_check','vendors', 'payment_ref_number', 'customers', 'accounts', 'third_party_check_no'));
    }

    public function addThirdPartyChk(Request $request)
    {
//            dd($request->all());
        if ($request->thirdpartyPaymentType == 'check') {
            if ($request->hasfile('chk_image')) {

                $image = $request->file('chk_image');

                $new_name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/onlinetransfer'), $new_name);
            } else {
                toastr . error('Image is not getting by software');
            }

            $vendor_payment = new PaymentTrans();
            $payment_ref_number = PaymentTrans::max('reference_number');
            $payment_ref_number = $payment_ref_number + 1;
            $vendor_payment->reference_number = $payment_ref_number;
            $vendor_payment->object_id = $request->vendor_id;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->object_type = 'vendor';
            $vendor_payment->transaction_type = 'debit';
            $vendor_payment->third_party_payment_type = $request->thirdpartyPaymentType;
//            $date = \Carbon\Carbon::parse($request->date)->now();
            $vendor_payment->date = $request->date;
            $vendor_payment->amount = $request->amount;
            $vendor_payment->proof = $new_name;
            $vendor_payment->check_no = $request->check_no;
            $vendor_payment->branch_code = $request->branch_code;
            $vendor_payment->check_type = $request->check_type;
            $vendor_payment->bank_address = $request->bank_address;
            $vendor_payment->bank_name = $request->bank_name;
            $vendor_payment->payment_to = 'vendor';
            $vendor_payment->save();
            return redirect('admin/product')->with(['message' => 'Third Party Check Added Successfully', 'alert-type', 'success']);
        }
        elseif ($request->thirdpartyPaymentType == 'existcheck'){
            if ($request->hasfile('chk_image1')) {

                $image = $request->file('chk_image1');

                $new_name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/onlinetransfer'), $new_name);
            } else {
                toastr . error('Image is not getting by software');
            }
//            dd($request->all());
            $vendor_payment = new PaymentTrans();
            $payment_ref_number = PaymentTrans::max('reference_number');
            $payment_ref_number = $payment_ref_number + 1;
            $vendor_payment->reference_number = $payment_ref_number;
            $vendor_payment->exist_check = $request->exist_check;
            $vendor_payment->object_id = $request->vendor_id1;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->object_type = 'vendor';
            $vendor_payment->transaction_type = 'debit';
            $vendor_payment->third_party_payment_type = $request->thirdpartyPaymentType;
//            $date = \Carbon\Carbon::parse($request->date)->now();
            $vendor_payment->date = $request->date1;
            $vendor_payment->amount = $request->amount1;
            $vendor_payment->proof = $new_name;
            $vendor_payment->check_no = $request->check_no1;
            $vendor_payment->branch_code = $request->branch_code1;
            $vendor_payment->check_type = $request->check_type1;
            $vendor_payment->bank_address = $request->bank_address1;
            $vendor_payment->bank_name = $request->bank_name1;
            $vendor_payment->payment_to = 'vendor';
            $vendor_payment11 =  PaymentTrans::where('check_no',$request->check_no1)->first();
            $vendor_payment11->exist_check=1;
            $vendor_payment11->save();
                        $vendor_payment->save();

//            dd($vendor_payment11,$request->all());

            return redirect('admin/product')->with(['message' => 'Third Party Check Added Successfully', 'alert-type', 'success']);
        }
        elseif ($request->thirdpartyPaymentType == 'existing_online_transaction'){

            if ($request->hasfile('chk_image2')) {

                $image = $request->file('chk_image2');

                $new_name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/onlinetransfer'), $new_name);
            } else {
                toastr . error('Image is not getting by software');
            }
//            dd($request->all());
            $vendor_payment = new PaymentTrans();
            $payment_ref_number = PaymentTrans::max('reference_number');
            $payment_ref_number = $payment_ref_number + 1;
            $vendor_payment->reference_number = $payment_ref_number;
            $vendor_payment->object_id = $request->vendor_id2;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->object_type = 'vendor';
            $vendor_payment->transaction_type = 'debit';
            $vendor_payment->third_party_payment_type = $request->thirdpartyPaymentType;
//            $vendor_payment->date=$request->date;
            $vendor_payment->amount = $request->amount2;
//            $vendor_payment->chk_image = $name;
            $vendor_payment->vendor_account_no = $request->vendor_account_no2;
            $vendor_payment->vendor_account_title = $request->vendor_account_title2;
//            $date = \Carbon\Carbon::parse($request->date)->now();
            $vendor_payment->date = $request->date2;
            $vendor_payment->amount = $request->amount2;
            $vendor_payment->proof = $new_name;
//                dd($vendor_payment);
            $vendor_payment->payment_to = 'vendor';


            $vendor_payment_exist =  PaymentTrans::where('vendor_account_no',$request->vendor_account_no2)->first();
            if(@$vendor_payment_exist)
            {
                $vendor_payment_exist->exist_check=1;
                $vendor_payment_exist->save();
             }
            else
                {

                }
            $vendor_payment->save();

            return redirect('admin/product')->with(['message' => 'Third Party Check Added Successfully', 'alert-type', 'success']);
        }
        elseif ($request->thirdpartyPaymentType == 'online') {

//            dd($request->all());

            if ($request->hasfile('chk_image')) {

                $image = $request->file('chk_image');

                $new_name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/onlinetransfer'), $new_name);
            } else {
                toastr . error('Software is not getting Image');
            }
            $vendor_payment = new PaymentTrans();
            $payment_ref_number = PaymentTrans::max('reference_number');
            $payment_ref_number = $payment_ref_number + 1;
            $vendor_payment->reference_number = $payment_ref_number;
            $vendor_payment->object_id = $request->vendor_id;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->object_type = 'vendor';
            $vendor_payment->transaction_type = 'debit';
            $vendor_payment->third_party_payment_type = $request->thirdpartyPaymentType;
//            $vendor_payment->date=$request->date;
            $vendor_payment->amount = $request->amount;
//            $vendor_payment->chk_image = $name;
            $vendor_payment->vendor_account_no = $request->vendor_account_no;
            $vendor_payment->vendor_account_title = $request->vendor_account_title;
//            $date = \Carbon\Carbon::parse($request->date)->now();
            $vendor_payment->date = $request->date;
            $vendor_payment->amount = $request->amount;
            $vendor_payment->proof = $new_name;
            $vendor_payment->payment_to = 'vendor';

//                dd($vendor_payment);
            $vendor_payment->save();
            return redirect('admin/vendor-payments')->with(['message' => 'Online Transfer Detail Added Successfully', 'alert-type', 'success']);
        }


    }

    public function check($id)
    {
        $checks = CheckBook::where('account_id', $id)->with('checkdetail')->get();


//        foreach ($checks as $check)
//        {
//            foreach($check->checkdetail as $checkDetail)
//            {
//                ($checkDetail->checkbook_no);
//            }
//        }
//        foreach ($checks as $check)
//        {
//            $start   =($checks[0]->check_no_in_range);
//            $end   =($checks[0]->check_no_out_range);
//            $numbers = range($start, $end);
//        }
        $checks = json_encode($checks);
        return $checks;
    }

    public function check_details($id)
    {
        $checkdetail = CheckbookDetail::where('checkbook_id', $id)->get();
//        dd($checkdetail);
        $checkdetail = json_encode($checkdetail);
        return $checkdetail;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//dd($request->all());

        if ($request->payment_type == 'cash') {
            $vendor_payment = new PaymentTrans();
            $payment_ref_number = PaymentTrans::max('reference_number');
            $payment_ref_number = $payment_ref_number + 1;
            $vendor_payment->reference_number = $payment_ref_number;
            $vendor_payment->object_id = $request->vendor_id;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->object_type = 'vendor';
            $vendor_payment->transaction_type = 'debit';
            $vendor_payment->payment_type = $request->payment_type;
//            $date = \Carbon\Carbon::parse($request->date)->format('y-m-d');
            $vendor_payment->date = $request->date;
            $vendor_payment->amount = $request->amount;
            $vendor_payment->payment_to = 'vendor';

            $vendor_payment->save();
        } elseif ($request->payment_type == 'thirdparty') {
            $vendor_payment = new PaymentTrans();
            $payment_ref_number = PaymentTrans::max('reference_number');
            $payment_ref_number = $payment_ref_number + 1;
            $vendor_payment->reference_number = $payment_ref_number;
            $vendor_payment->object_id = $request->vendor_id;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->object_type = 'vendor';
            $vendor_payment->transaction_type = 'debit';
            $vendor_payment->payment_type = $request->payment_type;
            $vendor_payment->third_party_payment_type = $request->third_party_payment_type;
            $vendor_payment->third_party_id = $request->third_party_id;
            $vendor_payment->payment_to = 'vendor';

            $vendor_payment->save();

            $thirdpartystatus = ThirdPartyChk::where('id', $vendor_payment->third_party_id)->first();
//            $thirdpartystatus->chk_status = 1;
            $thirdpartystatus->save();
        } elseif ($request->payment_type == 'account') {
            if ($request->hasFile('proof')) {
                $file = $request->file('proof');
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                $name = $timestamp . '-' . $file->getClientOriginalName();

                $file->move(public_path() . '/images/onlinetransfer', $name);
            } else {
            }

            $vendor_payment = new PaymentTrans();
            $payment_ref_number = PaymentTrans::max('reference_number');
            $payment_ref_number = $payment_ref_number + 1;
            $vendor_payment->reference_number = $payment_ref_number;
            $vendor_payment->object_id = $request->vendor_id;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->object_type = 'vendor';
            $vendor_payment->transaction_type = 'debit';
            $vendor_payment->payment_type = $request->payment_type;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->third_party_payment_type = $request->account_payment_type;
            $vendor_payment->payment_to = 'vendor';

//            $vendor_payment->save();
            if ($request->account_payment_type == 'accountonline') {
                $payment_ref_number = PaymentTrans::max('reference_number');
                $payment_ref_number = $payment_ref_number + 1;
                $vendor_payment->reference_number = $payment_ref_number;
                $vendor_payment->vendor_account_number = $request->vendor_account_number;
                $vendor_payment->amount = $request->amount;
//                $date = \Carbon\Carbon::parse($request->date)->now();
                $vendor_payment->date = $request->date;
                $vendor_payment->proof = $name;
                $vendor_payment->payment_to = 'vendor';

            } elseif ($request->account_payment_type == 'accountcheck') {
                $payment_ref_number = PaymentTrans::max('reference_number');
                $payment_ref_number = $payment_ref_number + 1;
                $vendor_payment->reference_number = $payment_ref_number;
                $vendor_payment->checkbook_no_id = $request->checkbook_no_id;
                $vendor_payment->checkdetail_no_id = $request->checkdetail_no_id;
                $vendor_payment->amount = $request->amount;
//                $date = \Carbon\Carbon::parse($request->date)->now();
                $vendor_payment->date = $request->date;
                $vendor_payment->proof = $name;
                $vendor_payment->payment_to = 'vendor';

//                $checkdetail=CheckbookDetail::where('id',$request->checkdetail_no_id)->first();
//                dd($request->checkdetail_no_id);
//                $checkdetail->checkuse_status=1;
                $vendor_payment->save();
            }

//            $vendor_payment->check_no=$request->check_no;
//            $vendor_payment->amount=$request->amount;
//            $vendor_payment->date=$request->date;
//            $vendor_payment->proof=$name;
            $vendor_payment->save();
        }

        return redirect('admin/product')->with(['message' => ' Vendor Payment added Successfully', 'alert-type' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $vendor = PaymentTrans::with('payment')->find($id);
        $vendor = PaymentTrans::with('vendor')->find($id);
//        $vendor=PaymentTrans::with('payment')->where('id',$id)->get();

//        $vendor=Vendor::all();
//        dd($vendor);
//        Vendor::all();
//        dd($supplier);
        return view('vendor.voyager.vendor_payment.read', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Payment::find($id);
        $vendors = Payment::find($id)->with('payment')->get();
//        dd($vendors);
        $payment = Payment::all();
        $mode = Mode::all();
        return view('vendor.voyager.vendor.edit', compact('vendor', 'payment', 'mode', 'vendors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $id = $request->deleteid;
        PaymentTrans::find($id)->delete();
//        $r=DB::delete('delete from payments where id = ?',[$id]);
//dd($r);
        return redirect()->back()->with(['message' => "Vendor Payments Delete Successfully", 'alert-type' => 'info']);
    }
    public function refNo(){

        $ref_no = PaymentTrans::max('reference_number');
        $ref_no+=1;

        return response()->json($ref_no);
//        return view('vendor.voyager.vendor_payment.create', compact('vendors','ref_no', 'payment_ref_number', 'customers', 'accounts', 'third_party_check_no'));

    }

    public function Third_part_check(){

        $third_part_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('object_type','customer')->get();


        return response()->json($third_part_check);
//        return view('vendor.voyager.vendor_payment.create', compact('vendors','ref_no', 'payment_ref_number', 'customers', 'accounts', 'third_party_check_no'));

    }
    public function Third_part_check_online(){

        $third_part_online = PaymentTrans::where('third_party_payment_type','online' )->where('exist_check',0)->where('payment_to','customer')->get();


        return response()->json($third_part_online);
//        return view('vendor.voyager.vendor_payment.create', compact('vendors','ref_no', 'payment_ref_number', 'customers', 'accounts', 'third_party_check_no'));

    }
    public function exist_check_details($id){

        $third_part_check = PaymentTrans::where('check_no',$id)->first();


        return response()->json($third_part_check);
//        return view('vendor.voyager.vendor_payment.create', compact('vendors','ref_no', 'payment_ref_number', 'customers', 'accounts', 'third_party_check_no'));

    }
    public function checks_exist_or_not(Request $request,$id){

        $third_part_check_exist = PaymentTrans::where('check_no',$request->account_id)->get();
//        if( PaymentTrans::where('check_no',$id)->first()){
//            return 'exist';
//        }else{
//            return 'not_exist';
//        }
//        return $third_part_check_exist;
        return response()->json($third_part_check_exist);
//        return view('vendor.voyager.vendor_payment.create', compact('vendors','ref_no', 'payment_ref_number', 'customers', 'accounts', 'third_party_check_no'));

    }

    public function exist_online_check_details($id){

        $third_part_check = PaymentTrans::where('vendor_account_no',$id)->first();


        return response()->json($third_part_check);
//        return view('vendor.voyager.vendor_payment.create', compact('vendors','ref_no', 'payment_ref_number', 'customers', 'accounts', 'third_party_check_no'));

    }

}
