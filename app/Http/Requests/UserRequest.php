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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('id');
        // dd($id);
        return [
            "first_name" => ['required', new Alpha_spaces],
            'middle_name' => [new Alpha_spaces],
            "last_name" => ['required', new Alpha_spaces],
            // "username" => ['required', Rule::unique('users', 'username')],
            // 'password' => ['required'],
            // 'confirm_password' => ['required', 'same:password'], // Validate if confirm_password is the same as password
            "role" => ['required'],
            "position" => ['required'],
            "birthday" => ['required'],
            "contact" => 'required|numeric|digits:11|starts_with:09',
            "email" => "email|unique:users,email,$id",
        ];
    }
}
