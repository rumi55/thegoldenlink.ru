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

Route::prefix(config('filament.path'))
    ->middleware(['web'])
    ->group(function () {
        Route::get('/locale', function () {
            session()->put('locale', request('locale', 'ru'));

            return back();
        })->name('admin.locale');
    });

Route::view('/', 'welcome')
    ->name('home');
