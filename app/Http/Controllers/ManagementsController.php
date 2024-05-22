<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Management;

class ManagementsController extends Controller
{
    
    public function index()
    {
        $managements = Management::orderBy('name')->get();
        return view('managements.index', compact('managements'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $exist_management = Management::where('name', $request->name)->first();
        if(!empty($exist_management)){
            /* toastr()->error('Ya existe una gerencia con el mismo nombre.', 'ERROR!'); */
            return redirect()->back();
        }

        $management = new Management();
        $management->name = mb_strtoupper($request->name, "UTF-8");
        $management->status = 1;
        $management->save();

        /* toastr()->success('La gerencia ha sido registrada.', 'OPERACIÓN EXITOSA!'); */
        return redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $management = Management::findOrFail(decrypt($id));
        return view('managements.edit', compact('management'));
    }

   
    public function update(Request $request, $id)
    {
        
        $management = Management::find($id);
        $management->name = $request->name;
        $management->cuota = $request->cuota;
        $management->save();
        return redirect()->route('managements.index');
    }

    
    public function destroy($id)
    {
        $management = Management::findOrFail(decrypt($id));
        if($management->destroy_validate()){
            $management->delete();
        }else{
            /* toastr()->success('La gerencia no puede ser eliminada debido a que posee registros asociados.', 'ERROR!'); */
            return redirect()->back();
        }
        /* toastr()->success('La gerencia ha sido eliminada.', 'OPERACIÓN EXITOSA!'); */
        return redirect()->back();
    }

    public function status($id)
    {
        $management = Management::findOrFail(decrypt($id));
        if($management->status){
            $management->status = 0;
            /* toastr()->success('La gerencia ha sido deshabilitada.', 'ERROR!'); */
        }else{
            $management->status = 1;
            /* toastr()->success('La gerencia ha sido habilitada.', 'ERROR!'); */
        }
        $management->save();
        return redirect()->back();
    }
}
