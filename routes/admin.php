<?php

use App\Http\Controllers\Dashboard\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| admin file route ,Here's we write the routes of api {dashboard}
|
*/

Route::post("/login", [AdminController::class, "login"]);
// Reset and confirm Password
Route::group(['prefix' => 'password'], function () {
    Route::post('/reset', [AdminController::class, 'resetPassword']);
    Route::post('/confirm', [AdminController::class, 'confirmPassword']);
});
