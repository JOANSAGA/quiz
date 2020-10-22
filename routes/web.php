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

//materias
Route::get('/getMateria{status}', 'MateriasController@getMateria')->name('getMateria');
Route::post('/newMateria', 'MateriasController@create')->name('newMateria');
Route::post('/inactivarMateria{_id}', 'MateriasController@inactivar');
Route::post('/activarMateria{_id}', 'MateriasController@activar');
Route::post('/editMateria', 'MateriasController@editMateria');

//preguntas
Route::post('/newPregunta', 'PreguntaController@create')->name('newPregunta');
Route::get('/getPregunta/{status}/{materia}', 'PreguntaController@getPregunta')->name('getPregunta');
Route::post('/editPregunta', 'PreguntaController@editPregunta');
Route::post('/inactivarPregunta{_id}', 'PreguntaController@inactivar');
Route::post('/activarPregunta{_id}', 'PreguntaController@activar');

//examen
Route::post('/newExamen', 'ExamenController@create')->name('newExamen');
Route::get('/getExamen/{status}/{materia}', 'ExamenController@getExamen')->name('getExamen');
Route::post('/editExamen', 'ExamenController@editExamen');
Route::post('/inactivarExamen{_id}', 'ExamenController@inactivar');
Route::post('/activarExamen{_id}', 'ExamenController@activar');

//Usuario
Route::get('/getUsuario', 'UsuarioController@getUsuario')->name('getUsuario');
Route::post('/editUsuario', 'UsuarioController@editUsuario');
Route::get('/userData', 'UsuarioController@userData');
//Usuario/estudiante
Route::post('/addMateriaEst', 'UsuarioController@addMateriaEst');
