<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel_day extends Model
{
    protected $table = 'fuel_days';
    protected $fillable = ['day', 'status'];

    public function fuel_days(){

        return $this->hasMany('App\User_Fuel_day');

    }

    public function permit(){

        return $this->belongsTo('App\Permit');

    }
    public function day_litres(){

        return $this->hasMany('App\DayLitre');
    }
    public function fuel(){

        return $this->belongsTo('App\Fuel');

    }

    public function destroy_validate(){
        return true;
    }

}