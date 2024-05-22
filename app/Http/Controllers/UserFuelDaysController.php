<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fuel_day;
use App\User_Fuel_day;
use App\DayLitre;
use App\Vehicle;

class UserFuelDaysController extends Controller
{
    
    public function index($id)
    {
        
    }

    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'initial_litre' => 'required'
            
        ]);
        $day_litres = new DayLitre($request->all());
        $day_litres->initial_litre = $request->initial_litre;
        $day_litres->save();
        return redirect()->route('user_fuel_day.show');
    }

  
    public function show($id)
    {
        $fuel_day = Fuel_day::findOrFail(decrypt($id));
        $day_litres = DayLitre::where('fuel_day_id')->get();
         
        return view('user_fuel_days.show', compact('fuel_day', 'day_litres'));
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
