@extends('layouts.pop')
@section('titulo', 'ACCESO DENEGADO')
@section('contenido')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <br><br>
            <img src="{!! asset('img/logo.png') !!}" style="width: 340px;">
            <br><br>
            <h1><b>ACCESO DENEGADO</b></h1>
            <div class="blink">
                <i class="fa fa-ban" style="color: red; font-size: 200px"></i>
            </div>
            <br>
            <div>
                <a href="{{URL::previous()}}" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-arrow-left"></i> Atras</a>
            </div>
            
        </div>
    </div>
@endsection

@section('css')
<style>
    section.content-header{
        display: none;
    }
</style>
@endsection