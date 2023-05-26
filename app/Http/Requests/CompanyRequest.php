<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name' => ['required', 'string'],
            'company_email' => ['required', 'email'],
            'address' => ['required', 'string'],
            'website' => ['nullable', 'url'],
        ];
    }
}
