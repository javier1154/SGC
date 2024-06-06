<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cistern;
class CisternController extends Controller
{
   
    public function index()
    {
        $cisterns = Cistern::orderBy('received_litre')->get(); 
        return view('cistern.index', compact('cisterns'));
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
            'permit_id' => 'required',
        ]);
        $cistern = new Cistern($request->all());
        $cistern->description = $request->description;
        $cistern->tank_id = decrypt($request->tank_id);
        $cistern->received_litre = $request->received_litre;
        $cistern->permit_id = $request->permit_id;
        $cistern->save();
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
        //
    }
}
