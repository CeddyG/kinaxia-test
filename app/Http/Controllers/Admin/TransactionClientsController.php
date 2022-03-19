<?php

namespace App\Http\Controllers\Admin;

use CeddyG\Clara\Http\Controllers\ContentManagerController;

use App\Repositories\TransactionClientsRepository;

class TransactionClientsController extends ContentManagerController
{
    public function __construct(TransactionClientsRepository $oRepository)
    {
        $this->sPath            = 'admin/transaction-clients';
        $this->sPathRedirect    = 'admin/transaction-clients';
        $this->sName            = __('transaction-clients.transaction_clients');
        
        $this->oRepository  = $oRepository;
        $this->sRequest     = 'App\Http\Requests\TransactionClientsRequest';
    }
}
