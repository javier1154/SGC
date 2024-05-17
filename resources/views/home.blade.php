@extends('layouts.app')
@section('titulo', 'Resumen')
@section('subtitulo', 'prueba')
@section('contenido')
<br>
    <div class="col">
        <div class="panel panel-primary">
            <div class="panel-heading">Jornadas</div>
            <div class="panel-body">
                <div class="row">

                


                    @if((\Auth::user()->type() == "Administrador") or (\Auth::user()->type() == "Coordinador"))
                        @foreach($days as $day)
                        <div class="col-md-2 ">
                            <div class="panel panel-primary " style="border-radius: 20px">
                                <!-- Default panel contents -->
                                <div class="panel-heading" style="text-align:center; font-size:30px;"><p>{{mes($day->day)}}</p></div>
                                    <div class="well">
                                            <strong style="text-align:center; font-size:60px;"><p>{{dia($day->day)}}</p></strong>
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
            $( "ul.sidebar-menu li.inicio" ).addClass('active');
        });
    </script>
@endsection