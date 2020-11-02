<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpSaleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'product_id' => 'required|integer|exists:products,id',
            'additional_product_id' => 'required|array',
            'status' => 'required|integer',
        ];
    }
}
