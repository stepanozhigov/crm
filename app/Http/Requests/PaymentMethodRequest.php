<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'logo' => 'file|max:2048',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'integer',
            'content_page' => 'nullable|string',
            'commission' => 'nullable|string',
            'maturity_of_money' => 'nullable|string',
        ];
    }
}
