<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePatientRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'nik' => [
                'required',
                'regex:/^\d{16}$/',
                Rule::unique('patients', 'nik')->ignore($this->patient->id),
            ],
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'phone' => [
                'required',
                'regex:/^\d{10,15}$/',
            ],
            'address' => 'required|string',
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'nik.regex' => 'NIK harus terdiri dari 16 digit angka.',
            'phone.regex' => 'Nomor telepon harus 10 sampai 15 digit angka.',
        ];
    }
}
