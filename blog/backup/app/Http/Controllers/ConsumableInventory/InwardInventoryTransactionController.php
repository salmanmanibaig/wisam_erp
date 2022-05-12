<?php

namespace App\Http\Controllers\ConsumableInventory;

use App\ConsumableInventoryTransaction;
use App\ConsumeInventoryTransactionOpe;
use App\Http\Controllers\Controller;
use App\InvItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Descriptor\Tag\ReturnDescriptor;
use App\Factory;
use Illuminate\Support\Str;

class InwardInventoryTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin'))
        {

            $raw_inventories=ConsumableInventoryTransaction::where('transaction_type','in')->get();
        }
        elseif (Auth::user()->hasRole('supply chain'))
        {
            $raw_inventories=ConsumableInventoryTransaction::where('transaction_type','in')->whereHas('factory',function ($query){


                $query->where('name','Biotech');

            })->get();
        }elseif (Auth::user()->hasRole('lamitech'))
        {
            $raw_inventories=ConsumableInventoryTransaction::where('transaction_type','in')->whereHas('factory',function ($query){


                $query->where('name','Lamitech');

            })->get();
        }else
        {
            return redirect()->back()->with(['message'=>'You are not Authorized','alert-type'=>'error']);
        }

        foreach ($raw_inventories as $transaction)
        {
            $this->raw_inv_name($transaction);


        }
        return view('vendor.voyager.consumable_inventory_inward.browse',compact('raw_inventories'));
    }

    public function raw_inv_name($raw_inventories)
    {
        $product_name='';
        foreach ($raw_inventories->invent_transaction_ope as $key => $transaction_ope)
        {
            //
            if($key < 2)
            {
                $product_name =$product_name.', '.Str::limit($transaction_ope->inv_item->item_name,19);
                if ($key == 1)
                {
                    $product_name =$product_name. ' etc...';
                }
                if ($key == 0)
                {
                    $product_name =$transaction_ope->inv_item->item_name;
                }

            }


        }
        $raw_inventories->raw_inv_name =$product_name;
        //dd($transaction_ope->raw_inventory->object_name,$product_name);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ref_no=ConsumableInventoryTransaction::max('purchase_ref_no');
        $ref_no=$ref_no+1;
        $inv_items=InvItem::where('category_item','!=','biocos')->get();
        $factories=Factory::all();

        return view('vendor.voyager.consumable_inventory_inward.create',compact('ref_no','inv_items','factories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $check=0;
        if ($request->hasFile('vendor_invoice'))
        {
            $file = $request->file('vendor_invoice');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/consumable_raw_inventory_invoice', $name);
            $check=1;

        }
        $factory_id=($request->factory_id);
        $factory=Factory::find($factory_id);

        $max_id=ConsumableInventoryTransaction::max('purchase_ref_no');
        $max_id=$max_id+1;
        $invent_transaction=new ConsumableInventoryTransaction();
        $invent_transaction->vendor_invoice_no=$request->vendor_invoice_no;
        $invent_transaction->purchase_ref_no=$max_id;
        $invent_transaction->transaction_date=$request->transaction_date;


        $invent_transaction->remarks=$request->remarks;
        $invent_transaction->vendor_invoice=$name;
        $invent_transaction->transaction_type='in';
        $invent_transaction->save();




//      new  Product();



        foreach ($request->model as  $key=>$model)
        {


          $product=Product::where('model',$model)->find();
            if(count($product) ==0)
            {
                $product= new Product();

                $product->model=$model;
                $product->name = $request->name[$key];

            }

            //dd($item);
            $inv_item=InvItem::find($item);
            $factory=Factory::find($request->factory_id);
//            dd($inv_item);
            $operation=new ConsumeInventoryTransactionOpe();
            $operation->item_id=$item;
            $operation->item_name=$inv_item->item_name;
            $operation->transaction_id=$invent_transaction->id;
            $operation->quantity=$request->quantity[$key];
            $operation->factory_id=$request->factory_id;
            $operation->factory_name=$factory->name;
            $operation->transaction_type='in';
            $operation->save();
        }
        return redirect('admin/consumable-inventory-transactions')->with(['message'=>'Inventory added Successfully','alert-type'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consumable_inv_transaction=ConsumableInventoryTransaction::find($id);
        return view('vendor.voyager.consumable_inventory_inward.read',compact('consumable_inv_transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumable_inv_transaction=ConsumableInventoryTransaction::find($id);

        $inv_items=InvItem::where('category_item','!=','biocos')->get();
        $factories=Factory::all();
        return view('vendor.voyager.consumable_inventory_inward.edit',compact('consumable_inv_transaction','inv_items','factories'));
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
        //dd($request->all());
        $check=0;
        if ($request->hasFile('vendor_invoice'))
        {
            $file = $request->file('vendor_invoice');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/consumable_raw_inventory_invoice', $name);
            $check=1;

        }
        $factory_id=($request->factory_id);
        $factory=Factory::find($factory_id);

        $invent_transaction=ConsumableInventoryTransaction::find($id);
        $invent_transaction->vendor_invoice_no=$request->vendor_invoice_no;

        $invent_transaction->transaction_date=$request->transaction_date;

        $invent_transaction->factory_id=$request->factory_id;
        $invent_transaction->factory_name=$factory->name;
        $invent_transaction->remarks=$request->remarks;
        if ($check == 1)
        {
            $invent_transaction->vendor_invoice=$name;
        }

        $invent_transaction->transaction_type='in';
        $invent_transaction->save();
        $check_id=array();
        $i=0;
        foreach ($request->item_id as  $key=>$item)
        {
//            dd($item);
            if ($request->operation_id[$key] != null)
            {
                $check_id[$i]=$request->operation_id[$key];

                $inv_item=InvItem::find($item);
                $factory=Factory::find($request->factory_id);
//            dd($inv_item);
                $operation=ConsumeInventoryTransactionOpe::find($request->operation_id[$key]);
                $operation->item_id=$item;
                $operation->item_name=$inv_item->item_name;
                $operation->transaction_id=$invent_transaction->id;
                $operation->quantity=$request->quantity[$key];
                $operation->factory_id=$request->factory_id;
                $operation->factory_name=$factory->name;
                $operation->transaction_type='in';
                $operation->save();

                $i++;
            }else
            {
                $inv_item=InvItem::find($item);
                $factory=Factory::find($request->factory_id);
//            dd($inv_item);
                $operation=new ConsumeInventoryTransactionOpe();
                $operation->item_id=$item;
                $operation->item_name=$inv_item->item_name;
                $operation->transaction_id=$invent_transaction->id;
                $operation->quantity=$request->quantity[$key];
                $operation->factory_id=$request->factory_id;
                $operation->factory_name=$factory->name;
                $operation->transaction_type='in';
                $operation->save();

                $check_id[$i]=$operation->id;


                $i++;
            }

        }
        $data=ConsumeInventoryTransactionOpe::where('transaction_id',$id)->whereNotIn('id',$check_id)->delete();
//        dd($data);

        return redirect('admin/consumable-inventory-transactions')->with(['message'=>'Inventory added Successfully','alert-type'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
