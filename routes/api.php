<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;


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
    });
});
