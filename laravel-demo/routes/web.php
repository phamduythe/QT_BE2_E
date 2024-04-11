<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

Route::get('/', function () {
    return view('welcome');
});





Route::get('destroy/{id}', [CustomAuthController::class, 'destroy'])->name('destroy');
Route::get('update-user/{id}', [CustomAuthController::class, 'update'])->name('update');
Route::post('update-user/{id}', [CustomAuthController::class, 'customUpdate'])->name('update.custom');
