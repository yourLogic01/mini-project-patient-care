<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'nik' => [
                'required',
                'regex:/^\d{16}$/',
                'unique:patients,nik',
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

    public function messages(): array
    {
        return [
            'nik.regex' => 'NIK harus terdiri dari 16 digit angka.',
            'phone.regex' => 'Nomor telepon harus 10 sampai 15 digit angka.',
        ];
    }
}
