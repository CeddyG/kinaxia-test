<?php

namespace App\Http\Controllers\Admin;

use CeddyG\Clara\Http\Controllers\ContentManagerController;

use App\Repositories\CompaniesRepository;

class CompaniesController extends ContentManagerController
{
    public function __construct(CompaniesRepository $oRepository)
    {
        $this->sPath            = 'admin/companies';
        $this->sPathRedirect    = 'admin/companies';
        $this->sName            = __('companies.companies');
        
        $this->oRepository  = $oRepository;
        $this->sRequest     = 'App\Http\Requests\CompaniesRequest';
    }
}
