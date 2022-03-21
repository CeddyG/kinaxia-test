<?php

namespace App\Listeners;

use App\Models\Product;

class ProductsSubscriber
{
    public function update($oEvent) 
    {
        $aInputs = $oEvent->aInputs;
        
        Product::find($aInputs['product_id'])
            ->decrement('stock', $aInputs['quantity']);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $oEvent
     */
    public function subscribe($oEvent)
    {
        $oEvent->listen(
            'App\Events\TransactionClients\AfterStoreEvent',
            'App\Listeners\ProductsSubscriber@update'
        );
    }
}
