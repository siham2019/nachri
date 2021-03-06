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
    return view('welcome');
});

Route::post('/photo/save','App\Http\Controllers\PhotoController@save');
Route::get('/dockters', 'App\Http\Controllers\DocktorController@get');
Route::get('/store', 'App\Http\Controllers\DocktorController@store');


Route::get('/login', function () {
    return view('login');
});