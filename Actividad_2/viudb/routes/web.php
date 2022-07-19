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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/**
* Platforms Routes
*/
Route::group(['prefix' => 'platforms'], function() {
    Route::get('/', 'PlatformController@index')->name('platforms.index');
    Route::get('/create', 'PlatformController@create')->name('platforms.create');
    Route::post('/create', 'PlatformController@store')->name('platforms.store');
    Route::get('/{platform}/show', 'PlatformController@show')->name('platforms.show');
    Route::get('/{platform}/edit', 'PlatformController@edit')->name('platforms.edit');
    Route::patch('/{platform}/update', 'PlatformController@update')->name('platforms.update');
    Route::delete('/{platform}/delete', 'PlatformController@destroy')->name('platforms.destroy');
});


Route::get('/home', 'HomeController@index')->name('home');
