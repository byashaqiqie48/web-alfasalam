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

Route::prefix('warga_belajar')->namespace('Warga_belajar')->group(function () {
    Route::get('', 'DashboardWargaBelajarController@index')->name('halaman.utama');

    Route::prefix('auth')->namespace('Auth')->group(function () {
        Route::get('logout', 'LoginWargaBelajarController@logout')->name('warga_belajar.logout');
        Route::get('login', 'LoginWargaBelajarController@index')->name('warga_belajar.login.get')->middleware('guest');
        Route::post('login', 'LoginWargaBelajarController@login')->name('warga_belajar.login.post');

        Route::get('register', 'PendaftaranController@index')->name('warga_belajar.daftar');
    });
});


// Admin Route
Route::prefix('adm1n')->namespace('Admin')->group(function () {

    Route::prefix('auth')->namespace('Auth')->group(function () {
        Route::get('logout', 'LoginController@logout')->name('adm1n.logout');
        Route::get('login', 'LoginController@index')->name('adm1n.login.get');
        Route::post('login', 'LoginController@login')->name('adm1n.login.post');
    });

    Route::prefix('dashboard')->middleware('auth.admin')->group(function () {

        Route::get('', 'DashboardController@index')->name('adm1n.dashboard.index');

        Route::get('tahun_ajar', 'KelolaTahunAjarController@index')->name('tahun_ajar.index');
        Route::post('tahun_ajar/create', 'KelolaTahunAjarController@store')->name('tahun_ajar.store');
        Route::post('tahun_ajar/{id}/update', 'KelolaTahunAjarController@update')->name('tahun_ajar.update');
        Route::post('tahun_ajar/delete', 'KelolaTahunAjarController@delete')->name('tahun_ajar.delete');
    });
});
