<?php

namespace App\Http\Controllers;

use App\Customer;
use App\SupplyCustomerInvoice;
use Illuminate\Http\Request;
use App\SupplyInvoice;
use App\Vendor;
use App\PaymentTrans;
use App\VendorPurchaseOrder;
use Illuminate\Support\Facades\DB;

class CustomerPaymentReportsController extends Controller
{
    public function index()
    {
        $data=array();
        $payment = PaymentTrans::with('payment')->get();
        $vendor = Vendor::all();
        $vendor_name_id=0;
        return view('vendor.voyager.customer_payment_reports.create', compact('payment', 'vendor','data','vendor_name_id'));

    }

    public function create()
    {

        $data=array();
        $temp1=0;
        $vendor = Vendor::all();
        $customers = Customer::all();
        $vendor_name_id=0;
        $start_date=0;
        $end_date=0;
        $vendor_opening_balance= 0;
        return view('vendor.voyager.customer_payment_reports.create', compact('customers','vendor','vendor_opening_balance','data','temp1','vendor_name_id','start_date','end_date'));
    }

    public function store(Request $request)
    {



        $data = array();
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        $vendor = Vendor::all();
        $customers = Customer::all();
        $vendor_opening_balance= DB::table('customers')->where('id', $request->select_vendor)->value('opening_balance');
        $vendor_name_id = DB::table('customers')->where('id', $request->select_vendor)->value('id');
        $vendors_amount = PaymentTrans::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('object_id', $request->select_vendor)->where('object_type','customer')->get();
        $invoices_amount = SupplyCustomerInvoice::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('customer_id', $request->select_vendor)->get();
//dd($invoices_amount);
//        $vendors_amount = PaymentTrans::whereBetween('date', [$request->start_date, $request->end_date])->where('vendor_id', $request->select_vendor)->get();
//        dd($vendors_amount);
        $before_date = PaymentTrans::whereDate('created_at', '<', [$request->start_date])->where('object_id', $request->select_vendor)->where('object_type','customer')->get();
        $before_date_inv = SupplyCustomerInvoice::whereDate('created_at', '<', [$request->start_date])->where('customer_id', $request->select_vendor)->get();
//        $invoices_amount = Invoice::whereBetween('date', [$request->start_date, $request->end_date])->where('vendor_id', $request->select_vendor)->get();
//        dd($vendors_amount,$invoices_amount);
        $payments_and_invoices_data = collect();
        $payments_and_invoices_data = $payments_and_invoices_data->merge($invoices_amount)->merge($vendors_amount)->sortBy('created_at');
//        $payments_and_invoices_data = $vendors_amount->merge($invoices_amount)->sortBy('created_at');
//        $payments_and_invoices_data = array_merge($vendors_amount->toArray(), $invoices_amount->toArray());
//        $payments_and_invoices_data= array_merge((array)json_decode($invoices_amount), (array) json_decode($vendors_amount));
//        dd($vendors_amount,$invoices_amount,$payments_and_invoices_data);
//        dd($payments_and_invoices_data,$vendors_amount);
//        $bb=$payments_and_invoices_data->orderBy('id');
//        dd($bb);
        $brought_forward = $before_date->sum('amount');
        $brought_forward_inv=$before_date_inv->sum('inv_amount');

        $temp1 = $brought_forward-$brought_forward_inv;
        $temp1+=$vendor_opening_balance;
//        dd($temp1);
        $temp = $temp1;
        $count = 0;
        function array_sort_by_column(&$arr, $col, $dir ) {
            $sort_col = array();
            foreach ($arr as $key=> $row) {
                $sort_col[$key] = $row[$col];
            }

            array_multisort($sort_col, $dir, $arr);
        }
//        array_sort_by_column($payments_and_invoices_data, 'created_at',SORT_DESC);

        foreach ($payments_and_invoices_data as $key => $ledger) {




            if (@$ledger['amount']) {

                $temp = $temp + $ledger['amount'];
                $data[$count]['id'] = $ledger['id'];
                $data[$count]['amount'] = $ledger['amount'];
                $data[$count]['payment_type'] = $ledger['payment_type'];
                $data[$count]['third_party_payment_type'] = $ledger['third_party_payment_type'];
                $data[$count]['created_at'] = $ledger['created_at'];
                $data[$count]['date'] = $ledger['date'];
                $data[$count]['balance'] = $temp;
                $data[$count]['payment_reference_number'] = $ledger['reference_number'];

                $data[$count]['narration'] = 'Payment';

            }
            elseif(@$ledger['inv_total']) {
                $temp = $temp - $ledger['inv_total'];
//                $temp2=$temp-$temp1;
                $data[$count]['id'] = $ledger['id'];
                $data[$count]['inv_amount'] = $ledger['inv_total'];
                $data[$count]['payment_type'] = $ledger['payment_type'];
                $data[$count]['third_party_payment_type'] = $ledger['third_party_payment_type'];
                $data[$count]['created_at'] = $ledger['created_at'];
                $data[$count]['date'] = $ledger['date'];

                $data[$count]['balance'] = $temp;
                $data[$count]['invoice_reference_number'] = $ledger['id'];
                $data[$count]['narration'] = 'Invoice'.$ledger['po_number'];
//                dd($data);
            }

            $count++;

        }
//        dd($data);



        array_sort_by_column($data, 'created_at',SORT_DESC);


//dd($data);
        return view('vendor.voyager.customer_payment_reports.create', compact('customers','temp1','vendor_opening_balance','vendor','vendor_name_id','data','brought_forward_inv', 'vendors_amount', 'brought_forward', 'invoices_amount', 'payments_and_invoices_data','start_date','end_date'));


    }
}
