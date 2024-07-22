<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Fuel_day;
use App\Vehicle;
use App\User;
use App\Exports\GeneralExport;
use Maatwebsite\Excel\Facades\Excel;


class ReportsController extends Controller
{
   
    public function index()
    {

        $users = User::orderby('name')->get();
        //return view('pdf.users', compact('users'));

        // Generate PDF using dompdf
        $pdf = PDF::loadView('pdf.users', compact('users'));
        $pdf->setPaper('A4', 'landscape');
        // Stream or download the PDF
        return $pdf->stream('users.pdf'.'.pdf');
        
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
        
        $users = User::findOrFail($id);

        // Generate PDF using dompdf
        $pdf = PDF::loadView('pdf.users', compact('users'));
        $pdf->setPaper('A4', 'landscape');
        // Stream or download the PDF
        return $pdf->stream('users.pdf' . $users->id . '.pdf');
    
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
            $excel->sheet('Informe de jornada', function($sheet) {

                $users = User::all();
                // Sheet manipulation
                $sheet->loadView('reports.excel.users', array('users' => $users));
        
            });
        })->download('xls');

        //return Excel::download(new GeneralExport($users), "NOMBRE DEL REPORTE.xlsx");
    }
}
