@extends('layouts.app')
@section('titulo', 'Vehículos')
@section('subtitulo', '')
@section('contenido')
<div class="row">
        <div class="col-md-12">
            <a href="{!! route('vehicles.create') !!}">
            <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default" style="margin-bottom: -50px; position: relative; z-index: 1;">
                <i class="fa fa-btn fa-sign-in"></i> Registrar
            </button>
            </a>

            
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center col-md-1">N°</th>
                        <th class="text-center col-md-1">Placa</th>
                        <th class="text-center col-md-1">Marca</th>
                        <th class="text-center col-md-1">Modelo</th>
                        <th class="text-center col-md-1">Año</th>
                        <th class="text-center col-md-1">Color</th>
                        <th class="text-center col-md-1">Litraje</th>
                        <th class="text-center col-md-1">Oberservaciones</th>
                        <th class="text-center col-md-1">Estado</th>
                        <th class="text-center col-md-1">Usuario</th>
                        <th class="text-center col-md-1">Fecha de Creación</th>
                        <th class="text-center col-md-1">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($vehicles as $vehicle)
                        @php
                            $i++;
                        @endphp
                        <tr @if ($vehicle->status == 0) class="danger" @endif>
                            <td class="text-center">{{$i}}</td>
                            <td class="bold">{{$vehicle->plate}}</td>
                            <td class="text-center">{{$vehicle->brand}}</td>
                            <td class="text-center">{{$vehicle->model}}</td>
                            <td class="text-center">{{$vehicle->year}}</td>
                            <td class="text-center">{{$vehicle->color}}</td>
                            <td class="text-center">{{$vehicle->liter}}</td>
                            <td class="text-center">{{$vehicle->observations}}</td>
                            <td class="text-center">{!!status($vehicle->status)!!}</td>
                            <td class="text-center">{{$vehicle->user->name}}</td>
                            <td class="text-center">{!! fecha_hora($vehicle->created_at) !!}</td>
                            <td class="text-center t-opciones"  data-valor='{"id":"{{encrypt($vehicle->id)}}", "name":"{{$vehicle->plate}}"}'>
                                @if ($vehicle->status == 1)
									<a href="#" class="deshabilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Deshabillitar vehiculo"><i class="fa fa-ban"></i></a>
								@else
									<a href="#" class="habilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Habilitar vehículo"><i class="fa fa-check-circle-o"></i></a>
								@endif
                                <a href="{{route('vehicles.edit', encrypt($vehicle->id))}}" class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Editar vehículo"><i class="fa fa-pencil"></i></a>
                                @if( $vehicle->destroy_validate())
								    <a href="#" class="eliminar" data-toggle="tooltip" data-placement="bottom" data-original-title="Eliminar vehículo"><i class="fa fa-trash"></i></a>
								@endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
					<tr>
						<td colspan="12" class="opciones">
							<center>
                                <i class="fa fa-check-circle-o"></i>&nbsp;Habilitar&nbsp;
                                <i class="fa fa-ban"></i>&nbsp;Deshabilitar&nbsp;
								<i class="fa fa-pencil"></i>&nbsp;Editar&nbsp;
								<i class="fa fa-trash"></i>&nbsp;Eliminar&nbsp;
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
            $( "ul.sidebar-menu li.vehicles" ).addClass('active');

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

            $("table.table").on('click', 'a.eliminar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea eliminar al vehículo de <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!! url("/") !!}/vehicles/'+id+'/destroy';
                        $(location).attr('href', url);
                    }
                });
            }); 

            $("table.table").on('click', 'a.habilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea habilitar al vehículo <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/vehicles/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });

            $("table.table").on('click', 'a.deshabilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea deshabilitar al vehículo <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/vehicles/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });
        });
    </script>
@endsection