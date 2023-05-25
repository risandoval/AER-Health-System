<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;

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

Route::get('/users', [UserController::class, 'index'])->name('index ');
Route::post('/users/add', [UserController::class, 'userData']);
Route::post('/store', [UserController::class, 'store'])->name('store');
Route::get('/user/view/{id}', [UserController::class, 'show'])->name('show'); //show view user
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit'); //show edit user
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('update'); //edit user
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('delete');
Route::put('/user/{id}', [UserController::class, 'archive'])->name('archive');

Route::prefix('users')->group(function () {

});

//userData function in UserController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login/process', [App\Http\Controllers\UserController::class, 'process']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');


Route::middleware(['auth','user-role:admin'])->group(function(){
    Route::get('/profile', [App\Http\Controllers\HomeController::class,'profilePage'])->name('profile');
});


