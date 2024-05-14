<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permit;
use App\User;
class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $users = User::orderBy('name')->get();
        $permit = Permit::orderBy('type')->get();
        return view('permissions.index', compact('permit', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('permissions.create', compact('users'));
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
            'type' => 'required',
            'user_id' => 'required'
        ]);

        $user_exist = User::where('ci', $request->user_id)->orWhere('indicator', $request->user_id)->first();
        if(!empty($user_exist)){
            $permit_exist = Permit::where('user_id', $user_exist->id)->first();
            if(empty($permit_exist)){
                $permit = new Permit($request->all());
                $permit->user_id = $user_exist->id;
                $permit->type = mb_strtoupper($request->type, "UTF-8");
                $permit->status = true;
                $permit->save();
                return redirect()->back();
            }else{
                //el usuario ya posee permisos
            }
            
        }else{
            //el usuario no se encuentra registrado
        }

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
        $permit = Permit::findOrFail(decrypt($id));
        return view('permissions.edit', compact('permit'));
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
        $permit = Permit::find($id);
        
        $permit->type = mb_strtoupper($request->type, "UTF-8");
        $permit->status = $request->status;
        $permit->save();
        return redirect()->route('permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permit = Permit::findOrFail(decrypt($id));
        if($permit->destroy_validate()){
            $permit->delete();
        }else{
            /* toastr()->success('La gerencia no puede ser eliminada debido a que posee registros asociados.', 'ERROR!'); */
            return redirect()->back();
        }
        /* toastr()->success('La gerencia ha sido eliminada.', 'OPERACIÓN EXITOSA!'); */
        return redirect()->back();    
    }

    public function status($id)
    {
        $permit = Permit::findOrFail(decrypt($id));
        if($permit->status){
            $permit->status = 0;
            /* toastr()->success('La gerencia ha sido deshabilitada.', 'ERROR!'); */
        }else{
            $permit->status = 1;
            /* toastr()->success('La gerencia ha sido habilitada.', 'ERROR!'); */
        }
        $permit->save();
        return redirect()->back();
    }
}
