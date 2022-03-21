<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'tax',
        'stock'
    ];    

    public function transaction_clients()
    {
        return $this->hasMany('App\Models\TransactionClients', 'product_id');
    }

    public function transaction_providers()
    {
        return $this->hasMany('App\Models\TransactionProviders', 'product_id');
    }


}

