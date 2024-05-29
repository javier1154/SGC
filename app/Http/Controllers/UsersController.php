<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Management;
use App\Vehicle;
use App\Fuel;
use App\Fuel_day;

class UsersController extends Controller
{
  


    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('users.index', compact('users'));

        
    }

   
    public function create()
    {
        $managements = Management::orderBy('name')->get();
        return view('users.create', compact('managements'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'ci' => 'required|unique:users',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required',
            'management_id' => 'required',
            'indicator' => 'unique:users',
            'extension' => 'required'
            
        ]);
        $user = new User($request->all());
        $user->name = mb_strtoupper($request->name, "UTF-8");
        $user->password = bcrypt($request->password);
        $user->management_id = $request->management_id;
        $user->indicator = $request->indicator;
        $user->extension = $request->extension;
        $user->save();
        return redirect()->route('users.index');
    }

    
    public function show($id)
    {
        $user = User::findOrFail(decrypt($id));
        $managements = Management::orderBy('name')->get();
        $fuels = Fuel::orderBy('name')->get();
        return view('users.show', compact('user', 'vehicles','managements', 'users', 'fuels'));

        
    }

    
    public function edit($id)
    {
        $user = User::findOrFail(decrypt($id));
        $managements = Management::orderBy('name')->get();
        return view('users.edit', compact('user', 'managements'));
    }

    
    public function update(Request $request, $id)
    {   

        $user = User::find($id);
        $user->name = mb_strtoupper($request->name, "UTF-8");
        $user->email = $request->email;
        $user->ci = $request->ci;
        $user->phone = $request->phone;
        $user->management_id = $request->management_id;
        $user->indicator = $request->indicator;
        $user->extension = $request->extension;
        $user->save();
        return redirect()->route('users.index');

    }

  
    public function destroy($id)
    {
        $users = User::findOrFail(decrypt($id));
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
        $users = User::findOrFail(decrypt($id));
        if($users->status){
            $users->status = 0;
            /* toastr()->success('La gerencia ha sido deshabilitada.', 'ERROR!'); */
        }else{
            $users->status = 1;
            /* toastr()->success('La gerencia ha sido habilitada.', 'ERROR!'); */
        }
        $users->save();
        return redirect()->back();
    }

}
