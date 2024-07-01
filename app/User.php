<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ci', 'phone','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function vehicles(){

        return $this->hasMany('App\Vehicle');

    }
    public function fuel_days(){

        return $this->hasMany('App\User_Fuel_day');

    }
    public function management(){

        return $this->belongsTo('App\Management');

    }
    public function permit(){
        return $this->hasOne('App\Permit');
    }
    public function user_managements(){

        return $this->hasMany('App\UserManagement');

    }

    public function user_vehicles(){

        return $this->hasMany('App\UserVehicle');

    }

    public function type(){
        if(!empty($this->permit)){
            if($this->permit->status){
                return $this->permit->type;
            }
        }
        return null;
    }

    public function destroy_validate(){
        /*if(count($this->users)){
            return false;
        }*/
        return true;
    }
}
