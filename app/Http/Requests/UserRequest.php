<?php

namespace App\Http\Requests;

use App\Rules\Alpha_spaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            "first_name" => ['required', new Alpha_spaces],
            'middle_name' => [new Alpha_spaces],
            "last_name" => ['required', new Alpha_spaces],
            // "username" => ['required', Rule::unique('users', 'username')],
            // 'password' => ['required'],
            // 'confirm_password' => ['required', 'same:password'],
            "role" => ['required'],
            "specialization" => ['required'],
            "birthday" => ['required'],
            "contact" => 'required|numeric|digits:11|starts_with:09',
            "email" => "email|unique:users,email,$id",
        ];
    }
}
