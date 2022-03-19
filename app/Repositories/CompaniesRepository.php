<?php

namespace App\Repositories;

use CeddyG\QueryBuilderRepository\QueryBuilderRepository;

class CompaniesRepository extends QueryBuilderRepository
{
    protected $sTable = 'companies';

    protected $sPrimaryKey = 'id';
    
    protected $sDateFormatToGet = 'd/m/Y';
    
    protected $aRelations = [
        'transaction_clients',
        'transaction_providers'
    ];

    protected $aFillable = [
        'name',
        'balance',
        'country'
    ];
    
    protected $bTimestamp = true;

   
    public function transaction_clients()
    {
        return $this->hasMany('App\Repositories\TransactionClientsRepository', 'company_id');
    }

    public function transaction_providers()
    {
        return $this->hasMany('App\Repositories\TransactionProvidersRepository', 'company_id');
    }


}
