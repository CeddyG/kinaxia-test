<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Facades\App\Repositories\CompaniesRepository;
use Facades\App\Repositories\ProductsRepository;

class EnoughMoney implements Rule
{
    protected $company;
    protected $quantity;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($idCompany, $quantity)
    {
        $this->company  = CompaniesRepository::find($idCompany, ['balance']);
        $this->quantity = $quantity;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $product = ProductsRepository::find($value, ['price', 'tax']);
        
        return is_null($product) || is_null($this->company)
            ? false 
            : $this->company->balance >= ($product->price + $product->tax) * $this->quantity;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.not_enough_money');
    }
}
