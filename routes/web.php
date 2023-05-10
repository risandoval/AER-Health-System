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

//route for dashboard
Route::get('dashboard', function () {
    return view('pages/dashboard');
});

//route for profile page
// Route::get('profile', function () {
//     return view('pages/profile');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/login/process', [App\Http\Controllers\UserController::class, 'process']);
Route::post('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
// Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profilePage'])->middleware('auth');
//Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profilePage'])->middleware('user-role:admin');



// //User Route
// Route::middleware(['auth','user-role:user'])->group(function(){

//     Route::get('/user/home', [HomeController::class,'userHome'])->name('home.user');
// });

// //Editor Route
// Route::middleware(['auth','user-role:editor'])->group(function(){

//     Route::get('/editor/home', [HomeController::class,'editorHome'])->name('home.editor');
// });

//Admin Route
Route::middleware(['auth','user-role:admin'])->group(function(){

    Route::get('/profile', [App\Http\Controllers\HomeController::class,'profilePage'])->name('profile');
    
});


