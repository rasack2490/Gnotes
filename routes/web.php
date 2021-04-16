<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionCompteController;

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

Route::get('/', 'AuthController@index')->name('log');
Route::post('/login', 'AuthController@authEleve')->name('login');
Route::get('/loginadmin', 'AuthController@adminlog')->name('logadmin');
Route::post('/loginadmin', 'AuthController@authAdmin')->name('admintreat');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/logoutadmin', 'AuthController@logoutsuper')->name('logoutadmin');
Route::get('/ajoutprof', 'GestionCompteController@addprofpage')->name('addprof');
Route::post('/ajoutprof', 'GestionCompteController@addprofform')->name('dataprof');
Route::get('/anneeScolaire', 'GestionCompteController@addyear')->name('addyear');
Route::post('/anneeScolaire', 'GestionCompteController@datayear')->name('datayear');
Route::get('/ajouteleve', 'GestionCompteController@addstudent')->name('addstudent');
Route::post('/ajouteleve', 'GestionCompteController@savestudent')->name('savestudent');
Route::get('/profile', 'GestionCompteController@showprofile')->name('showprofile');
Route::post('/profileedit', 'GestionCompteController@editprofile')->name('editprofile');
