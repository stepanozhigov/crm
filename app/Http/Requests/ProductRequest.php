<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'project_id' => 'required|integer|exists:projects,id',
            'type' => 'required|integer|min:0',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'youtube_id' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'content_video' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'fake_price' => 'nullable|integer|min:0',
            'unlim_bills' => 'nullable|integer|min:0',
            'private' => 'nullable|integer|min:0',
            'coauthor_on' => 'nullable|integer|min:0',
            'coauthor' => 'nullable|integer|min:0',
            'commission' => 'nullable|integer|min:0',
            'commission_type' => 'nullable|integer|min:1|max:2',

        ];
    }
}
