<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->tag ? $this->tag->id : null;

        return [
            'name' => ['required','string','max:255', Rule::unique('tags')->ignore($id)],
            'status' => 'required|integer|min:0|max:1',
            'is_ml' => 'boolean',
        ];
    }
}
