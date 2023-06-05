<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('pages/login');
    }

    public function process(Request $request){
        $input = $request->all();

        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]); 

        if (auth()->attempt(['username' => $input['username'], 'password' => $input['password']])) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('message', 'Login success.');
        } else {
            return redirect('/login');
        }
    }
}
