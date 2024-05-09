<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Fuel;
use App\User;
class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::orderBy('brand')->get();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::orderBy('brand')->get();
        $users = User::orderBy('name')->get();
        $fuels = Fuel::orderBy('name')->get();
        return view('vehicles.create', compact('vehicles', 'users', 'fuels'));
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
            'plate' => 'required|unique:vehicles',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required',
            'color' => 'required',
            'observations' => 'required',
            'liter'=> 'required',
            'user_id' => 'required',
            'fuel_id' => 'required'
        ]);

        $status = 0;
        $usuario_vehiculos = Vehicle::where('user_id', $request->user_id)->where('status', 1)->first();
        if(empty($usuario_vehiculos)){
            $status = 1;
        }

        $vehicle = new Vehicle($request->all());
        $vehicle->plate = mb_strtoupper($request->plate, "UTF-8");
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->color = $request->color;
        $vehicle->observations = $request->observations;
        $vehicle->liter = $request->liter;
        $vehicle->user_id = $request->user_id;
        $vehicle->fuel_id = $request->fuel_id;
        $vehicle->status = $status;
        $vehicle->save();
        return redirect()->route('vehicles.index');
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
        $vehicle = Vehicle::findOrFail(decrypt($id));
        $users = User::orderBy('name')->get();
        $fuels = Fuel::orderBy('name')->get();
        return view('vehicles.edit', compact('vehicle', 'users', 'fuels'));
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
        $vehicle = Vehicle::find($id);
        $vehicle->plate = mb_strtoupper($request->plate, "UTF-8");
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->color = $request->color;
        $vehicle->observations = $request->observations;
        $vehicle->liter = $request->liter;
        $vehicle->user_id = $request->user_id;
        $vehicle->fuel_id = $request->fuel_id;
        $vehicle->save();
        return redirect()->route('vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function status($id)
    {
        $vehicle = Vehicle::findOrFail(decrypt($id));
        if($vehicle->status){
            $vehicle->status = 0;
            /* toastr()->success('La gerencia ha sido deshabilitada.', 'ERROR!'); */
        }else{
            $vehicle->status = 1;
            /* toastr()->success('La gerencia ha sido habilitada.', 'ERROR!'); */
        }
        $vehicle->save();
        return redirect()->back();
    }
}
