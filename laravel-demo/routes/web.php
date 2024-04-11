<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD

//list user
Route::get('list', [CustomAuthController::class, 'list'])->name('list.user');
//view user
Route::get('viewprofie/id{id}', [CustomAuthController::class, 'view'])->name('viewprofie');
=======




Route::get('destroy/{id}', [CustomAuthController::class, 'destroy'])->name('destroy');
Route::get('update-user/{id}', [CustomAuthController::class, 'update'])->name('update');
Route::post('update-user/{id}', [CustomAuthController::class, 'customUpdate'])->name('update.custom');
>>>>>>> khiem
