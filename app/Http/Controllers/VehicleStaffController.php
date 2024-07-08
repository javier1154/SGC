<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
class VehicleStaffController extends Controller
{
    public function index()
    {
        
        $vehicles = Vehicle::where('user_id', \Auth::user()->id)->where('management_id',\Auth::user()->management_id)->get(); 
        return view('vehicle_staff.index', compact('vehicles')); 
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
        //
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
