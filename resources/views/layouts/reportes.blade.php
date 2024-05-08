<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{config('app.name')}} | @yield('titulo')</title>
  @include('partials.css')
  <style>
    div.content-wrapper{
      margin-left: 0px;
    }
    a.sidebar-toggle{
      display: none;
    }
    div.titulo1{
      margin-top: 60px;
    }
    a.logo{
      text-align: left !important;
    }
    table tfoot tr.primary td, table tfoot tr.primary th{
      background-color: #337ab7 !important;
      color: #FFF !important;
    }

    a.print-top{
      margin-top: -10px;
    }

    .wrapper{
      background-color: #FFF !important;
    }
  </style>
</head>
<body class="hold-transition skin-red sidebar-mini fixed">
  <div class="wrapper">
    @include('partials.header')
    <div class="content-wrapper">
      <section class="content">
        
        @yield('contenido')
      </section>
    </div>
  </div>
  <a href="#" title="Imprimir" class="print-top opciones">Imrimir</a>
@include('partials.js')
</body>
</html>