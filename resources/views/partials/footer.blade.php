@if(isset(Auth::user()->usuario))
  <a href="#" class="scroll-top opciones">Ir arriba</a>
  <footer class="main-footer">
      <div class="pull-right text-right">
        <b>{{date("d-m-Y")}}</b>
      </div>
    <strong>Copyleft &copy; <a href="#!">SGC</a></strong>
  </footer>
@endif

