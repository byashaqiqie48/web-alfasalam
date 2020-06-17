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

// Admin Route
Route::prefix('adm1n')->namespace('Admin')->group(function () {

    Route::prefix('auth')->namespace('Auth')->group(function () {
        Route::get('logout', 'LoginController@logout')->name('adm1n.logout');
        Route::get('login', 'LoginController@index')->name('adm1n.login.get');
        Route::post('login', 'LoginController@login')->name('adm1n.login.post');
    });

    Route::prefix('dashboard')->middleware('auth.admin')->group(function () {
        //Route admin dashboard isi disini
        Route::get('', 'DashboardController@index')->name('adm1n.dashboard.index');
        Route::get('sesi', 'TahunAjarController@index')->name('sesi.index');
    });


    
});
