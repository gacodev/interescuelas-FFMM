<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
/*
|--------------------------------------------------------------------------| API Routes|--------------------------------------------------------------------------|


*/
//Route::post('/login', [UserController::class ,'login']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('login', [UserController::class],'login')->name('login');
    Route::get('/test', function (Request $request) {
         return response()->json(['name' => 'test']);
    });
});