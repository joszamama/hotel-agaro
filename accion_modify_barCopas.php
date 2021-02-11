<?php
	session_start();

    if (isset($_SESSION["barCopas"])) {
		$barCopas = $_SESSION["barCopas"];
		unset($_SESSION["barCopas"]);
		
		require_once("gestionBD.php");
		require_once("gestionarRestauracion.php");
		
		$conexion = crearConexionBD();   // CREAR LA CONEXIÓN A LA BASE DE DATOS
	
		$excepcion = editarBarCopas($conexion, $barCopas["NUMERORESERVAS"]);
		cerrarConexionBD($conexion);     // CERRAR LA CONEXIÓN
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "RestaurantePrivado.php";
			Header("Location: excepcion.php");
			
		} else {
			Header("Location: RestaurantePrivado.php#editarReservaBarCopas");			
			
		}
	
	}else // Se ha tratado de acceder directamente a este PHP 
		Header("Location: RestaurantePrivado.php"); 
?>