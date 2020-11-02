<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillPageRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string|required|max:255',
            'priority' => 'integer|required|min:0|max:10',
            'guaranty' => 'array',
            'additionalText' => 'array'
        ];
    }
}
