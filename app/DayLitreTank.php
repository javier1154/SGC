<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayLitreTank extends Model
{
    protected $table = 'day_litre_tanks';

    public function tank(){
        return $this->belongsTo('App\Tank');
    }
    public function day_litre(){
        return $this->belongsTo('App\DayLitre');
    }
}
