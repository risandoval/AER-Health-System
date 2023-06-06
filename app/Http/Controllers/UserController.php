<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Rules\Alpha_spaces;
use Illuminate\Http\Request;
use App\Rules\Validation;
use Illuminate\Validation\Rule;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function index()
    {   
        $activeUser = User::where('status', 'active')->get();
        $inactiveUser = User::where('status', 'inactive')->get();
        // dd($data);
        return view('pages/userAccounts/user-accounts',  compact('activeUser', 'inactiveUser'));
    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout Successful');
    }

    //ADD USER ACCOUNT
    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        
        $validated['first_name'] = ucfirst($validated['first_name']);
        $validated['middle_name'] = ucfirst($validated['middle_name']);
        $validated['last_name'] = ucfirst($validated['last_name']);
        $validated['username'] = substr($validated['last_name'], 0, 1) . sprintf("%04d", rand(1, 9999));
        if($validated['role'] == 'Admin'){
            $validated['role_id'] = 1;
        } elseif($validated['role'] == 'Barangay Health Worker'){
            $validated['role_id'] = 2;
        } elseif($validated['role'] == 'Doctor'){
            $validated['role_id'] = 3;
        }
        $validated['password'] = bcrypt($validated['birthday']);
        $validated['status'] = 'Active';
    
        $user = new User($validated);
        $user->save();
        
        return redirect('/users/add')->with('message', 'New User Added Successfully');
    }

    //VIEW USER ACCOUNT (TABLE)
    public function add(){
        return view('pages/userAccounts/add-user');
    }

    public function show($id){
        $viewUser = User::findOrFail($id);
        // dd($id);
        return view('pages/userAccounts/view-user',  compact('viewUser'));
    }

    //EDIT USER ACCOUNT
    public function edit($id){
        $editUser = User::findOrFail($id);
        // dd($id);
        return view('pages/userAccounts/edit-user',  compact('editUser'));
    } 
    public function update(UserRequest $request, $id)
    {
        // dd($request->editing);
        // gets all request
        // $newRequest = $request;
        // if ($request->editing) {
        //     $viewUser = User::find($id);
        //     return view('pages/userAccounts/view-user', compact('viewUser', 'newRequest') );
        // }

        $validated = $request->validated();
        $validationPassed = true;
        if ($validationPassed == true) {
            $viewUser = User::find($id);
            return view('pages/userAccounts/view-user', compact('viewUser', 'newRequest') );
        }
        
        
        $user = User::find($id);
        $user->update($validated);
        return redirect()->back()->withInput()->with('message', 'Data was successfully updated');
    }
    
    public function destroy(Request $request, $id)
    {   
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

    public function unarchive(Request $request, $id)
    {

        $user = User::find($id);

        if ($user) {
            $user->status = 'Active';
            $user->save();

        } else {
            // Handle the case when the user does not exist
        }

        return back()->with('message', 'Data was successfully updated');
    }

    //FIRST TIME LOGIN VIEW
    public function firstLogin() {   
        return view('pages/first-login');
    }

    //FIRST TIME LOGIN VALIDATION
    public function validateFirstLogin(Request $request) {   
        $validated = $request->validate([
            'password' => 'required',
            'confirm_password' => ['required', 'same:password'], 
        ]);

        //update password in database
        // $user = User::find(auth()->user()->id);
        // $user->password = bcrypt($validated['password']);
        // $user->save();

        return redirect('/dashboard'); 
    }

    //STEP 1-3 VIEW (forgot password)
    public function stepOne() {   
        return view('pages/forgotPassword/step-one');
    }
    public function stepTwo() {   
        return view('pages/forgotPassword/step-two');
    }
    public function stepThree() {   
        return view('pages/forgotPassword/step-three');
    }

    //STEP 1-3 VALIDATIONS (forgot password)
    public function validateStepOne(Request $request) {
        $validated = $request->validate([
            'username' => ['required'],
        ]);

        $user = User::where('username', $validated['username'])->first();
        if(!$user){
            return back()->with('error', 'Username does not exist');
        }
        
        return redirect('/security-question');
    }

    public function validateStepTwo(Request $request) {   
        $validated = $request->validate([
            'answer' => ['required']
        ]);

        // check kung magmatch yung sagot saka magproceed sa step 3

        return redirect('/change-password');
    }

    public function validateStepThree(Request $request) {   
        $validated = $request->validate([
            'password' => 'required',
            'confirm_password' => ['required', 'same:password'], 
        ]);

        //update password in database
        // $user = User::find(auth()->user()->id);
        // $user->password = bcrypt($validated['password']);
        // $user->save();

        return redirect('/login'); 
    }

    // update password function
    public function updatePassword(PasswordRequest $request, $id) 
    {
        {
            // compares current password in the input field to the authenticated user's password
            if (!Hash::check($request->current_password, auth()->user()->password)) {
                return redirect('/dashboard')->with('error', 'Incorrect password. Please try again.');
            }
            
            $validated = $request->validated();
            $user = User::find($id); // find the user using the user id passed in the url parameter

            $user->password = bcrypt($validated['confirm_password']);

            $user->save(); // save the changes to the user

            return redirect('/dashboard')->with('success', 'Password successfully changed.');
        }
    }
}
