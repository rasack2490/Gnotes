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

Route::get('/', 'AuthController@index');
Route::post('/login', 'AuthController@authEleve')->name('login');
Route::get('/loginadmin', 'AuthController@adminlog')->name('logadmin');
Route::post('/loginadmin', 'AuthController@authAdmin')->name('traite');
