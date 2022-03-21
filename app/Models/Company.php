<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'balance',
        'country'
    ];    

    public function transaction_clients()
    {
        return $this->hasMany('App\Models\TransactionClients', 'company_id');
    }

    public function transaction_providers()
    {
        return $this->hasMany('App\Models\TransactionProviders', 'company_id');
    }
}

