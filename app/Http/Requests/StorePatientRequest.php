<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'nik' => 'required|string|max:20|unique:patients,nik',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
        ];
    }
}
