@extends('layouts.app')
@section('titulo', 'Gerencias')
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
                                <h4 class="modal-title"><b>Registrar Gerencia</b></h4>
                            </div>
                            <form class="form-horizontal" action="{{ route('managements.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    @include('layouts.validacion')
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Nombre</label>
                                            <input type="text" name="name" class="form-control" required value="{{old('name')}}">
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
                        <th class="col-md-8">Nombre</th>
                        <th class="text-center col-md-1">Estado</th>
                        <th class="text-center col-md-2">Fecha de Creación</th>
                        <th class="text-center col-md-1">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($managements as $management)
                        @php
                            $i++;
                        @endphp
                        <tr  @if ($management->status == 0) class="danger" @endif>
                            <td class="text-center">{{$i}}</td>
                            <td class="bold">{{$management->name}}</td>
                            <td class="text-center">{!! status($management->status) !!}</td>
                            <td class="text-center">{!! fecha_hora($management->created_at) !!}</td>
                            <td class="text-center t-opciones"  data-valor='{"id":"{{encrypt($management->id)}}", "name":"{{$management->name}}"}'>
								<a href="{{route('managements.edit', encrypt($management->id))}}" class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Editar gerencia"><i class="fa fa-pencil"></i></a>
                                @if ($management->status == 1)
									<a href="#" class="deshabilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Deshabillitar gerencia"><i class="fa fa-ban"></i></a>
								@else
									<a href="#" class="habilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Habilitar gerencia"><i class="fa fa-check-circle-o"></i></a>
								@endif
								@if( $management->destroy_validate())
									<a href="#" class="eliminar" data-toggle="tooltip" data-placement="bottom" data-original-title="Eliminar gerencia"><i class="fa fa-trash"></i></a>
								@endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
					<tr>
						<td colspan="5" class="opciones">
							<center>
								<i class="fa fa-check-circle-o"></i>&nbsp;Habilitar&nbsp;
								<i class="fa fa-ban"></i>&nbsp;Deshabilitar&nbsp;
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
            $( "ul.sidebar-menu li.managements" ).addClass('active');

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
                    text: "¿Desea eliminar la gerencia de <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!! url("/") !!}/managements/'+id+'/destroy';
                        $(location).attr('href', url);
                    }
                });
            }); 

            $("table.table").on('click', 'a.habilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea habilitar la gerencia <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/managements/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });

            $("table.table").on('click', 'a.deshabilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea deshabilitar la gerencia <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/managements/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });
        });
    </script>
@endsection