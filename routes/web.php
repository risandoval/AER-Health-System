<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FirstEncounterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\OneEfClient;
use Database\Factories\ClientFactory;

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

// ---------------------db relationship-----------------------

Route::get('/client', function(){

    
    // one_pm::factory()->count(3)->create();
    Client::factory()->count(10)->create();
    // factory(\App\Model\Client::class, 10)-create();

});

Route::get('/test', [UserController::class, 'test']);


Route::get('client/view/{id}', [UserController::class, 'showClient'])->name('showClient'); //individual user view

// ---------------------db relationship-----------------------




//route for login view page
Route::get('/first-login/{id}', [UserController::class, 'firstLogin'])->name('first-login');
Route::post('/validateFirstLogin/{id}', [UserController::class, 'validateFirstLogin'])->name('validateFirstLogin');

//route for forgot password
Route::get('/validation', [UserController::class, 'stepOne']);
Route::get('/security-question', [UserController::class, 'stepTwo']);
Route::get('/change-password', [UserController::class, 'stepThree']);
Route::post('/validateStepOne', [UserController::class, 'validateStepOne'])->name('validateStepOne');
Route::post('/validateStepTwo/{id}', [UserController::class, 'validateStepTwo'])->name('validateStepTwo');
Route::post('/validateStepThree/{id}', [UserController::class, 'validateStepThree'])->name('validateStepThree');


//route for dashboard
Route::get('dashboard', [HomeController::class, 'index'])->middleware('auth')->name('home');

// User Accounts routes
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::get('add', [UserController::class, 'add'])->name('add'); // add user view
    Route::get('/view/{id}', [UserController::class, 'show'])->name('show'); //individual user view
    Route::post('/store', [UserController::class, 'store'])->name('store'); //store user details
    Route::put('/update/{id}', [UserController::class, 'update'])->name('update'); //edit user
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::put('/archive/{id}', [UserController::class, 'archive'])->name('archive');
    Route::put('/unarchive/{id}', [UserController::class, 'unarchive'])->name('unarchive');
    Route::put('/reset/{id}', [UserController::class, 'reset'])->name('reset');
    Route::put('/update/password/{id}', [UserController::class, 'updatePassword'])->name('password');
    Route::get('/export', [UserController::class, 'export'])->name('export');
    Route::get('search', [UserController::class, 'searchUsers']);
});

//1st Encounter routes
Route::prefix('first-encounter')->middleware('auth')->group(function () {
    Route::get('', [FirstEncounterController::class, 'index'])->name('index');
    Route::get('/exportClients', [FirstEncounterController::class, 'exportClient'])->name('export');
    Route::get('/exportCSVTemplate', [FirstEncounterController::class, 'exportCSVTemplate'])->name('export');
    Route::get('/view/{id}', [FirstEncounterController::class, 'show'])->name('show');
    Route::get('search', [FirstEncounterController::class, 'searchPatient']);
    Route::post('/import', [FirstEncounterController::class, 'import']);
});

//Route for Audit Log
Route::prefix('audit-log')->middleware('auth')->group(function () {
    Route::get('', [UserController::class, 'auditLog'])->name('auditLog');
});


// Login Routes
Route::middleware('guest')->group(function() {
    Route::get('', [LoginController::class, 'index'])->name('login');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/process', [LoginController::class, 'process'])->name('process');
});

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');

