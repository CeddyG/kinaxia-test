<?php

namespace App\Repositories;

use CeddyG\QueryBuilderRepository\QueryBuilderRepository;

class EmployeesRepository extends QueryBuilderRepository
{
    protected $sTable = 'employees';

    protected $sPrimaryKey = 'id';
    
    protected $sDateFormatToGet = 'd/m/Y';
    
    protected $aRelations = [
        'transaction_clients',
        'transaction_providers'
    ];

    protected $aFillable = [
        'name',
        'birthday',
        'country',
        'first_day'
    ];
    
    protected $bTimestamp = true;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $aDates = [
        'birthday',
        'first_day'
    ];
   
    public function transaction_clients()
    {
        return $this->hasMany('App\Repositories\TransactionClientsRepository', 'employee_id');
    }

    public function transaction_providers()
    {
        return $this->hasMany('App\Repositories\TransactionProvidersRepository', 'employee_id');
    }
}
