<table class="modules">
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="3"></td>
        <td colspan="4" style="text-align: right; font-size: 14px; font-weight: bold;">SISTEMA DE GESTIÒN DE COMBUSTIBLE</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right; font-weight: bold;">REPORTE DE JORNADAS</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right">{{date('Y-m-d H:i:s')}}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        
        <th class="text-center"  style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">N°</th>
        <th class="text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Gerencia</th>
        <th class="text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Usuario</th>
        <th class="text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">C.I.</th>
        <th class="text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Marca</th>
        
        <th class="text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Modelo</th>
        
        <th class="text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Color</th>
        
        <th class= "text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Placa</th>
        <th class= "text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Litros surtidos</th>
        <th class="text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Gerente</th>

        <th class="text-center col-md-1" colspan= "2" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Observaciones</th>
        
            
        
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($user_day->fuel_days as $info)
        <tr>
            <td class="text-center bold" style="text-align: center; border: 1px solid #000000;">{{$i = $i + 1 }}</td>
            <td class="text-center" colspan= "2" style="text-align: center; border: 1px solid #000000;">{{$info->user->management->code}}</td>
            <td class="text-center" colspan= "2" style="text-align: center; border: 1px solid #000000;">{{$info->user->name}}</td>
            <td class="text-center" colspan= "2" style="text-align: center; border: 1px solid #000000;">{{$info->user->ci}}</td>
            <td class="text-center" colspan= "2" style="text-align: center; border: 1px solid #000000;">{{$info->vehicle->brand}}</td>
            <td class="text-center" colspan= "2" style="text-align: center; border: 1px solid #000000;">{{$info->vehicle->model}}</td>
            <td class="text-center" colspan= "2" style="text-align: center; border: 1px solid #000000;">{{$info->vehicle->color}}</td>
            <td class="text-center" colspan= "2" style="text-align: center; border: 1px solid #000000;">{{$info->vehicle->plate}}</td>
            <td class="text-center" colspan= "2" style="text-align: center; border: 1px solid #000000;">{{$info->assorted_litre}}</td>
            <td colspan= "2" style="text-align: center; border: 1px solid #000000;" class="text-center">{{$info->permit->user->name}}</td>
            @if($info->vehicle->type == "Uso oficial")
            <td colspan= "2" class="text-center" style="text-align: center; border: 1px solid #000000;">Uso oficial</td>
            @else
            <td colspan= "2" class="text-center" style="text-align: center; border: 1px solid #000000;">{{$info->vehicle->observations}}</td>
            @endif
        </tr>
    @endforeach
</table>