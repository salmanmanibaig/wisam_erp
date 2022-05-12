<?php

namespace App\Http\Controllers;

use App\CpoExpense;
use App\Customer;
use App\CustomerPurchaseOrder;
use App\CustomerPurchaseOrderExpense;
use App\DeliveryOrder;
use App\SupplyCustomerInvoice;
use App\Unit;
use App\Vendor;
use App\PaymentTrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerDelRepotController extends Controller
{
    public function index()
    {

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
        return view('vendor.voyager.customer-delivery-report.create', compact('customers','vendor','vendor_opening_balance','data','temp1','vendor_name_id','start_date','end_date'));
    }



    public function store(Request $request)
    {



        $data = array();
        $start_date=$request->start_date;
        $end_date=$request->end_date;
        $vendor = Vendor::all();
        $customers = Customer::all();
        $customer_id=$request->select_vendor;
        $vendor_opening_balance= DB::table('customers')->where('id', $request->select_vendor)->value('opening_balance');
        $customer = Customer::find( $request->select_vendor);
        $vendors_amount = PaymentTrans::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->where('object_id', $request->select_vendor)->where('object_type','customer')->get();
        $invoices_amount = DeliveryOrder:: whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)->where('customer_id', $request->select_vendor)->get();




//        $vendors_amount = PaymentTrans::whereBetween('date', [$request->start_date, $request->end_date])->where('vendor_id', $request->select_vendor)->get();
//        dd($vendors_amount);
        $before_date = PaymentTrans::whereDate('created_at', '<', [$request->start_date])->where('object_id', $request->select_vendor)->where('object_type','customer')->get();
        $before_date_inv = DeliveryOrder::whereDate('created_at', '<', [$request->start_date])->where('customer_id', $request->select_vendor)->get();
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
        $brought_forward_inv=$before_date_inv->sum('del_total');

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
            elseif(@$ledger['del_total']) {
                $temp = $temp - $ledger['del_total'];
//                $temp2=$temp-$temp1;
                $data[$count]['id'] = $ledger['id'];
                $data[$count]['inv_amount'] = $ledger['del_total'];
                $data[$count]['payment_type'] = $ledger['payment_type'];
                $data[$count]['third_party_payment_type'] = $ledger['third_party_payment_type'];
                $data[$count]['created_at'] = $ledger['created_at'];
                $data[$count]['date'] = $ledger['date'];
                $data[$count]['do_number'] = $ledger['do_number'];
                $data[$count]['bilty_number'] = $ledger['bilty_number'];
                $data[$count]['product_name'] = $ledger['po_number']['product']['name'];
                $data[$count]['size'] = $ledger['po_number']['product_size_start'].' - '.$ledger['po_number']['product_size_end'].' mm';
                if($ledger->stock_out == 1)
                {
                    $unit=Unit::find($ledger->unit_id1);
                    $qty=$ledger->truck_net_weight1*$unit->qty;
                }
                else
                {
                    $unit=Unit::find($ledger->unit_id2);
                    $qty=$ledger->truck_net_weight2*$unit->qty;
                }
                $data[$count]['qty'] = ($qty/$unit->qty).' '.$unit->name;

                $data[$count]['balance'] = $temp;
                $data[$count]['invoice_reference_number'] = $ledger['id'];
                $data[$count]['truck_number'] = $ledger['truck_no'];
                $data[$count]['narration'] = 'Invoice'/*.$ledger['invoice']['inv_number']*/;
//                dd($data);
            }

            $count++;

        }
//        dd($data);



        array_sort_by_column($data, 'created_at',SORT_DESC);


//dd($data);
        return view('vendor.voyager.customer-delivery-report.create', compact('customers','temp1','vendor_opening_balance','vendor','customer','data','brought_forward_inv', 'vendors_amount', 'brought_forward', 'invoices_amount', 'payments_and_invoices_data','start_date','end_date'));


    }

}
