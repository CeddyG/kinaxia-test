<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\EnoughStock;

class TransactionClientsRequest extends FormRequest
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
            'client_id' => 'required|numeric|exists:clients,id',
            'product_id' => 'required|numeric|exists:products,id',
            'employee_id' => 'required|numeric|exists:employees,id',
            'quantity' => ['numeric', new EnoughStock($this->product_id)],
            'created_at' => 'string',
            'updated_at' => 'string'
        ];
    }
}

