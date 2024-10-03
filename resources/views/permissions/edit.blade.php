@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('subtitulo', 'Crear')
@section('contenido')
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" style="border-radius: 5px">
            <div class="panel-heading">Editar Permisos</div>
                <form class="form-horizontal" action="{{ route('permissions.update', $permit->id) }}" method="POST">
                    <div class="panel-body">
                        
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div>
                                @include('layouts.validacion')
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Tipo</label>
                                        <select name="type" class="form-control" required value="" style="width:100%">
                                            <option @if($permit->type == "administrador") selected @endif value="administrador">Administrador</option>
                                            <option @if($permit->type == "coordinador") selected @endif value="coordinador">Coordinador</option>
                                            <option @if($permit->type == "adminlideristrador") selected @endif value="lider">Líder</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Usuario</label>
                                        <select name="status" class="form-control" required value="" style="width:100%">
                                            <option @if($permit->status == 1) selected @endif value="1">Habilitado</option>
                                            <option @if($permit->status == 0) selected @endif value="0">Deshabilitado</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        
                    </div>
                    <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{!! route('permissions.index') !!}">
                            <button type="button" class="btn btn-default btn-flat" style="border-radius: 5px">Cancelar</button>   
                            </a>
                            <button type="submit" class="btn btn-primary btn-flat" style="border-radius: 5px"><i class="fa fa-save"></i> Guardar</button>
                        </div>
                    </div>
                    </form>
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
            $( "ul.sidebar-menu li.permissions" ).addClass('active');
        });
    </script>
@endsection
