<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User; // Import the User model

class UserController extends Controller
{
    //
    function getData() {

        //hello world
        return "Form Data";
    }

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


    public function store(Request $request)
    {
        $validated = $request->validate([
            "first_name" => ['required'],
            "last_name" => ['required'],
            "username" => ['required', Rule::unique('users', 'username')],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'], // Validate if confirm_password is the same as password
            "role" => ['required'],
            "position" => ['required'],
            "birthday" => ['required'],
            "contact" => ['required'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
        ]);
    
        $validated['status'] = 'Active';
        $validated['password'] = bcrypt($validated['password']);
    
        $user = new User($validated);
        $user->save();
        
        return redirect('/users/add')->with('message', 'New Student Added Successfully');
    }
    
    

    public function create(Request $request){
       


    }

    public function show($id){

        $editUser = User::findOrFail($id);
        // dd($editUser);
        return view('pages/edit',  compact('editUser'));


    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "first_name" => ['required', 'min:4'],
            "last_name" => ['required', 'min:4'],
            "username" => ['required'],
            "role" => ['required'],
            "position" => ['required'],
            "birthday" => ['required'],
            "contact" => ['required'],
            "email" => ['required', 'email'],
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
}
