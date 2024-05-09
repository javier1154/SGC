@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('subtitulo', 'Crear')
@section('contenido')
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Registrar Usuario</div>
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('vehicles.store') }}" method="POST">
                {{ csrf_field() }}
                    @include('layouts.validacion')
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Placa</label>
                            <input type="text" name="plate" class="form-control" required value="" >
                        </div>
                        <div class="form-group col-md-4">
                            <label>Marca</label>
                            <input type="text" name="brand" class="form-control" required value="" >
                        </div>
                        <div class="form-group col-md-4">
                            <label>Modelo</label>
                            <input type="text" name="model" class="form-control" required value="" >
                        </div>

                        <div class="form-group col-md-4">
                            <label>Año</label>
                            <input type="number" name="year" class="form-control" required value="" >
                        </div>
                        <div class="form-group col-md-4">
                            <label>Color</label>
                            <input type="text" name="color" class="form-control" required value="" >
                        </div>
                        <div class="form-group col-md-4">
                            <label>Observaciones</label>
                            <input type="text" name="observations" class="form-control" required value="" >
                        </div>
                        <div class="form-group col-md-4">
                            <label>Litraje</label>
                            <input type="number" name="liter" class="form-control" required value="" >
                        </div>
                        <div class="form-group col-md-4">
                            <label>Usuario</label>
                            <select name="user_id" class="form-control" required value="" style="width:100%">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Combustible</label>
                            <select name="fuel_id" class="form-control" required value="" style="width:100%">
                                @foreach($fuels as $fuel)
                                    <option value="{{$fuel->id}}">{{$fuel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{!! route('users.index') !!}">
                                <button type="button" class="btn btn-default btn-flat">Cancelar</button>   
                                </a>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
</div>

@endsection
@section('css')
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $( "ul.sidebar-menu li.users" ).addClass('active');
        });
    </script>
@endsection
