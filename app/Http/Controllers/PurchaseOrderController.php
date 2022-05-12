<?php

namespace App\Http\Controllers;




use App\BuyerName;
use App\Department;
use App\Driver;
use App\PurchaseOrder;
use App\PurchaseOrderItem;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=PurchaseOrder::with('purchase_order_item')->get();

        return view('vendor.voyager.purchase-orders.browse',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Respon
     */
    public function create()
    {
        $id= PurchaseOrder::max('do_number');
        $id=$id+1100;
        $mon=date('m').strtotime('');
        $do='DO'.'-'.$id.'-'.$mon;

       $buyers= BuyerName::all();
       $departments= Department::all();

       $drivers=Driver::all();


        //  dd($mon);


        //  dd($items);


        return view('vendor.voyager.purchase-orders.create',compact('drivers','id','buyers','departments'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request;

//        dd($request->all());



        $purchase_order= new PurchaseOrder();

        $purchase_order->buyer_id=$request->buyer_id;
        $purchase_order->do_number=$request->do_number;
        $purchase_order->do_date=$request->do_date;
        $purchase_order->po_number=$request->po_number;
        $purchase_order->po_date=$request->po_date;
        $purchase_order->department_id=$request->department_id;
        $purchase_order->vehicle=$request->vehicle;
        $purchase_order->vehicle_no=$request->vehicle_no;
        $purchase_order->remarks=$request->note_remarks;
        $purchase_order->driver_name=$request->driver_name;


        $purchase_order->save();


        foreach ($request->product_name as $key=> $name)
        {
            $purchase_item = new PurchaseOrderItem();
            $purchase_item->product_name = $name;
            $purchase_item->po_id = $purchase_order->id;
            $purchase_item->qty = $request->qty[$key];
            $purchase_item->remarks = $request->qty[$key];
            $purchase_item->save();

        }





            return redirect('admin/purchase-orders/')->with('info','Delivery Chalan added Successfully');



    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {

        $purchase_order=PurchaseOrder::find($id);

        $buyers= BuyerName::all();
        $departments= Department::all();

        //
        return view('vendor.voyager.purchase-orders.read',compact('purchase_order','departments','buyers'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $purchase_order=PurchaseOrder::find($id);

        $buyers= BuyerName::all();
        $departments= Department::all();
        $drivers=Driver::all();
        //
        return view('vendor.voyager.purchase-orders.edit',compact('drivers','purchase_order','departments','buyers'));
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



        $purchase_order= PurchaseOrder::find($id);

        $purchase_order->buyer_id=$request->buyer_id;
        $purchase_order->do_number=$request->do_number;
        $purchase_order->do_date=$request->do_date;
        $purchase_order->po_number=$request->po_number;
        $purchase_order->po_date=$request->po_date;
        $purchase_order->department_id=$request->department_id;
        $purchase_order->vehicle=$request->vehicle;
        $purchase_order->vehicle_no=$request->vehicle_no;
        $purchase_order->remarks=$request->note_remarks;
        $purchase_order->driver_name=$request->driver_name;


        $purchase_order->save();



        PurchaseOrderItem::where('po_id',$id)->delete();
        foreach ($request->product_name as $key=> $name)
        {
            $purchase_item = new PurchaseOrderItem();
            $purchase_item->product_name = $name;
            $purchase_item->po_id = $purchase_order->id;
            $purchase_item->qty = $request->qty[$key];
            $purchase_item->remarks = $request->remarks[$key];
            $purchase_item->save();

        }


        return redirect('admin/purchase-orders/')->with('info','Delivery Chalan Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        PurchaseOrderItem::select('id')->where('po_id','=',$request->deleteid)->delete();
        PurchaseOrder::where('id','=',$request->deleteid)->delete();


        return redirect('admin/purchase-orders')->with('danger','Deleted Scucessfully');


    }

    public function dest(Request $request,$id)
    {






        PurchaseOrderItem::where('id','=',$request->deleteid)->delete();

        return redirect()->back()->with('danger','Deleted Scucessfully');










    }


}
