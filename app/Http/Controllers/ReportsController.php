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
        /* $user_day = Fuel_day::findOrFail(4);
        dd($user_day->fuel_days->where('estado', 'Propuesto')); */
        
        return view('reports.index');
        
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
        $user_day = Fuel_day::findOrFail(decrypt($id));

        // Generate PDF using dompdf
        $pdf = PDF::loadView('reports.pdf.user_days', compact('user_day'));
        $pdf->setPaper('A4', 'landscape');
        // Stream or download the PDF
        return $pdf->stream('fuel_day.pdf' . $user_day->id . '.pdf');
    
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

    public function users(Request $request){

        if($request->tipo == "Excel"){
            Excel::create('Usuarios-'.date('YmdHis'), function($excel) {
                $excel->sheet('Informe de usuarios', function($sheet) {
                    $users = User::all();
                    // Sheet manipulation
                    $sheet->loadView('reports.excel.users', array('users' => $users));
                });
            })->download('xls');
            //return Excel::download(new GeneralExport($users), "NOMBRE DEL REPORTE.xlsx");
        }else{



            dd("reporte en PDF");



        }
        
        
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
    public function autorize( Request $request,$id){

        if($request->tipo == "Excel"){
            Excel::create('Usuarios-'.date('YmdHis'), function($excel) use ($id) {
                $excel->sheet('Informe de usuarios', function($sheet) use ($id) {
                    
                    $user_day = Fuel_day::findOrFail(decrypt($id));
                    dd($user_day);
                    // Sheet manipulation
                    $sheet->loadView('reports.excel.users', array('users' => $users));
                });
            })->download('xls');
            //return Excel::download(new GeneralExport($users), "NOMBRE DEL REPORTE.xlsx");
        }else{



            dd("reporte en PDF");



        }
        
        
    }
    
}
