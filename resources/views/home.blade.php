@extends('layouts.app')
@section('titulo', 'Jornadas disponibles')
@section('subtitulo', '')
@section('contenido')
<br>

                
                    

                    @if((\Auth::user()->type() == "Administrador") or (\Auth::user()->type() == "Coordinador"))
                        @foreach($days as $day)
                        <div class="col-md-2 ">
                            <div class="panel panel-primary " style="border-radius:20px;">
                                <!-- Default panel contents -->
                                <div class="panel-heading" style="text-align:center; font-size:30px; border-top-left-radius:17px; border-top-right-radius:17px; "><p>{{mes($day->day)}}</p></div>
                                    <div class="well">
                                            <a href="{{route('user_fuel_day.show', encrypt($day->id))}}" class="a"><strong style="text-align:center; font-size:60px; color: black;"><p>{{dia($day->day)}}</p></strong></a>
                                    </div>
                                <div class="panel-body">      
                            </div>
                        </div>
                    </div> 
                        @endforeach
                    @else
                        @foreach($days->where('type', 'Normal') as $day)
                        @endforeach
                    @endif

                    
           
    
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