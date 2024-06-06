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

    Route::get('/newVehicles',[
        'uses' => 'VehiclesController@newVehicles',
        'as'   => 'vehicles.newVehicles'
    ]);

    Route::get('/manage/{id}',[
        'uses' => 'UserFuelDaysController@manage',
        'as'   => 'user_fuel_day.manage'
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

    Route::resource('/fuel_day', 'FuelDaysController');

    Route::get('/fuel_day/{id}/destroy',[
        'uses' => 'FuelDaysController@destroy',
        'as'   => 'fuel_day.destroy'
    ]);

    Route::get('/fuel_day/{id}/status',[
        'uses' => 'FuelDaysController@status',
        'as'   => 'fuel_day.status'
    ]);

    Route::resource('/user_fuel_day', 'UserFuelDaysController');

    Route::get('/user_fuel_day/{id}/destroy',[
        'uses' => 'UserFuelDaysController@destroy',
        'as'   => 'user_fuel_day.destroy'
    ]);

    Route::get('/user_fuel_day/{id}/status',[
        'uses' => 'UserFuelDaysController@status',
        'as'   => 'user_fuel_day.status'
    ]);
    Route::get('/fuel_days/{id}',[
        'uses' => 'UserFuelDaysController@show',
        'as'   => 'user_fuel_day.show'
    ]);
    Route::put('/fuel_days_add/{id}',[
        'uses' => 'UserFuelDaysController@add',
        'as'   => 'user_fuel_day.add'
    ]);
    Route::put('/fuel_day_manage/{id}',[
        'uses' => 'UserFuelDaysController@autorizeUser',
        'as'   => 'user_fuel_day.autorizeUser'
    ]);
    Route::resource('/tank', 'TankController');

    Route::get('/tank/{id}/destroy',[
        'uses' => 'tankController@destroy',
        'as'   => 'tank.destroy'
    ]);

    Route::get('/tank/{id}/status',[
        'uses' => 'tank@status',
        'as'   => 'tank.status'
    ]);
    Route::resource('/cistern', 'CisternController');

    Route::get('/cistern/{id}/destroy',[
        'uses' => 'cisternController@destroy',
        'as'   => 'cistern.destroy'
    ]);

    Route::get('/cistern/{id}/status',[
        'uses' => 'cistern@status',
        'as'   => 'cistern.status'
    ]);
   
});

