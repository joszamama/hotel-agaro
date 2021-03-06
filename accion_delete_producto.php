<?php	
	session_start();	
	
	if (isset($_SESSION["producto"])) {
		$producto = $_SESSION["producto"];
		unset($_SESSION["producto"]);
		
		require_once("gestionBD.php");
		require_once("gestionarProductos.php");
		
		$conexion = crearConexionBD();   // CREAR LA CONEXIÓN A LA BASE DE DATOS
		
		$excepcion = eliminarProducto($conexion, $producto["ID_PRODUCTO"]);
		
		cerrarConexionBD($conexion);     // CERRAR LA CONEXIÓN
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "PrivadoProductos.php";
			Header("Location: excepcion.php");
			
		} else {
			Header("Location: PrivadoProductos.php#añadirProducto");			
			
		}
		// SI LA FUNCIÓN RETORNÓ UN MENSAJE DE EXCEPCIÓN, ENTONCES REDIRIGIR A "EXCEPCION.PHP"
		// (NÓTESE QUE HAY QUE ASIGNAR ADECUADAMENTE LAS VARIABLES DE SESIÓN PARA "EXCEPCION.PHP")
		// EN OTRO CASO, VOLVER AL MAIN
	} 
	else // Se ha tratado de acceder directamente a este PHP 
		Header("Location: PrivadoProductos.php"); 
?>
