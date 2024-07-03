@extends('layouts.app')
@section('titulo', 'Permisos')
@section('subtitulo', '')
@section('contenido')
<div class="row">
        <div class="col-md-12">
            
            <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default" style="margin-bottom: -50px; position: relative; z-index: 1; border-radius: 5px;">
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
                            <form class="form-horizontal" action="{{ route('permissions.store') }}" method="POST">
                                {{ csrf_field() }}
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
                                                <option value="administrador">Administrador</option>
                                                <option value="coordinador">Coordinador</option>
                                                <option value="lider">Líder</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" style="border-radius: 5px;">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-flat" style="border-radius: 5px;><i class="fa fa-save"></i> Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center col-md-2">N°</th>
                            <th class="text-center col-md-2">Cédula</th>
                            <th class="text-center col-md-2">Usuario</th>
                            <th class="text-center col-md-2">Tipo</th>
                            <th class="text-center col-md-2">Estado</th>
                            <th class="text-center col-md-2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($permit as $permissions)
                            @php
                                $i++;
                            @endphp
                            <tr @if ($permissions->status == 0) class="danger" @endif>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-center">{{$permissions->user->ci}}</td>
                                <td class="text-center">{{$permissions->user->name}}</td>
                                <td class="text-center">{{$permissions->type}}</td>
                            
                                <td class="text-center">{!!status($permissions->status)!!}</td>
                                <td class="text-center t-opciones"  data-valor='{"id":"{{encrypt($permissions->id)}}", "name":"{{$permissions->user->name}}"}'>
                                    @if ($permissions->status == 1)
                                        <a href="#" class="deshabilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Deshabillitar usuario"><i class="fa fa-ban"></i></a>
                                    @else
                                        <a href="#" class="habilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Habilitar usuario"><i class="fa fa-check-circle-o"></i></a>
                                    @endif
                                    <a href="{{route('permissions.edit', encrypt($permissions->id))}}" class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Editar usuario"><i class="fa fa-pencil"></i></a>
                                    @if( $permissions->destroy_validate())
                                        <a href="#" class="eliminar" data-toggle="tooltip" data-placement="bottom" data-original-title="Eliminar usuario"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="opciones">
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
            $( "ul.sidebar-menu li.permissions" ).addClass('active');

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
                    text: "¿Desea eliminar al usuario de <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!! url("/") !!}/permissions/'+id+'/destroy';
                        $(location).attr('href', url);
                    }
                });
            }); 

            $("table.table").on('click', 'a.habilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea habilitar al usuario <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/permissions/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });

            $("table.table").on('click', 'a.deshabilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea deshabilitar al usuario <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/permissions/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });
        });
    </script>
@endsection