<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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

    //ADD USER ACCOUNT
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        
        $validated['status'] = 'Active';
        // $validated['password'] = bcrypt($validated['password']);
    
        $user = new User($validated);
        User::create($validated);
        $user->save();
        
        return redirect('/users/add')->with('message', 'New User Added Successfully');
    }

    //VIEW USER ACCOUNT (TABLE)
    public function show($id){
        $editUser = User::findOrFail($id);
        // dd($editUser);
        return view('pages/edit',  compact('editUser'));

    }

    //EDIT USER ACCOUNT
    public function update(UserRequest $request, $id)
    {
        // gets all request
        $validated = $request->validated();
    
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
}
