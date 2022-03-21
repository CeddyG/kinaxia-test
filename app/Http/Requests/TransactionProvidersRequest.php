<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\EnoughMoney;

class TransactionProvidersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'numeric',
            'company_id' => 'required|numeric|exists:companies,id',
            'provider_id' => 'required|numeric|exists:providers,id',
            'product_id' => ['required', 'numeric', 'exists:products,id', new EnoughMoney($this->company_id, $this->quantity)],
            'employee_id' => 'required|numeric|exists:employees,id',
            'quantity' => 'required|numeric',
            'created_at' => 'string',
            'updated_at' => 'string'
        ];
    }
}

