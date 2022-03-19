<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
            'name' => 'string|max:255',
            'birthday' => 'date_format:d/m/Y',
            'country' => 'string|max:255',
            'first_day' => 'date_format:d/m/Y',
            'created_at' => 'string',
            'updated_at' => 'string'
        ];
    }
}

