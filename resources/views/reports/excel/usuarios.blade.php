<table class="modules">
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td colspan="2" rowspan="3"></td>
        <td colspan="4" style="text-align: right; font-size: 14px; font-weight: bold;">SEGUIMIENTO A LA PARTICIPACIÓN</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right; font-weight: bold;">{{$titulo}}</td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right">{{$fecha}}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <th class="text-center" style="width: 5px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">N°</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">CÉDULA</th>
        <th class="text-left" style="width: 60px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">USUARIO</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">TELÉFONO</th>
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