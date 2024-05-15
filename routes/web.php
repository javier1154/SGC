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

    Route::resource('/vehicles', 'VehiclesController');

    Route::get('/vehicles/{id}/destroy',[
        'uses' => 'VehiclesController@destroy',
        'as'   => 'vehicles.destroy'
    ]);

    Route::get('/vehicles/{id}/status',[
        'uses' => 'VehiclesController@status',
        'as'   => 'vehicles.status'
    ]);

    Route::resource('/permissions', 'PermissionsController');

    Route::get('/permissions/{id}/destroy',[
        'uses' => 'PermissionsController@destroy',
        'as'   => 'permissions.destroy'
    ]);

    Route::get('/permissions/{id}/status',[
        'uses' => 'PermissionsController@status',
        'as'   => 'permissions.status'
    ]);

    Route::resource('/fuel_day', 'Fuel_daysController');

    Route::get('/fuel_day/{id}/destroy',[
        'uses' => 'Fuel_days@destroy',
        'as'   => 'fuel_day.destroy'
    ]);

    Route::get('/fuel_day/{id}/status',[
        'uses' => 'Fuel_days@status',
        'as'   => 'fuel_day.status'
    ]);
});

