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
}
