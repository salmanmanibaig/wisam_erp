<?php

namespace App\Http\Controllers\VendorPurchase;


use App\Company;
use App\PoExpense;
use App\PoTerm;
use App\Product;
use App\StockManagment;
use App\Unit;
use App\Vendor;
use App\VendorPurchaseOrder;
use App\VendorPurchaseOrderExpense;
use App\VendorPurchaseTerm;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class VendorPurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items=VendorPurchaseOrder::all();

        return view('vendor.voyager.vendor-purchase-orders.browse',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $id= VendorPurchaseOrder::max('id');
        $id=$id+1;
        $mon=date('m').strtotime('');
        $do='VPO'.'-'.$id.'-'.$mon;



        //  dd($mon);

        $product=Product::all();
        $company=Company::all();
        $vendor= Vendor::all();


        $units=Unit::all();
        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $terms= VendorPurchaseTerm::all();



        //  dd($items);


        return view('vendor.voyager.vendor-purchase-orders.create',compact('terms','vendor_purchase_expense','units','vendor','product','do','company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $po  = new  VendorPurchaseOrder();

        if ($request->hasFile('p_attachment'))
        {
            $file = $request->file('p_attachment');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/performa_invoice/po', $name);
            $po->p_attachment=$name;
            $po->p_inv_number=$request->p_inv_number;

        }
        $po->inv_amount =$request->inv_amount;

            $po->po_number=$request->po_number;
            $po->date=$request->date;
            $po->company_id=$request->company_id;
            $po->vendor_id=$request->vendor_id;
            $po->po_type=$request->po_type;
            $po->product_id=$request->product_id;
            $po->product_size_start=$request->product_size_start;
            $po->product_size_end=$request->product_size_end;
            $po->unit_id=$request->unit_id;
            $po->qty=$request->qty;
            $po->unit_price=$request->unit_price;
            $po->save();

        $id= $po->id;
        $id=$id;
        $mon=date('m').strtotime('');
        $do='VPO'.'-'.$id.'-'.$mon;
            $po->po_number=$do;
            $po->save();

        foreach ($request->terms as $term)
            {
                $vpt=VendorPurchaseTerm::find($term);
                $data = new PoTerm();
                $data->po_id=$po->id;
                $data->term_id=$term;
                $data->term_description=$vpt->description;
                $data->save();


            }


            foreach ($request->expense_id as $key=> $expense)
            {
                $vpt=VendorPurchaseOrderExpense::find($expense);
                $data = new PoExpense();
                $data->po_id=$po->id;
                $data->expense_id=$expense;
                $data->amount=$request->amount[$key];
                $data->expense_description=$vpt->name;
                $data->save();


            }

        return redirect('admin/vendor-purchase-orders/')->with('info','Purchase Order added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       $po= VendorPurchaseOrder::find($id);

        $id=$po->id;
        $mon=date('m').strtotime('');
        $do='VPO'.'-'.$id.'-'.$mon;


        $product=Product::all();
        $company=Company::all();
        $vendor= Vendor::all();
        $warehouse= Warehouse::all();
        $units=Unit::all();
        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $terms= VendorPurchaseTerm::all();
        $stock= StockManagment::where('po_id',$po->id)->get()->count();
        $po->stock_status=$stock;
        $po->save();


        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $sub_total=$po->qty * $po->unit_price;
        $total=$sub_total;

        foreach ($po->expense as $expense)
        {



                if($expense->vendor_expense->unit == 'percent')
                {
                    $expense->amount = ($sub_total*$expense->vendor_expense->amount)/100;
                    $total=$total+$expense->amount;
                }
                else
                {
                    $expense->amount = $expense->vendor_expense->amount;
                    $total=$total+$expense->amount;
                }


        }



        return view('vendor.voyager.vendor-purchase-orders.print_view',compact('total','vendor_purchase_expense','warehouse','po','terms','vendor_purchase_expense','units','vendor','product','do','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $po= VendorPurchaseOrder::find($id);

        $id=$po->id;
        $mon=date('m').strtotime('');
        $do='VPO'.'-'.$id.'-'.$mon;


        $product=Product::all();
        $company=Company::all();
        $vendor= Vendor::all();
        $warehouse= Warehouse::all();
        $units=Unit::all();
        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $terms= VendorPurchaseTerm::all();
        $stock= StockManagment::where('po_id',$po->id)->get()->count();
        $po->stock_status=$stock;
        $po->save();

        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $sub_total=$po->qty * $po->unit_price;
        $total=$sub_total;

        foreach ($vendor_purchase_expense as $expense)
        {
           $data= PoExpense::where('po_id',$po->id)->where('expense_id',$expense->id)->first();

           if($data)
           {

               $expense->selected = 1;
               if($expense->unit == 'percent')
               {
                   $expense->selected_amount = ($sub_total*$expense->amount)/100;
                   $total=$total+$expense->selected_amount;
               }
               else
               {
                   $expense->selected_amount = $expense->amount;
                   $total=$total+$expense->selected_amount;
               }

           }
        }



        return view('vendor.voyager.vendor-purchase-orders.detail_browse',compact('total','vendor_purchase_expense','warehouse','po','terms','vendor_purchase_expense','units','vendor','product','do','company'));
    }



    public function view($id)
    {

        $po= VendorPurchaseOrder::find($id);

        $id=$po->id;
        $mon=date('m').strtotime('');
        $do='VPO'.'-'.$id.'-'.$mon;


        $product=Product::all();
        $company=Company::all();
        $vendor= Vendor::all();
        $warehouse= Warehouse::all();
        $units=Unit::all();
        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $terms= VendorPurchaseTerm::all();
        $stock= StockManagment::where('po_id',$po->id)->get()->count();
        $po->stock_status=$stock;
        $po->save();

        $vendor_purchase_expense= VendorPurchaseOrderExpense::all();
        $sub_total=$po->qty * $po->unit_price;
        $total=$sub_total;

        foreach ($vendor_purchase_expense as $expense)
        {
            $data= PoExpense::where('po_id',$po->id)->where('expense_id',$expense->id)->first();

            if($data)
            {

                $expense->selected = 1;
                if($expense->unit == 'percent')
                {
                    $expense->selected_amount = ($sub_total*$expense->amount)/100;
                    $total=$total+$expense->selected_amount;
                }
                else
                {
                    $expense->selected_amount = $expense->amount;
                    $total=$total+$expense->selected_amount;
                }

            }
        }



        return view('vendor.voyager.vendor-purchase-orders.read',compact('total','vendor_purchase_expense','warehouse','po','terms','vendor_purchase_expense','units','vendor','product','do','company'));
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
//        dd($request->all(),$id);
        $po  =   VendorPurchaseOrder::find($id);
        $po->po_number= $request->po_number;
        $po->date= $po->created_at;
        $po->company_id=$request->company_id;
        $po->vendor_id=$request->vendor_id;
        $po->inv_amount =$request->inv_amount;
//        $po->warehouse_id=$request->warehouse_id;
//        $po->po_type=$request->po_type;
        $po->product_id=$request->product_id;
        $po->product_size_start=$request->product_size_start;
        $po->product_size_end=$request->product_size_end;
        $po->unit_id=$request->unit_id;
        $po->qty=$request->qty;
        $po->unit_price=$request->unit_price;
        $po->save();

        PoTerm::where('po_id',$po->id)->delete();


        foreach ($request->terms as $term)
        {
            $vpt=VendorPurchaseTerm::find($term);
            $data = new PoTerm();
            $data->po_id=$po->id;
            $data->term_id=$term;
            $data->term_description=$vpt->description;
            $data->save();


        }


        PoExpense::where('po_id',$po->id)->delete();

        foreach ($request->expense_id as $key=> $expense)
        {
            $vpt=VendorPurchaseOrderExpense::find($expense);
            $data = new PoExpense();
            $data->po_id=$po->id;
            $data->expense_id=$expense;
            $data->amount=$request->amount[$key];
            $data->expense_description=$vpt->name;
            $data->save();


        }

        if($po->po_type != 'international')
        {
            if($request->add_stock  == 1 && $po->stock_status == 0)
            {

                $stock=  new StockManagment();
                $stock->warehouse_id=$request->warehouse_id;
                $stock->company_id=$request->company_id;
                $unit=Unit::find($request->unit_id);
                $stock->stock_in=$request->qty*$unit->qty;
                $stock->stock_type="purchase";
                $stock->po_id=$po->id;
                $stock->product_id=$po->product_id;
                $stock->po_number=$po->po_number;
                $stock->import_type=$po->po_type;
                $stock->save();

                $po->stock_status=1;
                $po->status=1;
                $po->save();
            }
            else if($po->stock_status == 1)
            {
                $stock=  StockManagment::where('po_id',$id)->first();
                $stock->company_id=$request->company_id;
                $stock->product_id=$po->product_id;
                $unit=Unit::find($request->unit_id);
                $stock->stock_in=$request->qty*$unit->qty;
                $stock->import_type=$po->po_type;
                $stock->save();

                $po->stock_status=1;
                $po->status=1;
                $po->save();
            }
        }


        return redirect('admin/vendor-purchase-orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
//        dd($request->all());
       VendorPurchaseOrder::find($request->deleteid)->delete();
       PoTerm::where('po_id',$request->deleteid)->delete();

        return redirect()->back();
    }


    public function complete($id)
    {
        $po= VendorPurchaseOrder::find($id);
        $po->status=1;
        $po->save();
        return redirect()->back();
    }
}
