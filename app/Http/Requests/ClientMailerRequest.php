<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientMailerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'client_id' => 'required|integer|exist:clients,id',
            'ml_client_id' => 'required|string|max:255',
            'mailerlite_group_id' => 'required|integer|exist:mailerlite_groups,id'
        ];
    }
}
