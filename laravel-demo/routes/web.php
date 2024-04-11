<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/', function () {
    return view('welcome');
});


//list user
Route::get('list', [CustomAuthController::class, 'list'])->name('list.user');
//view user
Route::get('viewprofie/id{id}', [CustomAuthController::class, 'view'])->name('viewprofie');