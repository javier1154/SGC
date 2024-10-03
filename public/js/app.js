function ventanaEmergente(URL, ancho, alto, left, top) {
window.open(URL, "_blank", 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width='+ancho+',height='+alto+',left ='+left+',top = '+top);
}

$("a.print-top").click(function(){ window.print(); });


function busqueda(){

	var tit = $("#titulo").html();

	$("input[type='search']#busqueda").keyup(function(){

		var val = $(this).val();

		if( val.length > 0 ){
			$("#titulo").html(tit+"<span style='text-transform: none;'><br><br><strong>B&uacute;squeda: </strong>" + val + "</span>");
		}else{
			$("#titulo").html(tit);
		}
	});

}

function call_swal(mensaje){
	swal({
		  title: "Aviso!",
		  text: mensaje,
		  type: "info"
	  });
}

function cedula(selector){
	$(selector).inputmask("A-9{4,9}", {
		definitions: {
			"A": {
				validator: "[GgJjVvEePpCc]",
				cardinality: 1,
				casing: "upper"
			}
		}
	});
}

function rif(selector){
	$(selector).inputmask("A-9{6,10}", {
		definitions: {
			"A": {
				validator: "[GgJjVvEePpCc]",
				cardinality: 1,
				casing: "upper"
			}
		}
	});
}

function telefono(selector){
	$(selector).inputmask("9999-999-9999");
}

function datatable(selector, ver, ruta, columnas){
	
	$(selector).dataTable({
		"autoWidth": false,
		"language": 
		{ 
		  "lengthMenu": '<div style="margin-left:'+ver+'" class="opciones"><b>Ver</b> <select class="form-control">'+
		  '<option value="10">10</option>'+
		  '<option value="20">20</option>'+
		  '<option value="50">50</option>'+
		  '<option value="-1">Todos</option>'+
		  '</select></div>',
		},
		"processing": true,
		"serverSide": true,
		"searchDelay": 1000,
		"ajax": ruta,
		"columns": columnas,
	});

	$( "<div class='table-responsive'>" ).insertBefore(selector);
	$(selector).appendTo('.table-responsive');
}