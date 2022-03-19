<?php

namespace App\Http\Controllers\Admin;

use CeddyG\Clara\Http\Controllers\ContentManagerController;

use App\Repositories\ProductsRepository;

class ProductsController extends ContentManagerController
{
    public function __construct(ProductsRepository $oRepository)
    {
        $this->sPath            = 'admin/products';
        $this->sPathRedirect    = 'admin/products';
        $this->sName            = __('products.products');
        
        $this->oRepository  = $oRepository;
        $this->sRequest     = 'App\Http\Requests\ProductsRequest';
    }
}
