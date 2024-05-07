<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> {{config('app.name')}} | Ingresar al Sistema</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('img/apple-touch-icon.png') !!}">
  <link rel="icon" type="image/png" sizes="32x32" href="{!! asset('img/favicon-32x32.png') !!}">
  <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('img/favicon-16x16.png') !!}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{!! asset('plugins/bootstrap/css/bootstrap.min.css') !!}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{!! asset('plugins/font-awesome/css/font-awesome.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('plugins/plantilla/dist/css/AdminLTE.min.css') !!}">

  <link rel="stylesheet" href="{!! asset('plugins/toastr/toastr.min.css') !!}">
  <!-- iCheck -->
  <style>
     body.login-page{
        background-color: #ddd;
    }

    .btn-primary {
      background-color: #00107f !important;
      border-color: #010f69 !important;
    }

    .btn-primary.focus, .btn-primary:focus {
      background-color: #010f69 !important;
    }

    .btn-primary:hover {
      background-color: #010f69 !important;
    }

    .login-box, .register-box {
      margin: 3% auto;
    }
</style>  
</head>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo" style="margin-top:0px; margin-bottom: 20px">
        <img src="{!! asset('img/logo.png') !!}" style="width: 380px;">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body" style="border: 1px solid #010f69; border-radius: 12px;">
        <p class="login-box-msg"><b>INGRESAR AL SISTEMA</b></p>
        @if ($errors->any())
            <div class="alert alert-danger text-center">
              <b>Correo o Contraseña inválida</b>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="Correo Electrónico" required autofocus>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
        <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat"><b>Ingresar</b></button>
          </div>
      </div>
  </form>

</div>
<!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{!! asset('plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!! asset('plugins/bootstrap/js/bootstrap.min.js') !!}"></script>

<script src="{!! asset('plugins/toastr/toastr.min.js') !!}"></script>

@toastr_render

</body>
</html>