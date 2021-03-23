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
    return redirect()->route('login', 'admin');
});

Route::get('login/{role}', 'Auth\AuthController@viewLogin')->name('login');
Route::post('login/{role}', 'Auth\AuthController@postLogin')->name('login');
Route::get('logout/{role}', 'Auth\AuthController@logout')->name('logout');

Route::prefix('admin')->middleware('role:admin')->group(function (){
    Route::get('home', 'AdminController@home')->name('admin.home');

    Route::prefix('siswa')->group(function() {
        Route::get('data', 'SiswaAdminController@data')->name('admin.siswa.data');
        Route::get('edit/{id}', 'SiswaAdminController@edit')->name('admin.siswa.edit');
        
        Route::post('insert', 'SiswaAdminController@insert')->name('admin.siswa.insert');
        Route::put('update/{id}', 'SiswaAdminController@update')->name('admin.siswa.update');
        Route::get('destroy/{id}', 'SiswaAdminController@destroy')->name('admin.siswa.destroy');
    });

    Route::prefix('jurusan')->group(function() {
        Route::get('data', 'JurusanController@data')->name('admin.jurusan.data');
        Route::get('edit/{id}', 'JurusanController@edit')->name('admin.jurusan.edit');
        
        Route::post('insert', 'JurusanController@insert')->name('admin.jurusan.insert');
        Route::put('update/{id}', 'JurusanController@update')->name('admin.jurusan.update');
        Route::get('destroy/{id}', 'JurusanController@destroy')->name('admin.jurusan.destroy');
    });

    Route::prefix('mapel')->group(function() {
        Route::get('data', 'MapelController@data')->name('admin.mapel.data');
        Route::get('edit/{id}', 'MapelController@edit')->name('admin.mapel.edit');
        
        Route::post('insert', 'MapelController@insert')->name('admin.mapel.insert');
        Route::put('update/{id}', 'MapelController@update')->name('admin.mapel.update');
        Route::get('destroy/{id}', 'MapelController@destroy')->name('admin.mapel.destroy');
    });

    Route::prefix('kelas')->group(function() {
        Route::get('data', 'KelasController@data')->name('admin.kelas.data');
        Route::get('edit/{id}', 'KelasController@edit')->name('admin.kelas.edit');
        
        Route::post('insert', 'KelasController@insert')->name('admin.kelas.insert');
        Route::put('update/{id}', 'KelasController@update')->name('admin.kelas.update');
        Route::get('destroy/{id}', 'KelasController@destroy')->name('admin.kelas.destroy');
    });

    Route::prefix('guru')->group(function() {
        Route::get('data', 'GuruAdminController@data')->name('admin.guru.data');
        Route::get('edit/{id}', 'GuruAdminController@edit')->name('admin.guru.edit');
        
        Route::post('insert', 'GuruAdminController@insert')->name('admin.guru.insert');
        Route::put('update/{id}', 'GuruAdminController@update')->name('admin.guru.update');
        Route::get('destroy/{id}', 'GuruAdminController@destroy')->name('admin.guru.destroy');
    });

    Route::prefix('mengajar')->group(function() {
        Route::get('data', 'MengajarController@data')->name('admin.mengajar.data');
        Route::get('edit/{id}', 'MengajarController@edit')->name('admin.mengajar.edit');
        
        Route::post('insert', 'MengajarController@insert')->name('admin.mengajar.insert');
        Route::put('update/{id}', 'MengajarController@update')->name('admin.mengajar.update');
        Route::get('destroy/{id}', 'MengajarController@destroy')->name('admin.mengajar.destroy');
    });
});

Route::prefix('guru')->middleware('role:guru')->group(function(){
    Route::get('home', 'GuruController@home')->name('guru.home');

    Route::prefix('nilai')->group(function() {
        Route::get('data', 'GuruController@data')->name('guru.nilai.data');
        Route::get('create/{id}', 'GuruController@create')->name('guru.nilai.create');
        Route::get('edit/{id}', 'GuruController@edit')->name('guru.nilai.edit');
        
        Route::post('insert', 'GuruController@insert')->name('guru.nilai.insert');
        Route::put('update/{id}', 'GuruController@update')->name('guru.nilai.update');
        Route::get('destroy/{id}', 'GuruController@destroy')->name('guru.nilai.destroy');
    });
});

Route::prefix('siswa')->middleware('role:siswa')->group(function() {
    Route::get('home', 'SiswaController@home')->name('siswa.home');

    Route::prefix('nilai')->group(function() {
        Route::get('data', 'SiswaController@data')->name('siswa.nilai.data');
    });
});