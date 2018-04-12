<?php

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

Route::get('/', 'UserIndexController@index');
Route::get('event', 'UserIndexController@event');

Route::group(['prefix' => 'users', 'middleware'=>['auth','role:member']], function() {
    Route::get('myevent', 'UserIndexController@myevent');
    Route::get('{id}/detailevent', 'UserIndexController@detailevent');
    Route::post('{id}/daftar','UserIndexController@daftar');
    Route::post('{id}', 'UserIndexController@destroy');
});

Route::group(['prefix' => 'admin', 'middleware'=>['auth','role:admin']], function() {
    Route::get('/', function() {
        return view('admin.dashboard');
    });
    Route::group(['prefix' => 'event'], function() {
        Route::get('/', 'EventController@index');
        Route::get('/excel', 'LaporanController@eventexcel');
        Route::get('/pdf', 'LaporanController@eventpdf');
        Route::get('create', 'EventController@create');
        Route::post('/', 'EventController@store');
        Route::get('{id}/edit', 'EventController@edit');
        Route::post('{id}/update','EventController@update');
        Route::post('{id}','EventController@destroy');
    });

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', 'UsersController@index');
        Route::get('create', 'UsersController@create');
        Route::post('/', 'UsersController@store');
        Route::get('{id}/edit', 'UsersController@edit');
        Route::post('{id}/update','UsersController@update');
        Route::post('{id}','UsersController@destroy');
    });

    // Route::resource('/', 'BebasController');

    Route::group(['prefix' => 'peserta'], function() {
        Route::get('/', 'PesertaController@index');
        Route::get('{id}/view', 'PesertaController@view');
        Route::post('{id}','PesertaController@destroy');
    });

    Route::get('/logout', 'UsersController@logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
