<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\App\ColorApiController;
use App\Http\Controllers\Api\App\ProductApiController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisterController::class, 'register'])->name("auth.register");
Route::post('/login', [LoginController::class,'login'])->name('auth.login');
Route::post('/logout',[LogoutController::class, 'logout'])->name('auth.logout');

Route::apiResource('/products',ProductApiController::class);

Route::middleware('auth:sanctum')->group(function (){
    Route::apiResource('/colors', ColorApiController::class);
});
