<?php

namespace App\Repositories;

use CeddyG\QueryBuilderRepository\QueryBuilderRepository;

class TransactionProvidersRepository extends QueryBuilderRepository
{
    protected $sTable = 'transaction_providers';

    protected $sPrimaryKey = 'id';
    
    protected $sDateFormatToGet = 'd/m/Y';
    
    protected $aRelations = [
        'companies',
        'providers',
        'products',
        'employees'
    ];

    protected $aFillable = [
        'company_id',
        'provider_id',
        'product_id',
        'employee_id',
        'quantity'
    ];
    
    protected $bTimestamp = true;

   
    public function companies()
    {
        return $this->belongsTo('App\Repositories\CompaniesRepository', 'company_id');
    }

    public function providers()
    {
        return $this->belongsTo('App\Repositories\ProvidersRepository', 'provider_id');
    }

    public function products()
    {
        return $this->belongsTo('App\Repositories\ProductsRepository', 'product_id');
    }

    public function employees()
    {
        return $this->belongsTo('App\Repositories\EmployeesRepository', 'employee_id');
    }


}
