@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('subtitulo', 'Crear')
@section('contenido')
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Editar Usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('users.update', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div>
                            @include('layouts.validacion')
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Nombre</label>
                                    <input type="text" name="name" class="form-control" required value="{{$user->name}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>CI</label>
                                    <input type="text" name="ci" class="form-control" required value="{{$user->ci}}" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" required value="{{$user->email}}" >
                                </div>
                                <div class="form-group col-md-4">
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
                        <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a href="{!! route('users.index') !!}">
                                <button type="button" class="btn btn-default btn-flat">Cancelar</button>   
                                </a>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
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
