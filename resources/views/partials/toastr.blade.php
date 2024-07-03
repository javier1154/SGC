
@if(Session::has('toasts'))
	<script type="text/javascript">
		var tipo = "{{Session::get('toasts')[0]}}";
		var titulo = "{{Session::get('toasts')[1]}}";
		var mensaje = "{{Session::get('toasts')[2]}}";
		toastr[tipo](mensaje,titulo);
	</script>
@endif
