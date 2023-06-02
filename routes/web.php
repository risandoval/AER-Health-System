<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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
Route::get('/', function () { return view('pages/login'); });
Route::get('/first-login', [UserController::class, 'firstLogin']);
Route::post('/validateFirstLogin', [UserController::class, 'validateFirstLogin'])->name('validateFirstLogin');

//route for forgot password
Route::get('/validation', [UserController::class, 'stepOne']);
Route::get('/security-question', [UserController::class, 'stepTwo']);
Route::get('/change-password', [UserController::class, 'stepThree']);
Route::post('/validateStepOne', [UserController::class, 'validateStepOne'])->name('validateStepOne');
Route::post('/validateStepTwo', [UserController::class, 'validateStepTwo'])->name('validateStepTwo');
Route::post('/validateStepThree', [UserController::class, 'validateStepThree'])->name('validateStepThree');


//route for dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('dashboard', function () { return view('pages/dashboard'); });

// User Accounts routes
Route::prefix('users')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::get('add', [UserController::class, 'add'])->name('add'); // add user view
    Route::get('/view/{id}', [UserController::class, 'show'])->name('show'); //individual user view
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit'); //edit user view
    Route::post('/store', [UserController::class, 'store'])->name('store'); //store user details
    Route::put('/update/{id}', [UserController::class, 'update'])->name('update'); //edit user
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::put('/archive/{id}', [UserController::class, 'archive'])->name('archive');
    Route::put('/unarchive/{id}', [UserController::class, 'unarchive'])->name('unarchive');
});

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/process', [LoginController::class, 'process'])->name('process');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth','user-role:admin'])->group(function(){
    Route::get('/profile', [HomeController::class,'profilePage'])->name('profile');
});