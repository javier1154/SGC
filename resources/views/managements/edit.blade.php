@extends('layouts.app')
@section('titulo', 'Gerencias')
@section('subtitulo', 'Editar')
@section('contenido')
<br>
<div class="row">
    <div class="col-md-5 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Editar Gerencia</div>
                <form class="form-horizontal" action="{{ route('managements.update', $management->id) }}" method="POST">
                <div class="panel-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div>
                        @include('layouts.validacion')
                        <div class="row">
                            
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control" required value="{{$management->name}}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Código</label>
                                <input type="text" name="code" class="form-control" required value="{{$management->code}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Cuota</label>
                                <input type="text" name="cuota" class="form-control" required value="{{$management->cuota}}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Guardar</button>
                    </div>
            </div>
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
            $( "ul.sidebar-menu li.managements" ).addClass('active');
        });
    </script>
@endsection