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

Route::get('/pump','HomeController@pump');
Route::get('/light','HomeController@pump');
Route::get('/memo','HomeController@memo');
Route::get('/farmer','HomeController@farmer');
Route::get('/history','HomeController@history');
Route::get('/setting','HomeController@setting');

Route::resource('task','TaskController');

Route::get('/create', function () {
    return view('pages.create');
});
