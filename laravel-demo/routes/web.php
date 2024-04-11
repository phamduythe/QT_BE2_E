<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/', function () {
    return view('welcome');
});


//list user
Route::get('list', [CustomAuthController::class, 'list'])->name('list.user');
//view user
<<<<<<< HEAD
Route::get('viewprofie/id{id}', [CustomAuthController::class, 'view'])->name('viewprofie');
//destroy, update
Route::get('destroy/{id}', [CustomAuthController::class, 'destroy'])->name('destroy');
Route::get('update-user/{id}', [CustomAuthController::class, 'update'])->name('update');
Route::post('update-user/{id}', [CustomAuthController::class, 'customUpdate'])->name('update.custom');
<<<<<<< HEAD
>>>>>>> khiem
=======
Route::get('viewprofie/id{id}', [CustomAuthController::class, 'view'])->name('viewprofie');
>>>>>>> parent of 1112c84 (Merge branch 'the')
=======
>>>>>>> origin/master
