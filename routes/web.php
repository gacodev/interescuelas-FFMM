<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\AwarsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DisciplineController;
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
        Route::get('/forces/{force_id}/range', 'range_show')->name('teams.range_show');
        Route::get('/disciplines', 'getDisciplineBySport')->name('sport.disciplines');
        Route::post('/equipos/desasociar', 'desasociar')->name('teams.desasociar');
        Route::post('/equipos/asignar/{data}', 'update')->name('teams.asignar');
        Route::post('/equipos/eliminar/{data}', 'quitar')->name('teams.quitar');
        Route::post('/equipos/asociar/{team}', 'asociar')->name('teams.asociar');
        Route::delete('/equipos/{team}',  'destroy')->name('teams.destroy');
    });
Route::controller(ScoreController::class)
    ->group(function () {
        Route::get('/resultados', 'show')->name('resultados');
        Route::get('/resultados_data', 'show_data')->name('resultados.data');
        Route::post('scores', 'store')->name('scores');
        Route::delete('scores', 'deleteScore')->name('deleteScores');
        Route::get('/medalleria', 'index')->name('medalleria');
        Route::get('/medalleria/{sport}', 'getDisciplineBySport');
        Route::get('/medalleria/sport/{discipline}', 'getParticipantsByDiscipline');
        Route::get('/medalleria/{sport}/{discipline}/{participant}', 'getAwardsByParticipant');
    });

Auth::routes();

Route::controller(ParticipantController::class)
    ->group(function () {
        Route::get('/participantes',   'index')->name('participants.show');
        Route::post('/participantes/crear',  'create')->name('participants.create');
        Route::get('/participantes/editar',  'edit')->name('participants.edit');
        Route::put('/participantes/{participant}',  'update')->name('participants.update');
        Route::delete('/participantes/{participant}',  'destroy')->name('participants.destroy');
        Route::get('/participantes/registro',  'participantsregister')->name('participants.registro');
        Route::post('/importparticipants', 'importExcel')->name('import.excel');
        Route::get('/importeExcel', 'import')->name('excel.imports');
        Route::post('/participantes/asociar',   'asociar')->name('participants.asociar');
        Route::post('/participant/desasociar',   'desasociar')->name('participants.desasociar');
    });

Route::controller(RoleController::class)
->group(function (){
    Route::get('/roles', 'index')->name('roles');
    Route::post('/roles/create', 'create')->name('roles');
    Route::put('/roles/{role}', 'update')->name('roles');
    Route::put('/roles/{role}', 'update')->name('roles');
});


Route::controller(DisciplineController::class)
    ->group(function(){
        Route::get('/disciplinas', 'index')->name('disciplines');
        Route::post('/disciplinas/create', 'create')->name('disciplines.create');
        Route::put('/disciplinas/{discipline}', 'update')->name('disciplines.update');
        Route::delete('/disciplinas/{discipline}', 'destroy')->name('disciplines.destroy');
        Route::get('/sports/{sport_id}/gender/{gender_id}/Disciplines','show')->name('cagories.show');
    });


