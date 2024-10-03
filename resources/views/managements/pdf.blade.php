@extends('layouts.pdf')
@include('partials.css2')
@section('titulo', 'Reporte de gerencias')
@section('contenido')


<div class="container">
        <div class="row">
            <div class="col-md-12" style="position:relative; left: 45px;">
            
            <img src="{!! public_path('img/logo.png') !!}" width= "170px">
            
        </div>

        <div class="row">

            <div class="col-md-3">
            
                <div class="" style="font-size: 15px; position:relative; left: 40px;">
                        <label style="position:relative; left: -18px;">Dirección Costa Afuera de PDVSA Gas</label><br>
                    
                    
                        <label style="position:relative; left: -18px;">Reporte de gerencias</label><br>
                
                
                        <label style="position:relative; left: -18px;">Distrito Oriental-Área Carúpano</label><br>
                </div>
            </div>

            
        
        </div>
</div>
    <div class="container">
        <div>
        <p class="text-center bold" style="font-size: 15px ;"><strong>GERENCIAS</strong></p>
        </div>
    </div>
        

        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center col-md-6">Gerencia</th>
                        <th class="text-center col-md-4">Código de la Gerencia</th>
                        <th class="text-center col-md-2">Integrantes</th>


                    
                        
                    </tr>
                </thead>
                <tbody>
                @php
                    
                    $i = 0;

                @endphp
                @foreach($managements as $info)
                    @php
                      $i++;

                    @endphp
                    <tr>
                        <td class="text-center bold">{{$i}}</td>
                        <td class="text-left bold">{{$info->name}}</td>
                        <td class="text-center">{{$info->code}}</td>
                        <td class="text-center">{{$info->users->count()}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    
                    
				</tfoot>
            </table>
        </div>

    
<!--Enumeracion de paginas-->
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(370, 570, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    	</script>
        
@endsection