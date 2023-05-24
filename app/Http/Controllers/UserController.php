<?php

namespace App\Http\Controllers;

use App\Rules\Alpha_spaces;
use Illuminate\Http\Request;
use App\Rules\Validation;
use Illuminate\Validation\Rule;
use App\Models\User; // Import the User model

class UserController extends Controller {

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout Successful');
    }

    // public function store(Request $request){

    //     // dd($request);

    //     $validated = $request->validate([
    //         "first_name" => ['required', 'min:4'],
    //         "last_name" => ['required', 'min:4'],
    //         // "username" => ['required', 'min:4'],
    //          "username" => ['required', Rule::unique('users', 'username')],
    //         // 'password' => 'required|confirmed|min:6',
    //         'password' => 'required',
    //         "role" => ['required'],
    //         "position" => ['required'],
    //         "birthday" => ['required'],
    //         "contact" => ['required'],
    //         // "email" => ['required'],
    //         "email" => ['required', 'email', Rule::unique('users', 'email')],
           
    //     ]);

        
    //     $validated['password'] = bcrypt($validated['password']);

    //     User::create($validated);
        
    //     return redirect('/users/add')->with('message', 'New Student Added Successfully');

    // }

    //ADD USER ACCOUNT
    public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => ['required', new Alpha_spaces],
            'middle_name' => [new Alpha_spaces],
            "last_name" => ['required', new Alpha_spaces],
            // "username" => [Rule::unique('users', 'username')],
            // 'password' => ['required'],
            // 'confirm_password' => ['required', 'same:password'], // Validate if confirm_password is the same as password
            "role" => ['required'],
            "position" => ['required'],
            "birthday" => ['required'],
            "contact" => 'required|numeric|digits:11|starts_with:09',
            "email" => ['email', Rule::unique('users', 'email')],
        ]);
        
        //first letter of names changed to uppercase
        $validated['first_name'] = ucfirst($validated['first_name']);
        $validated['middle_name'] = ucfirst($validated['middle_name']);
        $validated['last_name'] = ucfirst($validated['last_name']);
        //username gets the first letter of last name then add a 4 digit number (e.g. J0001)
        $validated['username'] = substr($validated['last_name'], 0, 1) . sprintf("%04d", rand(1, 9999));
        //role id will depend on the role name
        if($validated['role'] == 'Admin'){
            $validated['role_id'] = 1;
        } elseif($validated['role'] == 'Barangay Health Worker'){
            $validated['role_id'] = 2;
        } elseif($validated['role'] == 'Doctor'){
            $validated['role_id'] = 3;
        }
        //password would be birthday as default
        $validated['password'] = bcrypt($validated['birthday']);
        //active status as default data
        $validated['status'] = 'Active';
    
        $user = new User($validated);
        $user->save();
        
        return redirect('/users/add')->with('message', 'New User Added Successfully');
    }
    
    

    public function create(Request $request){
       


    }

    //VIEW USER ACCOUNT (TABLE)
    public function show($id){
        $editUser = User::findOrFail($id);
        // dd($editUser);
        return view('pages/edit',  compact('editUser'));

    }

    //EDIT USER ACCOUNT
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
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
            "email" => ['email', Rule::unique('users', 'email')],
        ]);
    
        $user = User::find($id);
    
        if (!$user) {
            // User not found, handle the error accordingly
            return back()->with('error', 'User not found');
        }
    
        $user->update($validated);
    
        return back()->with('message', 'Data was successfully updated');
    }
    
    public function destroy(Request $request, $id)
    {   
        // dd($request);

        $user = User::find($id);

        if ($user) {
            $user->delete();
            // Optionally, you can perform any additional actions here
            // For example, you can return a success message
          
        } else {
            // Handle the case when the user does not exist
            
        }

        return back()->with('message', 'Data was successfully updated');
}


        public function archive(Request $request, $id)
        {   
            $user = User::find($id);

            if ($user) {
                $user->status = 'Inactive';
                $user->save();
                // Optionally, you can perform any additional actions here
                // For example, you can return a success message
            } else {
                // Handle the case when the user does not exist
            }

            return back()->with('message', 'Data was successfully updated');
        }

        
    
        // if (!$user) {
        //     // User not found, handle the error accordingly
        //     return back()->with('error', 'User not found');
        // }
    
        // $user->update($validated);
    
        // return back()->with('message', 'Data was successfully updated');
    



    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required','email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect('/profile')->with('message', 'Welcome Back');
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
