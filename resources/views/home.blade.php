@extends('layouts.app')
@section('titulo', 'Jornadas disponibles')
@section('subtitulo', '')
@section('contenido')
<br>


@if((\Auth::user()->type() == "Administrador") || (\Auth::user()->type() == "Coordinador"))
    @foreach($days as $day)
        @if($day->status == 1)
            <div class="col-md-4">                     
                <div class="info-box">
                    <!-- Apply any bg-* class to to the icon to color it -->
                    <span class="info-box-icon bg-red"><i class="fa fa-calendar"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text" style="font-size:15px">{{fechaCastellano(mes($day->day))}} - {{$day->fuel->name}}</span>
                    <a href="{{route('user_fuel_day.show', encrypt($day->id))}}">
                        <strong style="color: #3f3b3a;">
                            <span class="info-box-number">{{dia($day->day)}}</span>
                        </strong>
                    </a>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->                
            </div> 
        @endif
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