<?php  
// HELPERS
function diff_fecha($fecha){
    if($fecha != null){
        $fecha = strtotime($fecha);
        $fecha =  strtotime(date('Y-m-d'))- $fecha;
        $fecha = $fecha / 86400;

        if($fecha == "1"){
            $fecha = $fecha . " día"; 
        }else{
            $fecha = $fecha . " días";
        }
        

    }
    $fecha = "No ha surtido";
    return $fecha;
    
}

function fecha($fecha){
	return '<span style="display:none">'.$fecha.'</span>'.date("d-m-Y", strtotime($fecha));
}

function fecha_js($fecha){
	return date("d-m-Y", strtotime($fecha));
}
function dia($fecha){
	return date("d", strtotime($fecha));
}

function mes($fecha){
	return date("F", strtotime($fecha));
}

function anio($fecha){
	return date("Y", strtotime($fecha));
}

function fecha_hora($fecha){
	return '<span style="display:none">'.$fecha.'</span>'.date("d-m-Y H:i:s", strtotime($fecha));
}

function monto($monto){
	return '<span style="display:none">'.$monto.'</span>'.number_format($monto, 2, ',', '.');
}

function montoAlert($monto){
	return number_format($monto, 2, ',', '.');
}

function montojs($monto){
	return number_format($monto, 2, '.', '');
}

function monto_venta($monto){
	return number_format($monto, 2, '.', '');
}

function monto_grafica($monto){
	return number_format($monto, 2, '.', '');
}

function cantidad($monto){
	return number_format($monto, 0, '', '.');
}

function vacio($string){

	if(strlen(trim($string)) == 0){		
		$string = "SINF.";
	}
	return $string;
}

function status($status){
    if ($status == "1"){
        ?><span class="label label-success">Habilitado</span><?php
    }elseif ($status == "0"){
        ?><span class="label label-danger">Deshabilitado</span><?php
    }
}
function status_new($new, $status){
    if ($new == "1"){
        ?><span class="label label-warning">Por Aprobar</span><?php
    }elseif ($status == "1"){
        ?><span class="label label-success">Habilitado</span><?php
    }elseif ($status == "0"){
        ?><span class="label label-danger">Deshabilitado</span><?php
    }
}

function DTstatus($status){
    if ($status == "Habilitado"){
        return '<span class="label label-success">'.$status.'</span>';
    }elseif ($status == "Deshabilitado"){
        return '<span class="label label-danger">'.$status.'</span>';
    }
}

function oferta($oferta){
    if ($oferta == "Si"){
        ?><span class="label label-success"><?php echo $oferta ?></span><?php
    }elseif ($oferta == "No"){
        ?><span class="label label-warning"><?php echo $oferta ?></span><?php
    }
}

function DToferta($oferta){
    if ($oferta == "Si"){
        return '<span class="label label-success">'.$oferta.'</span>';
    }elseif ($oferta == "No"){
        return '<span class="label label-warning">'.$oferta.'</span>';
    }
}

function statusAbono($status){
    if ($status == "Retirado"){
        ?><span class="label label-success"><?php echo $status ?></span><?php
    }elseif ($status == "Pendiente"){
        ?><span class="label label-warning"><?php echo $status ?></span><?php
    }
}

function DTstatusAbono($status){
    if ($status == "Retirado"){
        return '<span class="label label-success">'.$status.'</span>';
    }elseif ($status == "Pendiente"){
        return '<span class="label label-warning">'.$status.'</span>';
    }
}

function quitar_acentos($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    return utf8_encode($cadena);
}

function quitar_especiales($cadena){
    $texto = preg_replace('([^A-Za-z0-9[]])', '', $cadena);
    return $texto;
}

function limpiar_cadena_ticket($cadena){
    return mb_strtoupper(quitar_especiales(quitar_acentos($cadena)), "UTF-8");
}

function fechaCastellano ($fecha) {
    $fecha = substr($fecha, 0, 10);

    $numeroDia = date('d', strtotime($fecha));

    $dia = date('l', strtotime($fecha));

    $mes = date('F', strtotime($fecha));

    $anio = date('Y', strtotime($fecha));

    $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");

    $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");

    $nombredia = str_replace($dias_EN, $dias_ES, $dia);

  $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    
    $nombreMes = str_replace($meses_EN, $meses_ES, $mes);

    return $nombreMes;
  }
?>