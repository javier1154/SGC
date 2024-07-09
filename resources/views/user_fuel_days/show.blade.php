@extends('layouts.app')
@section('titulo', 'Detalles de la jornada')
@section('subtitulo', '')
@section('contenido')
<br>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary" style="border-radius: 5px;">
            <div class="panel-heading">Información de la jornada</div>
        
                <div class="panel-body">
                    
                   <p>
                     Bienvenido a la jornada del <strong> {!! fecha($fuel_day->day)!!} </strong> en esta interfaz usted podrá agregar o eliminar usuarios para la jornada

                   </p> 
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary" style="border-radius: 5px;">
            <div class="panel-heading">Datos de la jornada</div>
                <div class="panel-body">
                   <div class="row">
                        <div class="col-md-12" style="margin-left: 57px;">
                            @php
                                $initial_litre = $fuel_day->day_litres->where('type','initial')->where('status', 1)->first();
                            @endphp
                            
                            @if(empty($initial_litre))
                            
                                    <div class="col-md-4">
                                        <label>Litraje Inicial</label>
                                        <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default" style="border-radius:5px;">
                                            <i class="fa fa-btn fa-sign-in"></i> Registrar
                                        </button>
                                    </div>
                                
                               
                            @else
                            <div class="col-md-6">
                                <label>Litraje Inicial:</label> {{$initial_litre->litres}}
                                <!--
                                    <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-update">
                                        <i class="fa fa-btn fa-sign-in"></i> editar
                                    </button>
                                -->
                            </div>
                             @endif  
                             
                             @php
                                $final_litre = $fuel_day->day_litres->where('type','final')->where('status', 1)->first();
                            @endphp
                            
                            @if( $fuel_day->manage_level == "Finalizada")

                                @if(empty($final_litre))
                                
                                    <div class="col-md-4" style="margin-left: 50px; position:relative;">
                                        <label>Litraje Final</label>
                                        <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default2" style="border-radius: 5px;">
                                            <i class="fa fa-btn fa-sign-in"></i> Registrar
                                        </button>
                                    </div>
                                
                                @else
                                <div class="col-md-6">
                                    <label>Litraje Final:</label> {{$final_litre->litres}}
                                    <!--
                                        <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-update2">
                                            <i class="fa fa-btn fa-sign-in"></i> editar
                                        </button>
                                    -->
                                </div>
                                @endif  
                            @endif
                               
                            
                        </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-12">
            <!--Modal Agregar Usuario a la Jornada -->
            
            <div class="modal fade" id="modal-agg">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Agregar usuario</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('user_fuel_day.add', $fuel_day->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        
                                        <div class="form-group col-md-12">
                                            <label>Cédula o indicador</label>
                                            <input type="text" required name="user_id" class="form-control">
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
            
            <!--Modal Litraje Inicial -->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Litraje inicial de la jornada</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('user_fuel_day.update', $fuel_day->id)}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        
                                        <input type="hidden" name="type" class="form-control" required value="initial">
                                        <input type="hidden" name="operation" class="form-control" required value="registrar">
                                        
                                        <div class="form-group col-md-12">
                                            <label>Cantidad</label>
                                            <input type="number" name="litres" class="form-control" required value="" step= "0.01">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" style="border-radius: 5px;">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-flat" style="border-radius: 5px; "><i class="fa fa-save"></i> Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Modal Litraje actualizar -->
            <div class="modal fade" id="modal-update">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Litraje inicial de la jornada</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('user_fuel_day.update', $fuel_day->id)}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        
                                        <input type="hidden" name="type" class="form-control" required value="initial">
                                        <input type="hidden" name="operation" class="form-control" required value="actualizar">
                                        
                                        <div class="form-group col-md-12">
                                            <label>Cantidad</label>
                                            <input type="number" name="litres" class="form-control" required value="" step= "0.01">
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
                 <!--Modal Litraje Final -->
            <div class="modal fade" id="modal-default2">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Litraje final de la jornada</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('user_fuel_day.update', $fuel_day->id)}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        
                                        <input type="hidden" name="type" class="form-control" required value="final">
                                        <input type="hidden" name="operation" class="form-control" required value="registrar">
                                        
                                        <div class="form-group col-md-12">
                                            <label>Cantidad</label>
                                            <input type="number" name="litres" class="form-control" required value="" step= "0.01">
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
                <!--Modal Litraje final actualizar -->
            <div class="modal fade" id="modal-update2">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Litraje final de la jornada</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('user_fuel_day.update', $fuel_day->id)}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        
                                        <input type="hidden" name="type" class="form-control" required value="final">
                                        <input type="hidden" name="operation" class="form-control" required value="actualizar">
                                        
                                        <div class="form-group col-md-12">
                                            <label>Cantidad</label>
                                            <input type="number" name="litres" class="form-control" required value="" step= "0.01">
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
                <!--Agregar vehiculos de Uso Oficial -->
                <div class="modal fade" id="modal-admin_vehicle">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Agregar vehiculo</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('user_fuel_day.vehicles', $fuel_day->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        
                                        <div class="form-group col-md-12">
                                            <label>Cédula o indicador</label>
                                            <input type="text" required name="user_id" class="form-control">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Tipo</label>
                                            <select name="type" class="form-control" required value="" style="width:100%">
                                                @foreach($vehicles as $vehicle)
                                                    <option value="{{encrypt($vehicle->id)}}">{{$vehicle->brand}} - {{$vehicle->model}} - {{$vehicle->plate}}</option>
                                                @endforeach
                                            </select>
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
                @php
                $i = 0;
                            
                @endphp
                @php
                    $hoy = date('Y-m-d');

                @endphp

                @if($fuel_day->day >= $hoy)
                
                @if($fuel_day->manage_level == "Nueva")
                    
                    <button type="button" class="btn btn-primary btn-flat opciones" style="position: absolute; left: 130px; z-index: 1; border-radius:5px; " data-toggle="modal" data-target="#modal-agg">
                        <i class="fa fa-btn fa-sign-in"></i> Agregar
                    </button>
                
                @endif
                
                
                
                @else

                    <div class="alert alert-info">
                        <h4>Información!!!</h4>
                        El registro de usuarios en la jornada no se encuentra disponible debido a que el día de la jornada ya pasó
                    </div>

                @endif
                @if ($fuel_day->manage_level == 'Finalizada' && !empty($final_litre))
                    <a href="{{route('reports.show', encrypt($fuel_day->id)) }}">
                    <button type="submit" class="btn btn-primary btn-flat opciones" style="margin-bottom: 15px; position: relative; z-index: 1; border-radius: 5px;">
                        <i class="fa fa-btn fa-sign-in"></i> Generar PDF
                        </button> 
                    </a>
                    
                @endif 
           
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center col-md-1">N°</th>
                        <th class="text-center col-md-2">Nombre</th>
                        <th class="text-center col-md-1">Cédula</th>
                        <th class="text-center col-md-1">Indicador</th>
                        <th class="text-center col-md-1">Litraje propuesto</th>
                        <th class="text-center col-md-1">Litraje surtido</th>
                        <th class="text-center col-md-1">Propuesto por</th>
                        @if($fuel_day->manage_level == "Nueva")
                        <th class="text-center col-md-1">Opciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($fuel_day->fuel_days as $user_day)
                        @php
                        $i++;
                        
                        @endphp
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="bold text-center">{{$user_day->user->name}}</td>
                            <td class="text-center">{{$user_day->user->ci}}</td>
                            <td class="text-center">{{$user_day->user->indicator}}</td>
                            <td class="bold text-center">{{$user_day->proposed_litre}}</td>
                            <td class="bold text-center">{{$user_day->assorted_litre}}</td>
                            <td class="bold text-center">{{$user_day->permit->user->name}}</td>
                            @if($fuel_day->manage_level == "Nueva")
                            <td class="text-center t-opciones"> <a href="{{route('user_fuel_day.destroy', encrypt($user_day->id))}}" class="eliminar" data-toggle="tooltip" data-placement="bottom" data-original-title="eliminar usuario"><i class="fa fa-trash"></i></a></td>
                            @endif
                        
                        </tr>
                    @endforeach
                    @if($i>0)
                        <a href="{{route('user_fuel_day.manage', encrypt($fuel_day->id))}}">
                        <button type="button" class="btn btn-primary btn-flat opciones" style="position: absolute; left: 230px; z-index: 1; border-radius: 5px;">
                            <i class="fa fa-btn fa-sign-in"></i> Gestionar Jornada
                        </button>
                        </a>
                    @endif

                <!--Agregar vehiculos de Uso Oficial (Coordinador y Administrador)-->
                    <button type="button" class="btn btn-primary btn-flat opciones" style="position: absolute; left: 400px; z-index: 1; border-radius:5px; " data-toggle="modal" data-target="#modal-admin_vehicle">
                        <i class="fa fa-btn fa-sign-in"></i> Agregar vehiculos de uso oficial
                    </button>

                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" class="opciones">
                            <center>
                                @if($fuel_day->manage_level == "Nueva")
                                    <i class="fa fa-trash"></i>&nbsp;Eliminar&nbsp;
                                @endif
                                
                            </center>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section('css')
    <link href="{!! asset('plugins/datatables/jquery.dataTables.min.css'); !!}" rel="stylesheet">
    <link href="{!! asset('plugins/datatables/dataTables.bootstrap.min.css'); !!}" rel="stylesheet">
@endsection
@section('js')
    <script src="{!! asset('plugins/datatables/jquery.dataTables.min.js'); !!}"></script>
    <script src="{!! asset('plugins/datatables/dataTables.bootstrap.min.js'); !!}"></script>
    <script>
        $(document).ready(function(){
            $( "ul.sidebar-menu li.inicio" ).addClass('active');

            var errors = "{{$errors->any()}}"; if(errors){ $("div.modal").modal(); }

            $('table').dataTable({
                "language": 
                { 
                "lengthMenu": '<div style="margin-left:0px;" class="opciones"><b>Ver</b> <select class="form-control">'+
                '<option value="10">10</option>'+
                '<option value="20">20</option>'+
                '<option value="50">50</option>'+
                '<option value="-1">Todos</option>'+
                '</select></div>',
                },
                "columnDefs": [ { targets: 4, sortable: false }],
            });

        });
    </script>
@endsection