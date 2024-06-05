<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = 'fuels';
    protected $fillable = ['name'];
    
    public function vehicles(){
        
        return $this->hasMany('App\Vehicle'); 
    }
    public function day_litres(){

        return $this->hasMany('App\DayLitre');

    }
    public function fuel_days(){

        return $this->hasMany('App\Fuel_day');
    }
    public function tanks(){
        return $this->hasMany('App\Tank');
    }
}
