<?php

namespace App\Http\Controllers\CustomerPurchase;

use App\CommissionAgent;
use App\Company;
use App\CpoComAgent;
use App\CpoExpense;
use App\CpoTerm;
use App\Customer;
use App\CustomerPurchaseOrder;
use App\CustomerPurchaseOrderExpense;
use App\CustomerPurchaseTerm;
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


class CustomerPurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $items=CustomerPurchaseOrder::all();

    return view('vendor.voyager.customer-purchase-orders.browse',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $id= CustomerPurchaseOrder::max('id');
        $id=$id+1;
        $mon=date('m').strtotime('');
        $do='CPO'.'-'.$id.'-'.$mon;



        //  dd($mon);

        $product=Product::all();
        $company=Company::all();
        $customer= Customer::all();
        $units=Unit::all();
        $customer_purchase_expense= CustomerPurchaseOrderExpense::all();
        $terms= CustomerPurchaseTerm::all();
        $commission_agents = CommissionAgent::all();



        //  dd($items);


        return view('vendor.voyager.customer-purchase-orders.create',compact('commission_agents','terms','customer_purchase_expense','units','customer','product','do','company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $po  = new  CustomerPurchaseOrder();

        if ($request->hasFile('cpo_attachment'))
        {
            $file = $request->file('cpo_attachment');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/customer/po', $name);
            $po->cpo_attachment=$name;
            $po->cpo_number=$request->cpo_number;

        }


        $po->po_number=$request->po_number;
        $po->date=$request->date;
        $po->company_id=$request->company_id;
        $po->customer_id=$request->customer_id;

        $po->product_id=$request->product_id;
        $po->product_size_start=$request->product_size_start;
        $po->product_size_end=$request->product_size_end;
        $po->unit_id=$request->unit_id;
        $po->qty=$request->qty;
        $po->unit_price=$request->unit_price;
        $po->save();

        foreach ($request->terms as $term)
        {
            $vpt=CustomerPurchaseTerm::find($term);
            $data = new CpoTerm();
            $data->po_id=$po->id;
            $data->term_id=$term;
            $data->term_description=$vpt->description;
            $data->save();


        }


        foreach ($request->expense_id as $key=> $expense)
        {
            $vpt=CustomerPurchaseOrderExpense::find($expense);
            $data = new CpoExpense();
            $data->po_id=$po->id;
            $data->expense_id=$expense;
            $data->amount=$request->amount[$key];
            $data->expense_description=$vpt->name;
            $data->save();


        }   foreach ($request->commission_agent as $key=> $agent)
        {
            $cagent=CommissionAgent::find($agent);
            $data = new CpoComAgent();
            $data->po_id=$po->id;
            $data->name=$cagent->name;
            $data->percent=$request->commission_percent[$key];
            $data->agent_id=$agent;
            $data->save();


        }

        return redirect('admin/customer-purchase-orders/')->with('info','Purchase Order added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $po= CustomerPurchaseOrder::find($id);

        $id=$po->id;
        $mon=date('m').strtotime('');
        $do='CPO'.'-'.$id.'-'.$mon;


        $product=Product::all();
        $company=Company::all();
        $customer= Customer::all();
        $warehouse= Warehouse::all();
        $units=Unit::all();




        $sub_total=$po->qty * $po->unit_price;
        $total=$sub_total;

        foreach ($po->expense as $expense)
        {



            if($expense->customer_expense->unit == 'percent')
            {
                $expense->amount = ($sub_total*$expense->customer_expense->amount)/100;
                $total=$total+$expense->amount;
            }
            else
            {
                $expense->amount = $expense->customer_expense->amount;
                $total=$total+$expense->amount;
            }


        }



        return view('vendor.voyager.customer-purchase-orders.print_view',compact('total','po','units','customer','product','do','company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $po= CustomerPurchaseOrder::find($id);

        $id=$po->id;
        $mon=date('m').strtotime('');
        $do='CPO'.'-'.$id.'-'.$mon;

        $product=Product::all();
        $company=Company::all();
        $customer= Customer::all();
        $units=Unit::all();

        $terms= CustomerPurchaseTerm::all();
        $commission_agents = CommissionAgent::all();



        $warehouse= Warehouse::all();


        $stock= StockManagment::where('po_id',$po->id)->get()->count();
        $po->stock_status=$stock;
        $po->save();

        $customer_purchase_expense= CustomerPurchaseOrderExpense::all();
        $sub_total=$po->qty * $po->unit_price;
        $total=$sub_total;

        foreach ($customer_purchase_expense as $expense)
        {
            $data= CpoExpense::where('po_id',$po->id)->where('expense_id',$expense->id)->first();

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

        $percent=array();

        foreach ($commission_agents as $agents)
        {
            $data= CpoComAgent::where('po_id',$po->id)->where('agent_id',$agents->id)->first();



            if($data)
            {

                $agents->selected = 1;
                $percent[]= $data->percent;

            }
        }





        return view('vendor.voyager.customer-purchase-orders.detail_browse',compact('percent','commission_agents','total','customer_purchase_expense','warehouse','po','terms','units','customer','product','do','company'));
    }



    public function view($id)
    {
        $po= VendorPurchaseOrder::find($id);

        $id=$po->id;
        $mon=date('m').strtotime('');
        $do='VPO'.'-'.$id.'-'.$mon;


        $product=Product::all();
        $company=Company::all();
        $customer= Vendor::all();
        $warehouse= Warehouse::all();
        $units=Unit::all();
        $customer_purchase_expense= VendorPurchaseOrderExpense::all();
        $terms= VendorPurchaseTerm::all();
        $stock= StockManagment::where('po_id',$po->id)->get()->count();
        $po->stock_status=$stock;
        $po->save();

        $customer_purchase_expense= VendorPurchaseOrderExpense::all();
        $sub_total=$po->qty * $po->unit_price;
        $total=$sub_total;

        foreach ($customer_purchase_expense as $expense)
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



        return view('vendor.voyager.customer-purchase-orders.read',compact('total','vendor_purchase_expense','warehouse','po','terms','vendor_purchase_expense','units','vendor','product','do','company'));
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
        $po  =   CustomerPurchaseOrder::find($id);

        if ($request->hasFile('cpo_attachment'))
        {
            $file = $request->file('cpo_attachment');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/customer/po', $name);
            $po->cpo_attachment=$name;
            $po->cpo_number=$request->cpo_number;

        }




        $po->company_id=$request->company_id;
        $po->customer_id=$request->customer_id;

        $po->product_id=$request->product_id;
        $po->product_size_start=$request->product_size_start;
        $po->product_size_end=$request->product_size_end;
        $po->unit_id=$request->unit_id;
        $po->qty=$request->qty;
        $po->unit_price=$request->unit_price;
        $po->save();

        CpoTerm::where('po_id',$id)->delete();
        foreach ($request->terms as $term)
        {
            $vpt=CustomerPurchaseTerm::find($term);
            $data = new CpoTerm();
            $data->po_id=$po->id;
            $data->term_id=$term;
            $data->term_description=$vpt->description;
            $data->save();


        }

        CpoExpense::where('po_id',$id)->delete();
        foreach ($request->expense_id as $key=> $expense)
        {
            $vpt=CustomerPurchaseOrderExpense::find($expense);
            $data = new CpoExpense();
            $data->po_id=$po->id;
            $data->expense_id=$expense;
            $data->amount=$request->amount[$key];
            $data->expense_description=$vpt->name;
            $data->save();


        }
        CpoComAgent::where('po_id',$id)->delete();

        foreach ($request->commission_agent as $key=> $agent)

        {
        $cagent=CommissionAgent::find($agent);
        $data = new CpoComAgent();
        $data->po_id=$po->id;
        $data->name=$cagent->name;
        $data->percent=$request->commission_percent[$key];
        $data->agent_id=$agent;
        $data->save();


    }




        return redirect('admin/customer-purchase-orders');
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
}
