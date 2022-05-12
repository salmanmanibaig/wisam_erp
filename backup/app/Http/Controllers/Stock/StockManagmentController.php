<?php

namespace App\Http\Controllers\Stock;

use App\Product;
use App\StockManagment;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockManagmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




       $warehouse =$this->stock_in_hand();

//       dd($warehouse);
        return view('vendor.voyager.stock-managments.browse',compact('warehouse'));

    }

    public function stock_in_hand()
    {
        $warehouse=  Warehouse::all();


        foreach($warehouse as $house)
        {
            $product=  Product::all();

            $house->total=0;

            foreach($product as $p_id)
            {
                $stock_in=  StockManagment::where('warehouse_id',$house->id)->where('product_id',$p_id->id)->get()->sum('stock_in');
                $stock_out=  StockManagment::where('warehouse_id',$house->id)->where('product_id',$p_id->id)->get()->sum('stock_out');


                $p_id->stock_in_hand= $house->total+($stock_in-$stock_out)/1000;


            }

            $house->product=$product;

        }


        return $warehouse;



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
