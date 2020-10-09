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


Route::get('/getMateria{status}', 'MateriasController@getMateria')->name('getMateria');
Route::post('/newMateria', 'MateriasController@create')->name('newMateria');
Route::post('/inactivarMateria{_id}', 'MateriasController@inactivar');
Route::post('/activarMateria{_id}', 'MateriasController@activar');
Route::post('/editMateria', 'MateriasController@editMateria');
