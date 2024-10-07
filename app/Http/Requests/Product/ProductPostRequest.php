<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\BaseFormRequest;

class ProductPostRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required',
            'catetgory' => 'required}string',
        ];
    }
}
