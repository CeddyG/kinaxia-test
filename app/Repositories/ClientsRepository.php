<?php

namespace App\Repositories;

use CeddyG\QueryBuilderRepository\QueryBuilderRepository;

class ClientsRepository extends QueryBuilderRepository
{
    protected $sTable = 'clients';

    protected $sPrimaryKey = 'id';
    
    protected $sDateFormatToGet = 'd/m/Y';
    
    protected $aRelations = [
        'transaction_clients'
    ];

    protected $aFillable = [
        'name',
        'address',
        'country'
    ];
    
    protected $bTimestamp = true;
   
    public function transaction_clients()
    {
        return $this->hasMany('App\Repositories\TransactionClientsRepository', 'client_id');
    }
}
