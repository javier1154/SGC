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
        <th class="text-left" style="width: 30px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">Descripción</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">Recepcionado por</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: left">Combustible</th>
        <th class="text-center" style="width: 14px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Litros recepcionados</th>
        <th class="text-center" style="width: 30px; font-weight: bold; background-color: #ed1c24; color: #FFFFFF; text-align: center">Fecha de creación</th>
        
    </tr>
    @php
        $i = 0;
    @endphp
    @foreach ($cisterns as $cistern)
        <tr>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{ $i = $i + 1 }}</td>
            <td class="text-left bold" style="text-align: left; border: 1px solid #000000; font-weight: bold;">{{$cistern->description}}</td>
            <td class="text-left" style="text-align: left; border: 1px solid #000000;">{{$cistern->permit->user->name}}</td>
            <td class="text-left" style="text-align: left; border: 1px solid #000000;">{{$cistern->tank->fuel->name}}</td>
            <td class="text-center" style="text-align: center; border: 1px solid #000000;">{{$cistern->received_litre}}</td>
            <td class="text-left" style="text-align: left; border: 1px solid #000000;">{{ $cistern->created_at }}</td>
        </tr>
    @endforeach
</table>