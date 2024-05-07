<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = 'fuels';
    protected $fillable = ['name'];
    
    public function vehicle(){
        return $this->belongsTo('App\Vehicle');
    }
}
