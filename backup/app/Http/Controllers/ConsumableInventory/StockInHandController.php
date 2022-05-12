<?php

namespace App\Http\Controllers\ConsumableInventory;

use App\Factory;
use App\Http\Controllers\Controller;
use App\InvItem;
use App\Traits\LaminatioHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockInHandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use LaminatioHelper;
    public function index()
    {
        $items=InvItem::where('category_item','!=','biocos')->get();
//        dd($items);
        $factories=Factory::all();
//        dd($factories[0]);
        if(Auth::user()->hasRole('admin'))
        {
            foreach ($items as $item)
            {
                $stock=$this->consumableRawStockInHand($item->id);
                $item->stock_in_hand=$stock;
            }
        }elseif (Auth::user()->hasRole('lamitech'))
        {
            foreach ($items as $item)
            {
                $stock=$this->consumableRawStockInHandById($item->id,$factories[1]->id);
                $item->stock_in_hand=$stock;
            }
        }elseif (Auth::user()->hasRole('supply chain'))
        {
            foreach ($items as $item)
            {
                $stock=$this->consumableRawStockInHandById($item->id,$factories[0]->id);
                $item->stock_in_hand=$stock;
            }
        }



        return view('vendor.voyager.consumable_stock_in_hand.browse',compact('items'));
    }

    public function factory_wise($factory_id)
    {
//        dd($factory_id);
        $items=InvItem::where('category_item','!=','biocos')->get();
        foreach ($items as $item)
        {
            $stock=$this->consumableRawStockInHandById($item->id,$factory_id);
            $item->stock_in_hand=$stock;
        }
        return view('vendor.voyager.consumable_stock_in_hand.browse',compact('items','factory_id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
