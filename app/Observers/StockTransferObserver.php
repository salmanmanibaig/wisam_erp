<?php

namespace App\Observers;

use App\StockTransfer;

class StockTransferObserver
{
    /**
     * Handle the stock transfer "created" event.
     *
     * @param  \App\StockTransfer  $stockTransfer
     * @return void
     */
    public function created(StockTransfer $stockTransfer)
    {
        //
    }

    /**
     * Handle the stock transfer "updated" event.
     *
     * @param  \App\StockTransfer  $stockTransfer
     * @return void
     */
    public function updated(StockTransfer $stockTransfer)
    {
       dd($stockTransfer);
    }

    /**
     * Handle the stock transfer "deleted" event.
     *
     * @param  \App\StockTransfer  $stockTransfer
     * @return void
     */
    public function deleted(StockTransfer $stockTransfer)
    {
        //
    }

    /**
     * Handle the stock transfer "restored" event.
     *
     * @param  \App\StockTransfer  $stockTransfer
     * @return void
     */
    public function restored(StockTransfer $stockTransfer)
    {
        //
    }

    /**
     * Handle the stock transfer "force deleted" event.
     *
     * @param  \App\StockTransfer  $stockTransfer
     * @return void
     */
    public function forceDeleted(StockTransfer $stockTransfer)
    {
        //
    }
}
