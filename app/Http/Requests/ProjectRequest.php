<?php

namespace App\Http\Requests;

use App\Helpers\CurrencyHelper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'domain' => 'required|string|max:255',
            'language' => 'required|string|max:10',
            'currency' => ['required', Rule::in(CurrencyHelper::getCurrenciesList())],
            'paymentMethods' => 'array',
        ];
    }
}
