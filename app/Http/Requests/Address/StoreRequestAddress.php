<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestAddress extends FormRequest
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
        return [
            'user_id' => ['required', 'exists:users,id'],
            'postal_code' => ['required', 'string', 'max:20'],
            'is_primary' => ['nullable', 'boolean'],
            'building_name' => ['required', 'string', 'max:255'],
            'floor_number' => ['required', 'string', 'max:50'],
            'apartment_number' => ['required', 'string', 'max:50'],
            'landmark' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'exists:cities,id'],
            'country_id' => ['required', 'exists:currencies,id'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
