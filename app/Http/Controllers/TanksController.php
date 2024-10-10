<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tank;

class TanksController extends Controller
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
        $this->validate($request, [
            'name' => 'required',
            'tank_litre' => 'required|numeric',
        ]);
        $tank = new Tank($request->all());
        $tank->name = $request->name;
        $tank->available_litre= $request->tank_litre;
        $tank->status = 1;
        $tank->assorted_litre = 0;
        $tank->fuel_id = 1;
        $tank->save();
        toastr('success', 'OPERACIÓN EXITOSA!', "El tanque ha sido guardado.");
        return redirect()->route('tank.index');
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
