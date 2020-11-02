<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->user ? $this->user->id : null;

        $rules = [
            'name' => 'required|string|min:3|max:255',
            'email' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)],
            'status' => 'required|integer',
            'first_name' => 'nullable|string|min:3|max:255',
            'last_name' => 'nullable|string|min:3|max:255',
            'permissions' => 'array'
        ];

        if ($this->method() == 'PUT') {
            $rules['password'] = ($this->request->get('password')) ? ['required', 'string', 'min:6', 'confirmed'] : [''];
        } else {
            $rules['password'] = ['required', 'string', 'min:6', 'confirmed'];
        }

        return $rules;
    }
}
