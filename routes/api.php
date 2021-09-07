<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Login Route
Route::post('/login', [AuthController::class, 'login']);
// Register Route
Route::post('/register', [AuthController::class, 'register']);
// Forget Password Route
Route::post('/forgetpassword', [ForgetController::class, 'forgetPassword']);
// Reset Password Route
Route::post('/resetpassword', [ResetController::class, 'resetPassword']);
// Current User Route
Route::get('/user', [UserController::class, 'user'])->middleware('auth:api');



