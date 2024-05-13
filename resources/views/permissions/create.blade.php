@extends('layouts.app')
@section('titulo', 'Permisología')
@section('subtitulo', 'Crear')
@section('contenido')
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Registrar Permisología</div>
            <form class="form-horizontal" action="{{ route('permissions.store') }}" method="POST">
                {{ csrf_field() }}
                @include('layouts.validacion')
                <div class="panel-body">
                    
                    
                        <div class="row">
                          
                            <div class="form-group col-md-4">
                                <label>Tipo</label>
                                <select name="type" class="form-control" required value="" style="width:100%">
                                    
                                    <option value="administrador">Administrador</option>
                                    <option value="coordinador">Coordinador</option>
                                    <option value="lider">Líder</option>

                                    
                                </select>
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

                            <div class="form-group col-md-4">
                                <label>Teléfono</label>
                                <input type="text" name="phone" class="form-control" required value="" >
                            </div>
                            <div class="form-group col-md-4">
                                <label>Contraseña</label>
                                <input type="text" name="password" class="form-control" required value="" >
                            </div>
                            
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