<?php
    
    function consultarBicis($conexion){
    	$consulta = "SELECT * FROM BICICLETAS";
		
		return $conexion->query($consulta);
    };
?>