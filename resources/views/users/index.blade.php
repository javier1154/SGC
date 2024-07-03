@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('subtitulo', '')
@section('contenido')
<div class="row">
        <div class="col-md-12">
            <a href="{!! route('users.create') !!}">
            <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default" style="margin-bottom: -50px; position: relative; z-index: 1; border-radius:5px;">
                <i class="fa fa-btn fa-sign-in"></i> Registrar 
            </button>
            </a>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center col-md-1">N°</th>
                            <th class="text-center col-md-2">Nombre</th>
                            <th class="text-center col-md-1">Cédula</th>
                            <th class="text-center col-md-1">Email</th>
                            <th class="text-center col-md-1">Teléfono</th>
                            <th class="text-center col-md-1">Gerencia</th>
                            <th class="text-center col-md-1">Estado</th>
                            <th class="text-center col-md-1">Indicador</th>
                            <th class="text-center col-md-1">Extensión</th>
                            <th class="text-center col-md-1">Fecha de Creación</th>
                            <th class="text-center col-md-1">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($users as $user)
                            @php
                                $i++;
                            @endphp
                            <tr @if ($user->status == 0) class="danger" @endif>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-center bold">{{$user->name}}</td>
                                <td class="text-center">{{$user->ci}}</td>
                                <td class="text-center">{{$user->email}}</td>
                                <td class="text-center">{{$user->phone}}</td>
                                <td class="text-center">{{$user->management->name}}</td>
                                <td class="text-center">{!!status($user->status)!!}</td>
                                <td class="text-center">{{$user->indicator}}</td>
                                <td class="text-center">{{$user->extension}}</td>
                                <td class="text-center">{!! fecha_hora($user->created_at) !!}</td>
                                <td class="text-center t-opciones"  data-valor='{"id":"{{encrypt($user->id)}}", "name":"{{$user->name}}"}'>
                                    @if ($user->status == 1)
                                        <a href="#" class="deshabilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Deshabillitar usuario"><i class="fa fa-ban"></i></a>
                                    @else
                                        <a href="#" class="habilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Habilitar usuario"><i class="fa fa-check-circle-o"></i></a>
                                    @endif
                                    <a href="{{route('users.show', encrypt($user->id))}}" class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Detalles"><i class="fa fa-cogs"></i></a>
                                    <a href="{{route('users.edit', encrypt($user->id))}}" class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Editar usuario"><i class="fa fa-pencil"></i></a>
                                    @if( $user->destroy_validate())
                                        <a href="#" class="eliminar" data-toggle="tooltip" data-placement="bottom" data-original-title="Eliminar usuario"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="11" class="opciones">
                                <center>
                                    <i class="fa fa-cogs"></i>&nbsp;Detalles&nbsp;
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
            $( "ul.sidebar-menu li.users" ).addClass('active');

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
                        url = '{!! url("/") !!}/users/'+id+'/destroy';
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
                        url = '{!!url("/")!!}/users/'+id+'/status';
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
                        url = '{!!url("/")!!}/users/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });
        });
    </script>
@endsection