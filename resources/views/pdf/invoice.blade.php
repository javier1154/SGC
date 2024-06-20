@extends('layouts.app')
@section('titulo', 'Detalles de la jornada')
@section('subtitulo', '')
@section('contenido')
<br>    

        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">N°</th>
                        <th class="text-center col-md-1">Gerencia</th>
                        <th class="text-center col-md-1">Usuario</th>
                        <th class="text-center col-md-1">C.I</th>
                        <th class="text-center col-md-1">Marca</th>
                       
                        <th class="text-center col-md-1">Modelo</th>
                        
                        <th class="text-center col-md-1">Color</th>
                        
                        <th class= "text-center col-md-1">Placa</th>
                        <th class= "text-center col-md-1">Litros surtidos</th>
                        <th class="text-center col-md-1">Firma</th>
                        <th class="text-center col-md-1">Gerente</th>
               
                        <th class="text-center col-md-1">Observaciones</th>
                    
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                    
                        $i = 0;
                    @endphp

                    foreach

                    @foreach($user_days->fuel_days as $user_day)
                        @php
                          $i++;
                        @endphp
                        <tr>
                            <td class="text-center">{{$i}}</td>
                            <td class="bold text-center">{{$user_day->user->name}}</td>
                            <td class="text-center">{{$user_day->user->ci}}</td>
                            <td class="text-center">{{$user_day->user->indicator}}</td>
                            <td class="text-center">{{$user_day->user->management->name}}</td>
                            <td class="bold text-center">{{$user_day->assorted_litre}}</td>
                            <td class="text-center">{{$user_day->last_day()}}</td>
                            <td class=" bold text-center">No ha surtido</td>
                            <td class=" bold text-center">{{diff_fecha($user_day->last_day())}}</td>
                            <td class="bold text-center">{{$user_day->estado}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>

                        <td colspan="8">
                          
                        </td>
                        
                    </tr>
                    
				</tfoot>
            </table>
          
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

           
            $("table.table").on('click', 'a.habilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea aprobar al usuario <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/user_fuel_day/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });

            $("table.table").on('click', 'a.deshabilitar', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea denegar al usuario <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/user_fuel_day/'+id+'/status';
                        $(location).attr('href', url);
                    }
                });
            });
            $("table.table").on('click', 'a.asistio', function() {
                var id = $(this).parents('td').data('valor').id;
                var name = $(this).parents('td').data('valor').name;
                swal({
                    title: "Aviso!",
                    text: "¿Desea confirmar la asistencia del usuario <b>"+name+"</b>?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false
                },function(isConfirm){
                    if (isConfirm){
                        url = '{!!url("/")!!}/fuel_day_manage/'+id;
                        $(location).attr('href', url);
                    }
                });
            });

        });
    </script>
@endsection
