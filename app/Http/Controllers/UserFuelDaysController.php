<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fuel_day;

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
        //
    }

  
    public function show($id)
    {
        $fuel_day = Fuel_day::findOrFail(decrypt($id));
        return view('user_fuel_days.show', compact('fuel_day'));
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
