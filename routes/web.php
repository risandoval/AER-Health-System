<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//route for login view page
Route::get('/', function () {
    return view('pages/login');
});


// routes for user accounts
Route::get('/users', function () {
    return view('pages/userAccounts/user-accounts');
});

// routes for user accounts

// //route for navbar
// Route::view('/', 'navbar');


//route for getData function in UserController
// Route::get('users', [UserController::class, 'getData']);
