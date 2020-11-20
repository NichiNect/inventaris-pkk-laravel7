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
    'remember_me' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::prefix('pengguna')->namespace('UserManagement')->group(function() {
        // petugas
        Route::get('/semua-petugas', 'PetugasController@index')->name('petugas.index');
        Route::get('/tambah-petugas', 'PetugasController@create')->name('petugas.create');
        Route::post('/tambah-petugas', 'PetugasController@store')->name('petugas.store');
        Route::get('/detail-petugas/{id}', 'PetugasController@show')->name('petugas.show');
        Route::get('/edit-data-petugas/{id}', 'PetugasController@edit')->name('petugas.edit');
        Route::patch('/edit-data-petugas/{id}', 'PetugasController@update')->name('petugas.update');
        Route::delete('/delete-data-petugas/{id}', 'PetugasController@destroy')->name('petugas.destroy');
        // pegawai
        Route::get('/semua-pegawai', 'PegawaiController@index')->name('pegawai.index');
        Route::get('/tambah-pegawai', 'PegawaiController@create')->name('pegawai.create');
        Route::post('/tambah-pegawai', 'PegawaiController@store')->name('pegawai.store');
        Route::get('/detail-pegawai/{id}', 'PegawaiController@show')->name('pegawai.show');
        Route::get('/edit-data-pegawai/{id}', 'PegawaiController@edit')->name('pegawai.edit');
        Route::patch('/edit-data-pegawai/{id}', 'PegawaiController@update')->name('pegawai.update');
        Route::delete('/delete-data-pegawai/{id}', 'PegawaiController@destroy')->name('pegawai.destroy');
    });

    Route::prefix('logistik')->namespace('Inventaris')->group(function() {
        // jenis
        Route::get('/jenis-inventaris', 'JenisController@index')->name('jenis.index');
        Route::get('/tambah-jenis-inventaris', 'JenisController@create')->name('jenis.create');
        Route::post('/tambah-jenis-inventaris', 'JenisController@store')->name('jenis.store');
        Route::get('/detail-jenis-inventaris/{id}', 'JenisController@show')->name('jenis.show');
        Route::get('/edit-jenis-inventaris/{id}', 'JenisController@edit')->name('jenis.edit');
        Route::patch('/edit-jenis-inventaris/{id}', 'JenisController@update')->name('jenis.update');
        Route::delete('/hapus-jenis-inventaris/{id}', 'JenisController@destroy')->name('jenis.destroy');
    });
});
