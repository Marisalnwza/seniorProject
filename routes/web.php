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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('main');
});

// Route::get('/pump','HomeController@pump');
// Route::get('/light','PumpController@create');
// Route::get('/memo','HomeController@memo');
Route::get('/pumpdb','HomeController@pumpdb');
Route::get('/farmer','HomeController@farmer');
Route::get('/history','HomeController@history');
Route::get('/setting','HomeController@setting');
// Route::get('/quest','QuestController@create');
// Route::get('/dd','PumpController@test');

Route::resource('task','TaskController');
Route::resource('pump','PumpController');
Route::resource('light','LightController');
Route::resource('quest','QuestController');

Route::get('/create', function () {
    return view('pages.create');
});

Route::get('/pump', function () {
    return view('pages.pump');
});

Route::get('/light', function () {
    return view('pages.light');
});

Route::get('/quest', function () {
    return view('pages.quest');
});




