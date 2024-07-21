<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Fuel_day;
use App\Vehicle;
use App\User;
use App\Cistern;
use App\Exports\GeneralExport;
use Maatwebsite\Excel\Facades\Excel;


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

    public function test(){
        

        Excel::create('Test-'.date('YmdHis'), function($excel) {
            $excel->sheet('Usuarios', function($sheet) {

                $users = User::all();
                // Sheet manipulation
                $sheet->loadView('reports.excel.users', array('users' => $users));
        
            });
        })->download('xls');

        //return Excel::download(new GeneralExport($users), "NOMBRE DEL REPORTE.xlsx");
    }
    public function test2($id){
        
        
        Excel::create('Test-'.date('YmdHis'), function($excel)  use ($id){
            $excel->sheet('Jornada', function($sheet)  use ($id){

                $user_day = Fuel_day::findOrFail(decrypt($id));
                // Sheet manipulation
                $sheet->loadView('reports.excel.jornadas', array('user_day' => $user_day));
        
            });
        })->download('xls');

        //return Excel::download(new GeneralExport($users), "NOMBRE DEL REPORTE.xlsx");
    }
    public function test3(){
        

        Excel::create('Test-'.date('YmdHis'), function($excel) {
            $excel->sheet('Cisternas', function($sheet) {

                $cistern = Cistern::all();
                // Sheet manipulation
                $sheet->loadView('reports.excel.cisternas', array('cisterns' => $cistern));
        
            });
        })->download('xls');

        //return Excel::download(new GeneralExport($users), "NOMBRE DEL REPORTE.xlsx");
    }
}
