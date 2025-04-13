<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,gif|max:2048'
        ];

        // For update requests, make all fields optional
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules = [
                'name_en' => 'sometimes|string|max:255',
                'name_ar' => 'sometimes|string|max:255',
                'description_en' => 'sometimes|string',
                'description_ar' => 'sometimes|string',
                'logo' => 'nullable|image|mimes:jpeg,png,gif|max:2048'
            ];
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name_en.required' => 'The English name is required',
            'name_ar.required' => 'The Arabic name is required',
            'name_en.max' => 'The English name may not be greater than 255 characters',
            'name_ar.max' => 'The Arabic name may not be greater than 255 characters',
            'description_en.required' => 'The English description is required',
            'description_ar.required' => 'The Arabic description is required',
            'logo.image' => 'The logo must be an image',
            'logo.mimes' => 'The logo must be a file of type: jpeg, png, gif',
            'logo.max' => 'The logo may not be greater than 2MB'
        ];
    }
} 