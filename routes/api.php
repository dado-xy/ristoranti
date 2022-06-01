<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartnerController;
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
Route::post('/login', [LoginController::class, 'loginApi']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'registerApi']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('/logout', [LoginController::class, 'logoutApi']);

    Route::get('/partners', [PartnerController::class, 'indexApi']);
    Route::get('/products/{id}', [PartnerController::class, 'showProductApi']);

    Route::prefix('order')->group(function () {
        Route::post('/create', [OrderController::class, 'create']);
        Route::get('/detail', [OrderController::class, 'show']);
    });
});
