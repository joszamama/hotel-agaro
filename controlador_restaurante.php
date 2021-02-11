<?php
	session_start();
    if(isset($_REQUEST["editar"])){
			$_SESSION["editar"] = $_REQUEST["editar"];
			$restaurante["ID_RESTAURANTE"] = $_REQUEST["ID_RESTAURANTE"];	
			$restaurante["NUMEROMESAS"] = $_REQUEST["NUMEROMESAS"];
			$restaurante["NUMERORESERVAS"] = $_REQUEST["NUMERORESERVAS"];
			$restaurante["HORAAPERTURA"] = $_REQUEST["HORAAPERTURA"];
			$restaurante["HORACIERRE"] = $_REQUEST["HORACIERRE"];
			$_SESSION["restaurante"] = $restaurante;

			Header("Location: RestaurantePrivado.php#editarReservaRestaurante");
			
	} else if(isset($_REQUEST["guardarEdit"])){
			$restaurante["ID_RESTAURANTE"] = $_REQUEST["ID_RESTAURANTE"];		
			$restaurante["NUMEROMESAS"] = $_REQUEST["NUMEROMESAS"];
			$restaurante["NUMERORESERVAS"] = $_REQUEST["NUMERORESERVAS"];
			$restaurante["HORAAPERTURA"] = $_REQUEST["HORAAPERTURA"];
			$restaurante["HORACIERRE"] = $_REQUEST["HORACIERRE"];
			$_SESSION["restaurante"] = $restaurante;


			Header("Location: accion_modify_restauracion.php");
			
	} else {
			Header("Location: RestaurantePrivado.php");
	}
?>