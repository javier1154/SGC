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
        'name', 'email', 'password', 'ci', 'phone'
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
    public function management(){

        return $this->belongsTo('App\Management');

    }
    public function permit(){
        return $this->hasOne('App\Permit');
    }

    public function destroy_validate(){
        /*if(count($this->users)){
            return false;
        }*/
        return true;
    }
}
