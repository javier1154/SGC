<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    
    protected $table = 'tanks';
    protected $fillable = ['name','available_litre','status','assorted_litre'];

    public function cisterns(){

        return $this->hasMany('App\Cistern');
    }

    public function fuel(){
        return $this->belongsTo('App\Fuel');
    }

    public function day_litres_tanks(){

        return $this->hasMany('App\DayLitreTank');
    }
    
}
