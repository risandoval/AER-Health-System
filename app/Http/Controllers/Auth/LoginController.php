<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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
        $input = $request->all();

        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $user = User::where('username', $validated['username'])->first();
        // dd($user);

        if (!$user) {
                return redirect('/login')->withErrors(['username' => 'Username does not exist.']);
        }

        //authentication success - checks if first time user or not
        elseif (auth()->attempt(['username' => $validated['username'], 'password' => $validated['password']])) {
            // User is inactive, cannot login
            if ($user->status == 'Inactive') {
                return redirect('/login')->withErrors(['status' => 'Your account is inactive.']);
            } else {
                if ($user->first_login == 'Yes') {
                    return redirect('/first-login')->with('message', 'Login success.')->with('id', $user->id);
                } else {
                    $request->session()->regenerate();
                    // $id = auth()->user()->id;
                    return redirect('/dashboard')->with('message', 'Login success.');
                }
            }
        }

        else {
            return redirect('/login')->withErrors(['password' => 'Incorrect password.']);
        }
        
    }





//-------------------- DEFAULT LOGIN -------------------------
    // public function process(Request $request){
    //     $input = $request->all();

    //     $validated = $request->validate([
    //         'username' => ['required'],
    //         'password' => ['required']
    //     ]); 

    //     if (auth()->attempt(['username' => $input['username'], 'password' => $input['password'], 'first_login' => 'Yes'])) {
    //         $request->session()->regenerate();


    //     //accessing the value of the id
    //     //  dd(auth()->user()->id);
        
    //     $id = auth()->user()->id;
    //     return redirect('/first-login')->with('message', 'Login success.')->with('id', $id);

    //     //  return view('pages/first-login',  compact('id'));
        
    //         // return redirect('/first-login')->with('message', 'Login success.');
    //     } 
        
    //     else if(auth()->attempt(['username' => $input['username'], 'password' => $input['password'], 'first_login' => 'No'])){
    //         $request->session()->regenerate();
    //         return redirect('/dashboard')->with('message', 'Login success.');

    //     }

    //     else {
    //         return redirect('/login');
    //     }
    // }
}
