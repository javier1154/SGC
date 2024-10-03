@extends('layouts.app')
@section('titulo', 'Vehículos')
@section('subtitulo', '')
@section('contenido')
<br>
<div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center col-md-1">Usuario</th>
                        <th class="text-center col-md-1">Placa</th>
                        <th class="text-center col-md-1">Marca</th>
                        <th class="text-center col-md-1">Modelo</th>
                        <th class="text-center col-md-1">Año</th>
                        <th class="text-center col-md-1">Color</th>
                        <th class="text-center col-md-1">Litraje</th>
                        <th class="text-center col-md-1">Oberservaciones</th>
                        <th class="text-center col-md-1">Estado</th>
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
                            <td class="text-center">{{$vehicle->user_vehicles->user->name}}</td>
                            <td class="bold">{{$vehicle->plate}}</td>
                            <td class="text-center">{{$vehicle->brand}}</td>
                            <td class="text-center">{{$vehicle->model}}</td>
                            <td class="text-center">{{$vehicle->year}}</td>
                            <td class="text-center">{{$vehicle->color}}</td>
                            <td class="text-center">{{$vehicle->liter}}</td>
                            <td class="text-center">{{$vehicle->observations}}</td>
                            <td class="text-center">{!!status_new($vehicle->new, $vehicle->status)!!}</td>
                            <td class="text-center">{!! fecha_hora($vehicle->created_at) !!}</td>
                            <td class="text-center t-opciones"  data-valor='{"id":"{{encrypt($vehicle->id)}}", "name":"{{$vehicle->plate}}"}'>
                            
                            <a href="#" class="habilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Aprobar vehículo"><i class="fa fa-check-circle-o"></i></a>
                            <a href="#" class="deshabilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Denegar vehiculo"><i class="fa fa-ban"></i></a>
                                
                                
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="12" class="opciones">
                            <center>
                                <i class="fa fa-check-circle-o"></i>&nbsp;Aprobar&nbsp;
                                <i class="fa fa-ban"></i>&nbsp;Denegar&nbsp;
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
            $( "ul.sidebar-menu li.new_vehicles" ).addClass('active');

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

            $( "<div class='table-responsive'>" ).insertBefore( "table" );
                $('table').appendTo('.table-responsive');

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
                        url = '{!!url("/")!!}/vehicles/'+id+'/status/1';
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
                        url = '{!!url("/")!!}/vehicles/'+id+'/status/0';
                        $(location).attr('href', url);
                    }
                });
            });
        });
    </script>
@endsection