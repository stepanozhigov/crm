<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClientRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->client ? $this->client->id : null;
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'email' => ['required', 'string', 'max:255', Rule::unique('clients')->ignore($id)],
            'status' => 'required|integer',
            'projects' => 'array',
            'products' => 'array',
        ];

        if ($this->method() == 'PUT') {
            $rules['password'] = ($this->request->get('password')) ? ['required', 'string', 'min:6', 'confirmed'] : [''];
        } else {
            $rules['password'] = ['required', 'string', 'min:6', 'confirmed'];
        }

        return $rules;
    }
}
