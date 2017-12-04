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

Route::get('/', 'HomeController@index');
Route::get('/champions', 'ChampionController@home');
Route::get('/champions/{champion}', 'ChampionController@index');
Route::get('/champions/{champion}/builds', 'BuildController@show');
Route::get('/champions/{champion}/tips', 'TipController@show');
Route::get('/champions/{champion}/counters', 'CounterController@show');
Route::get('/champions/{champion}/stats', 'StatController@show');

Route::get('/tips', 'TipController@index');
Route::post('/tips', 'TipController@store');
Route::post('/tips/vote/{tip}', 'TipController@vote');

Route::get('/counters', 'CounterController@index');
Route::post('/counters', 'CounterController@store');
Route::post('/counters/vote/{counter}', 'CounterController@vote');

Route::post('/build', 'BuildController@store');
Route::post('/builds/vote/{build}', 'BuildController@vote');

Auth::routes();
