<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Fuel_day extends Model
{
    protected $table = 'users_fuel_days';
    protected $fillable = ['proposed_litre', 'assorted_litre'];

    public function fuel_day(){

        return $this->belongsTo('App\Fuel_day');

    }
    public function user(){

        return $this->belongsTo('App\User');

    }

    public function destroy_validate(){
            return true;
        }
        
    }

