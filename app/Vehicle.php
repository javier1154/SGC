<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable = ['plate','brand','model','year','color','liter','observation', 'status'];

    public function user(){

        return $this->belongsTo('App\User');
    }
    
    public function fuel(){
        
        return $this->hasOne('App\Fuel'); 
    }
}
