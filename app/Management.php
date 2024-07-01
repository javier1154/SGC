<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'managements';
    protected $fillable = ['name', 'status'];

    public function users(){
        return $this->hasMany('App\User');
    }

    public function user_fuel_days(){
        return $this->hasMany('App\User_Fuel_day');
    }
    public function user_managements(){

        return $this->hasMany('App\UserManagement');
    }
    public function destroy_validate(){
        if(count($this->users)){
            return false;
        }
        return true;
    }
}
