@extends('layouts.app')
@section('titulo', 'Detalles')
@section('subtitulo', 'Ver')
@section('contenido')
<br>
<div class="row">

    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Editar Usuario</b></h4>
                </div>
                <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        @include('layouts.validacion')
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control" required value="{{$user->name}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>CI</label>
                                <input type="text" name="ci" class="form-control" required value="{{$user->ci}}" >
                            </div>
                            <div class="form-group col-md-12">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" required value="{{$user->email}}" >
                            </div>
                            <div class="form-group col-md-12">
                                <label>Teléfono</label>
                                <input type="text" name="phone" class="form-control" required value="{{$user->phone}}" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Gerencia</label>
                                <select name="management_id" class="form-control" required value="" style="width:100%">
                                    @foreach($managements as $management)
                                        <option @if($management->id == $user->management_id) selected @endif value="{{$management->id}}">{{$management->name }}</option>
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
    <div class="modal fade" id="modal-register">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Agregar Vehículo</b></h4>
                </div>
                <form class="form-horizontal" action="{{ route('vehicles.store') }}" method="POST">
                    {{ csrf_field() }}
                
                        <div class="modal-body">
                            @include('layouts.validacion')
                            <div class="row">
                            <div class="form-group col-md-12">
                                <label>Placa</label>
                                <input type="text" name="plate" class="form-control" required value="" >
                            </div>
                            <div class="form-group col-md-12">
                                <label>Marca</label>
                                <input type="text" name="brand" class="form-control" required value="" >
                            </div>
                            <div class="form-group col-md-12">
                                <label>Modelo</label>
                                <input type="text" name="model" class="form-control" required value="" >
                            </div>

                            <div class="form-group col-md-12">
                                <label>Año</label>
                                <input type="number" name="year" class="form-control" required value="" min= "0">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Color</label>
                                <input type="text" name="color" class="form-control" required value="" >
                            </div>
                            <div class="form-group col-md-12">
                                <label>Observaciones</label>
                                <input type="text" name="observations" class="form-control" required value="" >
                            </div>
                            <div class="form-group col-md-12">
                                <label>Litraje</label>
                                <input type="number" step= "0.01" name="liter" class="form-control" required value="" >
                            </div>
                            <div class="form-group col-md-12">
                                <input type="hidden" name="user_id" value ="{{encrypt($user->id)}}">
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

    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Datos del Usuario 
                <button type="button" class="btn btn-default btn-flat pull-right" style="margin-top: -6px; margin-right: -13px;" data-toggle="modal" data-target="#modal-edit"  ><i class="fa fa-pencil"></i> Editar</button>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <label>Nombre</label>
                        <p>{{$user->name}}</p>
                    </div>
                    <div class="col-md-4">
                        <label>Cédula</label>
                        <p>{{$user->ci}}</p>
                    </div>
                    <div class="col-md-4">
                        <label>Email</label>
                        <p>{{$user->email}}</p>
                    </div>

                    <div class="col-md-4">
                        <label>Teléfono</label>
                        <p>{{$user->phone}}</p>
                    </div>
                    <div class="col-md-4">
                        <label>Estado</label>
                        <p>{!!status($user->status)!!}</p>
                    </div>
                    <div class=" col-md-4">
                        <label>Gerencia</label>
                        <p>{{$user->management->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">

    <div class="panel panel-primary">
        <div class="panel-heading">Datos del Vehiculo 
                <button type="button" class="btn btn-default btn-flat pull-right" style="margin-top: -6px; margin-right: -13px;" data-toggle="modal" data-target="#modal-register"  ><i class="fa fa-sign-in"></i> Registrar</button>
            </div>
            <div class="panel-body" style="max-height: 500px; overflow-y:auto;">
                @php
                    $i = 0;
                @endphp
                @foreach ($vehicles as $vehicle)
                    @php
                        $i++;
                    @endphp
                   <div class="row" @if($i > 1) style="border-top: 1px solid #ddd; padding-top: 6px;" @endif >
                        <div class="col-sm-6">
                            <label>Placa</label>
                            <p>{{$vehicle->plate}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Marca</label>
                            <p>{{$vehicle->brand}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Modelo</label>
                            <p>{{$vehicle->model}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Color</label>
                            <p>{{$vehicle->color}}</p>
                        </div>

                        <div class="col-sm-6">
                            <label>Año</label>
                            <p>{{$vehicle->year}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Estado</label>
                            <p>{!!status_new($vehicle->new, $vehicle->status)!!}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Litraje</label>
                            <p>{{$vehicle->liter}}</p>
                        </div>
                        <div class = "col-sm-6" data-id="{{encrypt($vehicle->id)}}" data-plate="{{$vehicle->plate}}">
                            @if ($vehicle->status == 1)
                                <a href="#" class="deshabilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Deshabillitar usuario"><i class="fa fa-ban"></i></a>
                            @else
                                <a href="#" class="habilitar" style="border-radius: 20px" data-toggle="tooltip" data-placement="bottom" data-original-title="Habilitar usuario"><i class="fa fa-check-circle-o"></i></a>
                            @endif
                            @if( $vehicle->destroy_validate())
                                <a href="#" class="eliminar" data-toggle="tooltip" data-placement="bottom" data-original-title="Eliminar vehículo"><i class="fa fa-trash"></i></a>
                            @endif
                            <a href="{{route('vehicles.edit', encrypt($vehicle->id))}}" class="" data-toggle="tooltip" data-placement="bottom" data-original-title="Editar vehículo"><i class="fa fa-pencil"></i></a>
                        </div>
                        <div class= "">
                            
                        </div>
                        @if(strlen($vehicle->observations))
                            <div class="col-sm-12">
                                <label>Observación</label>
                                <p>{{$vehicle->observations}}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
                @if($i == 0) <div class="row "><div class="col-md-12"><p>No hay vehículos registrados</p></div></div> @endif
            </div>
        </div>
    </div>
</div>

@endsection
@section('css')
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

            $(".panel.panel-primary").on('click', 'a.eliminar', function() {
                var id = $(this).parents('div').data('id');
                var plate = $(this).parents('div').data('plate');
                swal({
                    title: "Aviso!",
                    text: "¿Desea eliminar el vehículo de <b>"+plate+"</b>?",
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

            $(".panel.panel-primary").on('click', 'a.habilitar', function() {
                var id = $(this).parents('div').data('id');
                var plate = $(this).parents('div').data('plate');
                swal({
                    title: "Aviso!",
                    text: "¿Desea habilitar el vehìculo <b>"+plate+"</b>?",
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

            $(".panel.panel-primary").on('click', 'a.deshabilitar', function() {
                var id = $(this).parents('div').data('id');
                var plate = $(this).parents('div').data('plate');
                swal({
                    title: "Aviso!",
                    text: "¿Desea deshabilitar el vehìculo <b>"+plate+"</b>?",
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