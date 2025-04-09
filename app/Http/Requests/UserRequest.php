<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:admin,user',
        ];

        // For update requests, make email and password optional
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['email'] = 'sometimes|required|email|unique:users,email,' . $this->user;
            $rules['password'] = 'sometimes|required|string|min:8';
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
            'name.required' => 'The name field is required',
            'email.required' => 'The email field is required',
            'email.unique' => 'This email is already taken',
            'password.required' => 'The password field is required',
            'password.min' => 'The password must be at least 8 characters',
            'role.required' => 'The role field is required',
            'role.in' => 'The role must be either admin or user',
        ];
    }
} 