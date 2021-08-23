<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// route login, register, logout
Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::middleware('api')->get('/profile', [\App\Http\Controllers\AuthController::class, 'profile']);

// only admin can see data of this API
Route::middleware(['api', 'admin_verify'])->group(function(){
    Route::get('/user/list', [\App\Http\Controllers\UserController::class, 'show']);
    Route::get('/food/list', [\App\Http\Controllers\FoodController::class, 'show']);
    Route::get('/order/list', [\App\Http\Controllers\OrderController::class, 'show']);
    Route::post('/order/update', [\App\Http\Controllers\OrderController::class, 'update']);
});

// only member can see data of this API
Route::middleware(['api', 'member_verify'])->group(function(){
    Route::get('/{user}/food/list', [\App\Http\Controllers\UserController::class, 'foods']);
});
