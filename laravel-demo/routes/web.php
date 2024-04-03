<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');

Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


//list user
Route::get('list', [CustomAuthController::class, 'list'])->name('list.user');
//add user
Route::get('add-user', [CustomAuthController::class, 'create'])->name('add.user');
//destroy user
Route::get('destroy/{id}', [CustomAuthController::class, 'destroy'])->name('destroy');
//update user
Route::get('update-user/{id}', [CustomAuthController::class, 'update'])->name('update');
Route::post('update-user/{id}', [CustomAuthController::class, 'customUpdate'])->name('update.custom');
//view user
<<<<<<< HEAD
Route::get('viewprofie/id{id}', [CustomAuthController::class, 'view'])->name('viewprofie');
=======
Route::get('viewprofie/id{id}', [CustomAuthController::class, 'view'])->name('viewprofie');
>>>>>>> khiem
