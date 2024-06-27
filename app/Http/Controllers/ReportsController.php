<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Fuel_day;
use App\Vehicle;




class ReportsController extends Controller
{
   
    public function index()
    {


        
    }

   
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
    
        $user_days = Fuel_day::findOrFail(decrypt($id));
       
        $data = [
            'user' => $user_days,
            'title' => 'Perfil de usuario: ' . $user_days->proposed_litre,
        ];

        // Generar y descargar PDF
        $pdf = PDF::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf' . $user_days->id . '.pdf');
    
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
