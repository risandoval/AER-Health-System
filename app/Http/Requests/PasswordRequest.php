<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['required', 'same:new_password'],
            // 'confirm_password.required' => 'required to beh'
            // 'confirm_password.same:new_password' => 'new passwords does not match',
        ];

    }

    public function messages(): array 
    {
        return [
            'confirm_password.same' => 'Password does not match.'
        ];
    }
}
