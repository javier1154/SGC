<table class="modules">
    <tr>
        <td colspan="7"></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="3"></td>
        <td colspan="5" style="text-align: right; font-size: 14px; font-weight: bold;">SEGUIMIENTO A LA PARTICIPACIÓN</td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: right; font-weight: bold;">{{$titulo}}</td>
    </tr>
    <tr>
        <td colspan="5" style="text-align: right">{{$fecha}}</td>
    </tr>
    <tr>
        <td colspan="7"></td>
    </tr>
    <tr>
        <th class="text-center" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">N°</th>
        <th class="text-left" style="width: 60px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">{{$entidad}}</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">INTEGRANTES</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center" colspan="2">REPORTADOS</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center" colspan="2">RESTANTES</th>
    </tr>
    @php
        $i = 0;
        $Tintegrantes = 0;
        $Treportados = 0;
    @endphp
    @foreach ($registros as $registro)
        @php
            $usuarios = $registro->usuarios->where('seguimiento', 1);

            if(count($condiciones)){
                foreach ($condiciones as $campo => $valor) {
                    $usuarios = $usuarios->where($campo, $valor);
                }
            }
            
            $integrantes = $usuarios->count();

            if($integrantes == 0) $Dintegrantes = 1; else $Dintegrantes = $integrantes;

            $reportados = $usuarios->where('voto', 1)->count();
            $restantes = $integrantes-$reportados;
            $porcentaje = ($reportados*100)/$Dintegrantes;

            $Tintegrantes += $integrantes;
            $Treportados += $reportados;
        @endphp
        <tr>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{ $i = $i + 1 }}</td>
            <td class="text-left bold" style="text-align: left; border: 1px solid #000000; font-weight: bold;">{{$registro->nombre}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{cantidadExcel($integrantes)}}</td>
            <td class="text-center success bold" style="width: 7px;text-align: center; border: 1px solid #000000; font-weight: bold; background-color: #CFEEC3">{{cantidadExcel($reportados)}}</td>
            <td class="text-center success" style="width: 7px;text-align: center; border: 1px solid #000000; background-color: #CFEEC3">{{cantidadExcel($porcentaje)}}%</td>
            <td class="text-center danger" style="width: 7px;text-align: center; border: 1px solid #000000; background-color: #F5C4C4">{{cantidadExcel($restantes)}}</td>
            <td class="text-center danger" style="width: 7px;text-align: center; border: 1px solid #000000; background-color: #F5C4C4">{{cantidadExcel(100-$porcentaje)}}%</td>
        </tr>
    @endforeach
    @php
        $Trestantes = $Tintegrantes-$Treportados;
        $Tporcentaje = ($Treportados*100)/$Tintegrantes;
    @endphp
    <tr>
        <td colspan="2" class="text-right bold" style="text-align: center; border: 1px solid #000000;font-weight: bold; text-align: right;">Totales</td>
        <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{cantidadExcel($Tintegrantes)}}</td>
        <td class="text-center bold" style="text-align: center; border: 1px solid #000000;font-weight: bold;">{{cantidadExcel($Treportados)}}</td>
        <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{cantidadExcel($Tporcentaje)}}%</td>
        <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{cantidadExcel($Trestantes)}}</td>
        <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{cantidadExcel(100-($Tporcentaje))}}%</td>
    </tr>
</table>