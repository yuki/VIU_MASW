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
    Route::match(['get','post'],'/', 'PlatformController@index')->name('platforms.index');
    Route::get('/create', 'PlatformController@create')->name('platforms.create');
    Route::post('/create', 'PlatformController@store')->name('platforms.store');
    Route::get('/{platform}/show', 'PlatformController@show')->name('platforms.show');
    Route::get('/{platform}/edit', 'PlatformController@edit')->name('platforms.edit');
    Route::post('/{platform}/update', 'PlatformController@update')->name('platforms.update');
    Route::delete('/{platform}/delete', 'PlatformController@destroy')->name('platforms.destroy');
    Route::get('/{platform}/info', 'PlatformController@info');
});

Route::group(['prefix' => 'celebrities','middleware' => ['auth']], function() {
    Route::match(['get','post'],'/', 'CelebrityController@index')->name('celebrities.index');
    Route::get('/create', 'CelebrityController@create')->name('celebrities.create');
    Route::post('/create', 'CelebrityController@store')->name('celebrities.store');
    Route::get('/{celebrity}/show', 'CelebrityController@show')->name('celebrities.show');
    Route::get('/{celebrity}/edit', 'CelebrityController@edit')->name('celebrities.edit');
    Route::post('/{celebrity}/update', 'CelebrityController@update')->name('celebrities.update');
    Route::delete('/{celebrity}/delete', 'CelebrityController@destroy')->name('celebrities.destroy');
});

Route::group(['prefix' => 'tvshows','middleware' => ['auth']], function() {
    Route::match(['get','post'],'/', 'TVShowController@index')->name('tvshows.index');
    Route::get('/create', 'TVShowController@create')->name('tvshows.create');
    Route::post('/create', 'TVShowController@store')->name('tvshows.store');
    Route::get('/{tvshow}/show', 'TVShowController@show')->name('tvshows.show');
    Route::get('/{tvshow}/edit', 'TVShowController@edit')->name('tvshows.edit');
    Route::post('/{tvshow}/update', 'TVShowController@update')->name('tvshows.update');
    Route::delete('/{tvshow}/delete', 'TVShowController@destroy')->name('tvshows.destroy');
    Route::get('/{tvshow}/info', 'TVShowController@info');
});

Route::group(['prefix' => 'episodes','middleware' => ['auth']], function() {
    Route::match(['get','post'],'/', 'EpisodeController@index')->name('episodes.index');
    Route::get('/create', 'EpisodeController@create')->name('episodes.create');
    Route::post('/create', 'EpisodeController@store')->name('episodes.store');
    Route::get('/{episode}/show', 'EpisodeController@show')->name('episodes.show');
    Route::get('/{episode}/edit', 'EpisodeController@edit')->name('episodes.edit');
    Route::post('/{episode}/update', 'EpisodeController@update')->name('episodes.update');
    Route::delete('/{episode}/delete', 'EpisodeController@destroy')->name('episodes.destroy');
});

Route::group(['prefix' => 'languages','middleware' => ['auth']], function() {
    Route::match(['get','post'],'/', 'LanguageController@index')->name('languages.index');
    Route::get('/create', 'LanguageController@create')->name('languages.create');
    Route::post('/create', 'LanguageController@store')->name('languages.store');
    Route::get('/{language}/show', 'LanguageController@show')->name('languages.show');
    Route::get('/{language}/edit', 'LanguageController@edit')->name('languages.edit');
    Route::post('/{language}/update', 'LanguageController@update')->name('languages.update');
    Route::delete('/{language}/delete', 'LanguageController@destroy')->name('languages.destroy');
});


Route::get('/home', 'HomeController@index')->name('home');
