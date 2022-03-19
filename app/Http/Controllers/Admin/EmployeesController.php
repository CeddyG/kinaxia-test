<?php

namespace App\Http\Controllers\Admin;

use CeddyG\Clara\Http\Controllers\ContentManagerController;

use App\Repositories\EmployeesRepository;

class EmployeesController extends ContentManagerController
{
    public function __construct(EmployeesRepository $oRepository)
    {
        $this->sPath            = 'admin/employees';
        $this->sPathRedirect    = 'admin/employees';
        $this->sName            = __('employees.employees');
        
        $this->oRepository  = $oRepository;
        $this->sRequest     = 'App\Http\Requests\EmployeesRequest';
    }
}
