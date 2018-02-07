<?php
/**
* Validador número de cédula ecuatoriana, adaptado del sitio: https://github.com/diaspar/validacion-cedula-ruc-ecuador/blob/master/validadores/php/ValidarIdentificacion.php
* Autor: Elivar Largo
* Sitio Web: wwww.ecodeup.com
* Fecha: 27-03-2017
*/
	$numero = $_POST['cedula'];

	if ((strlen($numero) != 10)) {
		$datos = array('estado' =>'NO');
		echo  json_encode($datos, true);
	} else {
		$arrayCoeficientes = array(2,1,2,1,2,1,2,1,2);
		$digitoVerificador = (int)$numero[9];
        $digitosIniciales = str_split(substr($numero, 0, 9));
        $total = 0;
        foreach ($digitosIniciales as $key => $value) {
            $valorPosicion = ( (int)$value * $arrayCoeficientes[$key] );
            if ($valorPosicion >= 10) {
                $valorPosicion = str_split($valorPosicion);
                $valorPosicion = array_sum($valorPosicion);
                $valorPosicion = (int)$valorPosicion;
            }
            $total = $total + $valorPosicion;
        }
        $residuo =  $total % 10;
        if ($residuo == 0) {
            $resultado = 0;
        } else {
            $resultado = 10 - $residuo;
        }
        if ($resultado != $digitoVerificador) {
        	$datos = array('estado' =>'NO');        	
        }else{
        	$datos = array('estado' =>'OK');
        	echo  json_encode($datos, true);
        }		
	}		
?>