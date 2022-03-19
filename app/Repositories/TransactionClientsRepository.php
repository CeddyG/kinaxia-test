<?php

namespace App\Repositories;

use CeddyG\QueryBuilderRepository\QueryBuilderRepository;

class TransactionClientsRepository extends QueryBuilderRepository
{
    protected $sTable = 'transaction_clients';

    protected $sPrimaryKey = 'id';
    
    protected $sDateFormatToGet = 'd/m/Y';
    
    protected $aRelations = [
        'companies',
        'clients',
        'products',
        'employees'
    ];

    protected $aFillable = [
        'company_id',
        'client_id',
        'product_id',
        'employee_id',
        'quantity'
    ];
    
    protected $bTimestamp = true;

   
    public function companies()
    {
        return $this->belongsTo('App\Repositories\CompaniesRepository', 'company_id');
    }

    public function clients()
    {
        return $this->belongsTo('App\Repositories\ClientsRepository', 'client_id');
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
