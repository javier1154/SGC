@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('subtitulo', 'Crear')
@section('contenido')
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" style="border-radius: 5px;">
            <div class="panel-heading">Registrar Usuario</div>
            <form class="form-horizontal" action="{{ route('users.store') }}" method="POST">
                {{ csrf_field() }}
                @include('layouts.validacion')
                <div class="panel-body">
                    
                    
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control" required value="{{ old('name') }}" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Cédula</label>
                                <input type="text" name="ci" class="form-control" required value="{{ old('ci') }}" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Correo Eletrónico</label>
                                <input type="text" name="email" class="form-control" required value="{{ old('email') }}" >
                            </div>

                            <div class="form-group col-md-4">
                                <label>Teléfono</label>
                                <input type="text" name="phone" class="form-control" required value="{{ old('phone') }}" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Contraseña</label>
                                <input type="text" name="password" class="form-control" required value="" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Gerencia</label>
                                <select name="management_id" class="form-control" required value="" style="width:100%">
                                    @foreach($managements as $management)
                                        <option value="{{$management->id}}">{{$management->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Indicador</label>
                                <input type="text" name="indicator" class="form-control" value="{{ old('indicator') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Extensión</label>
                                <input type="text" name="extension" class="form-control" value="{{ old('extension') }}">
                            </div>
                        </div>

                        
                    
                    
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{!! route('users.index') !!}">
                            <button type="button" class="btn btn-default btn-flat" style="border-radius: 5px;">Cancelar</button>   
                            </a>
                            <button type="submit" class="btn btn-primary btn-flat" style="border-radius: 5px;"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
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
