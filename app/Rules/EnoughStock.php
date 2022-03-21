<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use Facades\App\Repositories\ProductsRepository;

class EnoughStock implements Rule
{
    protected $product;
    
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($idProduct)
    {
        $this->product = ProductsRepository::find($idProduct, ['stock']);
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
        return !is_null($this->product) && $this->product->stock > $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.not_enough_stock');
    }
}
