<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<!-- jQuery 2.2.0 -->
<script src="{!! asset('plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!! asset('plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- Slimscroll -->
<script src="{!! asset('plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('plugins/fastclick/fastclick.min.js') !!}"></script>

<script src="{!! asset('plugins/sweetalert/dist/sweetalert.min.js') !!}"></script>

<script src="{!! asset('plugins/select2/select2.full.min.js') !!}"></script>

<script src="{!! asset('plugins/pace/pace.min.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('plugins/plantilla/dist/js/app.min.js') !!}"></script>

<script src="{!! asset('js/app.min.js') !!}"></script>

<script src="{!! asset('plugins/toastr/toastr.min.js') !!}"></script>

@yield('js')

<script type="text/javascript">
$(function() {

    $("button#salir-sistema").click(function() {
      swal({
        title: "Aviso!",
        text: "¿Desea salir del sistema?",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false
      },function(isConfirm){
        if (isConfirm){
          document.getElementById('logout-form').submit();
        }
      });
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('a.scroll-top').fadeIn();
        } else {
            $('a.scroll-top').fadeOut();
        }
    });

    $('a.scroll-top').click(function() {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    $("select").select2();

});

</script>