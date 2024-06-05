@extends('layouts.app')
@section('titulo', 'Jornadas')
@section('subtitulo', '')
@section('contenido')
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
                                <h4 class="modal-title"><b>Registrar Jornada</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('fuel_day.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Fecha</label>
                                            <input type="date" name="day" class="form-control" required value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tipo</label>
                                            <select name="type" class="form-control" required value="" style="width:100%">
                                                <option value="Normal">Normal</option>
                                                <option value="Especial">Especial</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Combustible</label>
                                            <select name="fuel_id" class="form-control" required value="" style="width:100%">
                                                @foreach($fuels as $fuel)
                                                    <option value="{{encrypt($fuel->id)}}">{{$fuel->name }}</option>
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

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center col-md-1">Fecha</th>
                        <th class="text-center col-md-2">Tipo</th>
                        <th class="text-center col-md-2">Estado</th>
                        <th class="text-center col-md-2">Tipo de combustible</th>
                        <th class="text-center col-md-2">Usuario</th>
                        <th class="text-center col-md-2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($fuel_days as $fuel_day)
                        @php
                            $i++;
                        @endphp
                        <tr  @if ($fuel_day->status == 0) class="danger" @endif>
                            <td class="text-center">{{$i}}</td>
                            <td class="text-center bold">{!!fecha($fuel_day->day)!!}</td>
                            <td class="text-center">{{$fuel_day->type}}</td>
                            <td class="text-center">{!! status($fuel_day->status) !!}</td>
                            <td class="text-center">{{$fuel_day->fuel->name}}</td>
                            <td class="text-center">{{$fuel_day->permit->user->name}}</td>
                            
                            
                            
                            <td class="text-center t-opciones"  data-valor='{"id":"{{encrypt($fuel_day->id)}}", "name":"{{fecha_js($fuel_day->day)}}"}'>
								<a href="{{route('fuel_day.edit', encrypt($fuel_day->id))}}" class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Editar jornada"><i class="fa fa-pencil"></i></a>
                                @if ($fuel_day->status == 1)
									<a href="#" class="deshabilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Deshabillitar jornada"><i class="fa fa-ban"></i></a>
								@else
									<a href="#" class="habilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Habilitar jornada"><i class="fa fa-check-circle-o"></i></a>
								@endif
								@if( $fuel_day->destroy_validate())
									<a href="#" class="eliminar" data-toggle="tooltip" data-placement="bottom" data-original-title="Eliminar jornada"><i class="fa fa-trash"></i></a>
								@endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
					<tr>
						<td colspan="7" class="opciones">
							<center>
								<i class="fa fa-check-circle-o"></i>&nbsp;Habilitar&nbsp;
								<i class="fa fa-ban"></i>&nbsp;Deshabilitar&nbsp;
								<i class="fa fa-trash"></i>&nbsp;Eliminar&nbsp;
                                <i class="fa fa-pencil"></i>&nbsp;Editar&nbsp;
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
            $( "ul.sidebar-menu li.fuel_days" ).addClass('active');

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
                    text: "¿Desea eliminar la jornada de <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!! url("/") !!}/fuel_day/'+id+'/destroy';
                        $(location).attr('href', url);
                    }
                });
            }); 

            $("table.table").on('click', 'a.habilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea habilitar la jornada <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/fuel_day/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });

            $("table.table").on('click', 'a.deshabilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea deshabilitar la jornada <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/fuel_day/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });
        });
    </script>
@endsection