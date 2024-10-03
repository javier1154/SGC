<table class="modules">
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="12" rowspan="3"></td>
        <td colspan="4" style="text-align: right; font-size: 14px; font-weight: bold;">SEGUIMIENTO A LA PARTICIPACIÓN</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right; font-weight: bold;">{{$titulo}}</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right">{{$fecha}}</td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <th class="text-center" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">N°</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">CÉDULA</th>
        <th class="text-left" style="width: 50px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">USUARIO</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">TELÉFONO</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">EXTENSIÓN</th>
        <th class="text-center" style="width: 18px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">INDICADOR</th>
        <th class="text-center" style="width: 18px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">ENTE</th>
        <th class="text-center" style="width: 28px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">PRESD/VP</th>
        <th class="text-center" style="width: 34px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">ORGANIZACIÓN</th>
        <th class="text-center" style="width: 20px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">LOCALIDAD</th>
        <th class="text-center" style="width: 34px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">GERENCIA</th>
        <th class="text-center" style="width: 20px; font-weight: bold; background-color: #25069f; color: #FFFFFF; text-align: center">ESTADO</th>
        <th class="text-center" style="width: 30px; font-weight: bold; background-color: #25069f; color: #FFFFFF; text-align: center">MUNICIPIO</th>
        <th class="text-center" style="width: 30px; font-weight: bold; background-color: #25069f; color: #FFFFFF; text-align: center">PARROQUIA</th>
        <th class="text-center" style="width: 15px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">¿PARTICIPÓ?</th>
        <th class="text-center" style="width: 20px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">F/H REPORTE</th>
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($registros as $usuario)
        <tr>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{ $i = $i + 1 }}</td>
            <td class="text-left" style="text-align: left; border: 1px solid #000000;">{{$usuario->cedula}}</td>
            <td class="text-left bold" style="text-align: left; border: 1px solid #000000; font-weight: bold;">{{$usuario->nombres}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->telefono}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->extension}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->indicador}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->ente}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->pv}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->organizacion}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->localidad}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->gerencia}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->estado}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->municipio}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$usuario->parroquia}}</td>
            @if ($usuario->voto)
                <td class="text-center" style="text-align: center; border: 1px solid #000000; font-weight: bold; color: #FFFFFF;background-color: #4caf50">SI</td>
                <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{fecha_hora($usuario->hora)}}</td>
            @else
                <td class="text-center" style="text-align: center; border: 1px solid #000000; font-weight: bold; color: #FFFFFF;background-color: #ed1c24">NO</td>
                <td style="text-align: center; border: 1px solid #000000;"></td>
            @endif
        </tr>
    @endforeach
</table>