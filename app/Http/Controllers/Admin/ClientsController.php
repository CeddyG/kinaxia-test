<?php

namespace App\Http\Controllers\Admin;

use CeddyG\Clara\Http\Controllers\ContentManagerController;

use App\Repositories\ClientsRepository;

class ClientsController extends ContentManagerController
{
    public function __construct(ClientsRepository $oRepository)
    {
        $this->sPath            = 'admin/clients';
        $this->sPathRedirect    = 'admin/clients';
        $this->sName            = __('clients.clients');
        
        $this->oRepository  = $oRepository;
        $this->sRequest     = 'App\Http\Requests\ClientsRequest';
    }
}
