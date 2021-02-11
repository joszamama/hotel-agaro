<?php	
	session_start();	
	
	if (isset($_SESSION["pago"])) {
		$pago = $_SESSION["pago"];
		unset($_SESSION["pago"]);
		unset($_SESSION["continuar"]);
		unset($_SESSION["confirmar"]);
		
		require_once("gestionBD.php");
		require_once("gestionarHabitaciones.php");
		
		$conexion = crearConexionBD();   // CREAR LA CONEXIÓN A LA BASE DE DATOS
		
				
		$excepcion = reservarHabitacion($conexion, $pago["numero"]);


		cerrarConexionBD($conexion);     // CERRAR LA CONEXIÓN
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "reserva_fecha.php";
			Header("Location: excepcion.php");
			
		} else {
			Header("Location: reserva_completada.php");			
			
		}
		// SI LA FUNCIÓN RETORNÓ UN MENSAJE DE EXCEPCIÓN, ENTONCES REDIRIGIR A "EXCEPCION.PHP"
		// (NÓTESE QUE HAY QUE ASIGNAR ADECUADAMENTE LAS VARIABLES DE SESIÓN PARA "EXCEPCION.PHP")
		// EN OTRO CASO, VOLVER AL MAIN
	} 
	else // Se ha tratado de acceder directamente a este PHP 
		Header("Location: reserva_fecha.php"); 
?>
