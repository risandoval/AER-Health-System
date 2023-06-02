<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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
})->name('login');

//route for dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('dashboard', function () {
    return view('pages/dashboard');
})->middleware('auth');

// User Accounts routes
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::get('add', [UserController::class, 'add'])->name('add'); // add user view
    Route::get('/view/{id}', [UserController::class, 'show'])->name('show'); //individual user view
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit'); //edit user view
    Route::post('/store', [UserController::class, 'store'])->name('store'); //store user details
    Route::put('/update/{id}', [UserController::class, 'update'])->name('update'); //edit user
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::put('/archive/{id}', [UserController::class, 'archive'])->name('archive');
    Route::put('/update/password/{id}', [UserController::class, 'updatePassword'])->name('password');
});

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/process', [LoginController::class, 'process'])->name('process');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
