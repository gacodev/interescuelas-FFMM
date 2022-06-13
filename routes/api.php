<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ParticipantController;


Route::group([
    'prefix' => 'v1'
], function () {
    Route::post('login', [ApiAuthController::class, "login"]);


    Route::post('signup', [ApiAuthController::class, "signUp"]);

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', [ApiAuthController::class, "logout"]);
        Route::get('user', [ApiAuthController::class, "user"]);
        Route::get('info', [ParticipantController::class, "index"]);
        Route::get('data', [ParticipantController::class, 'index'])->name('data');
    });
});
