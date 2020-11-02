<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'oferta' => 'integer',
            'discountId' => 'integer|min:1',
            'tag' => 'string|max:255',
        ];
    }
}
