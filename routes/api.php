<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('movies', [MovieController::class, 'index']);
Route::get('movie/{id}', [MovieController::class, 'show']);


Route::middleware(['auth:api'])->group(function(){
    Route::get('check', [PassportAuthController::class, 'check']);
    Route::post('reservation', [ReservationController::class, 'store']);
    Route::get('reservations', [ReservationController::class, 'index']);
    Route::group(['middleware' => ['admin']], function () {
        Route::post('movie', [MovieController::class, 'store']);
    });
});
