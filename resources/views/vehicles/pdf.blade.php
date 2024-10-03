@extends('layouts.pdf')
@include('partials.css2')
@section('titulo', 'Reporte de usuarios')
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
                    
                    
                        <label style="position:relative; left: -18px;">Reporte de Usuarios</label><br>
                
                
                        <label style="position:relative; left: -18px;">Distrito Oriental-Área Carúpano</label><br>
                </div>
            </div>

            
        
        </div>
</div>
    <div class="container">
        <div>
        <p class="text-center bold" style="font-size: 15px ;"><strong>USUARIOS ACTUALES DEL SISTEMA</strong></p>
        </div>
    </div>
        

        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center col-md-2">Usuario</th>
                        <th class="text-center col-md-2">Marca</th>
                        <th class="text-center col-md-2">Modelo</th>
                        <th class="text-center col-md-2">Color</th>
                        <th class="text-center col-md-1">Placa</th>
                        <th class="text-center col-md-1">Año</th>
                        <th class="text-center col-md-1">Litraje</th>
                        <th class="text-center col-md-1">Tipo</th>
                        <th class="text-center col-md-2">Observaciones</th>


                    
                        
                    </tr>
                </thead>
                <tbody>
                @php
                    
                    $i = 0;

                @endphp
                @foreach($vehicles as $info)
                    @php
                      $i++;
                    @endphp
                    <tr>
                        <td class="text-center">{{$i}}</td>
                        <td class="text-center">{{$info->user_vehicles->user->name}}</td>
                        <td class="text-center">{{$info->brand}}</td>
                        <td class="text-center">{{$info->model}}</td>
                        <td class="text-center">{{$info->color}}</td>
                        <td class="text-center">{{$info->plate}}</td>
                        <td class="text-center">{{$info->year}}</td>
                        <td class="text-center">{{$info->liter}}</td>
                        <td class="text-center">{{$info->type}}</td>
                        <td class="text-center">{{$info->observations}}</td>
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