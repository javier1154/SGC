@extends('layouts.app')
@section('titulo', 'Resumen')
@section('subtitulo', date("d-m-Y"))
@section('contenido')

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