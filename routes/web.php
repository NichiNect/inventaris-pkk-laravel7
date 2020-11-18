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
    return redirect()->route('dashboard');
});

Auth::routes([
    'reset' => false,
    'remembered' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::prefix('pengguna')->group(function() {
        Route::get('/semua-petugas', 'PetugasController@index')->name('petugas.index');
        Route::get('/tambah-petugas', 'PetugasController@create')->name('petugas.create');
        Route::post('/tambah-petugas', 'PetugasController@store')->name('petugas.store');
        Route::get('/detail-petugas/{id}', 'PetugasController@show')->name('petugas.show');
        Route::get('/edit-data-petugas/{id}', 'PetugasController@edit')->name('petugas.edit');
        Route::patch('/edit-data-petugas/{id}', 'PetugasController@update')->name('petugas.update');
        Route::delete('/delete-data-petugas/{id}', 'PetugasController@destroy')->name('petugas.destroy');
    });
});
