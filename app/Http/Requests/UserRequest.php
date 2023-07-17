<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\Alpha_spaces;
use Illuminate\Contracts\Validation\Validator;
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

            //eto inadd ko para sa Edit User ng audit logs
            "username" => 'sometimes|required',
            // "username" => ['sometimes', 'required', Rule::unique('users', 'username')],
            // 'password' => ['sometimes', 'required'],
            // 'confirm_password' => ['sometimes', 'required', 'same:password'],
            "role" => 'sometimes|required',
            "specialization" => 'sometimes|required',
            "barangay" => 'sometimes|required',
            "birthday" => ['required'],
            "contact" => 'required|numeric|digits:11|starts_with:09',
            "email" => "nullable|email|unique:users,email,$id",
            "profile_pic" => 'image|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
