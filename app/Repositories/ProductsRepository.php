<?php

namespace App\Repositories;

use CeddyG\QueryBuilderRepository\QueryBuilderRepository;

class ProductsRepository extends QueryBuilderRepository
{
    protected $sTable = 'products';

    protected $sPrimaryKey = 'id';
    
    protected $sDateFormatToGet = 'd/m/Y';
    
    protected $aRelations = [
        'transaction_clients',
        'transaction_providers'
    ];

    protected $aFillable = [
        'name',
        'price',
        'tax',
        'stock'
    ];
    
    protected $bTimestamp = true;

   
    public function transaction_clients()
    {
        return $this->hasMany('App\Repositories\TransactionClientsRepository', 'product_id');
    }

    public function transaction_providers()
    {
        return $this->hasMany('App\Repositories\TransactionProvidersRepository', 'product_id');
    }


}
