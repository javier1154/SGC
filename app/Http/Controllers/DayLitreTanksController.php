<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DayLitreTank;

class DayLitreTanksController extends Controller
{
   
    public function index()
    {
        $day_litre_tank = DayLitreTank::orderBy('id')->get();
        return view('day_litre_tank.index', compact('day_litre_tank'));
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
