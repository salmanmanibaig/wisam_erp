<?php

namespace App\Http\Controllers\CustomerPurchase;

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
use App\Supplier;
use App\PaymentTrans;
use App\Payment;
use App\Vendor;
use App\Payment_image;

use App\ThirdPartyChk;

use DateTime;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class  CustomerPaymentController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payment = PaymentTrans::with('customer')->where('object_type','customer')->orderBy('id', 'desc')->get();
//                dd($payment->payment->f_name);
        $vendors = Vendor::all();
//        $payment=PaymentTrans::all();
//        $mode = Mode::all();

        $payments = Payment::all();
        $supplier = Supplier::all();
        return view('vendor.voyager.customer_payment.browse', compact('vendors', 'supplier', 'payment', 'payments'));
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

//        dd($customers);
        $payment_ref_number = PaymentTrans::max('reference_number');
//        $third_party_check_no=ThirdPartyChk::all();
        $third_party_check_no = CheckBook::all();
//        $thirdpartychks = ThirdPartyChk::where('chk_status', '0')->where('thirdpartyPaymentType', 'check')->get();
//        $onlinetransfers = ThirdPartyChk::where('chk_status', '0')->where('thirdpartyPaymentType', 'online')->get();
//        $checks=CheckBook::where('account_id',2)->get();
        $vendors = Vendor::all();

        return view('vendor.voyager.customer_payment.create', compact('vendors', 'payment_ref_number', 'customers', 'accounts', 'third_party_check_no'));
    }

    public function addThirdPartyChk(Request $request)
    {

        if ($request->thirdpartyPaymentType == 'check') {
            if ($request->hasfile('chk_image')) {

                $image = $request->file('chk_image');

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
            $vendor_payment->transaction_type = "credit";
            $vendor_payment->object_id = $request->vendor_id;
            $vendor_payment->account_id = $request->account_id;
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
            $vendor_payment->object_type = 'customer';
            $vendor_payment->save();
            return redirect('admin/customer_payment')->with(['message' => 'Third Party Check Added Successfully', 'alert-type', 'success']);
        } elseif ($request->thirdpartyPaymentType == 'online') {

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
            $vendor_payment->transaction_type = "credit";
            $vendor_payment->object_id = $request->vendor_id;
            $vendor_payment->account_id = $request->account_id;
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
            $vendor_payment->object_type = 'customer';
//                dd($vendor_payment);
            $vendor_payment->save();
            return redirect('admin/customer_payment')->with(['message' => 'Online Transfer Detail Added Successfully', 'alert-type', 'success']);
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


        if ($request->payment_type == 'cash') {
            $vendor_payment = new PaymentTrans();
            $vendor_payment->transaction_type = "credit";
            $payment_ref_number = PaymentTrans::max('reference_number');
            $payment_ref_number = $payment_ref_number + 1;
            $vendor_payment->reference_number = $payment_ref_number;
            $vendor_payment->object_id = $request->vendor_id;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->payment_type = $request->payment_type;
//            $date = \Carbon\Carbon::parse($request->date)->format('y-m-d');
            $vendor_payment->date = $request->date;
            $vendor_payment->object_type = 'customer';
            $vendor_payment->amount = $request->amount;
            $vendor_payment->save();
        } elseif ($request->payment_type == 'thirdparty') {
            $vendor_payment = new PaymentTrans();
            $payment_ref_number = PaymentTrans::max('reference_number');
            $payment_ref_number = $payment_ref_number + 1;
            $vendor_payment->reference_number = $payment_ref_number;
            $vendor_payment->object_id = $request->vendor_id;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->transaction_type = "credit";
            $vendor_payment->payment_type = $request->payment_type;
            $vendor_payment->third_party_payment_type = $request->third_party_payment_type;
            $vendor_payment->third_party_id = $request->third_party_id;
            $vendor_payment->object_type = 'customer';

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
            $vendor_payment->transaction_type = "credit";
            $vendor_payment->payment_type = $request->payment_type;
            $vendor_payment->account_id = $request->account_id;
            $vendor_payment->object_type = 'customer';

            $vendor_payment->third_party_payment_type = $request->account_payment_type;
//            $vendor_payment->save();
            if ($request->account_payment_type == 'accountonline') {
                $payment_ref_number = PaymentTrans::max('reference_number');
                $payment_ref_number = $payment_ref_number + 1;
                $vendor_payment->reference_number = $payment_ref_number;
                $vendor_payment->vendor_account_number = $request->vendor_account_number;
                $vendor_payment->amount = $request->amount;
                $vendor_payment->transaction_type = "credit";
//                $date = \Carbon\Carbon::parse($request->date)->now();
                $vendor_payment->date = $request->date;
                $vendor_payment->proof = $name;
                $vendor_payment->object_type = 'customer';
            } elseif ($request->account_payment_type == 'accountcheck') {
                $payment_ref_number = PaymentTrans::max('reference_number');
                $payment_ref_number = $payment_ref_number + 1;
                $vendor_payment->reference_number = $payment_ref_number;
                $vendor_payment->checkbook_no_id = $request->checkbook_no_id;
                $vendor_payment->transaction_type = "credit";
                $vendor_payment->checkdetail_no_id = $request->checkdetail_no_id;
                $vendor_payment->amount = $request->amount;
//                $date = \Carbon\Carbon::parse($request->date)->now();
                $vendor_payment->date = $request->date;
                $vendor_payment->proof = $name;
                $vendor_payment->object_type = 'customer';
//                $checkdetail=CheckbookDetail::where('id',$request->checkdetail_no_id)->first();
//                dd($request->checkdetail_no_id);
//                $checkdetail->checkuse_status=1;
//                dd($vendor_payment);
                $vendor_payment->save();
            }

//            $vendor_payment->check_no=$request->check_no;
//            $vendor_payment->amount=$request->amount;
//            $vendor_payment->date=$request->date;
//            $vendor_payment->proof=$name;
            $vendor_payment->save();
        }

        return redirect('admin/customer_payment')->with(['message' => ' Customer Payment added Successfully', 'alert-type' => 'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $payment = PaymentTrans::with('customer')->find($id);


//        $vendor=PaymentTrans::with('payment')->where('id',$id)->get();

//        $vendor=Vendor::all();
//        dd($vendor);
//        Vendor::all();
//        dd($supplier);


        return view('vendor.voyager.customer_payment.read', compact('payment'));
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
//        dd(Payment::find($id));
        PaymentTrans::find($id)->delete();
//        $r=DB::delete('delete from vendor_payments where id = ?',[$id]);
//dd($r);
        return redirect()->back()->with(['message' => "Customer Payments Delete Successfully", 'alert-type' => 'info']);;
    }
    public function refNo(){

        $ref_no = PaymentTrans::max('reference_number');
        $ref_no+=1;

        return response()->json($ref_no);
//        return view('vendor.voyager.vendor_payment.create', compact('vendors','ref_no', 'payment_ref_number', 'customers', 'accounts', 'third_party_check_no'));

    }
    public  function today_check()
    {
        $current_date = new DateTime();
        $current_date=$current_date->format('Y-m-d H:i:s');

        $third_party_before_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '>', $current_date)->get();
        $third_party_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '=', $current_date)->get();
        $third_party_before_current_date_check= count($third_party_before_current_date_check);
        $third_part_exist_check= count($third_party_current_date_check);
        $total_check=$third_party_before_current_date_check+$third_part_exist_check;
        $vendors = Vendor::all();
//        dd($current_date,$third_part_online);
        $payments = Payment::all();
        $supplier = Supplier::all();
        return view('vendor.voyager.customer_payment.today_checks_view',compact('third_party_current_date_check','third_part_exist_check','third_party_before_current_date_check','total_check','vendors', 'supplier', 'payments'));

    }
    public  function after_today_check()
    {
//        dd(9);
        $current_date = new DateTime();
        $current_date=$current_date->format('Y-m-d H:i:s');

        $third_party_before_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '>', $current_date)->get();
        $third_party_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '<=', $current_date)->get();
        $third_party_before_current_date_check1= count($third_party_before_current_date_check);
        $third_part_exist_check= count($third_party_current_date_check);
        $total_check=$third_party_before_current_date_check1+$third_part_exist_check;
        $vendors = Vendor::all();
//        dd($current_date,$third_part_online);
        $payments = Payment::all();
        $supplier = Supplier::all();
        return view('vendor.voyager.customer_payment.after_today_check',compact('third_party_current_date_check','third_part_exist_check','third_party_before_current_date_check','total_check','vendors', 'supplier', 'payments'));

    }
    public  function expired_check()
    {
//        dd(9);
        $current_date = new DateTime();
        $current_date=$current_date->format('Y-m-d H:i:s');

        $third_party_before_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '>', $current_date)->get();
        $third_party_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '<', $current_date)->get();
        $third_party_before_current_date_check1= count($third_party_before_current_date_check);
        $third_part_exist_check= count($third_party_current_date_check);
        $total_check=$third_party_before_current_date_check1+$third_part_exist_check;
        $vendors = Vendor::all();
