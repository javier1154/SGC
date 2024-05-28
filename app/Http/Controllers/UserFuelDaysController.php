<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fuel_day;
use App\User_Fuel_day;
use App\DayLitre;

class UserFuelDaysController extends Controller
{
    
    public function manage($id)
    {
        $users = User::orderBy('name')->get(); 
        $fuel_day = Fuel_day::findOrFail(decrypt($id));
        $day_litres = DayLitre::where('fuel_day_id')->get();
        return view('user_fuel_days.manage', compact('fuel_day', 'day_litres', 'users'));  
    }

    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        
            
                
            
    }

  
    public function show($id)
    {
        $users = User::orderBy('name')->get(); 
        $fuel_day = Fuel_day::findOrFail(decrypt($id));
        $day_litres = DayLitre::where('fuel_day_id')->get();
        return view('user_fuel_days.show', compact('fuel_day', 'day_litres', 'users'));
    }

   
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, ['type' => 'required']);

        $exists = DayLitre::where('fuel_day_id', $id)->where('type', $request->type)->where('status', 1)->get();
        foreach($exists as $exist){
            $exist->status = 0;
            $exist->save();
        }

        $day_litres = new DayLitre($request->all());
        $day_litres->type = $request->type;
        $day_litres->status = true;
        $day_litres->litres = $request->litres;
        $day_litres->fuel_day_id = $id; 
        $day_litres->save();
        if($request->operation = 'registrar'){
            // se ha registrado el litraje inicial
        }   
        else{
            $request->operation = 'actualizar';
            //se ha actualizado el litraje inicial
        }
        return redirect()->back();

            
    }

  
    public function destroy($id)
    {
        $users = User_Fuel_day::findOrFail(decrypt($id));
        if($users->destroy_validate()){
            $users->delete();
        }else{
            /* toastr()->success('La gerencia no puede ser eliminada debido a que posee registros asociados.', 'ERROR!'); */
            return redirect()->back();
        }
        /* toastr()->success('La gerencia ha sido eliminada.', 'OPERACIÓN EXITOSA!'); */
        return redirect()->back();
    }

    public function add(Request $request, $id){
        $this->validate($request, [
            'user_id' => 'required'
        ]);

        $now = date('Y-m-d');

        $user = User::where('ci', $request->user_id)->orWhere('indicator', $request->user_id)->first();
        if(!empty($user)){

            $fuel_day = Fuel_day::findOrFail($id);

            if($fuel_day->day >= $now){
                $exist_user = User_fuel_day::where('user_id', $user->id)
                                        ->whereIn('fuel_day_id', function($query) use ($now){
                                            $query->select('id')
                                            ->from('fuel_days')
                                            ->where('day', '>=', $now);
                                        })
                                        ->first();

                if(!empty($exist_user)){
                    /* toastr()->error('Ya existe una jornada con esa misma fecha.', 'ERROR!'); */
                    return redirect()->back();
                }
                $user_fuel_day= new User_fuel_day($request->all());
                $user_fuel_day->assorted_litre = 20;
                $user_fuel_day->proposed_litre = 0;
                $user_fuel_day->status = 1;
                $user_fuel_day->user_id = $user->id;
                $user_fuel_day->fuel_day_id = $id;
                $user_fuel_day->save();
                return redirect()->back();
            }
            
            
        } return redirect()->back();
        

        
    }
    public function status($id)
    {
        $user_fuel_day = User_Fuel_day::findOrFail(decrypt($id));
        if($user_fuel_day->estado == "Propuesto"){
            $user_fuel_day->estado = "Cancelado";
            /* toastr()->success('La gerencia ha sido deshabilitada.', 'ERROR!'); */
        }
        $user_fuel_day->save();
        return redirect()->back();
    }
    public function autorizeUser(Request $request, $id){

        dd("Hello");
    }
}
