<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['type', 'status'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function users_fuel_days(){

        return $this->hasMany('App\User_Fuel_day');

    }

    public function user_day_permit(){

        return $this->hasMany('App\UserDayPermit');

    }

    public function cisterns(){

        return $this->hasMany('App\Cistern');
    }

    public function destroy_validate(){
        return true;
    }
    public function fuel_days(){

        return $this->hasMany('App\Fuel_day');

    }
}
