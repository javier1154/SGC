<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{config('app.name')}} | @yield('titulo')</title>
  <style>
    @page{
      margin-top: 2cm;
      margin-bottom: 0;
      margin-left: 0;
      margin-right: 0;
      padding: 0;
    }
  </style>
</head>
<body class="hold-transition skin-red sidebar-mini fixed">
    
    @yield('contenido')
      
</body>
</html>
