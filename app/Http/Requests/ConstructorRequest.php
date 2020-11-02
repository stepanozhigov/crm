<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConstructorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'products' => 'array',
            'settings' => 'array',
            'inactive' => 'integer'
        ];
    }
}
