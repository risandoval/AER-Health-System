<?php

namespace App\Http\Controllers;

use App\Rules\Alpha_spaces;
use Illuminate\Http\Request;
use App\Rules\Validation;
use Illuminate\Validation\Rule;

class UserController extends Controller {

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout Successful');
    }

    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required','email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/dashboard')->with('message', 'Welcome Back');
        }

    }

    //add user form validation
    public function userData(Request $request) {
        $request->validate([
            'first_name' => ['required', new Alpha_spaces],
            'middle-name' => [new Alpha_spaces],
            'last_name' => ['required', new Alpha_spaces],
            // 'username' => [Rule::unique('users')],
            'role' => 'required',
            'specialization' => 'required',
            'birthdate' => 'required',
            'contact' => 'required|numeric|digits:11|starts_with:09',
            // 'email' => 'email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);
        return $request;
    }
}
