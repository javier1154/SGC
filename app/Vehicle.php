<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable = ['plate','brand','model','year','color','liter','observation', 'status'];

    public function user(){

        return $this->belongsTo('App\User');
    }
    
    public function user_fuel_days(){
        return $this->hasMany('App\User_Fuel_day');
    }
   

    public function fuel(){
        return $this->belongsTo('App\Fuel');
    }
    public function user_vehicles(){

        return $this->hasOne('App\UserVehicle');

    }
    public function destroy_validate(){
        /*if(count($this->users)){
            return false;
        }*/
        return true;
    }
}
