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
Route::group(['middlewer'=>'auth'], function(){

    Route::get('/', function () {
        return view('layouts.app');
    });
    // untuk table
    Route::get('/table', function(){
        return view('table');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    // master
    Route::get('/masters', 'MastersController@index');
    Route::get('/masters/create', 'MastersController@create');
    Route::post('/masters', 'MastersController@store');
    Route::delete('/masters/{master}', 'MastersController@destroy');
    Route::resource('masters', 'MastersController');

    // students
    // Route::get('/students', 'StudentsController@index');
    // Route::get('/students/create', 'StudentsController@create');
    // Route::get('/students/{student}', 'StudentsController@show');
    // Route::post('/students', 'StudentsController@store');
    // Route::get('/students/{student}/edit', 'StudentsController@edit');
    // Route::patch('/students/{student}', 'StudentsController@update');
    Route::get('query', 'StudentsController@search');
    Route::resource('students', 'StudentsController');
    
    // payments
    // Route::get('/payments', 'PaymentsController@index');
    // Route::get('/payments/create', 'PaymentsController@create');
    // Route::get('/payments/{payment}', 'PaymentsController@show');
    // Route::post('/payments', 'PaymentsController@store');
    // Route::get('/payments/{payment}/edit', 'PaymentsController@edit');
    // Route::patch('/payments/{payment}', 'PaymentsController@update');
    Route::get('data', 'PaymentsController@search');
    Route::resource('payments', 'PaymentsController');

    // layouts
    Route::get('/layouts/profile', 'layoutsController@index');
});