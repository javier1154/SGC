<?php  
// HELPERS
function fecha($fecha){
	return '<span style="display:none">'.$fecha.'</span>'.date("d-m-Y", strtotime($fecha));
}

function fecha_js($fecha){
	return date("d-m-Y", strtotime($fecha));
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
?>