@extends('layouts.pop')
@section('titulo', 'Restablecer contraseña')
@section('contenido')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <br><br>
            <img src="{!! asset('img/logo-login.png') !!}" style="width: 200px;">
            <br><br>
            <h1><b>Restablecer Contraseña</b></h1>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
        
                        <div class="card-body">

                            @if (session('status'))
                                <div class="alert alert-success" style="margin-bottom:0px" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <br>
        
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                @captcha
                                <div class="form-group row @error('email') has-error @enderror">
                                    <label for="email" class="col-md-4 col-form-label text-right" style="font-size: 18px; padding: 4px">Correo electrónico</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            Enviar enlace de restablecimiento de contraseña
                                        </button>
                                    </div>
                                </div>
                            </form>
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