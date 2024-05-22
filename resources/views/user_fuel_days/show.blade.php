@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('subtitulo', '')
@section('contenido')
<br>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Información de la jornada</div>
        
                <div class="panel-body">
                    
                   <p>
                     Bienvenido a la jornada del <strong> {!! fecha($fuel_day->day)!!} </strong> en esta interfaz usted podrá agregar o eliminar usuarios para la jornada
                    
                   </p> 
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Datos de la jornada</div>
                <div class="panel-body">
                   <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Litraje inicial</div>
                            
                                <div class="panel-body">
                                    @php
                                        $initial_litre = $fuel_day->day_litres->where('type','initial')->where('status', 1)->first();
                                    @endphp
                        
                                    @if(empty($initial_litre))
                                        <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default">
                                            <i class="fa fa-btn fa-sign-in"></i> Registrar
                                        </button>
                                    @else
                                        <label>Litraje Inicial</label> {{$initial_litre}}
                                    @endif  
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default" style="margin-bottom: -50px; position: relative; z-index: 1;">
                <i class="fa fa-btn fa-sign-in"></i> Registrar
            </button>

            <div class="modal fade" id="modal-default">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Litraje inicial de la jornada</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('user_fuel_day.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Cantidad de Litros</label>
                                            <input type="text" name="initial-litre" class="form-control" required value="">
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
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center col-md-1">N°</th>
                        <th class="text-center col-md-2">Nombre</th>
                        <th class="text-center col-md-1">CI</th>
                        <th class="text-center col-md-1">Indicador</th>
                        <th class="text-center col-md-1">Jornada</th>
                        <th class="text-center col-md-1">Litraje propuesto</th>
                        <th class="text-center col-md-1">Litraje surtido</th>
                        <th class="text-center col-md-1">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                        $i = 0;
                        
                    @endphp

                    @foreach ($fuel_day->fuel_days as $user_day)
                        @php
                          $i++;
                        @endphp
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="bold text-center">{{$user_day->user->name}}</td>
                            <td class="text-center">{{$user_day->user->ci}}</td>
                            <td class="text-center">{{$user_day->user->indicator}}</td>
                            <td class="bold text-center">{{$user_day->fuel_day->day}}</td>
                            <td class="bold text-center">{{$user_day->proposed_litre}}</td>
                            <td class="bold text-center">{{$user_day->assorted_litre}}</td>
                        <td> <a href="{{route('user_fuel_day.destroy', encrypt($user_day->user->id))}}" class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Editar usuario"><i class="fa fa-pencil"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
					<tr>
						<td colspan="8" class="opciones">
							<center>
								<i class="fa fa-pencil"></i>&nbsp;Agregar&nbsp;
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
                "lengthMenu": '<div style="margin-left:120px;" class="opciones"><b>Ver</b> <select class="form-control">'+
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