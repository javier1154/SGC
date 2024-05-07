<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="background-color: #ecf0f5;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('partials.css')
  <style>
    div.content-wrapper{
      margin-left: 0px;
    }
    a.sidebar-toggle{
      display: none;
    }
    div.pace{
      display: none;
    }
  </style>
</head>
<body class="hold-transition skin-red sidebar-mini fixed">
  <div class="wrapper">
    @yield('contenido')
  </div>
    @include('partials.js')
</body>
</html>