@extends('layouts.pop')
@section('titulo', 'Verificar correo electrónico')
@section('contenido')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <br><br>
            <img src="{!! asset('img/logo-login.png') !!}" style="width: 200px;">
            <br><br>
            <h1><b>Verifica tu correo electrónico</b></h1>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
        
                        <div class="card-body text-center">
                            @if (session('resent'))
                                <div class="alert alert-success" style="font-size: 16px" role="alert">
                                   Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
                                </div>
                            @endif
                            
                            <div style="font-size: 16px">
                                <h4 class="bold">{{\Auth::user()->usuario->nombres}}</h4>
                                Antes de continuar, revisa tu correo electrónico para obtener un enlace de verificación.
                                <br>Si no recibiste el correo electrónico, <a href="{{ route('verification.resend') }}">haga clic aquí para solicitar otro</a>.
                            </div>
                            <br>
                            <button id="Vsalir" class="btn btn-primary btn-flat">Salir</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@section('css')
<style>
    section.content-header{
        display: none;
    }
    .btn-primary {
      background-color: #333 !important;
      border-color: #333 !important;
    }

    .btn-primary.focus, .btn-primary:focus {
      background-color: #444 !important;
    }

    .btn-primary:hover {
      background-color: #444 !important;
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
    $(function() {
        $("button#Vsalir").click(function() {
            document.getElementById('logout-form').submit();
        });
    });
</script>    
@endsection
