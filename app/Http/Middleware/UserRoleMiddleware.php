<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if(Auth::check() && Auth::user()->role == $role){
            
            return $next($request);
            // dd($request->all(), $role);
            
        }

        else{
            //Redirecting shit
            return redirect('/')->with('message', 'Logout Successful');
            // return response()->json(["You don't have permission to access this page"]);
        }

        
    }
}
