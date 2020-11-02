<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailerGroupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'nullable|string|max:255',
        ];

        //for creating only
        if ($this->method() == 'POST') {
            $rules = array_merge($rules, [
                'product_id' => 'required|integer|exists:products,id',
                'paid' => 'required|integer|min:0|max:1'
            ]);

        }

        return $rules;
    }
}
