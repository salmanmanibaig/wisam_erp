<?php

namespace App\Http\Controllers\ConsumableInventory;

use App\ConsumableInventoryTransaction;
use App\ConsumeInventoryTransactionOpe;
use App\Factory;
use App\Http\Controllers\Controller;
use App\InvItem;
use App\Traits\LaminatioHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class OutwardInventoryTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use LaminatioHelper;
    public function index()
    {
        if (Auth::user()->hasRole('admin'))
        {

            $raw_inventories=ConsumableInventoryTransaction::where('transaction_type','out')->get();
        }
        elseif (Auth::user()->hasRole('supply chain'))
        {
            $raw_inventories=ConsumableInventoryTransaction::where('transaction_type','out')->whereHas('factory',function ($query){


                $query->where('name','Biotech');

            })->get();
        }elseif (Auth::user()->hasRole('lamitech'))
        {
            $raw_inventories=ConsumableInventoryTransaction::where('transaction_type','out')->whereHas('factory',function ($query){


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
        $factories=Factory::all();
//        dd($factories);
        return view('vendor.voyager.consumable_inventory_outward.browse',compact('raw_inventories','factories'));
    }
    public function raw_inv_name($raw_inventories)
    {
        $product_name='';
        foreach ($raw_inventories->invent_transaction_ope as $key => $transaction_ope)
        {
            //
            if($key < 2)
            {
                $product_name =$product_name.', '.str_limit($transaction_ope->inv_item->item_name,19);
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
    public function create_by_factory(Request $request)
    {
//        dd($request->all());
        $ref_no=ConsumableInventoryTransaction::max('out_ref_no');
        $ref_no=$ref_no+1;
        $inv_items=InvItem::where('category_item','!=','biocos')->get();
        $factories=Factory::all();
        foreach ($inv_items as $item)
        {
            $stock=$this->consumableRawStockInHandById($item->id,$request->factory_id);
            $item->stock_in_hand=$stock;
        }

        return view('vendor.voyager.consumable_inventory_outward.create',compact('request','ref_no','inv_items','factories'));
    }
    public function create(Request $request)
    {
//        dd($request->all());
//        $ref_no=ConsumableInventoryTransaction::max('out_ref_no');
//        $ref_no=$ref_no+1;
//        $inv_items=InvItem::where('category_item','!=','biocos')->get();
//        $factories=Factory::all();

//        return view('vendor.voyager.consumable_inventory_outward.create',compact('ref_no','inv_items','factories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $inv_items=$request->item_id;
        $quantity=$request->quantity;
//        dd($request->all());
//        foreach ($inv_items as $key=>$item)
//        {
////            dd($item,$quantity[$key]);
//            $stock_check=$this->consumable_raw_stock_check($item,$quantity[$key],$request->factory_id);
//
//        }


            $check=0;
            if ($request->hasFile('vendor_invoice'))
            {
                $file = $request->file('vendor_invoice');
                $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                $name = $timestamp. '-' .$file->getClientOriginalName();

                $file->move(public_path().'/images/consumable_raw_inventory_out', $name);
                $check=1;

            }
            $factory_id=($request->factory_id);
            $factory=Factory::find($factory_id);

            $max_id=ConsumableInventoryTransaction::max('out_ref_no');
            $max_id=$max_id+1;
            $invent_transaction=new ConsumableInventoryTransaction();

            $invent_transaction->out_ref_no=$max_id;
            $invent_transaction->transaction_date=$request->transaction_date;

            $invent_transaction->factory_id=$request->factory_id;
            $invent_transaction->factory_name=$factory->name;
            $invent_transaction->remarks=$request->remarks;
            if ($check == 1)
            {
                $invent_transaction->vendor_invoice=$name;
            }

            $invent_transaction->transaction_type='out';
            $invent_transaction->save();
//        dd($request->all());
            foreach ($request->item_id as  $key=>$item)
            {
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
                $operation->transaction_type='out';
                $operation->save();
            }
            return redirect('admin/consume-inventory-outwards')->with(['message'=>'Outward added Successfully','alert-type'=>'success']);

    }


    public function consumable_raw_stock_check($id,$quantity,$factory_id)
    {


        $inv_item=InvItem::find($id);

//        dd($inv_item);
        $temp=1;
        $arr=[];
        $arr['status']='1';
        $arr['item_name']='';
        foreach($inv_item->consumable_inv_ope as $key=> $consumable_inv_ope)
        {
            dd($consumable_inv_ope,$factory_id);
            $stock=$this->consumableRawStockInHandById($consumable_inv_ope->item_id,$factory_id);
             $inv_item->stock_in_hand=$stock;
            dd($inv_item);
            if (($stock ) < $quantity)
            {
                $temp=0;
                $arr['status']=$temp;
                $arr['item_name']=$consumable_inv_ope->inv_item->item_name . ' Stock = '.$stock ." ". $consumable_inv_ope->inv_item->uom;
            }


        }

        return $arr;



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        dd('a');
        $consumable_inv_transaction=ConsumableInventoryTransaction::find($id);
        return view('vendor.voyager.consumable_inventory_outward.read',compact('consumable_inv_transaction'));
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
//        dd($consumable_inv_transaction);
        $inv_items=InvItem::where('category_item','!=','biocos')->get();
        $factories=Factory::all();
        foreach ($inv_items as $item)
        {
            $stock=$this->consumableRawStockInHandById($item->id,$consumable_inv_transaction->factory_id);
            $item->stock_in_hand=$stock;
        }
        return view('vendor.voyager.consumable_inventory_outward.edit',compact('consumable_inv_transaction','inv_items','factories'));

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
//        dd($request->all());
        $check=0;
        if ($request->hasFile('vendor_invoice'))
        {
            $file = $request->file('vendor_invoice');
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            $name = $timestamp. '-' .$file->getClientOriginalName();

            $file->move(public_path().'/images/consumable_raw_inventory_out', $name);
            $check=1;

        }
        $factory_id=($request->factory_id);
        $factory=Factory::find($factory_id);

        $invent_transaction=ConsumableInventoryTransaction::find($id);

        $invent_transaction->transaction_date=$request->transaction_date;

        $invent_transaction->factory_id=$request->factory_id;
        $invent_transaction->factory_name=$factory->name;
        $invent_transaction->remarks=$request->remarks;
        if ($check == 1)
        {
            $invent_transaction->vendor_invoice=$name;
        }

        $invent_transaction->transaction_type='out';
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
                $operation->transaction_type='out';
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
                $operation->transaction_type='out';
                $operation->save();

                $check_id[$i]=$operation->id;


                $i++;
            }

        }
        $data=ConsumeInventoryTransactionOpe::where('transaction_id',$id)->whereNotIn('id',$check_id)->delete();
//        dd($data);

        return redirect('admin/consume-inventory-outwards')->with(['message'=>'Inventory added Successfully','alert-type'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
