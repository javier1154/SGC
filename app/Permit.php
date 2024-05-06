<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['type'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
