<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
<<<<<<< HEAD

// Route::get('/', function () {
//     return view('welcome');
// });

//registration
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 

//list user
Route::get('list', [CustomAuthController::class, 'list'])->name('list.user');
//view user
Route::get('viewprofie/id{id}', [CustomAuthController::class, 'view'])->name('viewprofie');
//destroy, update
Route::get('destroy/{id}', [CustomAuthController::class, 'destroy'])->name('destroy');
Route::get('update-user/{id}', [CustomAuthController::class, 'update'])->name('update');
Route::post('update-user/{id}', [CustomAuthController::class, 'customUpdate'])->name('update.custom');


=======

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
>>>>>>> hung
