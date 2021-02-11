<?php	
	session_start();	
	
	if (isset($_SESSION["pago"])) {
		$pago = $_SESSION["pago"];
		
		require_once("gestionBD.php");
		require_once("gestionarClientes.php");
		
		$conexion = crearConexionBD();   // CREAR LA CONEXIÓN A LA BASE DE DATOS
		
		$excepcion = añadirCliente($conexion,$pago["dni"],$pago["nombre"],$pago["apellidos"],
									$pago["email"],$pago["telefono"]);


		cerrarConexionBD($conexion);     // CERRAR LA CONEXIÓN
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "reserva_confirmar.php";
			Header("Location: excepcion.php");
			
		} else {
			Header("Location: accion_add_reserva.php");			
			
		}
		// SI LA FUNCIÓN RETORNÓ UN MENSAJE DE EXCEPCIÓN, ENTONCES REDIRIGIR A "EXCEPCION.PHP"
		// (NÓTESE QUE HAY QUE ASIGNAR ADECUADAMENTE LAS VARIABLES DE SESIÓN PARA "EXCEPCION.PHP")
		// EN OTRO CASO, VOLVER AL MAIN
	} 
	else // Se ha tratado de acceder directamente a este PHP 
		Header("Location: reserva_confirmar.php"); 
?>
