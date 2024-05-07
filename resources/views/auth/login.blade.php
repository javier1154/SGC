<!-- <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JMCSTORE | Ingresar al Sistema</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('img/apple-touch-icon.png') !!}">
  <link rel="icon" type="image/png" sizes="32x32" href="{!! asset('img/favicon-32x32.png') !!}">
  <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('img/favicon-16x16.png') !!}">
  <link rel="stylesheet" href="{!! asset('plugins/bootstrap/css/bootstrap.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('plugins/font-awesome/css/font-awesome.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('plugins/sweetalert/dist/sweetalert.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('plugins/plantilla/dist/css/AdminLTE.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('plugins/toastr/toastr.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
  <style>
     body.login-page{
        background-color: #ecf0f5
    }

    #particles {
      width: 100%;
      height: 100%;
      overflow: hidden;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      position: absolute;
      z-index: -2;
  }
</style>  
</head>
<body class="hold-transition login-page">
    
    <div class="login-box">
      <div class="login-logo">
        <img src="{!! asset('img/logo-login.png') !!}" style="width: 360px;">
      </div>
      <div class="login-box-body" style="border: 1px solid #0a3d8f">
        <p class="login-box-msg"><b>INGRESAR AL SISTEMA</b></p>

        @if($errors->any())
          <div class="alert alert-danger text-center">
            <b>Correo electrónico o contraseña inválida</b>
          </div>
        @endif

        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf
            @captcha
            <div class="form-group has-feedback {{ $errors->any() ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Correo electrónico" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback {{ $errors->any() ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            
        <div class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
          </div>
          <br><br>
          

          
        </div>
  </form>

</div>
</div>

<div id="particles"><canvas class="pg-canvas" width="1349" height="362" style="display: block;"></canvas></div>

<script src="{!! asset('plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
<script src="{!! asset('plugins/bootstrap/js/bootstrap.min.js') !!}"></script>

<script src="{!! asset('plugins/sweetalert/dist/sweetalert.min.js') !!}"></script>

<script src="{!! asset('js/particle.min.js') !!}"></script>

<script src="{!! asset('js/app.min.js') !!}"></script>

<script src="{!! asset('plugins/toastr/toastr.min.js') !!}"></script>

@toastr_render

<script>
  document.addEventListener('DOMContentLoaded', function () {
    particleground(document.getElementById('particles'), {
        dotColor: '#194ea2',
        lineColor: '#2472ef',
        particleRadius: 1,
        lineWidth: 0.1,
        parallax: true,
  });

  
}, false);
</script>
</body>
</html> -->