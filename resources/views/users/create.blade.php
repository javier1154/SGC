@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('subtitulo', 'Crear')
@section('contenido')

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('users.store') }}" method="POST">
            {{ csrf_field() }}
            <div>
                @include('layouts.validacion')
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control" required value="" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>CI</label>
                        <input type="text" name="ci" class="form-control" required value="" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" required value="" >
                    </div>
                    
                </div>
                
                <div class="row">
                    
                    <div class="form-group col-md-4">
                        <label>Teléfono</label>
                        <input type="text" name="phone" class="form-control" required value="" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Contraseña</label>
                        <input type="text" name="password" class="form-control" required value="" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Gerencia</label>
                        <select name="management_id" class="form-control" required value="" >
                            @foreach($managements as $management)
                                <option value="{{$management->id}}">{{$management->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
            </div>
            <div>
                <a href="{!! route('users.index') !!}">
                 <button type="button" class="btn btn-default btn-flat">Cancelar</button>   
                </a>
                
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Guardar</button>
            </div>
        </form>

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
