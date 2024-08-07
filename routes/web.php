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
})->name('welcome');

//Rutas de los pdf

Route::get('/users/pdf', 'UsersController@pdf')->name('users.pdf');
Route::get('/managements/pdf', 'ManagementsController@pdf')->name('managements.pdf');
Route::get('/vehicles/pdf', 'VehiclesController@pdf')->name('vehicles.pdf');
Route::get('/fuel_days/pdf', 'FuelDaysController@pdf')->name('fuel_days.pdf');
Route::get('/user_days/pdf', 'UserFuelDaysController@pdf')->name('user_days.pdf');
Route::get('cisterns/pdf', 'CisternController@pdf')->name('reports.cisterns.pdf');
    


Auth::routes();

Route::group(['middleware'=>['auth','Habilitado']],function(){

    Route::get('/home', 'HomeController@index')->name('home');

    /* Route::group(['middleware'=>['Permisologia:Administrador,Coordinador']],function(){ */
    Route::group(['middleware'=>['Permisologia:Administrador,Coordinador']],function(){
       
        Route::resource('/reports', 'ReportsController');

        Route::resource('/vehicles', 'VehiclesController');

        Route::get('/vehicles/{id}/destroy',[
            'uses' => 'VehiclesController@destroy',
            'as'   => 'vehicles.destroy'
        ]);

        Route::get('/vehicles/{id}/status/{status}',[
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
        Route::put('/fuel_days_vehicles/{id}',[
            'uses' => 'UserFuelDaysController@vehicles',
            'as'   => 'user_fuel_day.vehicles'
        ]);

        Route::put('/fuel_day_manage/{id}',[
            'uses' => 'UserFuelDaysController@autorizeUser',
            'as'   => 'user_fuel_day.autorizeUser'
        ]);
        Route::put('/fuel_days_manage_add/{id}',[
            'uses' => 'UserFuelDaysController@manage_add',
            'as'   => 'user_fuel_day.manage_add'
        ]);
        Route::resource('/tank', 'TanksController');

        Route::get('/tank/{id}/status',[
            'uses' => 'tank@status',
            'as'   => 'tank.status'
        ]);
        Route::resource('/cistern', 'CisternController');

        Route::get('/cistern/{id}/destroy',[
            'uses' => 'CisternController@destroy',
            'as'   => 'cistern.destroy'
        ]);

        Route::get('/cistern/{id}/status',[
            'uses' => 'cistern@status',
            'as'   => 'cistern.status'
        ]);

        Route::resource('/litre_tank', 'DayLitreTanksController');

        Route::get('/litre_tank/{id}/destroy',[
            'uses' => 'DayLitreTanksController@destroy',
            'as'   => 'litre_tank.destroy'
        ]);

        Route::get('/litre_tank/{id}/status',[
            'uses' => 'litre_tank@status',
            'as'   => 'litre_tank.status'
        ]);

        Route::post('/reports/users/reports',[
            'uses' => 'ReportsController@users',
            'as'   => 'reports.users'
        ]);
        Route::get('/reports/test/{id}/reports2',[
            'uses' => 'ReportsController@test2',
            'as'   => 'reports.test2'
        ]);
        Route::get('/reports/test/reports3',[
            'uses' => 'ReportsController@test3',
            'as'   => 'reports.test3'
        ]);
        Route::get('/reports/autorize_users/{id}/reports',[
            'uses' => 'ReportsController@autorize',
            'as'   => 'reports.autorize'
        ]);
    });

    Route::group(['middleware'=>['Permisologia:Administrador']],function(){
        
        Route::resource('/permissions', 'PermissionsController');

        Route::get('/permissions/{id}/destroy',[
            'uses' => 'PermissionsController@destroy',
            'as'   => 'permissions.destroy'
        ]);

        Route::get('/permissions/{id}/status',[
            'uses' => 'PermissionsController@status',
            'as'   => 'permissions.status'
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

        Route::resource('/managements', 'ManagementsController');

        Route::get('/managements/{id}/destroy',[
            'uses' => 'ManagementsController@destroy',
            'as'   => 'managements.destroy'
        ]);
    
        Route::get('/managements/{id}/status',[
            'uses' => 'ManagementsController@status',
            'as'   => 'managements.status'
        ]);

    });

    Route::get('/fuel_days/{id}',[
        'uses' => 'UserFuelDaysController@show',
        'as'   => 'user_fuel_day.show'
    ]);
    Route::put('/fuel_days_add/{id}',[
        'uses' => 'UserFuelDaysController@add',
        'as'   => 'user_fuel_day.add'
    ]);

    Route::get('/user_fuel_day/{id}/destroy',[
        'uses' => 'UserFuelDaysController@destroy',
        'as'   => 'user_fuel_day.destroy'
    ]);
   
    //Personal suporvisado por el lider
    Route::resource('/staffs', 'StaffController');

    //Personal suporvisado por el lider (Vehiculos)
    Route::resource('/vehicle_staffs', 'VehicleStaffController');

    //Personal suporvisado por el lider (Historial de surtido)
    Route::resource('/assortment', 'AssortmentController');
});

