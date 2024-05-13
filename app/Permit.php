<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    protected $table = 'permissions';
    protected $fillable = ['type', 'status'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function destroy_validate(){
        return true;
    }
}
