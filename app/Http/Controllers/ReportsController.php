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

        $pdf = App::PDF('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        
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
        /*
        $user_days = Fuel_day::findOrFail(decrypt($id));

        // Generar y descargar PDF
        $pdf = app('dompdf.wrapper', array('user_days' => $user_days));
        $pdf->loadView('pdf.invoice');
        return $pdf->stream('invoice.pdf' . $user_days->id . '.pdf');*/

        $user_day = Fuel_day::findOrFail(decrypt($id));

        // Generate PDF using dompdf
        $pdf = PDF::loadView('pdf.invoice', compact('user_day'));
        $pdf->setPaper('A4', 'landscape');
        // Stream or download the PDF
        return $pdf->stream('invoice.pdf' . $user_day->id . '.pdf');
    
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
