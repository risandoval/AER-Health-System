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
use Illuminate\Support\Facades\Session;

class UserController extends Controller {

    public function index()
    {   
        $activeUser = User::where('status', 'active')->paginate(2);
        $inactiveUser = User::where('status', 'inactive')->paginate(2);
        $passwordRequest = User::where('password_request', 'Yes')->paginate(2);
        // dd($data);
        return view('pages/userAccounts/user-accounts',  compact('activeUser', 'inactiveUser', 'passwordRequest'));
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
    public function add(){
        return view('pages/userAccounts/add-user');
    }

    //VIEW USER ACCOUNT (TABLE)
    public function show($id){
        $viewUser = User::findOrFail($id);
        return view('pages/userAccounts/view-user', compact('viewUser'));
    }

    public function update(UserRequest $request, $id)
    {
        $validated = $request->validated();
        $user = User::find($id);
        $user->update($validated);
        
        return redirect()->back()->withInput()->with('success', 'Data was successfully updated');
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

    public function reset(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
        $new_pw = $user->birthday;
        $user->password = bcrypt($new_pw);
        $user->password_request = 'No';
        $user->save();

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

    public function validateFirstLogin(Request $request, $id) {
        $validated = $request->validate([
            'password' => 'required',
            'confirm_password' => ['required', 'same:password'],
            'question' => 'required',
            'answer' => 'required',
        ]);
    
        $user = User::find($id);
    
        $user->password = bcrypt($validated['password']);
        $user->security_question = $validated['question'];
        $user->security_answer = ($validated['answer']);
        $user->first_login = 'No';
        $user->save();
    
        // return back()->with('message', 'Data was successfully updated');
        return redirect('/dashboard'); 
    }
    
    //STEP 1-3 VIEW (forgot password)
    public function stepOne(Request $request) {   

        Session::invalidate(); // Invalidate the current session
        $request->session()->regenerate(); // Regenerate the session ID
        $request->session()->put('answer_attempts', 0);

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

        $username = $validated['username']; // Retrieve the validated username from the request
        $user = User::where('username', $username)->first();

        if (!$user) {
            // Username does not exist, handle the error
            return redirect('/validation')->withErrors(['username' => 'Username does not exist.']);
        }

        $userId = $user->id;

        return view('pages/forgotPassword/step-two', ['userId' => $userId]);
        // return redirect("/security-question")->with('userId', $userId);
    }

    // public function validateStepTwo(Request $request, $id) {   
        
    //     $validated = $request->validate([
    //         'answer' => ['required']
    //     ]);

    //     $user = User::find($id);

    //     if( $user->security_answer == $validated['answer']){

    //         return view('pages/forgotPassword/step-three', ['userId' => $id]);
    //         // return redirect('/change-password');
    //     }

    //     else{

    //         return view('pages.forgotPassword.step-two')->with(['userId' => $id])->withErrors(['answer' => 'Answer does not exist.']);

    //     }
           
    // }

    public function validateStepTwo(Request $request, $id)
    {
        $maxAttempts = 3;
        $attemptedAnswers = $request->session()->get('answer_attempts', 0);
    
        if ($attemptedAnswers >= $maxAttempts) {
            Session::invalidate(); // Invalidate the current session
            $request->session()->regenerate(); // Regenerate the session ID
            $request->session()->put('answer_attempts', 0); // Reset the answer_attempts counter to 0
            $user = User::find($id);
            $user->password_request = 'Yes';
            $user->save();
            return redirect('/login')->withErrors(['reset' => 'Maximum answer validation attempts exceeded'. "\n" . 'The system will automatically send a password reset request to the admin']);
        
        }
    
        $validated = $request->validate([
            'answer' => ['required']
        ]);
    
        $user = User::find($id);
    
        if ($user->security_answer == $validated['answer']) {
            return view('pages/forgotPassword/step-three', ['userId' => $id]);
            // return redirect('/change-password');
        }
    
        // Increment the answer_attempts counter
        $attemptedAnswers++;
        $request->session()->put('answer_attempts', $attemptedAnswers);
    
        // Check if this is the final attempt
        if ($attemptedAnswers >= $maxAttempts) {
            $user = User::find($id);
            $user->password_request = 'Yes';
            $user->save();
            return redirect('/login')->withErrors(['reset' => 'Maximum answer validation attempts exceeded.'. "\n" . 'The system will automatically send a password reset request to the admin']);
        }
    
        return view('pages/forgotPassword/step-two')->with([
            'userId' => $id,
            'remainingAttempts' => $maxAttempts - $attemptedAnswers,
            'errorMessage' => 'Answer does not exist.'
        ]);
    }
    

    public function validateStepThree(Request $request, $id) {   
        $validated = $request->validate([
            'password' => 'required',
            'confirm_password' => ['required', 'same:password'], 
        ]);

        $user = User::find($id);
    
        $user->password = bcrypt($validated['password']);
        
        $user->first_login = 'No';
        $user->save();

        return redirect('/login'); 
    }

    // update password function
    public function updatePassword(PasswordRequest $request, $id) 
    {
        {
            // compares current password in the input field to the authenticated user's password
            if (!Hash::check($request->current_password, auth()->user()->password)) {
                return redirect('/dashboard')->withErrors(['password' =>'Incorrect password. Please try again.']);
            }
            
            $validated = $request->validated();
            $user = User::find($id); // find the user using the user id passed in the url parameter

            $user->password = bcrypt($validated['confirm_password']);

            $user->save(); // save the changes to the user

            return redirect('/dashboard')->with('success', 'Password successfully changed.');
        }
    }
}
