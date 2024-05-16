<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fuel_day;

class FuelDaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuel_days = Fuel_day::orderBy('day')->get();
        return view('fuel_days.index', compact('fuel_days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'day' => 'required',
            'type' => 'required',
            
        ]);

        $exist_day = Fuel_day::where('day', $request->day)->first();
        if(!empty($exist_day)){
            /* toastr()->error('Ya existe una jornada con esa misma fecha.', 'ERROR!'); */
            return redirect()->back();
        }
        $fuel_day = new Fuel_day();
        $fuel_day->day = $request->day;
        $fuel_day->type = $request->type;
        $fuel_day->permit_id = \Auth::user()->permit->id;
        $fuel_day->status = true;
        $fuel_day->save();

        /* toastr()->success('La gerencia ha sido registrada.', 'OPERACIÓN EXITOSA!'); */
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fuel_day = Fuel_day::findOrFail(decrypt($id));
        return view('fuel_days.edit', compact('fuel_day'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
            
        $fuel_day = Fuel_day::find($id);
        $fuel_day->day = $request->day;
        $fuel_day->type = $request->type;
        $fuel_day->save();
        return redirect()->route('fuel_day.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->back();
    }
    public function status($id)
    {
        $fuel_day = Fuel_day::findOrFail(decrypt($id));
        if($fuel_day->status){
            $fuel_day->status = 0;
            /* toastr()->success('La gerencia ha sido deshabilitada.', 'ERROR!'); */
        }else{
            $fuel_day->status = 1;
            /* toastr()->success('La gerencia ha sido habilitada.', 'ERROR!'); */
        }
        $fuel_day->save();
        return redirect()->back();
    }
}
