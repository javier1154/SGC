<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayLitre extends Model
{
    protected $table = 'day_litres';
    protected $fillable = ['initial_litre', 'final_litre', 'status'];

    public function fuel_day(){
        return $this->belongsTo('App\Fuel_day');
    }
    public function fuel(){
        return $this->belongsTo('App\Fuel');
    }

    public function day_litre_tanks(){

        return $this->hasMany('App\DayLitreTank');
    }

}
