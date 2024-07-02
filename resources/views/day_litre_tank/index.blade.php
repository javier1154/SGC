@extends('layouts.app')
@section('titulo', 'Historial de litraje')
@section('subtitulo', '')
@section('contenido')
<br>
    <div class="row">
        <div class="col-md-12">

     <!-- <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default" style="margin-bottom: -50px; position: relative; z-index: 1; border-radius: 5px;">
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
                                        <div class="form-group col-md-12">
                                            <label>Código</label>
                                            <input type="text" name="code" class="form-control" required value="{{old('code')}}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Cuota</label>
                                            <input type="number" name="cuota" class="form-control" required value="" min = 1>
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
            -->
            

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center col-md-4">Tipo</th>
                        <th class="text-center col-md-2">Litros</th>
                        <th class="text-center col-md-2">Jornada</th>
                        <th class="text-center col-md-2">Tanque</th>
                        <th class="text-center col-md-2">Fecha de creación</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($day_litre_tank as $litre_tank)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="text-center bold">{{to_spanish($litre_tank->day_litre->type)}}</td>
                            <td class="text-center bold">{{$litre_tank->day_litre->litres}}</td>
                            <td class="text-center">{!!fecha($litre_tank->day_litre->fuel_day->day)!!}</td>
                            <td class="text-center">{{ $litre_tank->tank->name }}</td>
                            <td class="text-center">{!! fecha($litre_tank->created_at) !!}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
					<tr>
						<td colspan="6" class="opciones">
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
            $( "ul.sidebar-menu li.litre_tank" ).addClass('active');

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