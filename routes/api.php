<?php

use App\Http\Controllers\Api\AccessTokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/auth/register', [AccessTokenController::class, 'register']);
Route::post('/auth/login', [AccessTokenController::class, 'login']);
// Route::delete('/auth/logout', [AccessTokenController::class, 'logout']);
Route::post('auth/password/email', [AccessTokenController::class , 'sendPasswordResetLinkEmail'])->name('password.email');
Route::post('auth/password/reset', [AccessTokenController::class , 'resetPassword'])->name('password.reset');
Route::get('auth/refresh', [AccessTokenController::class, 'refresh'])->middleware('auth:sanctum');
Route::delete('auth/tokens' , [AccessTokenController::class , 'logout'])->middleware('auth:sanctum');
Route::apiResource('/User','Api\UserController') ;