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
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'professores', 'middleware' => ['role:prof']], function() {
		Route::get('/', 'ProfessorController@index')->name('professor.index');
		Route::get('/create', 'ProfessorController@create')->name('professor.create');
		Route::post('/', 'ProfessorController@store')->name('professor.store');
		Route::get('/{professor}', 'ProfessorController@show')->name('professor.show');
		Route::get('/{professor}/edit', 'ProfessorController@edit')->name('professor.edit');
		Route::put('/{professor}', 'ProfessorController@update')->name('professor.update');
		Route::delete('/', 'ProfessorController@destroy')->name('professor.destroy');
	});
});

Route::get('/{professor}/firstlogin', 'HomeController@firstLogin')->name('firstlogin');
