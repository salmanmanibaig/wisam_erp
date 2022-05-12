<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use App\CustomerPurchaseOrder;
use App\DeliveryOrder;
use App\Product;
use App\StockManagment;
use App\Transporter;
use App\Unit;
use App\Vendor;
use App\VendorPurchaseOrder;
use App\VendorPurchaseOrderExpense;
use App\VendorPurchaseTerm;
use App\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $do=DeliveryOrder::all();

        return view('vendor.voyager.delivery-orders.browse',compact('do'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id= DeliveryOrder::max('id');
        $id=$id+1;
        $mon=date('m').strtotime('');
        $do='DO'.'-'.$id.'-'.$mon;



        $product=Product::all();
        $cp_orders=CustomerPurchaseOrder::where('status',0)->get();

        foreach ($cp_orders as $order)
        {
              $order->sent_qty=  StockManagment::where('po_id',$order->id)->where('stock_type','sell')->get()->sum('stock_out')/1000;


        }

        $transports=Transporter::all();

        $company=Company::all();
        $warehouse=Warehouse::all();
        $customer= Customer::all();
        $units=Unit::all();
        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $terms= VendorPurchaseTerm::all();



        //  dd($items);


        return view('vendor.voyager.delivery-orders.create',compact('warehouse','transports','cp_orders','terms','vendor_purchase_expense','units','customer','product','do','company'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//                dd($request->all());
            $do=   new DeliveryOrder();

            $do->do_number=$request->do_number;
            $do->date=$request->date;
            $do->po_id=$request->po_id;
            $do->truck_no=$request->truck_no;
            $do->date=date('Y-m-d h:i:s');
            $do->stock_out=$request->stock_out;
            $do->warehouse_id=$request->warehouse_id;
        if ($request->hasFile('bilty_attachment'))
        {
            $file = $request->file('bilty_attachment');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/delivery/bilty', $name);
            $do->bilty_attachment=$name;
            $do->bilty_number=$request->bilty_number;
        }


            $do->weight_calculate_company1=$request->weight_calculate_company1;
            $do->truck_preload_weight1=$request->truck_preload_weight1;
            $do->truck_post_load_weight1=$request->truck_post_load_weight1;
            $do->truck_net_weight1=$request->truck_net_weight1;
            $do->unit_id1=$request->unit_id1;
        if ($request->hasFile('attachment1'))
        {
            $file = $request->file('attachment1');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/delivery/wbridge', $name);
            $do->attachment1=$name;

        }





            $do->weight_calculate_company2=$request->weight_calculate_company2;
            $do->truck_preload_weight2=$request->truck_preload_weight2;
            $do->truck_post_load_weight2=$request->truck_post_load_weight2;
            $do->truck_net_weight2=$request->truck_net_weight2;
            $do->unit_id2=$request->unit_id2;
            $do->attachment2=$request->attachment2;

        if ($request->hasFile('attachment2'))
        {
            $file = $request->file('attachment2');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/delivery/wbridge', $name);
            $do->attachment2=$name;

        }

        $do->save();


        $id= $do->id;
        $id=$id;
        $mon=date('m').strtotime('');
        $dos='DO'.'-'.$id.'-'.$mon;
        $do->do_number=$dos;
        $do->save();

        if($request->stock_out == 1)
        {
            $unit=Unit::find($request->unit_id1);
            $qty=$request->truck_net_weight1*$unit->qty;
        }
        else
        {
            $unit=Unit::find($request->unit_id2);
            $qty=$request->truck_net_weight2*$unit->qty;
        }


            $stock=  new StockManagment();
            $stock->warehouse_id=$request->warehouse_id;
            $stock->company_id=$request->company_id;
            $stock->stock_out=$qty;
            $stock->stock_type="sell";
            $stock->do_id=$do->id;
            $stock->po_id=$request->po_id;
            $stock->product_id=$do->po_number->product->id;
            $stock->save();

            return redirect('admin/delivery-orders');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $delivery_order = DeliveryOrder::find($id);


        $cp_orders=CustomerPurchaseOrder::where('status',0)->get();

        foreach ($cp_orders as $order)
        {
            $order->sent_qty=  StockManagment::where('po_id',$order->id)->where('stock_type','sell')->get()->sum('stock_out')/1000;
            $order->sent_qty= $order->sent_qty -  StockManagment::where('po_id',$order->id)->where('do_id',$delivery_order->id)->where('stock_type','sell')->get()->sum('stock_out')/1000;


        }

        $transports=Transporter::all();

        $company=Company::all();
        $warehouse=Warehouse::all();
        $customer= Customer::all();
        $units=Unit::all();
        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $terms= VendorPurchaseTerm::all();


        return view('vendor.voyager.delivery-orders.read',compact('delivery_order','warehouse','transports','cp_orders','terms','vendor_purchase_expense','units','customer','company'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



           $delivery_order = DeliveryOrder::find($id);


        $cp_orders=CustomerPurchaseOrder::where('status',0)->get();

        foreach ($cp_orders as $order)
        {
            $order->sent_qty=  StockManagment::where('po_id',$order->id)->where('stock_type','sell')->get()->sum('stock_out')/1000;
            $order->sent_qty= $order->sent_qty -  StockManagment::where('po_id',$order->id)->where('do_id',$delivery_order->id)->where('stock_type','sell')->get()->sum('stock_out')/1000;


        }

        $transports=Transporter::all();

        $company=Company::all();
        $warehouse=Warehouse::all();
        $customer= Customer::all();
        $units=Unit::all();
        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $terms= VendorPurchaseTerm::all();



        //  dd($items);


        return view('vendor.voyager.delivery-orders.edit',compact('delivery_order','warehouse','transports','cp_orders','terms','vendor_purchase_expense','units','customer','company'));

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


        $do=  DeliveryOrder::find($id);



        $do->po_id=$request->po_id;
        $do->truck_no=$request->truck_no;
        $do->date=date('Y-m-d h:i:s');
        $do->stock_out=$request->stock_out;
        $do->warehouse_id=$request->warehouse_id;
        if ($request->hasFile('bilty_attachment'))
        {
            $file = $request->file('bilty_attachment');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/delivery/bilty', $name);
            $do->bilty_attachment=$name;
            $do->bilty_number=$request->bilty_number;
        }


        $do->weight_calculate_company1=$request->weight_calculate_company1;
        $do->truck_preload_weight1=$request->truck_preload_weight1;
        $do->truck_post_load_weight1=$request->truck_post_load_weight1;
        $do->truck_net_weight1=$request->truck_net_weight1;
        $do->unit_id1=$request->unit_id1;
        if ($request->hasFile('attachment1'))
        {
            $file = $request->file('attachment1');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/delivery/wbridge', $name);
            $do->attachment1=$name;

        }





        $do->weight_calculate_company2=$request->weight_calculate_company2;
        $do->truck_preload_weight2=$request->truck_preload_weight2;
        $do->truck_post_load_weight2=$request->truck_post_load_weight2;
        $do->truck_net_weight2=$request->truck_net_weight2;
        $do->unit_id2=$request->unit_id2;
        $do->attachment2=$request->attachment2;

        if ($request->hasFile('attachment2'))
        {
            $file = $request->file('attachment2');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/delivery/wbridge', $name);
            $do->attachment2=$name;

        }




        if($request->stock_out == 1)
        {
            $unit=Unit::find($request->unit_id1);
            $qty=$request->truck_net_weight1*$unit->qty;
        }
        else
        {
            $unit=Unit::find($request->unit_id2);
            $qty=$request->truck_net_weight2*$unit->qty;
        }

        $do->save();

        $stock= StockManagment::where('do_id',$id)->first();
        $stock->warehouse_id=$request->warehouse_id;
        $stock->company_id=$request->company_id;
        $stock->stock_out=$qty;
        $stock->stock_type="sell";
        $stock->do_id=$do->id;
        $stock->po_id=$request->po_id;
        $stock->product_id=$do->po_number->product->id;
        $stock->save();



        return redirect('admin/delivery-orders');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


        DeliveryOrder::find($request->deleteid)->delete();
        return redirect()->back();



    }
}
