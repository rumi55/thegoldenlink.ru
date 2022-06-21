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

Route::redirect('/login', config('filament.path'))->name('login');

/** Admin */
Route::prefix(config('filament.path'))
    ->middleware(['web'])
    ->group(function () {
        Route::get('/locale', [\App\Http\Controllers\LocaleController::class, 'change'])
            ->name('admin.locale');
    });

/** Public */
Route::group([
    'middleware' => [\App\Http\Middleware\LocaleMiddleware::class]
], function () {
    Route::get('/locale', [\App\Http\Controllers\LocaleController::class, 'change'])
        ->name('locale');

    /** Home */
    Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])
        ->name('home');

    /** Events */
    Route::get('/events', [\App\Http\Controllers\EventController::class, 'index'])
        ->name('events');

    Route::get('/events/{id}', [\App\Http\Controllers\EventController::class, 'show'])
        ->name('events.show');

    /** Teachers */
    Route::get('/teachers', [\App\Http\Controllers\TeacherController::class, 'index'])
        ->name('teachers');

    Route::get('/teachers/{id}', [\App\Http\Controllers\TeacherController::class, 'show'])
        ->name('teachers.show');

    /** Contacts */
    Route::get('/contacts', [\App\Http\Controllers\TeacherController::class, 'show'])
        ->name('contacts');
});
