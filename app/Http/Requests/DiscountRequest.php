<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return  [
            'name' => 'required|string|min:3|max:255',
            'description' => 'string|max:255',
            'size' => 'required|integer|min:0',
            'type' => 'required|integer|min:0',
            'sw_time_limit' => 'integer|min:0|max:1',
            'start_date' => 'date',
            'end_date' => 'date',
            'products' => 'required|array'
        ];
    }
}
