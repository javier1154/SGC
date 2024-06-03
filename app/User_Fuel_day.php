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
    public function permit(){

        return $this->belongsTo('App\Permit');

    }
    
    public function destroy_validate(){
        return true;
    }

    public function last_day(){
        $user_id = $this->user_id;
        $fuel_day = Fuel_day::whereIn('id', function($query) use ($user_id){
            $query->select('fuel_day_id')
            ->from('users_fuel_days')
            ->where('estado', 'Asistió')
            ->where('user_id', $user_id);
        })->orderByDesc('day')->first();
        

        if(empty($fuel_day)){
            return null;
        }else{
            return $fuel_day->day;
        }
    }
    
}
