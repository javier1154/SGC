<aside class="main-sidebar">
  <section class="sidebar">
    @auth
    <div class="user-panel">
      <div class="pull-left info">
        <p style="margin-bottom: -6px; font-size: 14px">{{ Auth::user()->name }}</p>
        {{-- <a href="#" style="cursor: default;"><i class="fa fa-circle text-success"></i>{{ Auth::user()->tipo() }}</a> --}}
      </div>
      <div class="info salir" style="margin-top: 10px; margin-bottom: 0px; padding-left: 0">
        <button id="salir-sistema" class="btn btn-primary btn-block btn-sm"><b>Salir <i class="fa fa-sign-out"></i></b></button>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">Panel {{-- {{Auth::user()->tipo()}} --}}</li>
      <li class="inicio"><a href="{!! route('home') !!}"><i class="fa fa-home"></i> <span>Resumen</span></a></li>
      <li class="managements"><a href="{!! route('managements.index') !!}"><i class="fa fa-briefcase"></i> <span>Gerencias</span></a></li>
      <li class="users"><a href="{!! route('users.index') !!}"><i class="fa fa-user"></i> <span>Usuarios</span></a></li>
      {{-- @if ((Auth::user()->tipo() == "Administrador") or (Auth::user()->tipo() == "Root"))
        <li class="caja"><a href="{!! route('caja.index') !!}"><i class="fa fa-desktop"></i><i class="fa fa-spinner fa-spin pull-right"></i> <span>Caja</span></a></li>
        <li class="inventario"><a href="{!! route('inventario.index') !!}"><i class="fa fa-list"></i> <span>Inventario</span></a></li>
        <li class="treeview inventario">
          <a href="#">
            <i class="fa fa-list"></i> <span>Inventario</span>
          </a>
          <ul class="treeview-menu" style="">
            @php
                $ruta_formato = route('inventario.formato');
            @endphp
            <li class="Iproductos"><a href="{!! route('inventarioProductos.index') !!}"><i class="fa fa-circle-o"></i> Productos</a></li>
            <li class="Ipresentaciones"><a href="{!! route('inventario.index') !!}"><i class="fa fa-circle-o"></i> Presentaciones</a></li>
            <li class="Imanual"><a onclick="window.open('{{$ruta_formato}}', '_blank', 'toolbars=0,scrollbars=1,location=0,statusbar=0,iniciobar=0,resizable=0,width=816,height=660,left = 10%,top = 0%');" href="#"><i class="fa fa-circle-o"></i> Formato Manual</a></li>
          </ul>
        </li>
        <li class="ventas"><a href="{!! route('ventas.index') !!}"><i class="fa fa-object-group"></i> <span>Ventas</span></a></li>
        <li class="eliminadas"><a href="{!! route('ventas.eliminadas') !!}"><i class="fa fa-trash"></i> <span>Ventas Eliminadas</span></a></li>
        <li class="cuentas"><a href="{!! route('ventas.cuentas') !!}"><i class="fa fa-tags"></i> <span>Créditos</span></a></li>
        <li class="cuentas_usaurios"><a href="{!! route('ventas.cuentas_usuarios') !!}"><i class="fa fa-tags"></i> <span>Créditos por Usuarios</span></a></li>
        <li class="abonos"><a href="{!! route('compras.index') !!}"><i class="fa fa-bank"></i> <span>Abonos</span></a></li>
        <li class="treeview cuadres">
          <a href="#">
            <i class="fa fa-exchange"></i> <span>Cuadres</span>
          </a>
          <ul class="treeview-menu" style="">
            <li class="Cinventario"><a href="{!! route('cuadresInventario.index') !!}"><i class="fa fa-circle-o"></i> Inventario</a></li>
            <li class="Ccaja"><a href="{!! route('cuadresCaja.index') !!}"><i class="fa fa-circle-o"></i> Caja</a></li>
          </ul>
        </li>
        <li class="treeview abonos">
          <a href="#">
            <i class="fa fa-bank"></i> <span>Abonos</span>
          </a>
          <ul class="treeview-menu" style="">
            <li class="Aclientes"><a href="{!! route('abonos.index') !!}"><i class="fa fa-circle-o"></i> Clientes</a></li>
            <li class="Aventas"><a href="{!! route('abonos.ventas') !!}"><i class="fa fa-circle-o"></i> Ventas</a></li>
          </ul>
        </li>
        <li class="retiros"><a href="{!! route('retiros.index') !!}"><i class="fa fa-ticket"></i> <span>Retiros</span></a></li>
        <li class="gastos"><a href="{!! route('gastos.index') !!}"><i class="fa fa-crop"></i> <span>Gastos</span></a></li>
        <li class="compras"><a href="{!! route('compras.index') !!}"><i class="fa fa-shopping-cart"></i> <span>Compras</span></a></li>
        <li class="aperturas"><a href="{{ route('aperturas.index') }}"><i class="fa fa-inbox"></i> <span>Aperturas de Caja</span></a></li>
        <li class="tasas"><a href="{{ route('tasas.index') }}"><i class="fa fa-dollar"></i> <span>Tasas de Cambio</span></a></li>
        <li class="productos"><a href="{!! route('productos.index') !!}"><i class="fa fa-cubes"></i> <span>Productos</span></a></li>
        <li class="reportes"><a href="{!! route('reportes.index') !!}"><i class="fa fa-files-o"></i> <span>Reportes</span></a></li>
        <li class="clientes"><a href="{{ route('clientes.index') }}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
        <li class="accesos"><a href="{{ route('accesos.index') }}"><i class="fa fa-key"></i> <span>Accesos</span></a></li>
        <li class="configuraciones"><a href="{{ route('configuraciones.index') }}"><i class="fa fa-cogs"></i> <span>Configuraciones</span></a></li>
      @else
        <li class="inicio"><a href="{!! route('inicio') !!}"><i class="fa fa-home"></i> <span>Resumen</span></a></li>
        <li class="caja"><a href="{!! route('caja.index') !!}"><i class="fa fa-desktop"></i><i class="fa fa-spinner fa-spin pull-right"></i> <span>Caja</span></a></li>
        <li class="treeview inventario">
          <a href="#">
            <i class="fa fa-list"></i> <span>Inventario</span>
          </a>
          <ul class="treeview-menu" style="">
            <li class="Iproductos"><a href="{!! route('inventarioProductos.index') !!}"><i class="fa fa-circle-o"></i> Productos</a></li>
            <li class="Ipresentaciones"><a href="{!! route('inventario.index') !!}"><i class="fa fa-circle-o"></i> Presentaciones</a></li>
          </ul>
        </li>
        <li class="ventas"><a href="{!! route('ventas.index') !!}"><i class="fa fa-object-group"></i> <span>Ventas</span></a></li>
        <li class="treeview cuadres">
          <a href="#">
            <i class="fa fa-exchange"></i> <span>Cuadres</span>
          </a>
          <ul class="treeview-menu" style="">
            <li class="Cinventario"><a href="{!! route('cuadresInventario.index') !!}"><i class="fa fa-circle-o"></i> Inventario</a></li>
            <li class="Ccaja"><a href="{!! route('cuadresCaja.index') !!}"><i class="fa fa-circle-o"></i> Caja</a></li>
          </ul>
        </li>
        <li class="treeview abonos">
          <a href="#">
            <i class="fa fa-bank"></i> <span>Abonos</span>
          </a>
          <ul class="treeview-menu" style="">
            <li class="Aclientes"><a href="{!! route('abonos.index') !!}"><i class="fa fa-circle-o"></i> Clientes</a></li>
            <li class="Aventas"><a href="{!! route('abonos.ventas') !!}"><i class="fa fa-circle-o"></i> Ventas</a></li>
          </ul>
        </li>
        <li class="retiros"><a href="{!! route('retiros.index') !!}"><i class="fa fa-ticket"></i> <span>Retiros</span></a></li>
        <li class="gastos"><a href="{!! route('gastos.index') !!}"><i class="fa fa-crop"></i> <span>Gastos</span></a></li>
        <li class="compras"><a href="{!! route('compras.index') !!}"><i class="fa fa-shopping-cart"></i> <span>Compras</span></a></li>
        <li class="aperturas"><a href="{{ route('aperturas.index') }}"><i class="fa fa-inbox"></i> <span>Aperturas de Caja</span></a></li>
        <li class="tasas"><a href="{{ route('tasas.index') }}"><i class="fa fa-dollar"></i> <span>Tasas de Cambio</span></a></li>
        <li class="productos"><a href="{!! route('productos.index') !!}"><i class="fa fa-cubes"></i> <span>Productos</span></a></li>
        <li class="reportes"><a href="{!! route('reportes.index') !!}"><i class="fa fa-files-o"></i> <span>Reportes</span></a></li>
        <li class="clientes"><a href="{{ route('clientes.index') }}"><i class="fa fa-users"></i> <span>Clientes</span></a></li>
      @endif --}}
    </ul>
    @endauth
  </section>
</aside>
