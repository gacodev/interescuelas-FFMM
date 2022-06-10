<?php

use Illuminate\Support\Facades\Route;

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

//Route::post('login', 'App\Http\Controllers\UserController@login')->name('login');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/participantes', [App\Http\Controllers\ParticipantController::class, 'index'])->name('participants');
Route::get('/participantes/crear', [App\Http\Controllers\ParticipantController::class, 'create'])->name('participants.create');
Route::get('/participantes/mostrar',  [App\Http\Controllers\ParticipantController::class, 'show'])->name('participants.show');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('sports')->name('sports/')->group(static function() {
            Route::get('/',                                             'SportsController@index')->name('index');
            Route::get('/create',                                       'SportsController@create')->name('create');
            Route::post('/',                                            'SportsController@store')->name('store');
            Route::get('/{sport}/edit',                                 'SportsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SportsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{sport}',                                     'SportsController@update')->name('update');
            Route::delete('/{sport}',                                   'SportsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('awards')->name('awards/')->group(static function() {
            Route::get('/',                                             'AwardsController@index')->name('index');
            Route::get('/create',                                       'AwardsController@create')->name('create');
            Route::post('/',                                            'AwardsController@store')->name('store');
            Route::get('/{award}/edit',                                 'AwardsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AwardsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{award}',                                     'AwardsController@update')->name('update');
            Route::delete('/{award}',                                   'AwardsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('docs')->name('docs/')->group(static function() {
            Route::get('/',                                             'DocsController@index')->name('index');
            Route::get('/create',                                       'DocsController@create')->name('create');
            Route::post('/',                                            'DocsController@store')->name('store');
            Route::get('/{doc}/edit',                                   'DocsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DocsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{doc}',                                       'DocsController@update')->name('update');
            Route::delete('/{doc}',                                     'DocsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('competences')->name('competences/')->group(static function() {
            Route::get('/',                                             'CompetencesController@index')->name('index');
            Route::get('/create',                                       'CompetencesController@create')->name('create');
            Route::post('/',                                            'CompetencesController@store')->name('store');
            Route::get('/{competence}/edit',                            'CompetencesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CompetencesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{competence}',                                'CompetencesController@update')->name('update');
            Route::delete('/{competence}',                              'CompetencesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('scores')->name('scores/')->group(static function() {
            Route::get('/',                                             'ScoresController@index')->name('index');
            Route::get('/create',                                       'ScoresController@create')->name('create');
            Route::post('/',                                            'ScoresController@store')->name('store');
            Route::get('/{score}/edit',                                 'ScoresController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ScoresController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{score}',                                     'ScoresController@update')->name('update');
            Route::delete('/{score}',                                   'ScoresController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('participants')->name('participants/')->group(static function() {
            Route::get('/',                                             'ParticipantsController@index')->name('index');
            Route::get('/create',                                       'ParticipantsController@create')->name('create');
            Route::post('/',                                            'ParticipantsController@store')->name('store');
            Route::get('/{participant}/edit',                           'ParticipantsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ParticipantsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{participant}',                               'ParticipantsController@update')->name('update');
            Route::delete('/{participant}',                             'ParticipantsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('nationalities')->name('nationalities/')->group(static function() {
            Route::get('/',                                             'NationalitiesController@index')->name('index');
            Route::get('/create',                                       'NationalitiesController@create')->name('create');
            Route::post('/',                                            'NationalitiesController@store')->name('store');
            Route::get('/{nationality}/edit',                           'NationalitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'NationalitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{nationality}',                               'NationalitiesController@update')->name('update');
            Route::delete('/{nationality}',                             'NationalitiesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('forces')->name('forces/')->group(static function() {
            Route::get('/',                                             'ForcesController@index')->name('index');
            Route::get('/create',                                       'ForcesController@create')->name('create');
            Route::post('/',                                            'ForcesController@store')->name('store');
            Route::get('/{force}/edit',                                 'ForcesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ForcesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{force}',                                     'ForcesController@update')->name('update');
            Route::delete('/{force}',                                   'ForcesController@destroy')->name('destroy');
        });
    });
});