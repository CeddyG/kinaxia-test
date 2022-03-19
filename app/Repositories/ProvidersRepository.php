<?php

namespace App\Repositories;

use CeddyG\QueryBuilderRepository\QueryBuilderRepository;

class ProvidersRepository extends QueryBuilderRepository
{
    protected $sTable = 'providers';

    protected $sPrimaryKey = 'id';
    
    protected $sDateFormatToGet = 'd/m/Y';
    
    protected $aRelations = [
        'transaction_providers'
    ];

    protected $aFillable = [
        'name',
        'address',
        'country'
    ];
    
    protected $bTimestamp = true;

   
    public function transaction_providers()
    {
        return $this->hasMany('App\Repositories\TransactionProvidersRepository', 'provider_id');
    }


}
