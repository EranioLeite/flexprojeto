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
    return view('login');
});
Route::get('/inicio', 'ProfessorController@index');
Route::get('/create_professor', 'ProfessorController@create');
Route::post('/create_professor', 'ProfessorController@store');
Route::get('/listar_professor', 'ProfessorController@show');
Route::get('/edita3_professor/{ID_PROFESSOR}', 'ProfessorController@edit');
Route::post('/edita3_professor/{ID_PROFESSOR}', 'ProfessorController@update');
Route::delete('/delete_professor/{ID_PROFESSOR}', 'ProfessorController@destroy');
Route::get('/pdf/{ID_PROFESSOR}', 'PdfController@index');

//Route::get('/', 'CursoController@index');
Route::get('/create3_curso', 'CursoController@create');
Route::post('/create3_curso', 'CursoController@store');
Route::get('/listar3_curso', 'CursoController@show');
Route::get('/edita2_curso/{ID_CURSO}', 'CursoController@edit');
Route::post('/edita2_curso/{ID_CURSO}', 'CursoController@update');
Route::delete('/delete_curso/{ID_CURSO}', 'CursoController@destroy');
Route::get('/pdfc/{ID_CURSO}', 'PdfController@indexc');

//Route::get('/', 'AlunoController@index');
Route::get('/create2_aluno', 'AlunoController@create');
Route::post('/create2_aluno', 'AlunoController@store');
Route::get('/listar1_aluno', 'AlunoController@show');
Route::get('/edita_aluno/{ID_ALUNO}', 'AlunoController@edit');
Route::post('/edita_aluno/{ID_ALUNO}', 'AlunoController@update');
Route::delete('/delete_aluno/{ID_ALUNO}', 'AlunoController@destroy');
Route::get('/pdfa/{ID_ALUNO}', 'PdfController@indexa');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');