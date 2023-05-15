<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profilePage()
    {
        //pagpapasa ng values sa view
        $user = Auth::user();
        return view('pages/profile', compact('user'));
    }

    public function login()
    {
        return view('pages/login');

    }

    public function editorHome()
    {
        return view('home',["msg"=>"I am Editor role"]);
    }

    public function adminHome()
    {
        return view('home',["msg"=>"I am Admin role"]);
    }
}
