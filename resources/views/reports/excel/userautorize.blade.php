<table class="modules">
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="3"></td>
        <td colspan="4" style="text-align: right; font-size: 14px; font-weight: bold;">SISTEMA DE GESTIÒN DE COMBUSTIBLE</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right; font-weight: bold;">REPORTE DE USUARIOS</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right">{{date('Y-m-d H:i:s')}}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <th class="text-center" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">N°</th>
        <th class="text-left" style="width: 60px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">USUARIO</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">CÉDULA</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">EMAIL</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">TELÉFONO</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">GERENCIA</th>
        
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($user_day as $management)
        <tr>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{ $i = $i + 1 }}</td>
            <td class="text-left bold" style="text-align: left; border: 1px solid #000000; font-weight: bold;">{{$management->code}}</td>
            <td class="text-left" style="text-align: left; border: 1px solid #000000;">{{$management->surtido_anio($year)}}</td>
            
        </tr>
    @endforeach
</table>