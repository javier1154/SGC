<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_Fuel_day;

class AssortmentController extends Controller
{
   
    public function index()
    {
        
    $user_fuel_days = User_Fuel_day::where('management_id',\Auth::user()->management->id)->get();
    return view('assortment.index', compact('user_fuel_days'));

    }

   
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

   
    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        
    }

    
    public function destroy($id)
    {
        
    }
}
