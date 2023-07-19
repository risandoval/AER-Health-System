<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Rules\Validation;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Client;
use App\Models\Audit_history; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UserController extends Controller {

    //-----------------------------db relationship - testing pages -------------------------
    public function test() {   
        $client = Client::all();
        return view('pages/userAccounts/testing',  compact('client'));
    }

    public function showClient($id) {
        $Client = Client::find($id);
        return view('pages/userAccounts/testing_view_client', compact('Client'));
    }
    //-----------------------------db relationship -  testing pages -------------------------

    //---------- user account tab ----------
    public function index() {   
        $activeUser = User::where('status', 'active')->paginate(10);
        $inactiveUser = User::where('status', 'inactive')->paginate(10);
        $passwordRequest = User::where('password_request', 'Yes')->paginate(10);
        return view('pages/userAccounts/user-accounts',  compact('activeUser', 'inactiveUser', 'passwordRequest'));
    }

    //---------- log out user ----------
    public function logout(Request $request) { 
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout Successful');
    }

    //---------- search users - Search for users based on search query ----------
    public function searchUsers(Request $request) {
        $search = $request->get('search');

        if ($search) {
            $allUser = User::where('first_name', 'like', '%'.$search.'%')
            ->orWhere('last_name', 'like', '%'.$search.'%')
            ->orWhere('username', 'like', '%'.$search.'%')
            ->paginate(10);

            if ($search) {
                $allUser->appends(['search' => $search]); // Append 'search' to pagination links
            }

            return view('pages/userAccounts/search-result', compact('allUser', 'search'));
        } 
        else {
            return view('pages/userAccounts/search-result', compact('search'))->with('noResult', 'No results found');
        }
    }

    //---------- Add new user ----------
    public function store(UserRequest $request) {    
        $validated = $request->validated();
    
        $validated['profile_picture'] = 'default-profile.jpg';
        $validated['first_name'] = ucfirst($validated['first_name']);
        $validated['middle_name'] = ucfirst($validated['middle_name']);
        $validated['last_name'] = ucfirst($validated['last_name']);

        // Map role to role_id
        $roleMapping = [
            'Admin' => 1,
            'Barangay Health Worker' => 2,
            'Doctor' => 3
        ];
        $validated['role_id'] = $roleMapping[$validated['role']];

        $validated['password'] = bcrypt($validated['birthday']);
        $validated['status'] = 'Active';

        // Retrieve the latest username from the database
        $latestUsername = User::latest('id')->first();
        $lastNumber = $latestUsername ? intval(substr($latestUsername->username, 1)) : 0;
        $nextNumber = sprintf("%04d", $lastNumber + 1);
        $validated['username'] = $validated['last_name'][0] . $nextNumber;

        $user = new User($validated);
        $user->save();

        // Create an audit history record
        $history = new audit_history();
        $history->username = auth()->user()->username;
        $history->full_name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $history->action = 'Added a new user - ' . $validated['username'];
        $history->save();

        return redirect('/users/add')->with('success', 'New User Added Successfully');
    }
    public function add() {
        return view('pages/userAccounts/add-user');
    }

    //---------- view user information page ----------
    public function show($id){
        $viewUser = User::findOrFail($id);
        return view('pages/userAccounts/view-user', compact('viewUser'));
    }

    //---------- update user information ----------
    public function update(UserRequest $request, $id) {
        $validated = $request->validated();
        
        //Check if the user uploaded a file
        if ($request->hasFile('profile_picture')) {
            $uploadedFile = $request->file('profile_picture');
            $imageName = time().'.'.$uploadedFile->extension();
            $imagePath = $uploadedFile->storeAs('', $imageName, 'profile_pic_folder');
            $validated['profile_picture'] = $imagePath;
        }

        $user = User::find($id);
        $user->update($validated);

        // Create an audit history record
        $history = new audit_history();
        $history->username = auth()->user()->username;
        $history->full_name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $history->action = 'Edited a user -'.' '.  $validated['username'];
        $history->save();

        return redirect()->back()->withInput()->with('success', 'Data was successfully updated');
    }

    //---------- Update user's password ----------
    public function updatePassword(PasswordRequest $request, $id) {
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

    //---------- Archive users ----------
    public function archive($id) {   
        $user = User::find($id);

        if ($user) {
            $user->status = 'Inactive';
            $user->save();
           
            // Create an audit history record
            $history = new audit_history();
            $history->username = auth()->user()->username;
            $history->full_name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
            $history->action = 'Archived a user -'.' '.$user->username;
            $history->save();
        }

        return back()->with('archiveSuccess', 'Account was successfully archived');
    }

    //---------- Unarchive users ----------
    public function unarchive($id) {
        $user = User::find($id);

        if ($user) {
            $user->status = 'Active';
            $user->save();

            $username = auth()->user()->username;
            $fullName = auth()->user()->first_name . ' ' . auth()->user()->last_name;
            $action = 'Restored an inactive user -'.' '.$user->username;
           
            $history = new audit_history();
            $history->username = $username;
            $history->full_name = $fullName;
            $history->action = $action;
            $history->created_at = Carbon::now('Asia/Manila');
            $history->updated_at = Carbon::now('Asia/Manila');
            $history->save();
        } 

        return back()->with('message', 'Data was successfully updated');
    }

    //---------- Reset user's password ----------
    public function reset($id) {
        $user = User::find($id);

        if ($user) {
            $new_pw = $user->birthday;
            $user->password = bcrypt($new_pw);
            $user->password_request = 'No';
            $user->first_login = 'Yes';
            $user->save();
            
            // Create an audit history record
            $history = new audit_history();
            $history->username = auth()->user()->username;
            $history->full_name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
            $history->action = 'Reset a password -'.' '.$user->username;
            $history->save();
        }
       
        return back()->with('message', 'Data was successfully updated');
    }

    //---------- First time login page ----------
    public function firstLogin($id) {   
        return view('pages/first-login', compact('id'));
    }
    public function validateFirstLogin(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'question' => 'required',
            'answer' => 'required',
        ],
        [
            'confirm_password.same' => 'Password does not match.'
        ]);
    
        if ($validator->fails()) { // Validation failed
            return redirect()->back()->withErrors($validator)->withInput()->with('id', $id);
        }
        $user = User::find($id);
    
        $user->password = bcrypt($request->input('password'));
        $user->security_question = $request->input('question');
        $user->security_answer = $request->input('answer');
        $user->first_login = 'No';
        $user->save();

        $request->session()->flash('id', $id);
    
        return redirect('/login')->with('message', 'Change password successful. Please login to your account.'); 
    }

    
    //---------- Forgot password - step 1-3 pages ----------
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

    //---------- Forgot password - step 1-3 validations ----------
    public function validateStepOne(Request $request) {
        $validated = $request->validate([
            'username' => ['required'],
        ]);

        $username = $validated['username']; // Retrieve the validated username from the request
        $user = User::where('username', $username)->first();

        if (!$user) { // Username does not exist, handle the error
            return redirect('/validation')->withErrors(['username' => 'Username does not exist.']);
        }

        $userId = $user->id;
        $question = $user->security_question;

        return view('pages/forgotPassword/step-two', [
            'userId' => $userId,
            'security_question' => $question,
            'remainingAttempts' => 3,
        ]);
    }

    public function validateStepTwo(Request $request, $id) {
        $validated = $request->validate([
            'answer' => ['required']
        ]);
    
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
    
        $user = User::find($id);
        $question = $user->security_question;
    
        if ($user->security_answer == $validated['answer']) {
            return view('pages/forgotPassword/step-three', ['userId' => $id]);
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

        $data = [
            'userId' => $id,
            'security_question' => $question,
            'remainingAttempts' => $maxAttempts - $attemptedAnswers,
            'errorMessage' => 'Answer does not exist.',
            'answer' => 'Answer does not exist.',
            'question' => 'Invalid Security Question.',
        ];
        
        return view('pages/forgotPassword/step-two', $data);
    }
    

    public function validateStepThree(Request $request, $id) {
        $validated = $request->validate([
            'password' => 'required',
            'confirm_password' => ['required'],
        ]);

        if ($validated['password'] === $validated['confirm_password']) {
            $user = User::find($id);

            $user->password = bcrypt($validated['password']);
            $user->first_login = 'No';
            $user->save();

            return redirect('/login');
        } else {
            return view('pages/forgotPassword/step-three', ['userId' => $id])->withErrors(['confirm_password' => 'The password and confirm password must match.']);
        }
    }

    //---------- Export users table ----------
    public function export() {   
       // Create an audit history record
        $history = new audit_history();
        $history->username = auth()->user()->username;
        $history->full_name = auth()->user()->first_name . ' ' . auth()->user()->last_name;
        $history->action = 'Exported users table';
        $history->save();

        // Download the CSV file of all user data
        return Excel::download(new UsersExport, 'users.csv');
    }

    //---------- Audit log page ----------
    public function auditLog() {
        // $audit = Audit_history::paginate(10);
        //get Audit_history from bottom to top
        $audit = Audit_history::orderBy('id', 'desc')->paginate(10);
        return view('pages/auditLog/audit-log',  compact('audit'));
    }
}
