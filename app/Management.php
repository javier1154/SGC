<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $table = 'managements';
    protected $fillable = ['name', 'status'];

    public function users(){
        return $this->hasMany('App\User');
    }
}
