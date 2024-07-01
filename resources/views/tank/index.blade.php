@extends('layouts.app')
@section('titulo', 'Inventario')
@section('subtitulo', '')
@section('contenido')
<br>

                
                    

                    
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