@extends('layouts.pdf')

@section('contenido')
<br>  
<div class="container">
        <div class="row">
            <div class="col-md-12" style="position:relative; left: 15px;">
                
            </div>
        </div>

        <div class="row">

            <div class="col-md-3">
            
                <div class="" style="font-size: 15px; position:relative; left: 20px;">
                        <label style="position:relative; left: -18px;">Dirección Costa Afuera de PDVSA Gas</label><br>
                    
                    
                        <label style="position:relative; left: -18px;">Reporte de Despacho de Combustible</label><br>
                
                
                        <label style="position:relative; left: -18px;">Distrito Oriental-Área Carúpano</label><br>
                </div>
            </div>

            <div class="col-md-2" style="position:relative; left: 280px;">
            
               
                       <label style=" font-size: 15px;"><u>Mes/Año</u>__________</label><br>
                       <label style= "font-size: 15px;"><u>Día________</u></label>
           </div>

           <div class="col-md-2" style="position:relative; left: 340px;">
            
                <label style="font-size: 15px;">Nº de Páginas ____/____</label><br>
                   
           </div>
        
        </div>
</div>
<div class="container">
    <div>
    <p class="text-center bold" style="font-size: 15px ;"><strong>REGISTROS DIARIOS DE SUMINISTRO DE COMBUSTIBLE</strong></p>
    </div>
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
                @foreach($data['user_days']->fuel_days as $user_day)
                    @php
                      $i++;

                    @endphp
                    <tr>
                        <td class="text-center bold">{{$i}}</td>
                        <td class="text-center">{{$user_day->user->management->name}}</td>
                        <td class="text-center">{{$user_day->user->name}}</td>
                        <td class="text-center">{{$user_day->user->ci}}</td>
                        <td class="text-center">{{$user_day->vehicle->brand}}</td>
                        <td class="text-center">{{$user_day->vehicle->model}}</td>
                        <td class="text-center">{{$user_day->vehicle->color}}</td>
                        <td class="text-center">{{$user_day->vehicle->plate}}</td>
                        <td class="text-center">{{$user_day->assorted_litre}}</td>
                        <td></td>
                        <td class="text-center">{{$user_day->permit->user->name}}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>

                        <td colspan="12">
                          
                        </td>
                        
                    </tr>
                    
				</tfoot>
            </table>
        </div>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
            
                <div class="" style="font-size: 15px; position:relative; left: 20px;">
                        <label style="position:relative; left: -18px;">Firma:___________________</label><br>
                    
                    
                        <label style="position:relative; left: -18px;">Nombre:_________________</label><br>
                
                
                        <label style="position:relative; left: -18px;">C.I:______________________</label><br>
                </div>
            </div>

            <div class="col-md-3" style="position:relative; left: 280px;">
            
                
                        <label style=" font-size: 15px;"><u>TOTAL VOLUMEN LITROS:</u>_________</label><br>
                        
            </div>

        </div>
    </div>
        
@endsection
