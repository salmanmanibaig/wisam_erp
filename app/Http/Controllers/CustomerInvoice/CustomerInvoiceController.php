<?php

namespace App\Http\Controllers\CustomerInvoice;

use App\Customer;
use App\CustomerPurchaseOrder;
use App\DeliveryOrder;
use App\Http\Controllers\Controller;
use App\InvItem;
use App\InvItemsUom;
use App\Product;
use App\SupplyCustomerInvoice;
use App\SupplyCustomerInvoiceDetail;
use App\SupplyInvoice;
use App\SupplyInvoiceDetail;
use App\SupplyStock;
use App\SupplyStockStore;
use App\Vendor;
use App\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;

class CustomerInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $invoice = SupplyCustomerInvoice::with('invoice_details')->get();

        return view('vendor.voyager.supply-customer-invoice.browse',compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $delivery_order = DeliveryOrder::all();
        $delivery_order = DeliveryOrder::where('approval_status',0)->get();
        $customer = Customer::all();
//        $products = InvItem::where('category_item','!=','biocos')->get();
        $products = InvItem::where('category_item','!=','biocos')->get();
        $stockStore = Warehouse::all();
        $invoice_ref_number = SupplyCustomerInvoice::max('reference_number')+1;
        return view('vendor.voyager.supply-customer-invoice.create',compact('customer','products','stockStore','invoice_ref_number','delivery_order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //            ========================== Direct Invoice =============================================

        $invoice = new SupplyCustomerInvoice();
        $invoice->customer_id = $request->customer;
        $invoice->customer_id = $request->customer;
        $invoice->remarks = $request->remarks;
        $invoice->customer_name = Customer::find($request->customer)->name;
        $invoice->reference_number = SupplyCustomerInvoice::max('reference_number')+1;
        $invoice->invoiceNumber = $request->invoiceNumber;
        $invoice->date = Carbon::parse($request->date)->format('y-m-d H:i:s');


        $invoice->expense_total = $request->expense_total;
        $invoice->gst_total = $request->gst_total;
        $invoice->inv_total = $request->grand_total;
        $invoice->status = 'complete';
        $invoice->save();


        foreach ($request->do_id as $key => $do_id) {

            $item_name = "item_name".($key+1);
            $item_id = "item_id".($key+1);
            $item_uom = "item_uom".($key+1);
            $item_uom_id = "item_uom_id".($key+1);
            $item_category = "item_category".($key+1);
            $item_qty = "item_qty".($key+1);
            $item_price = "item_price".($key+1);
            $sub_total = "sub_total".($key+1);

            $details = new SupplyCustomerInvoiceDetail();
            $details->do_id = $do_id;
            $details->invoice_id = $invoice->id;
            $details->product_name = $request->$item_name;
            $details->product_id = $request->$item_id;
            $details->customer_id = $request->customer;
            $details->customer_name = Customer::find($request->customer)->name;
            $details->date = Carbon::parse($request->date)->format('y-m-d H:i:s');
            $details->uom_id = $request->$item_uom_id;
            $details->uom = $request->$item_uom;
            $details->category = $request->$item_category;
            $details->price = $request->$item_price;
            $details->quantity = $request->$item_qty;
            $details->total = $request->$sub_total;
            $details->status = 'complete';
            $details->save();

            DeliveryOrder::find($do_id)->update(['approval_status'=>1]);



        }
        return redirect('/admin/customer-invoice');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::all();
        $invoice = SupplyCustomerInvoice::with('invoice_details')->find($id);
        $delivery_order = DeliveryOrder::where('approval_status',0)->where('customer_id',$invoice->customer_id)->get();
        return view('vendor.voyager.supply-customer-invoice.read',compact('invoice','customer','delivery_order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $customer = Customer::all();
        $invoice = SupplyCustomerInvoice::with('invoice_details')->find($id);


        $delivery_order = DeliveryOrder::where('customer_id',$invoice->customer_id)
            ->get();

        return view('vendor.voyager.supply-customer-invoice.edit',compact('invoice','customer','delivery_order'));
    }


    public function prints($id)
    {
//        dd($id);

        $invoice = SupplyCustomerInvoice::with('invoice_details')->find($id);


        $delivery_order = DeliveryOrder::where('customer_id',$invoice->customer_id)
            ->get();


        return view('vendor.voyager.supply-customer-invoice.invoice1',compact('invoice','delivery_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//                dd($request->all());
        $invoice = SupplyCustomerInvoice::find($id);
        $invoice->customer_id = $request->customer;
        $invoice->customer_id = $request->customer;
        $invoice->remarks = $request->remarks;
        $invoice->customer_name = Customer::find($request->customer)->name;
        $invoice->reference_number = SupplyCustomerInvoice::max('reference_number')+1;
        $invoice->invoiceNumber = $request->invoiceNumber;
        $invoice->date = Carbon::parse($request->date)->format('y-m-d H:i:s');
        $invoice->inv_total = $request->grand_total;
        if($request->gst == 1)
        {
            $invoice->gst = $request->gst;
        }
        else
        {
            $invoice->gst = 0;
        }
        $invoice->status = 'complete';
        $invoice->save();

        $arr = array();
        $i = 0;

        foreach ($request->do_id as $key => $do_id) {

            $item_name = "item_name".($key+1);
            $item_id = "item_id".($key+1);
            $item_uom = "item_uom".($key+1);
            $item_uom_id = "item_uom_id".($key+1);
            $item_category = "item_category".($key+1);
            $item_qty = "item_qty".($key+1);
            $item_price = "item_price".($key+1);
            $sub_total = "sub_total".($key+1);

            if($request->detail_id[$key] == 0)
            {
                $details = new SupplyCustomerInvoiceDetail();
                $details->do_id = $do_id;
                $details->invoice_id = $invoice->id;
                $details->product_name = $request->$item_name;
                $details->product_id = $request->$item_id;
                $details->customer_id = $request->customer;
                $details->customer_name = Customer::find($request->customer)->name;
                $details->date = Carbon::parse($request->date)->format('y-m-d H:i:s');
                $details->uom_id = $request->$item_uom_id;
                $details->uom = $request->$item_uom;
                $details->category = $request->$item_category;
                $details->price = $request->$item_price;
                $details->quantity = $request->$item_qty;
                $details->total = $request->$sub_total;
                $details->status = 'complete';
                $details->save();
                $arr[$i] = $details->id;
                $i++;
            }else{
                $details = SupplyCustomerInvoiceDetail::find($request->detail_id[$key]);
                $details->do_id = $do_id;
                $details->invoice_id = $invoice->id;
                $details->product_name = $request->$item_name;
                $details->product_id = $request->$item_id;
                $details->customer_id = $request->customer;
                $details->customer_name = Customer::find($request->customer)->name;
                $details->date = Carbon::parse($request->date)->format('y-m-d H:i:s');
                $details->uom_id = $request->$item_uom_id;
                $details->uom = $request->$item_uom;
                $details->category = $request->$item_category;
                $details->price = $request->$item_price;
                $details->quantity = $request->$item_qty;
                $details->total = $request->$sub_total;
                $details->status = 'complete';
                $details->save();
                $arr[$i] = $details->id;
                $i++;
            }
        }
        SupplyCustomerInvoiceDetail::where('invoice_id',$id)->whereNotIn('id',$arr)->delete();
        return redirect('/admin/customer-invoice/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $invoice = SupplyCustomerInvoice::with('invoice_details')->find($request->deleteid)->delete();
        SupplyCustomerInvoiceDetail::where('invoice_id',$request->deleteid)->delete();
        return redirect('/admin/customer-invoice/');
    }
    public function customer_details($id){
        $pending_delivery_orders = DeliveryOrder::where('customer_id',$id)->where('approval_status',0)->get();

        return json_decode($pending_delivery_orders);
    }
    public function customer_purchase_order_details(Request $request, $id){


        $delivery_order = DeliveryOrder::find($request->do_id);

        $customer_po_details = CustomerPurchaseOrder::with('unit')->find($delivery_order->po_id);
        $product = Product::find($customer_po_details->product_id);

        return response()->json([
            'do' => $delivery_order,
            'item' => $product,
            'po' => $customer_po_details,
            'req' => (int)$request->do_id
        ]);
    }
    public function invoiceProduct($id)
    {
//        $products = DB::table('inv_items')->with('itemUom')->
        $products = Product::with('itemUom')->where('id', '=', $id)->orderBy('id', 'DESC')->get();

        return response()->json($products);
    }
}
