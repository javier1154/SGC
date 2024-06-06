@extends('layouts.app')
@section('titulo', 'Inventario')
@section('subtitulo', '')
@section('contenido')
<br>

                
                    

                    
                        @foreach($tanks as $tank)
                            <div class="col-md-3">
                                <div class="panel panel-primary " style="border-radius:20px;">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading" style="text-align:center; font-size:30px; border-top-left-radius:17px; border-top-right-radius:17px; "><p>{{$tank->fuel->name}}</p></div>
                                        <div class="panel-body">
                                                <a href="{{route('tank.show', encrypt($tank->id))}}" class="a"><strong style="text-align:center; font-size:60px; color: #3f3b3a;"><p>{{$tank->available_litre}} Lt</p></strong></a>
                                    </div>
                                    

                                    <div class="" >
                                        
                                    <div class="well" style="text-align:center; font-size:25px; border-bottom-left-radius:24px; border-bottom-right-radius:24px; color: #3f3b3a;">  
                                    <label for=""></label>
                                    </div>
                                    
                                </div>
                            </div>

                       
                        
                    </div> 
                        @endforeach
                 

    
@endsection
@section('css')
    
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $( "ul.sidebar-menu li.inicio" ).addClass('active');
        });
    </script>
@endsection