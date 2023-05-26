<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'project_name' => ['required','String'],
            'description' => ['required','String'],
            'inclusions' => ['required','String'],
            'exclusions' => ['nullable','String'],
            'project_value_aud_dollars' => ['required','Numeric']
        ];
    }
}
