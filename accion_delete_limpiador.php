<?php	
	session_start();	
	
	if (isset($_SESSION["empleado"])) {
		$empleado = $_SESSION["empleado"];
		unset($_SESSION["empleado"]);
		
		require_once("gestionBD.php");
		require_once("gestionarEmpleados.php");
		
		$conexion = crearConexionBD();   // CREAR LA CONEXIÓN A LA BASE DE DATOS
		
		$excepcion = eliminarCamarerosLimp($conexion,$empleado["dni"]);
		
		cerrarConexionBD($conexion);     // CERRAR LA CONEXIÓN
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "EmpleadosPrivado.php";
			Header("Location: excepcion.php");
			
		} else {
			Header("Location: EmpleadosPrivado.php#añadirCamarero");			
			
		}
		// SI LA FUNCIÓN RETORNÓ UN MENSAJE DE EXCEPCIÓN, ENTONCES REDIRIGIR A "EXCEPCION.PHP"
		// (NÓTESE QUE HAY QUE ASIGNAR ADECUADAMENTE LAS VARIABLES DE SESIÓN PARA "EXCEPCION.PHP")
		// EN OTRO CASO, VOLVER AL MAIN
	} 
	else // Se ha tratado de acceder directamente a este PHP 
		Header("Location: EmpleadosPrivado.php"); 
?>
