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
        $vehicles = Vehicle::orderBy('brand')->where('new', 0)->get();
        return view('vehicles.index', compact('vehicles'));
    }


    public function newVehicles()
    {
        $vehicles = Vehicle::orderBy('brand')->where('new', 1)->get();
        return view('vehicles.new_vehicles', compact('vehicles'));
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

        $vehicle = new Vehicle($request->all());
        $vehicle->plate = mb_strtoupper($request->plate, "UTF-8");
        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->year = $request->year;
        $vehicle->color = $request->color;
        $vehicle->observations = $request->observations;
        $vehicle->liter = $request->liter;
        $vehicle->user_id = decrypt($request->user_id);
        $vehicle->fuel_id = decrypt($request->fuel_id);
        $vehicle->status = $status;
        $vehicle->save();
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
        return redirect()->route('users.show', encrypt($request->user_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicles = Vehicle::findOrFail(decrypt($id));
        if($vehicles->destroy_validate()){
            $vehicles->delete();
        }else{
            /* toastr()->success('La gerencia no puede ser eliminada debido a que posee registros asociados.', 'ERROR!'); */
            return redirect()->back();
        }
        /* toastr()->success('La gerencia ha sido eliminada.', 'OPERACIÓN EXITOSA!'); */
        return redirect()->back();
    }
    public function status($id, $status)
    {

        $vehicle = Vehicle::findOrFail(decrypt($id));
        if($status == 0){
            
            $vehicle->status = 0;
            $vehicle->new = 0;
               
            /* toastr()->success('La gerencia ha sido deshabilitada.', 'ERROR!'); */
        }else{

            //consultar todos los vehiculos habilitados del usuario
            //luego con un foreach deshabilitar todos los q posea habilitados
            $vehicles = Vehicle::where('status', 1)->where('user_id', $vehicle->user_id)->get();
            foreach($vehicles as $veh){
                $veh->status = 0;
                $veh->save();
            }

            $vehicle->status = 1;
            $vehicle->new = 0;
            /* toastr()->success('La gerencia ha sido habilitada.', 'ERROR!'); */
        }
        $vehicle->save();
        return redirect()->back();
    }
}
