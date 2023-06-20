<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('pages/login');
    }

    public function process(Request $request) {
        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
    
        $user = User::where('username', $validated['username'])->first();
        
        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return redirect('/login')->withErrors(['username' => 'Invalid username or password.']);
        } 
    
        if ($user->status == 'Inactive') {
            return redirect('/login')->withErrors(['status' => 'Your account is inactive.']);
        }
         
        if ($user->first_login == 'Yes') {
            auth()->login($user);
            $request->session()->regenerate();
            return redirect()->route('first-login', ['id' => $user->id])->with('message', 'Login success.');
        }

        auth()->login($user);
        $request->session()->regenerate();
    
        return redirect('/dashboard')->with('message', 'Login success.');
    }
}
