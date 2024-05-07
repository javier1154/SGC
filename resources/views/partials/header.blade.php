<header class="main-header" style="">
  <a href="#" class="logo">
    <span class="logo-mini" style="font-weight: bold">{{config('app.name')}}</span>
    <span class="logo-lg" style="font-weight: bold">{{config('app.name')}}</span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#!" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Navegación</span>
    </a>

    @auth
      <div class="user-header">
        <i class="fa fa-user"></i>&nbsp;&nbsp; {{ Auth::user()->usuario->nombres }}
      </div>
    @endauth
    
  </nav>
</header>
