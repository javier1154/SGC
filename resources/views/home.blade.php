@extends('layouts.app')
@section('titulo', 'Jornadas disponibles')
@section('subtitulo', '')
@section('contenido')
<br>


@if((\Auth::user()->type() == "Administrador") || (\Auth::user()->type() == "Coordinador"))
    @if (count($days))
        @foreach($days as $day)
            @if($day->status == 1)
            <div class="col-md-2">
                <div class="panel panel-primary " style="border-radius:20px;">
                    <!-- Default panel contents -->
                    <div class="panel-heading" style="text-align:center; font-size:30px; border-top-left-radius:17px; border-top-right-radius:17px; "><p>{{fechaCastellano(mes($day->day))}}</p></div>
                        <div class="panel-body">
                                <a href="{{route('user_fuel_day.show', encrypt($day->id))}}" class="a"><strong style="text-align:center; font-size:60px; color: #3f3b3a;"><p>{{dia($day->day)}}</p></strong></a>
                    </div>
                    

                    <div class="">
                    
                    <div class="well" style="text-align:center; font-size:25px; border-bottom-left-radius:24px; border-bottom-right-radius:24px; color: #3f3b3a;">  
                    <label for="">{{$day->fuel->name}}</label>
                    </div>
                    
                </div>
            </div>
            @endif
        @endforeach
    @else
        <div class="alert alert-info"><h4>INFORMACIÓN!</h4>No existen jornadas disponibles en el sistema.</div>
    @endif
    
@else
    @if (count($days))
        @foreach($days->where('type', 'Normal') as $day)
            @if($day->status == 1)
                <div class="col-md-2">
                    <div class="panel panel-primary " style="border-radius:20px;">
                        <!-- Default panel contents -->
                        <div class="panel-heading" style="text-align:center; font-size:30px; border-top-left-radius:17px; border-top-right-radius:17px; "><p>{{fechaCastellano(mes($day->day))}}</p></div>
                            <div class="panel-body">
                                    <a href="{{route('user_fuel_day.show', encrypt($day->id))}}" class="a"><strong style="text-align:center; font-size:60px; color: #3f3b3a;"><p>{{dia($day->day)}}</p></strong></a>
                        </div>
                        

                        <div class="">
                        
                        <div class="well" style="text-align:center; font-size:25px; border-bottom-left-radius:24px; border-bottom-right-radius:24px; color: #3f3b3a;">  
                        <label for="">{{$day->fuel->name}}</label>
                        </div>
                        
                    </div>
                </div>
            @endif        
        @endforeach
    @else
        <div class="alert alert-info"><h4>INFORMACIÓN!</h4>No existen jornadas disponibles en el sistema.</div>
    @endif
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