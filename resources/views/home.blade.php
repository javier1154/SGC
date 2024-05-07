@extends('layouts.app')
@section('titulo', 'Resumen')
@section('subtitulo', date("d-m-Y"))
@section('contenido')

@php
    if(empty($tasa)){
        $tasa_precio = 0;
    }else{
        $tasa_precio = $tasa->precio;
    }
@endphp

<span class="label label-success pull-right" style="font-size: 18px; margin-top: -24px">Tasa actual <b>{!!monto($tasa_precio)!!} Bs</b></span>

@if (empty($apertura))

    <span class="label label-danger blink bold pull-right" style="font-size: 18px; margin-top: -24px; color: #FFF !important; margin-right: 10px; cursor: pointer" data-toggle="modal" data-target="#modal-default">Aperturar Caja</span>

    <div class="modal fade" id="modal-default">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><b>Apertura de Caja</b></h4>
					</div>
					<form class="form-horizontal" action="{{ route('aperturas.store') }}" method="POST">
					@csrf
						<div class="modal-body">
							@include('layouts.validacion')
							<div class="row">
                                <div class="form-group col-md-12  has-feedback">
									<label class="col-md-12">Monto de apertura de caja</label>
									<div class="col-md-12">
										<input type="number" step="0.01" min="0.00" name="monto_apertura" class="form-control" required>
										<span class="form-control-feedback bold">$</span>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Registrar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
@endif

<br>

    <div class="row">
        
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Ventas ($)</span>
                    <span class="info-box-number">{!! monto($ventas_contado->sum('total')) !!}</span>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-dollar"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Dólares Recibidos</span>
                    <span class="info-box-number">{!! monto($pagos->sum('dolares')) !!}</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua bold">Bs</span>
                <div class="info-box-content">
                    <span class="info-box-text">Bolívares Recibidos</span>
                    <span class="info-box-number">
                        <table style="font-size: 14px; margin-bottom: -10px" class="table table-condensed bs">
                            <tr>
                                <th class="text-right col-sm-4">Efectivo</th>
                                <td class=" col-sm-2 text-left">{!! monto($pagos->sum('efectivo')) !!}</td>
                            
                                <th class="text-right col-sm-4">Punto de Venta</th>
                                <td class="col-sm-2 text-left">{!! monto($pagos->sum('pdv')) !!}</td>
                            </tr>
                            <tr>
                                <th class="text-right">Transferencia</th>
                                <td class="text-left">{!! monto($pagos->sum('biopago')) !!}</td>
                            
                                <th class="text-right">Pago Móvil</th>
                                <td class="text-left">{!! monto($pagos->sum('pagomovil')) !!}</td>
                            </tr>
                        </table>
                    </span>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-bank"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Abonos ($)</span>
                    <span class="info-box-number">{!! monto($abonos) !!}</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-ticket"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Retiros ($)</span>
                    <span class="info-box-number">{!! monto($retiros) !!}</span>
                </div>
            </div>
        </div> --}}

        <div class="col-md-6 col-sm-6a col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-crop"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Gastos ($)</span>
                    <span class="info-box-number">{!! monto($gastos) !!}</span>
                </div>
            </div>
        </div>

    </div>
    <div class="row">

        @php
            if( (count($productos_vendidos) > 0) and (count($productos_oferta) > 0) ){
                $col = "6";
            }else{
                $col = "12";
            }
        @endphp

    @if (count($productos_oferta))
        <div class="col-md-{{$col}}">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Productos en oferta</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body" style="max-height: 295px;overflow-y: auto; padding: 0px">
                    <table class="table">
                        <tbody>
                            <?php $i = 0;  $Aventas = $ventas->pluck('id'); ?>
                            @foreach($productos_oferta as $producto)
                            <tr>
                                <td class="text-center">{{$i = $i+1}}</td>
                                <td class="col-md-9 bold">{!! popProductoPresentacion($producto) !!}</td>
                                <td class="col-md-1 info text-center bold">${!! monto($producto->dolares_mayor()) !!}</td>
                                <td class="text-center col-md-1">
                                    <a href="{{route('productos.show', encrypt($producto->producto->id))}}" data-toggle="tooltip" data-placement="bottom" title="Gestionar"><i class="fa fa-cogs fa-lg" style="color: #f0ad4e"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif

        @if (count($productos_vendidos))
            <div class="col-md-{{$col}}">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b>Productos vendidos el día de hoy</b></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body" style="max-height: 295px;overflow-y: auto; padding: 0px">
                        <table class="table">
                            <tbody>
                                <?php $i = 0;  $Aventas = $ventas->where('tipo_pago', '<>', 'Obsequio')->pluck('id'); ?>
                                @foreach($productos_vendidos as $producto)
                                <tr>
                                    <td class="text-center">{{$i = $i+1}}</td>
                                    <td class="col-md-11 bold">{!! popProductoPresentacion($producto) !!}</td>
                                    <td class="text-center col-md-1 info bold">{{$producto->ventas_producto->whereIn('id_venta', $Aventas)->sum('cantidad')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-md-8">
            <div class="box box-success" style="">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Ventas de los últimos 10 días</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="revenue-chart1" style="height: 296px"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Productos más vendidos</b></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body" style="max-height: 295px;overflow-y: auto;">
                    <table class="table table-striped">
                        @foreach ($productos as $producto)
                            <tr>
                                <td class="bold">
                                    {{$producto->nombre()}}
                                </td>
                                <td class="bold">{{montoAlert($producto->vendidos)}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">	
            <div class="box box-success">
                <div class="box-header with-border">
                <h3 class="box-title"><b>Ingresos de los últimos 10 días</b></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>

                </div>
                <div class="box-body chart-responsive">
                <div class="chart" id="line-chart" style="height: 286px;"></div>
                </div>
            </div>
        </div>
        
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="{!! asset('plugins/morris.js/morris.css') !!}">
    <style>
        table.table.bs tbody tr td, table.table.bs tr th {
            padding: 6px 10px;
        }

        a .info-box-text, a .info-box-number{
            color: #000;
        }
        span.info-box-number {
            text-align: center;
            font-weight: 400;
            font-size: 30px;
            font-weight: 500;
        }
    </style>
@endsection
@section('js')
	<script src="{!! asset('plugins/raphael/raphael.min.js') !!}"></script>
	<script src="{!! asset('plugins/morris.js/morris.js') !!}"></script>
    <script>
        $(document).ready(function(){
            $( "ul.sidebar-menu li.inicio" ).addClass('active');

                // AREA CHART
                var area1 = new Morris.Area({
                element: 'revenue-chart1',
                resize: true,
                data: {!! $grafica_ventas !!},
                xkey: 'y',
                ykeys: ['ventas'],
                labels: ['Ventas'],
                lineColors: ['#00107f'],
                hideHover: 'auto',
                xLabelFormat: function(date) {
                    return date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear(); 
                }
                });

                // LINE CHART
                var line = new Morris.Line({
                element: 'line-chart',
                resize: true,
                data: {!! $grafica_ingresos !!},
                xkey: 'y',
                ykeys: ['dolares','efectivo','pdv','biopago','pagomovil'],
                labels: ['Dólares','Bs Efectivo','Bs Punto de Venta','Bs Transferencia','Bs Pago Móvil'],
                lineColors: ['#00a65a','#dd4b39','#f39c12','#00107f','#337ab7'],
                hideHover: 'auto',
                xLabelFormat: function(date) {
                    return date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear(); 
                }
                });
        });
    </script>
@endsection