<?php

namespace App\Listeners;

use App\Repositories\ProductsRepository;
use App\Models\Company;

class CompaniesSubscriber
{
    private $oProductRepository;
    
    public function __construct(ProductsRepository $oProductRepository)
    {
        $this->oProductRepository   = $oProductRepository;
    }

    public function update($oEvent) 
    {
        $aInputs = $oEvent->aInputs;
        $oProduct = $this->oProductRepository->find(
            $aInputs['product_id'], 
            ['price', 'tax']
        );
        
        Company::find($aInputs['company_id'])
            ->decrement('balance', $oProduct->price + $oProduct->tax);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $oEvent
     */
    public function subscribe($oEvent)
    {
        $oEvent->listen(
            'App\Events\TransactionProviders\AfterStoreEvent',
            'App\Listeners\CompaniesSubscriber@update'
        );
    }
}
