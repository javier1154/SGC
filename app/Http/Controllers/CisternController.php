<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cistern;
use App\Tank;
use PDF;
class CisternController extends Controller
{
    public function pdf()
    {
        $cisterns = Cistern::all();

        $pdf = PDF::loadView('reports.pdf.cisterns', compact('cisterns'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
    public function index()
    {
        $cisterns = Cistern::orderBy('received_litre')->get(); 
        $tanks = Tank::where('status', 1)->orderBy('name')->get(); 
        return view('cistern.index', compact('cisterns', 'tanks'));
    }

   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'tank_id' => 'required',
            'received_litre' => 'required',
            
        ]);
        $cistern = new Cistern($request->all());
        $cistern->description = $request->description;
        $cistern->tank_id = $request->tank_id;
        $cistern->received_litre = $request->received_litre;
        $cistern->permit_id = \Auth::user()->permit->id;
        
        $tank = Tank::Where('id', $request->tank_id)->Where("status", 1)->first();
        $tank->available_litre = $tank->available_litre + $request->received_litre;
        $tank->save();
        $cistern->save();
        toastr('success', 'OPERACIÓN EXITOSA!', "La recepción ha sido guardada.");
        return redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $cistern = Cistern::findOrFail(decrypt($id));
        if($cistern->destroy_validate()){
            $cistern->delete();
        }else{
            /* toastr()->success('La gerencia no puede ser eliminada debido a que posee registros asociados.', 'ERROR!'); */
            return redirect()->back();
        }
        /* toastr()->success('La gerencia ha sido eliminada.', 'OPERACIÓN EXITOSA!'); */
        toastr('success', 'OPERACIÓN EXITOSA!', "La recepción ha sido eliminada.");
        return redirect()->back();
    }
}
