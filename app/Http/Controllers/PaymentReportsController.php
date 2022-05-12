<?php

namespace App\Http\Controllers;


use App\SupplyInvoice;
use App\Vendor;
use App\PaymentTrans;
use App\VendorLetterCredit;
use App\VendorPurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentReportsController extends Controller
{
    public function index()
    {
        $data=array();
        $payment = PaymentTrans::with('payment')->get();
        $vendor = Vendor::all();
        $vendor_name_id=0;
        return view('vendor.voyager.payment_reports.create', compact('payment', 'vendor','data','vendor_name_id'));

    }

    public function create()
    {
        $data=array();
        $temp1=0;
        $vendor = Vendor::all();
        $vendor_name_id=0;
        $start_date=0;
        $end_date=0;
        $vendor_opening_balance= 0;
        return view('vendor.voyager.payment_reports.create', compact('vendor','vendor_opening_balance','data','temp1','vendor_name_id','start_date','end_date'));
    }

    public function store(Request $request)
    {

        $data = array();
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        $select_vendor=$request->select_vendor;
        $vendor = Vendor::all();
        $vendor_opening_balance= DB::table('vendors')->where('id', $request->select_vendor)->value('opening_balance');
        $vendor_name_id = DB::table('vendors')->where('id', $request->select_vendor)->value('id');
        $vendors_amount = PaymentTrans::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('object_id', $request->select_vendor)->where('object_type','vendor')->get();
        $invoices_amount = VendorPurchaseOrder::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('vendor_id', $request->select_vendor)->get();
        $invoices_return_amount = VendorPurchaseOrder::whereDate('created_at', '>=', $start_date)
            ->select('*','vendor_purchase_orders.inv_amount AS return_inv_amount')
            ->whereDate('created_at', '<=', $end_date)
            ->Has('return_lc')
            ->get();
//dd($invoices_return_amount);
//        $vendors_amount = PaymentTrans::whereBetween('date', [$request->start_date, $request->end_date])->where('vendor_id', $request->select_vendor)->get();
//        dd($vendors_amount);
        $before_date = PaymentTrans::whereDate('created_at', '<', [$request->start_date])->where('object_id', $request->select_vendor)->where('object_type','vendor')->get();
        $before_date_inv = VendorPurchaseOrder::whereDate('created_at', '<', [$request->start_date])->where('vendor_id', $request->select_vendor)->get();
        $before_date_return_inv = VendorPurchaseOrder::whereDate('created_at', '<', [$request->start_date])->where('vendor_id', $request->select_vendor)
            ->Has('return_lc')
            ->get();


//        $before_date_return_inv = VendorLetterCredit::whereDate('created_at', '<', [$request->start_date])
//            ->whereHas('vendor_return_po',function ($query) use($select_vendor ){
//                $query->where('vendor_id',$select_vendor) ;
//            })
//            ->get();
//        $invoices_amount = Invoice::whereBetween('date', [$request->start_date, $request->end_date])->where('vendor_id', $request->select_vendor)->get();
//        dd($vendors_amount,$invoices_amount);
        $payments_and_invoices_data = collect();
        $payments_and_invoices_data = $payments_and_invoices_data->merge($invoices_return_amount)->merge($invoices_amount)->merge($vendors_amount)->sortBy('created_at');
//        $payments_and_invoices_data = $vendors_amount->merge($invoices_amount)->sortBy('created_at');
//        $payments_and_invoices_data = array_merge($vendors_amount->toArray(), $invoices_amount->toArray());
//        $payments_and_invoices_data= array_merge((array)json_decode($invoices_amount), (array) json_decode($vendors_amount));
//        dd($vendors_amount,$invoices_amount,$payments_and_invoices_data);
//        dd($payments_and_invoices_data);
//        $bb=$payments_and_invoices_data->orderBy('id');
//        dd($bb);
        $brought_forward = $before_date->sum('amount');
        $brought_forward_inv=$before_date_inv->sum('inv_amount');
        $brought_forward_return_inv=$before_date_return_inv->sum('inv_amount');

        $temp1 = $brought_forward + $brought_forward_return_inv  -$brought_forward_inv;
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

//dd($ledger['third_party_payment_type']);


            if (@$ledger['amount']) {

                $temp = $temp + $ledger['amount'];
                $data[$count]['id'] = $ledger['id'];
                $data[$count]['amount'] = $ledger['amount'];
                $data[$count]['serial'] = ($count+1);
                $data[$count]['payment_type'] = $ledger['payment_type'];
                $data[$count]['third_party_payment_type'] = $ledger['third_party_payment_type'];
                $data[$count]['created_at'] = $ledger['created_at'];
                $data[$count]['date'] = $ledger['date'];
                $data[$count]['balance'] = $temp;
                $data[$count]['payment_reference_number'] = $ledger['reference_number'];

                $data[$count]['narration'] = 'Payment';

            }
            elseif(@$ledger['inv_amount']) {

               if(@$ledger['return_inv_amount'])
               {
                   $temp = $temp + $ledger['inv_amount'];
                   $data[$count]['narration'] = 'Return Invoice'.$ledger['po_number'];
                   $data[$count]['inv_type'] = 'return_inv';
               }
               else
               {
                   $temp = $temp - $ledger['inv_amount'];
                   $data[$count]['inv_type'] = 'inv';
                   $data[$count]['narration'] = 'Invoice'.$ledger['po_number'];

               }


//                $temp2=$temp-$temp1;
                $data[$count]['id'] = $ledger['id'];
                $data[$count]['inv_amount'] = $ledger['inv_amount'];
                $data[$count]['payment_type'] = $ledger['payment_type'];
                $data[$count]['serial'] = ($count+1);
                $data[$count]['third_party_payment_type'] = $ledger['third_party_payment_type'];
                $data[$count]['created_at'] = $ledger['created_at'];
                $data[$count]['date'] = $ledger['date'];

                $data[$count]['balance'] = $temp;
                $data[$count]['invoice_reference_number'] = $ledger['id'];

//                dd($data);
            }

            $count++;

        }
//        dd($data);



        array_sort_by_column($data, 'serial',SORT_DESC);



        return view('vendor.voyager.payment_reports.create', compact('temp1','vendor_opening_balance','vendor','vendor_name_id','data','brought_forward_inv', 'vendors_amount', 'brought_forward', 'invoices_amount', 'payments_and_invoices_data','start_date','end_date'));


    }


}
