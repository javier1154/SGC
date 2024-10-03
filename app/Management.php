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

    public function user_fuel_days(){
        return $this->hasMany('App\User_Fuel_day');
    }
    public function user_managements(){

        return $this->hasMany('App\UserManagement');
    }
    public function destroy_validate(){
        if(count($this->users)){
            return false;
        }
        return true;
    }
    public function surtido_anio($year){
        $inputyear = $year;
        $year = date("Y-m-d", strtotime($inputyear."-01-01"));
        $endyear = date("Y-m-d", strtotime($inputyear."-12-31"));
        $result = User_Fuel_day::where('management_id',$this->id)->where('estado', 'Asistió')->whereIn('fuel_day_id', function($query) use ($year, $endyear)
        {
            $query->select('id')
            ->from('fuel_days')->whereBetween("day", [$year.' 00:00:00', $endyear.' 23:59:59']);
        })->get();

        dd($result);
    }
}
