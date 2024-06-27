<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fuel_day;
use App\User_Fuel_day;
use App\DayLitre;
use App\UserDayPermit;
use App\Tank;
use App\DayLitreTank;
use App\Vehicle;
use App\Management;

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
        
        $tank = Tank::findOrFail(1);
        if($day_litres->type == "initial"){

            $day_litres_merma = new DayLitre();
            $day_litres_merma->litres = $tank->available_litre - $request->litres;
            $day_litres_merma->type = "decrease";
            $day_litres_merma->status = true;
            $day_litres_merma->fuel_day_id = $id; 

            $day_litre_tank = new DayLitreTank();
            $day_litres_merma->save();
            
            $day_litre_tank->day_litre_id = $day_litres_merma->id;
            $day_litre_tank->tank_id = 1;
            $day_litre_tank->save();

            $tank->available_litre = $request->litres;
            $tank->save();

            $day_litre_tank = new DayLitreTank();
            $day_litres->save();
            
            $day_litre_tank->day_litre_id = $day_litres->id;
            $day_litre_tank->tank_id = 1;
            $day_litre_tank->save();
        
        }elseif($day_litres->type == "final"){
            
            /*if($tank->available_litre >= $request->litres){*/

                $day_litres_merma = new DayLitre();
                $day_litres_merma->litres = $tank->available_litre - $request->litres;
                $day_litres_merma->type = "decrease";
                $day_litres_merma->status = true;
                $day_litres_merma->fuel_day_id = $id; 

                $day_litre_tank = new DayLitreTank();
                $day_litres_merma->save();
                
                $day_litre_tank->day_litre_id = $day_litres_merma->id;
                $day_litre_tank->tank_id = 1;
                $day_litre_tank->save();

                $tank->available_litre = $request->litres;
                $tank->save();

                $day_litre_tank2 = new DayLitreTank();
                $day_litres->save();
                
                $day_litre_tank2->day_litre_id = $day_litres->id;
                $day_litre_tank2->tank_id = 1;
                $day_litre_tank2->save();

            /*}else{
                
                dd($day_litres->litres);

            }*/
            
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
          $assorted_litre = 0;
          $assorted = Tank::where('status', 1)->first();  
          for($i = 0; $i < count($request->ids); $i++){
            $assorted_litre +=$request->assorted_litre[$i];
          }
          if($assorted->available_litre>= $assorted_litre){

            for($i = 0; $i < count($request->ids); $i++){
                $user_fuel_day = User_fuel_day::find(decrypt($request->ids[$i]));
                if(!empty($user_fuel_day) && $user_fuel_day->estado == "Autorizado"){
                    $user_day_permit = new UserDayPermit();
                    $user_day_permit->user_fuel_day_id= $user_fuel_day->id;
                    $user_day_permit->permit_id = \Auth::user()->id;
                    if($request->assorted_litre[$i] > 0){
    
                        $assorted = Tank::where('status', 1)->first();
                        if($assorted->available_litre >= $request->assorted_litre[$i]){
                            $assorted->available_litre = $assorted->available_litre - $request->assorted_litre[$i];
                            $user_fuel_day->estado = "Asistió";
                            $user_day_permit->estado = "Asistió";
                            $assorted->save();
                            $user_day_permit->save();
                        }                    
    
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
            dd("La cantidad solicitada no se encuentra disponible en el tanque");
          }
           
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
    public function add(Request $request, $id){
        $this->validate($request, [
            'user_id' => 'required'
        ]);

        $now = date('Y-m-d');

        $user = User::where('ci', $request->user_id)->orWhere('indicator', $request->user_id)->first();
        if(!empty($user)){

           
            $fuel_day = Fuel_day::findOrFail($id);
            $management = Management::findOrFail($id);
            $vehicle = Vehicle::where('user_id', $user->id)->where('status', 1)->first();
            
            if($vehicle == null){
                return redirect()->back();
            }

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
                $user_fuel_day->assorted_litre = 0;
                $user_fuel_day->proposed_litre = 20;
                $user_fuel_day->status = 1;
                $user_fuel_day->user_id = $user->id;
                $user_fuel_day->management_id = $user->management_id;
                $user_fuel_day->vehicle_id = $vehicle->id;
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
    
        public function manage_add(Request $request, $id){
            $this->validate($request, [
                'user_id' => 'required'
            ]);

            $user = User::where('ci', $request->user_id)->orWhere('indicator', $request->user_id)->first();

            $fuel_day = Fuel_day::find(decrypt($id));
            $exist_user = User_fuel_day::where('user_id', $user->id)->first();
            $vehicle = Vehicle::where('user_id', $user->id)->where('status', 1)->first();
            
            if($vehicle == null){
                return redirect()->back();
            }

            if(!empty($exist_user)){
                /* toastr()->error('Ya existe una jornada con esa misma fecha.', 'ERROR!'); */
                return redirect()->back();
            }

            if($fuel_day->manage_level == "Finalizada"){

                $user_fuel_day = new User_fuel_day($request->all());
                $user_fuel_day->permit_id = \Auth::user()->permit->id;
                $user_fuel_day->proposed_litre = $request->proposed_litre;
                $user_fuel_day->assorted_litre = $request->assorted_litre;
                $user_fuel_day->status = 1;
                $user_fuel_day->user_id = $user->id;
                $user_fuel_day->fuel_day_id = $fuel_day->id;
                $user_fuel_day->vehicle_id = $vehicle->id;
                $user_fuel_day->management_id = $user->management_id;

                
                if($user_fuel_day->assorted_litre > 0){
                    $user_fuel_day->estado = "Asistió";
                }else{

                    $user_fuel_day->estado = "No asistió";
                }
                
                
                        
                $user_fuel_day->save();
                
                $user_day_permit = new UserDayPermit();
                
                $user_day_permit->user_fuel_day_id = $user_fuel_day->id;
                $user_day_permit->permit_id = \Auth::user()->permit->id;

                if($user_fuel_day->assorted_litre > 0){
                    $user_day_permit->estado = "Asistió";
                    $assorted = Tank::where('status', 1)->first();
                    if($assorted->available_litre >= $request->assorted_litre){
                        $assorted->available_litre = $assorted->available_litre - $request->assorted_litre;
                        $assorted->save();
                        
                    }
                }else{
                    
                    $user_day_permit->estado = "No asistió";
                }
            
                $user_day_permit->save();

            }else if($fuel_day->manage_level == "Autorizada"){
                
                $user_fuel_day = new User_fuel_day($request->all());
                $user_fuel_day->permit_id = \Auth::user()->permit->id;
                $user_fuel_day->proposed_litre = $request->proposed_litre;
                $user_fuel_day->status = 1;
                $user_fuel_day->user_id = $user->id;
                $user_fuel_day->fuel_day_id = $fuel_day->id;
                $user_fuel_day->vehicle_id = $vehicle->id;
                $user_fuel_day->management_id = $user->management_id;
                
                $user_fuel_day->estado = "Autorizado";
                
                        
                $user_fuel_day->save();
                
                $user_day_permit = new UserDayPermit();
                
                $user_day_permit->user_fuel_day_id = $user_fuel_day->id;
                $user_day_permit->permit_id = \Auth::user()->permit->id;
                $user_day_permit->estado = "Autorizado";
                $user_day_permit->save();
                
            }
            
            
            
            

            return redirect()->back();
        }
    }
            
           
