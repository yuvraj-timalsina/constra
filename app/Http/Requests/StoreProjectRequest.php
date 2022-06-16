<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects,title',
            'short_intro' => 'required',
            'client' => 'required|unique:projects,client',
            'architect' => 'required|unique:projects,architect',
            'location' => 'required|unique:projects,location',
            'size' => 'required',
            'completion_year' => 'required|unique:projects,completion_year',
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'gallery' => 'required|array',
            'gallery.*' => 'image',
        ];
    }
}
