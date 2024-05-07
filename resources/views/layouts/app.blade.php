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
</head>
<body class="hold-transition skin-red sidebar-mini fixed">
    <div class="wrapper">
        @include('partials.header')
        @include('partials.aside')
        <div class="content-wrapper">
            <section class="content-header">
                <h1><i class="fa fa-bookmark"></i>
                    @yield('titulo')
                    <small>@yield('subtitulo')</small>
                </h1>
            </section>
            <section class="content" style="position: relative;">
                @yield('contenido')
            </section>
        </div>
    </div>
@include('partials.js')
</body>
</html>
