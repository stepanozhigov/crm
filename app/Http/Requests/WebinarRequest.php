<?php

namespace App\Http\Requests;

use App\Models\Webinar;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WebinarRequest extends FormRequest
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
        $id = $this->webinar ? $this->webinar->id : null;

        return [
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'page_title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'buttons' => 'nullable|string',
            'video_frame' => 'required|string',
            'slug' => ['required', 'string', 'max:255', Rule::unique('webinars')->ignore($id)]
        ];

    }
}
