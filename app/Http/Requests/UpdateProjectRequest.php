<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'required|unique:projects,title,' . $this->project->id,
            'short_intro' => 'required',
            'client' => 'required|unique:projects,client,' . $this->project->id,
            'architect' => 'required|unique:projects,architect,' . $this->project->id,
            'location' => 'required|unique:projects,location,' . $this->project->id,
            'size' => 'required',
            'completion_year' => 'required|unique:projects,completion_year,' . $this->project->id,
            'category_id' => 'nullable|array',
            'category_id.*' => 'exists:categories,id',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image',
        ];
    }
}
