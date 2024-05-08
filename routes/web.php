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

Route::group(['middleware'=>['auth']],function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/managements', 'ManagementsController');

    Route::get('/managements/{id}/destroy',[
        'uses' => 'ManagementsController@destroy',
        'as'   => 'managements.destroy'
    ]);

    Route::get('/managements/{id}/status',[
        'uses' => 'ManagementsController@status',
        'as'   => 'managements.status'
    ]);

    Route::resource('/users', 'UsersController');

    Route::get('/users/{id}/destroy',[
        'uses' => 'UsersController@destroy',
        'as'   => 'users.destroy'
    ]);

    Route::get('/users/{id}/status',[
        'uses' => 'UsersController@status',
        'as'   => 'users.status'
    ]);
});

