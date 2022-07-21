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

// TODO: cómo se cambia el idioma?
Route::get('/locale/{locale}', function ($locale) {
    App::setLocale($locale);
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
    Route::post('/{platform}/update', 'PlatformController@update')->name('platforms.update');
    Route::delete('/{platform}/delete', 'PlatformController@destroy')->name('platforms.destroy');
});

Route::group(['prefix' => 'celebrities'], function() {
    Route::get('/', 'CelebrityController@index')->name('celebrities.index');
    Route::get('/create', 'CelebrityController@create')->name('celebrities.create');
    Route::post('/create', 'CelebrityController@store')->name('celebrities.store');
    Route::get('/{celebrity}/show', 'CelebrityController@show')->name('celebrities.show');
    Route::get('/{celebrity}/edit', 'CelebrityController@edit')->name('celebrities.edit');
    Route::post('/{celebrity}/update', 'CelebrityController@update')->name('celebrities.update');
    Route::delete('/{celebrity}/delete', 'CelebrityController@destroy')->name('celebrities.destroy');
});


Route::get('/home', 'HomeController@index')->name('home');
