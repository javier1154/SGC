@extends('layouts.pdf')
@section('title', $titulo)
@section('content')
    <div id="content" class="title">
        <div class="page-section text-center">
            <div class="title">
                <div class="tit">SEGUIMIENTO A LA PARTICIPACIÓN</div>
                <div>{{$titulo}}</div>
                <div class="date">{{$fecha}}</div>
            </div>
        </div>
    </div>

    <div id="content">
        <div class="page-section">
            <table class="modules">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 4%;">N°</th>
                        <th class="text-left" style="">{{$entidad}}</th>
                        <th class="text-center" style="width: 16%;">INTEGRANTES</th>
                        <th class="text-center" colspan="2">REPORTADOS</th>
                        <th class="text-center" colspan="2">RESTANTES</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                        $Tintegrantes = 0;
                        $Treportados = 0;
                    @endphp
                    @foreach ($registros as $registro)
                        @php
                            $usuarios = $registro->usuarios->where('seguimiento', 1);
                            $integrantes = $usuarios->count();

                            if($integrantes == 0) $Dintegrantes = 1; else $Dintegrantes = $integrantes;

                            $reportados = $usuarios->where('voto', 1)->count();
                            $restantes = $integrantes-$reportados;
                            $porcentaje = ($reportados*100)/$Dintegrantes;

                            $Tintegrantes += $integrantes;
                            $Treportados += $reportados;
                        @endphp
                        <tr>
                            <td class="text-center">{{ $i = $i + 1 }}</td>
                            <td class="text-left bold">{{$registro->nombre}}</td>
                            <td class="text-center">{{cantidad($integrantes)}}</td>
                            <td class="text-center success bold" style="width: 8%;">{{cantidad($reportados)}}</td>
                            <td class="text-center success" style="width: 8%;">{{cantidad($porcentaje)}}%</td>
                            <td class="text-center danger" style="width: 8%;">{{cantidad($restantes)}}</td>
                            <td class="text-center danger" style="width: 8%;">{{cantidad(100-$porcentaje)}}%</td>
                        </tr>
                    @endforeach
                    @php
                        $Trestantes = $Tintegrantes-$Treportados;
                        $Tporcentaje = ($Treportados*100)/$Tintegrantes;
                    @endphp
                    <tr>
                        <td colspan="2" class="text-right bold">Totales</td>
                        <td class="text-center">{{cantidad($Tintegrantes)}}</td>
                        <td class="text-center bold" style="width: 8%;">{{cantidad($Treportados)}}</td>
                        <td class="text-center" style="width: 8%;">{{cantidad($Tporcentaje)}}%</td>
                        <td class="text-center" style="width: 8%;">{{cantidad($Trestantes)}}</td>
                        <td class="text-center" style="width: 8%;">{{cantidad(100-($Tporcentaje))}}%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="page-break"></div>

    <div id="content" class="title">
        <div class="page-section text-center">
            <div class="title">
                <div class="tit">SEGUIMIENTO A LA PARTICIPACIÓN</div>
                <div>{{$titulo}}</div>
                <div class="date">{{$fecha}}</div>
            </div>
            @php
                $Drestantes = (100-$Tporcentaje) * 4;
                $Dreportados = $Tporcentaje * 4;
            @endphp
            <table class="grafica" style="width: 400px; margin: 0 auto; margin-top: 80px; margin-bottom: 20px;">
                <tr>
                    <td>{{cantidad(100-$Tporcentaje)}}%</td>
                    <td>{{cantidad($Tporcentaje)}}%</td>
                </tr>
                <tr>
                    <td style="height: 400px;">
                        <div class="" style="height: 400px; border: 1px solid rgb(233, 229, 229); background-color: rgb(240, 239, 239);  width: 80px; margin: 0 auto;transform: rotate(180deg);">
                            <div class="voto" style="background-color: #ed1c24; height: {{$Drestantes}}px; width: 80px;"></div>
                        </div>
                    </td>
                    <td>
                        <div class="" style="height: 400px; border: 1px solid rgb(233, 229, 229); background-color: rgb(240, 239, 239);  width: 80px; margin: 0 auto;transform: rotate(180deg);">
                            <div class="voto" style="background-color: #4caf50; height: {{$Dreportados}}px; width: 80px;"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="bold">Restantes</td>
                    <td class="bold">Reportados</td>
                </tr>
                <tr>
                    <td>{{cantidad($Trestantes)}}</td>
                    <td>{{cantidad($Treportados)}}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection