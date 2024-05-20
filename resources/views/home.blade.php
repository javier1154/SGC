@extends('layouts.app')
<<<<<<< HEAD
@section('titulo', 'Inicio')
@section('subtitulo', 'Bienvenido')
@section('contenido')
<br>
<div class="panel panel-primary" style="border-radius: 20px">
    <div class="panel-heading" style="border-top-left-radius: 17px; border-top-right-radius: 17px;"><strong>Jornadas</strong></div>
        <div class="panel-body">
            <div class="row">
            
                <div class="col-md-2">
                                            
                </div>                         
            </div>
        </div>
</div>
    <div class="col">
        <div class="panel panel-primary" style="border-radius: 20px">
            <div class="panel-heading" style="border-top-left-radius: 17px; border-top-right-radius: 17px;"><strong>Jornadas</strong></div>
            <div class="panel-body">
                <div class="row">

                
                    @if((\Auth::user()->type() == "Administrador") or (\Auth::user()->type() == "Coordinador"))
                        @foreach($days as $day)
                        <div class="col-md-2 ">
                            <div class="panel panel-primary" style="border-radius: 20px">
                                <!-- Default panel contents -->
                                    <div class="panel-heading" style="text-align:center; font-size:30px; border-top-left-radius: 17px; border-top-right-radius: 17px;;"><p>{{mes($day->day)}}</p></div>
                                        <div class="well">
                                                <a href="{{route('user_fuel_day.index', encrypt($day->id))}}" style=" color: rgb(53, 52, 52)"><strong style="text-align:center; font-size:55px;"><p>{{dia($day->day)}}</p></strong></a>
                                        </div>
                                    <div class="panel-body">      
                                </div>
                            </div>
                        </div>                   
=======
@section('titulo', 'Jornadas')
@section('subtitulo', 'Bienvenido')
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
>>>>>>> 8668a5a6cc2e99346c3a8191208077601a6afdd1
                        @endforeach
                    @else
                        @foreach($days->where('type', 'Normal') as $day)
                        @endforeach
                    @endif
                    
<<<<<<< HEAD
                </div>
            </div>
        </div>
        
    </div>
=======
           
    
>>>>>>> 8668a5a6cc2e99346c3a8191208077601a6afdd1
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