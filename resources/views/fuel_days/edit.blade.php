@extends('layouts.app')
@section('titulo', 'Jornadas')
@section('subtitulo', 'Editar')
@section('contenido')
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Editar Jornadas</div>
                <form class="form-horizontal" action="{{ route('fuel_day.update', $fuel_day->id) }}" method="POST">
                    <div class="panel-body">
                        
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div>
                                @include('layouts.validacion')
                                <div class="row">
                                    <div class="form-group col-md-6">
                                            <label>Fecha</label>
                                            <input type="date" name="day" class="form-control" required value="{{$fuel_day->day}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>Tipo</label>
                                            <select name="type" class="form-control" required value="" style="width:100%">
                                                <option @if($fuel_day->type == "Normal") selected @endif value="normal">Normal</option>
                                                <option @if($fuel_day->type == "Especial") selected @endif value="especial">Especial</option>
                                                
                                            </select>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                                
                            </div>
                        
                    </div>
                    <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{!! route('fuel_day.index') !!}">
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

@endsection
@section('css')
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $( "ul.sidebar-menu li.fuel_days" ).addClass('active');
        });
    </script>
@endsection