<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

// Route::get('/', [App\Http\Controllers\HomeController::class, 'login'])->name('login2');

//route for login view page
Route::get('/', function () {
    return view('pages/login');
})->name('backToLogin');

//route for dashboard
Route::get('dashboard', function () {
    return view('pages/dashboard');
});

// Route::get('/users', function () {
//     return view('pages/userAccounts/user-accounts');
// });


Route::get('/users', [App\Http\Controllers\HomeController::class, 'listOfUsers'])->name('listOfUsers');




Route::get('/users/add', function () {
    return view('pages/userAccounts/add-user-account');
});


//userData function in UserController
Route::post('/users/add', [UserController::class, 'userData']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login/process', [App\Http\Controllers\UserController::class, 'process']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('store');
Route::get('/add/user', [App\Http\Controllers\UserController::class, 'create'])->name('create');
Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('show');
Route::put('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::delete('/user/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete');
Route::put('/user/{id}', [App\Http\Controllers\UserController::class, 'archive'])->name('archive');


Auth::routes();

Route::middleware(['auth','user-role:admin'])->group(function(){

    Route::get('/profile', [App\Http\Controllers\HomeController::class,'profilePage'])->name('profile');
    
});