//        dd($current_date,$third_party_current_date_check);
        $payments = Payment::all();
        $supplier = Supplier::all();
        return view('vendor.voyager.customer_payment.expired_check_view',compact('third_party_current_date_check','third_part_exist_check','third_party_before_current_date_check','total_check','vendors', 'supplier', 'payments'));

    }
    public  function total_check()
    {
//        dd(9);
        $current_date = new DateTime();
        $current_date=$current_date->format('Y-m-d H:i:s');

        $third_party_before_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '>', $current_date)->get();
        $third_party_all_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->get();
        $third_party_current_date_check = PaymentTrans::where('third_party_payment_type','check' )->where('exist_check',0)->where('payment_to','customer')->whereDate('date', '<', $current_date)->get();
        $third_party_before_current_date_check1= count($third_party_before_current_date_check);
        $third_part_exist_check= count($third_party_current_date_check);
        $total_check=$third_party_before_current_date_check1+$third_part_exist_check;
        $vendors = Vendor::all();
//        dd($current_date,$third_party_current_date_check);
        $payments = Payment::all();
        $supplier = Supplier::all();
        return view('vendor.voyager.customer_payment.total_existing_checkview',compact('third_party_all_check','third_party_current_date_check','third_part_exist_check','third_party_before_current_date_check','total_check','vendors', 'supplier', 'payments'));

    }
}
