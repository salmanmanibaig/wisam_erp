<?php

namespace App;

use App\Observers\StockTransferObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;

class StockTransfer extends Model
{


    protected static function booted()
    {
        static::created(function ($stock) {

//            dd($stock);


            $stock_from=  new StockManagment();
            $stock_from->warehouse_id=$stock->store_from_id;

            $stock_from_unit=Unit::find($stock->store_from_unit);
            $stock_from->stock_out=$stock->store_from_qty*$stock_from_unit->qty;
            $stock_from->stock_type="transfer_out";
            $stock_from->product_id=$stock->product_id;
            $stock_from->transaction_id=$stock->id;
            $stock_from->save();

            $stock_to=  new StockManagment();
            $stock_to->warehouse_id=$stock->store_to_id;

            $stock_to_unit=Unit::find($stock->store_to_unit);
            $stock_to->stock_in = $stock_from->stock_out;
            $stock_to->stock_type="transfer_in";

            $stock_to->transaction_id=$stock->id;
            $stock_to->product_id=$stock->product_id;

            $stock_to->save();

            $loss=$stock_from->stock_out - $stock->store_to_qty*$stock_to_unit->qty;

            if($loss > 0)
            {
                $stock_loss=  new StockManagment();
                $stock_loss->warehouse_id=$stock->store_to_id;

                $unit=Unit::find($stock->store_from_unit);
                $stock_loss->stock_out=$loss;
                $stock_loss->stock_type="transfer loss";
                $stock_loss->product_id=$stock->product_id;
                $stock_loss->transaction_id=$stock->id;

                $stock_loss->save();
            }



        });


        static::updated(function ($stock) {

            $stock_from=  StockManagment::where('stock_type','transfer_out')->where('transaction_id',$stock->id)->first();
            $stock_from->warehouse_id=$stock->store_from_id;

            $unit=Unit::find($stock->store_from_unit);
            $stock_from->stock_out=$stock->store_from_qty*$unit->qty;
            $stock_from->stock_type="transfer_out";
            $stock_from->product_id=$stock->product_id;
            $stock_from->transaction_id=$stock->id;
            $stock_from->save();

            $stock_to=  StockManagment::where('stock_type','transfer_in')->where('transaction_id',$stock->id)->first();


            $stock_to->warehouse_id=$stock->store_to_id;

            $stock_to_unit=Unit::find($stock->store_to_unit);
            $stock_to->stock_in =  $stock_from->stock_out;
            $stock_to->stock_type="transfer_in";
            $stock_to->transaction_id=$stock->id;
            $stock_to->product_id=$stock->product_id;

            $stock_to->save();



            $loss=$stock_from->stock_out - $stock->store_to_qty * $stock_to_unit->qty;

            $stock_loss=  StockManagment::where('stock_type','transfer loss')->where('transaction_id',$stock->id)->first();

            if($loss >0 && !$stock_loss)
            {
                $stock_loss=  new StockManagment();
                $stock_loss->warehouse_id=$stock->store_to_id;
                $stock_loss->stock_out=$loss;
                $stock_loss->stock_type="transfer loss";
                $stock_loss->product_id=$stock->product_id;
                $stock_loss->transaction_id=$stock->id;
                $stock_loss->save();
            }
            else if($loss > 0)
            {
            $stock_loss->warehouse_id=$stock->store_to_id;
            $stock_loss->stock_out=$loss;
            $stock_loss->stock_type="transfer loss";
            $stock_loss->product_id=$stock->product_id;
            $stock_loss->transaction_id=$stock->id;
            $stock_loss->save();
            }


            else if($stock_loss)
            {
              StockManagment::where('id',$stock_loss->id)->delete();
            }
        });


        static::deleted(function ($stock) {
            StockManagment::where('transaction_id',$stock->id)->delete();
        });
    }



}
