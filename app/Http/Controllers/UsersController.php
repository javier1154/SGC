<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Management;
use App\Vehicle;
use App\Fuel;
use App\Fuel_day;
use App\UserManagement;

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
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'ci' => 'required|numeric|unique:users',
            'email' => 'required|unique:users',
            'phone' => 'required|numeric',
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
        /*Trazabilidad*/
        $user_management = new UserManagement();
        $user_management->user_id = $user->id;
        $user_management->management_id = $user->management_id;
        $user_management->save();
        /*Trazabilidad*/
        toastr('success', 'OPERACIÓN EXITOSA!', "El usuario ha sido guardado.");
        return redirect()->route('users.index');
    }

    
    public function show($id)
    {
        $user = User::findOrFail(decrypt($id));
        $managements = Management::orderBy('name')->get();
        $fuels = Fuel::orderBy('name')->get();

        return view('users.show', compact('user', 'vehicles','managements', 'fuels'));

        
    }

    
    public function edit($id)
    {
        $user = User::findOrFail(decrypt($id));
        $managements = Management::orderBy('name')->get();
        return view('users.edit', compact('user', 'managements'));
    }

    
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'ci' => 'required|numeric',
            'email' => 'required',
            'phone' => 'required|numeric',
            'management_id' => 'required',
            'indicator' => 'required',
            'extension' => 'required'
            
        ]);

        $user = User::find($id);
        $user->name = mb_strtoupper($request->name, "UTF-8");
        $user->email = $request->email;
        $user->ci = $request->ci;
        $user->phone = $request->phone;
        $user->management_id = $request->management_id;
        /*Trazabilidad*/
        $user_management = new UserManagement();
        $user_management->user_id = $user->id;
        $user_management->management_id = $user->management_id;
        $user_management->save();
        /*Trazabilidad*/
        $user->indicator = $request->indicator;
        $user->extension = $request->extension;
        $user->save();
        toastr('success', 'OPERACIÓN EXITOSA!', "El usuario ha sido actualizado.");
        return redirect()->route('users.index');

    }

  
    public function destroy($id)
    {
        $users = User::findOrFail(decrypt($id));
        if($users->destroy_validate()){
            $users->delete();
            toastr('success', 'OPERACIÓN EXITOSA!', "El usuario ha sido eliminado.");
        }
        return redirect()->back();
    }

    public function status($id)
    {
        $users = User::findOrFail(decrypt($id));
        if($users->status){
            $users->status = 0;
            toastr('success', 'OPERACIÓN EXITOSA!', "El usuario ha sido deshabilitado.");
        }else{
            $users->status = 1;
            toastr('success', 'OPERACIÓN EXITOSA!', "El usuario ha sido habilitado.");
        }
        $users->save();

        return redirect()->back();
    }

}
