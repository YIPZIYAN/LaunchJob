<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'min_salary' => ['required', 'numeric'],
            'max_salary' => ['required', 'numeric'],
            'position' => ['required'],
            'job_type' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
