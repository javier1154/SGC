<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    protected $table = 'user_management';

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function management(){
        return $this->belongsTo('App\Management');
    }
}
