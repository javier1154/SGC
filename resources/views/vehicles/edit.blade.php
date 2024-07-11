@extends('layouts.app')
@section('titulo', 'Vehículos')
@section('subtitulo', 'Editar')
@section('contenido')
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" style="border-radius: 5px;" >
            <div class="panel-heading">Editar Vehículo</div>
            <form class="form-horizontal" action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
            <div class="panel-body">
                
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                @include('layouts.validacion')
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Placa</label>
                        <input type="text" name="plate" class="form-control" required value="{{$vehicle->plate}} " >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Marca</label>
                        <input type="text" name="brand" class="form-control" required value="{{$vehicle->brand}}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Modelo</label>
                        <input type="text" name="model" class="form-control" required value="{{$vehicle->model}}" >
                    </div>

                    <div class="form-group col-md-4">
                        <label>Año</label>
                        <input type="number" name="year" class="form-control" required value="{{$vehicle->year}}" min= "0">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Color</label>
                        <input type="text" name="color" class="form-control" required value="{{$vehicle->color}}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Observaciones</label>
                        <input type="text" name="observations" class="form-control" value="{{$vehicle->observations}}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Litraje</label>
                        <input type="number" step= "0.01" name="liter" class="form-control" required value="{{$vehicle->liter}}" >
                    </div>

                    <input type="hidden" name="user_id" class="form-control" required value="{{$vehicle->user_vehicles->user_id}}" >
                    
                    <div class="form-group col-md-4">
                        <label>Combustible</label>
                        <select name="fuel_id" class="form-control" required value="" style="width:100%">
                            @foreach($fuels as $fuel)
                                <option @if($vehicle->fuel_id == $fuel->id) selected @endif value="{{$fuel->id}}">{{$fuel->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>  
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a  class="btn btn-default btn-flat" style="border-radius: 5px;" href="{!! route('users.show', encrypt($vehicle->user_vehicles->user_id)) !!}">
                        Cancelar
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
            $( "ul.sidebar-menu li.vehicles" ).addClass('active');
        });
    </script>
@endsection
