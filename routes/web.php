<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    /*
    return view('welcome');
    */
    return Storage::disk('public_site')->get('index.html');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/participantes', [App\Http\Controllers\ParticipantController::class, 'index'])->name('participants');
Route::get('/participantes/crear', [App\Http\Controllers\ParticipantController::class, 'create'])->name('participants.create');
Route::get('/participantes/mostrar',  [App\Http\Controllers\ParticipantController::class, 'show'])->name('participants.show');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
