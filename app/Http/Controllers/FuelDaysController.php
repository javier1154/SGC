<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel_day;
use App\Fuel;

class FuelDaysController extends Controller
{
    
    public function index()
    {
        $fuel_days = Fuel_day::orderBy('day')->get();
        $fuels = Fuel::where('status', 1)->get();
        return view('fuel_days.index', compact('fuel_days','fuels'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'day' => 'required',
            'type' => 'required',
            'fuel_id' => 'required',
        ]);
    
        $exist_day = Fuel_day::where('day', $request->day)->first();
        if(!empty($exist_day)){
            
            return redirect()->back();
        }

        if(((\Auth::user()->permit->type == "Administrador") || (\Auth::user()->permit->type == "Coordinador")) && (\Auth::user()->permit->status == 1 )){ 
        
        $fuel_day = new Fuel_day();
        $fuel_day->day = $request->day;
        $fuel_day->type = $request->type;
        $fuel_day->permit_id = \Auth::user()->permit->id;
        $fuel_day->status = true;
        $fuel_day->fuel_id = decrypt($request->fuel_id);
        $fuel_day->save();

        toastr('success', 'OPERACIÓN EXITOSA!', "La jornada ha sido guardada .");
        return redirect()->back();

        }

        toastr('error', 'OPERACIÓN INVÁLIDA!', "No posees permisos para realizar esta acción.");
        return redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $fuel_day = Fuel_day::findOrFail(decrypt($id));
        return view('fuel_days.edit', compact('fuel_day'));
    }

    
    public function update(Request $request, $id)
    {
        
            
        $fuel_day = Fuel_day::find($id);
        $fuel_day->day = $request->day;
        $fuel_day->type = $request->type;
        $fuel_day->save();
        toastr('success', 'OPERACIÓN EXITOSA!', "La jornada ha sido actualizada .");
        return redirect()->route('fuel_day.index');
        
    }

    
    public function destroy($id)
    {
        $fuel_day = Fuel_day::findOrFail(decrypt($id));
        if($fuel_day->destroy_validate()){
            $fuel_day->delete();
        }else{
            /* toastr()->success('La gerencia no puede ser eliminada debido a que posee registros asociados.', 'ERROR!'); */
            return redirect()->back();
        }
        /* toastr()->success('La gerencia ha sido eliminada.', 'OPERACIÓN EXITOSA!'); */
        toastr('success', 'OPERACIÓN EXITOSA!', "El permiso ha sido eliminado .");
        return redirect()->back();
    }
    public function status($id)
    {
        $fuel_day = Fuel_day::findOrFail(decrypt($id));
        if($fuel_day->status){
            $fuel_day->status = 0;
            /* toastr()->success('La gerencia ha sido deshabilitada.', 'ERROR!'); */
            toastr('success', 'OPERACIÓN EXITOSA!', "El permiso ha sido deshabilitado .");
        }else{
            $fuel_day->status = 1;
            /* toastr()->success('La gerencia ha sido habilitada.', 'ERROR!'); */
            toastr('success', 'OPERACIÓN EXITOSA!', "El permiso ha sido habilitado .");
        }
        $fuel_day->save();
        return redirect()->back();
    }
}
