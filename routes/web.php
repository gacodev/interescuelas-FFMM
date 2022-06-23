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

    return view('auth/login');

});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/participantes', [App\Http\Controllers\ParticipantController::class, 'index'])->name('participants');
Route::post('/participantes/crear', [App\Http\Controllers\ParticipantController::class, 'create'])->name('participants.create');
Route::get('/participantes/registro', [App\Http\Controllers\ParticipantController::class, 'participantsregister'])->name('participants.registro');
Route::get('/participantes/mostrar',  [App\Http\Controllers\ParticipantController::class, 'show'])->name('participants.show');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/resultados', [App\Http\Controllers\scoreController::class, 'show'])->name('resultados');
Route::get('/resultados_data', [App\Http\Controllers\scoreController::class, 'show_data'])->name('resultados.data');
Route::get('/equipos', [App\Http\Controllers\StaffController::class, 'teams'])->name('staff.teams');
Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');
Route::post('/staff/create', [App\Http\Controllers\StaffController::class, 'create'])->name('staff.create');
Route::get('roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles');

Route::get('/forces/{force_id}/grade', [App\Http\Controllers\StaffController::class, 'grade_show'])->name('staff.grade_show');
Route::get('/sports/{sport_id}/gender/{gender_id}/categories', [App\Http\Controllers\CategoriesController::class, 'show'])->name('cagories.show');
