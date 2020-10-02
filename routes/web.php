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
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/perfil', 'HomeController@perfil')->name('perfil');
Route::post('/newMateria', 'MateriasController@create')->name('newMateria');
Route::get('/getMateria', 'MateriasController@getMateria')->name('getMateria');
Route::post('/inactivarMateria', 'MateriasController@inactivar')->name('inactivarMateria');
