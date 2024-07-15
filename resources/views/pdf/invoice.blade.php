@extends('layouts.pdf')
@include('partials.css2')
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
                    
                    
                        <label style="position:relative; left: -18px;">Reporte de Despacho de Combustible</label><br>
                
                
                        <label style="position:relative; left: -18px;">Distrito Oriental-Área Carúpano</label><br>
                </div>
            </div>

            <div style="position: relative; margin-left: 890px; bottom: 100px;">
            
               
                       <label style=" font-size: 15px;"><u>Fecha: {!!fecha($user_day->day)!!} </u></label><br>
                       
           </div>
        
        </div>
</div>
    <div class="container">
        <div>
        <p class="text-center bold" style="font-size: 15px ;"><strong>REGISTROS DIARIOS DE SUMINISTRO DE COMBUSTIBLE</strong></p>
        </div>
    </div>
        

        <div class="container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center col-md-1">Gerencia</th>
                        <th class="text-center col-md-1">Usuario</th>
                        <th class="text-center col-md-1">C.I.</th>
                        <th class="text-center col-md-1">Marca</th>
                       
                        <th class="text-center col-md-1">Modelo</th>
                        
                        <th class="text-center col-md-1">Color</th>
                        
                        <th class= "text-center col-md-1">Placa</th>
                        <th class= "text-center col-md-1">Litros surtidos</th>
                        <th class="text-center col-md-1">Firma</th>
                        <th class="text-center col-md-1">Gerente</th>
               
                        <th class="text-center col-md-1">Observaciones</th>
                    
                        
                    </tr>
                </thead>
                <tbody>
                @php
                    
                    $i = 0;

                @endphp
                @foreach($user_day->fuel_days as $info)
                    @php
                      $i++;

                    @endphp
                    <tr>
                        <td class="text-center bold">{{$i}}</td>
                        <td class="text-center">{{$info->user->management->code}}</td>
                        <td class="text-center">{{$info->user->name}}</td>
                        <td class="text-center">{{$info->user->ci}}</td>
                        <td class="text-center">{{$info->vehicle->brand}}</td>
                        <td class="text-center">{{$info->vehicle->model}}</td>
                        <td class="text-center">{{$info->vehicle->color}}</td>
                        <td class="text-center">{{$info->vehicle->plate}}</td>
                        <td class="text-center">{{$info->assorted_litre}}</td>
                        <td></td>
                        <td class="text-center">{{$info->permit->user->name}}</td>
                        @if($info->vehicle->type == "Uso oficial")
                        <td class="text-center">Uso oficial</td>
                        @else
                        <td class="text-center">{{$info->vehicle->observations}}</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    
                    
				</tfoot>
            </table>
        </div>

    <div class="container">
        <div class="row">

            <div style="position: absolute; top: 90px">
            
                <div>
                        <label style="position:relative; left: -18px;">Firma:___________________</label><br><br>
                    
                    
                        <label style="position:relative; left: -18px;">Nombre: {{$user_day->permit->user->name}}</label><br><br>
                
                
                        <label style="position:relative; left: -18px;">C.I: {{$user_day->permit->user->ci}}</label><br><br>
                </div>
            </div>

            <div style="position: relative; top: 45px; left: 770px;">
                            @php
                                $final_litre = $user_day->day_litres->where('type','final')->where('status', 1)->first();
                                
                            @endphp
                        <label style=" font-size: 15px;"><u>TOTAL VOLUMEN LITROS:{{$final_litre->litres}}</u></label><br>
                        
            </div>

        </div>
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

