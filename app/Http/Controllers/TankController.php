<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tank;

class TankController extends Controller
{
   
    public function index()
    {
        $tanks = Tank::orderBy('name')->get(); 
        return view('tank.index', compact('tanks'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
       
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
