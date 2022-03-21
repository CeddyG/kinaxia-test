<?php

namespace App\Http\Controllers\Admin;

use CeddyG\Clara\Http\Controllers\ContentManagerController;

use App\Repositories\TransactionProvidersRepository;

class TransactionProvidersController extends ContentManagerController
{
    protected $sEventAfterStore = \App\Events\TransactionProviders\AfterStoreEvent::class;
    
    public function __construct(TransactionProvidersRepository $oRepository)
    {
        $this->sPath            = 'admin/transaction-providers';
        $this->sPathRedirect    = 'admin/transaction-providers';
        $this->sName            = __('transaction-providers.transaction_providers');
        
        $this->oRepository  = $oRepository;
        $this->sRequest     = 'App\Http\Requests\TransactionProvidersRequest';
    }
}
