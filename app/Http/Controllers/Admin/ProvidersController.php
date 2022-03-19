<?php

namespace App\Http\Controllers\Admin;

use CeddyG\Clara\Http\Controllers\ContentManagerController;

use App\Repositories\ProvidersRepository;

class ProvidersController extends ContentManagerController
{
    public function __construct(ProvidersRepository $oRepository)
    {
        $this->sPath            = 'admin/providers';
        $this->sPathRedirect    = 'admin/providers';
        $this->sName            = __('providers.providers');
        
        $this->oRepository  = $oRepository;
        $this->sRequest     = 'App\Http\Requests\ProvidersRequest';
    }
}
