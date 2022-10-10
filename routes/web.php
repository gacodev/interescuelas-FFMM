<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\AwarsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DisciplinesController;
use App\Http\Controllers\TeamController;
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
    return view('welcome');
});
Route::controller(TeamController::class)
    ->group(function () {
        Route::get('/equipos', 'index')->name('teams.index');
        Route::get('/equipos/form', 'teams_create')->name('teams.form');
        Route::post('/equipos/crear', 'create')->name('teams.create');
        Route::get('/forces/{force_id}/grade', 'grade_show')->name('teams.grade_show');
        Route::get('/disciplines', 'getDisciplineBySport')->name('sport.disciplines');
    });
Route::controller(ScoreController::class)
    ->group(function () {
        Route::get('/resultados', 'show')->name('resultados');
        Route::get('/resultados_data', 'show_data')->name('resultados.data');
        Route::post('scores', 'store')->name('scores');
        Route::get('/medalleria', 'index')->name('medalleria');
        Route::get('/medalleria/{sport}', 'getDisciplineBySport');
        Route::get('/medalleria/sport/{discipline}', 'getParticipantsByDiscipline');
        Route::get('/medalleria/{sport}/{discipline}/{participant}', 'getAwardsByParticipant');
    });


Route::get('/participantes',  [ParticipantController::class,'index'])->name('participants');
Auth::routes();

Route::controller(ParticipantController::class)
    ->group(function () {
        Route::get('/participantes/mostrar',   'show')->name('participants.show');
        Route::post('/participantes/crear',  'create')->name('participants.create');
        Route::get('/participantes/editar',  'create')->name('participants.edit');
        Route::put('/participantes/{participant}',  'update')->name('participants.update');
        Route::get('/participantes/registro',  'participantsregister')->name('participants.registro');
        Route::post('/importparticipants', 'importExcel')->name('import.excel');
        Route::get('/importeExcel', 'import')->name('excel.imports');
    });

Route::get('roles', [RoleController::class, 'index'])->name('roles');

Route::controller(DisciplinesController::class)
    ->group(function(){
        Route::get('/disciplinas', 'index')->name('disciplines');
        Route::delete('/disciplinas/{discipline}', 'destroy')->name('disciplines');
        Route::get('/sports/{sport_id}/gender/{gender_id}/Disciplines','show')->name('cagories.show');
    });


