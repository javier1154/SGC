<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cistern extends Model
{
    protected $table = 'cisterns';
    protected $fillable = ['description', 'received_litre'];

    public function permit(){
        return $this->belongsTo('App\Permit');
    }
    public function tank(){
        return $this->belongsTo('App\Tank');
    }
    public function destroy_validate(){
        return true;
    }

}
