@extends('layouts.app')
@section('titulo', 'Detalles de la jornada')
@section('subtitulo', '')
@section('contenido')
<br>        

            <form action="{{ route('user_fuel_day.autorizeUser', encrypt($fuel_day->id)) }}" method="POST">
                {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center col-md-1">N°</th>
                        <th class="text-center col-md-1">Nombre</th>
                        <th class="text-center col-md-1">Cédula</th>
                        <th class="text-center col-md-1">Indicador</th>
                        <th class="text-center col-md-1">Gerencia</th>
                        @if ($fuel_day->manage_level == 'Nueva')
                        <th class="text-center col-md-1">Litraje propuesto</th>
                        @endif
                        @if ($fuel_day->manage_level == 'Autorizada' || $fuel_day->manage_level == 'Finalizada' )
                        <th class="text-center col-md-1">Litraje surtido</th>
                        @endif
                        <th class= "text-center col-md-1">Fecha de último surtido</th>
                        <th class= "text-center col-md-1">Dias desde último surtido</th>
                        <th class="text-center col-md-1">Estado</th>
                        <th class="text-center col-md-1">Encargado</th>
                        @if ($fuel_day->manage_level == 'Nueva')
                        <th class="text-center col-md-1">Opciones</th>
                        @endif
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @php
                        $i = 0;
                        
                    @endphp

                    @foreach ($fuel_day->fuel_days as $user_day)
                        @php
                          $i++;
                          $autorizo = $user_day->user_day_permit->last();
                        @endphp
                        <tr>
                            @if($user_day->estado != 'Cancelado')
                                <td class="text-center">{{$i}}</td>
                                <td class="bold text-center">{{$user_day->user->name}}</td>
                                <td class="text-center">{{$user_day->user->ci}}</td>
                                <td class="text-center">{{$user_day->user->indicator}}</td>
                                <td class="text-center">{{$user_day->user->management->name}}</td>
                                @if ($fuel_day->manage_level == 'Nueva')
                                <td class="bold text-center"><input type="hidden" name= "ids[]" value = "{{encrypt($user_day->id)}}"><input class= "form-control" name=proposed_litre[] type="number" min = 0 required value= "{{$user_day->proposed_litre}}"></td>
                                @endif
                                @if ($fuel_day->manage_level == 'Autorizada' && $user_day->estado == 'Autorizado')
                                <td class="bold text-center"><input type="hidden" name= "ids[]" value = "{{encrypt($user_day->id)}}"><input class= "form-control" name=assorted_litre[] type="number" min = 0 required value= "{{$user_day->assorted_litre}}"></td>
                                @endif
                                @if ($fuel_day->manage_level == 'Finalizada')
                                <td class="bold text-center">{{$user_day->assorted_litre}}</td>
                                @endif
                                @if($user_day->last_day() != null)
                                <td class="text-center">{{$user_day->last_day()}}</td>
                                @else
                                <td class=" bold text-center">No ha surtido</td>
                                @endif
                                <td class=" bold text-center">{{diff_fecha($user_day->last_day())}}</td>
                                <td class="bold text-center">{{$user_day->estado}}</td>
                                <td class="text-center">{{$autorizo->permit->user->name}}</td>
                                @if ($fuel_day->manage_level == 'Autorizada' || $fuel_day->manage_level == 'Nueva' )
                                <td class="text-center t-opciones" data-valor='{"id":"{{encrypt($user_day->id)}}", "name":"{{$user_day->user->name}}"}'> 
                                @endif  
                                @if($user_day->estado == "Propuesto")
                                    <a href="#" class="deshabilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Cancelar usuario"><i class="fa fa-ban"></i></a>
                                @endif  

                            
                           @endif
                              
						</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>

                        <td colspan="@if($fuel_day->manage_level == 'Nueva') 8 @else 7 @endif">
                            @if ($fuel_day->manage_level == 'Nueva')
                                <button type="submit" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default" style="margin-left: 950px;margin-bottom: -100px; position: relative; z-index: 1;">
                                <i class="fa fa-btn fa-sign-in"></i> Autorizar Usuarios
                                </button>
                            @endif
                            @if ($fuel_day->manage_level == 'Autorizada')
                                <button type="submit" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default" style="margin-left: 950px;margin-bottom: -100px; position: relative; z-index: 1;">
                                <i class="fa fa-btn fa-sign-in"></i> Confirmar Asistencia
                                </button>
                            @endif
                        </td>
                        
                    </tr>
                    
				</tfoot>
            </table>
            </form>
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
