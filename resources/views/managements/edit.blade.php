@extends('layouts.app')
@section('titulo', 'Gerencias')
@section('subtitulo', 'Editar')
@section('contenido')

<div class="row">
    <div class="col-md-12">
    <form class="form-horizontal" action="{{ route('managements.update', $management->id) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div>
        @include('layouts.validacion')
        <div class="row">
            <div class="form-group col-md-12">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" required value="{{$management->name}}" required>
            </div>
        </div>
    </div>
    <div>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancelar</button>
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
            $( "ul.sidebar-menu li.managements" ).addClass('active');
        });
    </script>
@endsection