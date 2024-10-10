@extends('layouts.app')
@section('titulo', 'Inventario')
@section('subtitulo', '')
@section('contenido')
<br>
    <!--Boton de registrar--> 
    <div class = "row">
        <div class="col-md-2">
        <button type="button" class="btn btn-primary btn-flat opciones" data-toggle="modal" data-target="#modal-default" style="margin-bottom: -50px; position: absolute; left: 130px; z-index: 1; border-radius:5px;">
            <i class="fa fa-btn fa-sign-in"></i> Añadir
        </button>

        </div>
         
        
        @foreach($tanks as $tank)
            <div class="col-md-5">
                
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-red"><i class="fa fa-cubes"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">{{$tank->fuel->name}}</span>
                    <span class="info-box-number">{{$tank->available_litre}} Lts</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
                            
                                
            </div> 

            
        @endforeach
    
    
    </div>
            
                    

                    
                        
                        <div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Añadir tanque</b></h4>
                </div>
                <form class="form-horizontal" action="{{ route('tank.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        @include('layouts.validacion')
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Volumen Inicial</label>
                                <input type="text" name="tank_litre" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" style="border-radius:5px;">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-flat" style="border-radius:5px;"><i class="fa fa-save"></i> Registrar</button>
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
            $( "ul.sidebar-menu li.tank" ).addClass('active');
        });
    </script>
@endsection