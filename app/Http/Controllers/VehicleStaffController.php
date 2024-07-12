<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
class VehicleStaffController extends Controller
{
    public function index()
    {
        $management_id = \Auth::user()->management->id;
        





                    $vehicles = Vehicle::whereIn('id', function($query) use ($management_id)
                    {
                        $query->select('vehicle_id')
                        ->from('user_vehicle')
                        ->whereIn('user_id', function($query) use ($management_id)
                        {
                            $query->select('id')
                            ->from('users')
                            ->where('management_id', $management_id);
                        });
                    })->get();

                                                          
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
