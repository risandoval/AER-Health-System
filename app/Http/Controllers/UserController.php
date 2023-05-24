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
        // $validated['password'] = bcrypt($validated['password']);
    
        $user = new User($validated);
        // User::create($validated);
        $user->save();
        
        return redirect('/users/add')->with('message', 'New User Added Successfully');
    }

    //VIEW USER ACCOUNT (TABLE)
    public function show($id){
        $viewUser = User::findOrFail($id);
        // dd($id);
        return view('pages/userAccounts/view-user',  compact('viewUser'));
    }

    //show data in edit
    public function edit($id){
        $editUser = User::findOrFail($id);
        // dd($id);
        return view('pages/userAccounts/edit',  compact('editUser'));
    }

    //EDIT USER ACCOUNT
    public function update(UserRequest $request, $id)
    {
        // gets all request
        $validated = $request->validated();
        
        $user = User::find($id);
        
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
