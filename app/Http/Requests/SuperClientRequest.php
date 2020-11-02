<?php

namespace App\Http\Requests;

use App\Models\Client;
use App\Models\SuperClient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SuperClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => ['required', 'string', 'max:255', Rule::unique('clients')->ignore(SuperClient::ID)],
            'password' => ($this->request->get('password')) ? ['required', 'string', 'min:6', 'confirmed'] : [''],
        ];
    }
}
