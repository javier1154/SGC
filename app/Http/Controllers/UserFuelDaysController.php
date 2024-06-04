<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fuel_day;
use App\User_Fuel_day;
use App\DayLitre;
use App\UserDayPermit;

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
                $user_fuel_day = new User_fuel_day($request->all());
                $user_fuel_day->permit_id = \Auth::user()->permit->id;
                $user_fuel_day->assorted_litre = 20;
                $user_fuel_day->proposed_litre = 20;
                $user_fuel_day->status = 1;
                $user_fuel_day->user_id = $user->id;
                $user_fuel_day->fuel_day_id = $id;
                $user_fuel_day->save();
                
                $user_day_permit = new UserDayPermit();
                $user_day_permit->user_fuel_day_id= $user_fuel_day->id;
                $user_day_permit->permit_id = \Auth::user()->permit->id;
                $user_day_permit->estado = "Propuesto";
                $user_day_permit->save();


                return redirect()->back();
            }
            
            
        } return redirect()->back();
        

        
    }
    public function status($id)
    {
        
        $user_fuel_day = User_Fuel_day::findOrFail(decrypt($id));
        $user_day_permit = new UserDayPermit();
        $user_day_permit->user_fuel_day_id= $user_fuel_day->id;
        $user_day_permit->permit_id = \Auth::user()->id;
        if($user_fuel_day->estado == "Propuesto"){
            $user_fuel_day->estado = "Cancelado";
            $user_day_permit->estado = "Cancelado";
            $user_day_permit->save();
            /* toastr()->success('La gerencia ha sido deshabilitada.', 'ERROR!'); */
        }
        $user_fuel_day->save();
        return redirect()->back();
    }
    public function autorizeUser(Request $request, $id){
        $fuel_day = Fuel_day::find(decrypt($id));
       
        if($fuel_day->manage_level == "Autorizada"){

          for($i = 0; $i < count($request->ids); $i++){
            $user_fuel_day = User_fuel_day::find(decrypt($request->ids[$i]));
            if(!empty($user_fuel_day) && $user_fuel_day->estado == "Autorizado"){
                $user_day_permit = new UserDayPermit();
                $user_day_permit->user_fuel_day_id= $user_fuel_day->id;
                $user_day_permit->permit_id = \Auth::user()->id;
                if($request->assorted_litre[$i] > 0){

                    $user_fuel_day->estado = "Asistió";
                    $user_day_permit->estado = "Asistió";
                    $user_day_permit->save();

                }else{
                    $user_fuel_day->estado = "No asistió";
                    $user_day_permit->estado = "No asistió";
                    $user_day_permit->save();
                }
                $user_fuel_day->assorted_litre = $request->assorted_litre[$i];
                $fuel_day->manage_level = 'Finalizada';
                $fuel_day->save();
                $user_fuel_day->save();
            }

         };  
        }else{
                
            for($i = 0; $i < count($request->ids); $i++){
                $user_fuel_day = User_fuel_day::find(decrypt($request->ids[$i]));
                $user_day_permit = new UserDayPermit();
                $user_day_permit->user_fuel_day_id = $user_fuel_day->id;;
                $user_day_permit->permit_id = \Auth::user()->id;
                if(!empty($user_fuel_day) && $user_fuel_day->estado == "Propuesto"){
                    $user_fuel_day->proposed_litre = $request->proposed_litre[$i];
                    $user_fuel_day->estado = "Autorizado";
                    $user_day_permit->estado = "Autorizado";
                    $user_fuel_day->save();
                    $user_day_permit->save();
                }
                if($fuel_day->manage_level == 'Nueva'){
                    $fuel_day->manage_level = 'Autorizada';
                    $fuel_day->save();
                }

            };

        }
        
        return redirect()->back();
    }
}
