<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDayPermit extends Model
{
    protected $fillable = [
        'estado'
    ];
    protected $table = 'user_day_permit';

    public function user_fuel_day(){

        return $this->belongsTo('App\User_Fuel_day');

    }
    public function permit(){

        return $this->belongsTo('App\Permit');

    }

}
